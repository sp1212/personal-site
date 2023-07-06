<?php
class SiteController
{
    private $command;

    private $db;

    public function __construct($command)
    {
        $this->command = $command;
        $this->db = new Database();
    }

    public function run()
    {
        // start a user session if one doesn't exist
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // allow user to go to createaccount page if not logged in
        if (!isset($_SESSION["email"]) && $this->command == "/createaccount") {
            $this->command == "/createaccount"; // repetitive but just continue
        }
        // disallow a logged-in user from accessing the createaccount page
        else if (isset($_SESSION["email"]) && $this->command == "/createaccount") {
            $this->command = "/home";
            header("Location: /home");
        }
        // disallow a logged-in user from accessing the login page
        else if (isset($_SESSION["email"]) && $this->command == "/login") {
            $this->command = "/home";
            header("Location: /home");
        }
        // if not logged in and trying to access a core site page (thus not caught by statements above), redirect to login
        else if (!isset($_SESSION["email"]) && $this->command != "/login") {
            $this->command = "/login";
            header("Location: /login");
        } else if ($this->command == "/") {
            $this->command = "/home";
            header("Location: /home");
        }

        // run a specific function below based on the given command
        switch ($this->command) {
            case "/home":
                $this->home();
                break;
            case "/profile":
                $this->profile();
                break;
            case "/wordle":
                $this->wordle();
                break;
            case "/createaccount":
                $this->createaccount();
                break;
            case "/logout":
                $this->logout();
                break;
            case "/login":
                $this->login();
                break;
            default:
                $this->pagenotfound();
                break;
        }
    }


    // Display the login page (and handle login logic)
    public function login()
    {
        $error_msg = "";

        // if an email was entered
        if (isset($_POST["email"])) {
            // look for a db entry with the given email
            $data = $this->db->query("select * from users where email = ?;", "s", $_POST["email"]);
            $nameData = [];
            if (!empty($data)) {
                $nameData = $this->db->query("select * from realnames where userId = ?;", "s", $data[0]["userId"]);
            }
            // error checking
            if ($data === false || $nameData === false) {
                $error_msg = "Error checking for user.";
            }
            // if an entry was found in the db for that email
            else if (!empty($data)) {
                // attempt to verify the password for that given email
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    // set email within the session to the email entered in the form, also found in the db
                    $_SESSION["userId"] = $data[0]["userId"];
                    $_SESSION["email"] = $data[0]["email"];
                    $_SESSION["firstName"] = $nameData[0]["firstName"];
                    $_SESSION["lastName"] = $nameData[0]["lastName"];
                    // redirect to home
                    // this type of redirect not always necessary, but it is here
                    // because the session variable would otherwise not be updated until the next refresh
                    header("Location: /home");
                } else {
                    // found a user in the db with that email but had the wrong password
                    $error_msg = "Invalid password.";
                }
            } else { // empty, no user found
                $error_msg = "Account not found.";
            }
        }

        include("login.php");
    }

    // similar to login functionality, but for creating a new account
    public function createaccount()
    {
        $error_msg = "";

        if (isset($_POST["email"])) {
            $data = $this->db->query("select * from users where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user.";
            } else if (!empty($data)) {
                $error_msg = "Account with that email address already exists.";
            } else if ($_POST["password"] != $_POST["passwordconf"]) {
                $error_msg = "Password confirmation didn't match.";
            } else { // empty, no user found
                $insert = $this->db->query(
                    "insert into users (email, password) values (?, ?);",
                    "ss",
                    $_POST["email"],
                    password_hash($_POST["password"], PASSWORD_DEFAULT)
                );
                // get the user id
                $userIdData = $this->db->query("select userId from users where email = ?;", "s", $_POST["email"]);
                $userId = $userIdData[0]["userId"];
                $insert2 = $this->db->query(
                    "insert into realnames (userId, firstName, lastName) values (?, ?, ?);",
                    "dss",
                    $userId,
                    $_POST["firstName"],
                    $_POST["lastName"]
                );
                if ($insert === false || $insert2 === false || $userIdData === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $_SESSION["userId"] = $userId;
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["firstName"] = $_POST["firstName"];
                    $_SESSION["lastName"] = $_POST["lastName"];
                    $_SESSION["email"] = $_POST["email"];
                    header("Location: /home");
                }
            }
        }
        include("createaccount.php");
    }

    public function wordle()
    {
        $guess0 = false;
        $guess1 = false;
        $guess2 = false;
        $guess3 = false;
        $guess4 = false;
        $guess5 = false;
        $flattilecolors = false;
        $numGuesses = 0;
        $possibleWords = [];
        for ($i = 0; $i < 1; $i++) {
            if (isset($_POST['guess0']) && strlen($_POST['guess0']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess0'])) {
                $guess0 = strtolower($_POST['guess0']);
                $numGuesses++;
            } else {
                break;
            }
            if (isset($_POST['guess1']) && strlen($_POST['guess1']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess1'])) {
                $guess1 = strtolower($_POST['guess1']);
                $numGuesses++;
            } else {
                break;
            }
            if (isset($_POST['guess2']) && strlen($_POST['guess2']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess2'])) {
                $guess2 = strtolower($_POST['guess2']);
                $numGuesses++;
            } else {
                break;
            }
            if (isset($_POST['guess3']) && strlen($_POST['guess3']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess3'])) {
                $guess3 = strtolower($_POST['guess3']);
                $numGuesses++;
            } else {
                break;
            }
            if (isset($_POST['guess4']) && strlen($_POST['guess4']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess4'])) {
                $guess4 = strtolower($_POST['guess4']);
                $numGuesses++;
            } else {
                break;
            }
            if (isset($_POST['guess5']) && strlen($_POST['guess5']) == 5 && preg_match('/^[A-Za-z]{5}$/', $_POST['guess5'])) {
                $guess5 = strtolower($_POST['guess5']);
                $numGuesses++;
            } else {
                break;
            }
        }
        if (isset($_POST['flattilecolors']) && strlen($_POST['flattilecolors']) == 30 && preg_match('/^[012-]{30}$/', $_POST['flattilecolors'])) {
            $flattilecolors = $_POST['flattilecolors'];
        }
        if (!preg_match('/^[012-]{' . $numGuesses * 5 . '}$/', substr($flattilecolors, 0, $numGuesses * 5))) {
            $flattilecolors = false;
        }
        $guessArr = [$guess0, $guess1, $guess2, $guess3, $guess4, $guess5];
        $combinedGuesses = "";
        for ($i = 0; $i <= 5; $i++) {
            if ($guessArr[$i]) {
                $combinedGuesses .= $guessArr[$i];
            }
            else {
                break;
            }
        }
        $deadLetters = "-";
        $correctregexp = ".....";
        $yellowLetters = "";
        $yellowPattern = [[], [], [], [], [], []];
        for ($n = 0; $n < strlen($combinedGuesses); $n++) {
            if ($flattilecolors[$n] == "0" && !str_contains($deadLetters, $combinedGuesses[$n])) {
                $gno = intdiv($n, 5);
                $gtemp = $guessArr[$gno];
                // add dead letters if they occur only once
                if (substr_count($gtemp, $combinedGuesses[$n]) == 1) {
                    $deadLetters .= $combinedGuesses[$n];
                }
            }
            // account for green letters
            else if ($flattilecolors[$n] == 2) {
                $correctregexp[$n % 5] = $combinedGuesses[$n];
            }
            // account for yellow letters
            else if ($flattilecolors[$n] == 1) {
                $yellowLetters .= $combinedGuesses[$n];
                array_push($yellowPattern[$n % 5], $combinedGuesses[$n]);
            }
        }
        $deadregexp = "[" . $deadLetters . "]";
        $data = $this->db->query("select word from words where word not regexp ? and word regexp ? order by word", "ss", $deadregexp, $correctregexp);
        $possibleWords = [];
        for ($i = 0; $i < count($data); $i++) {
            $temp = $data[$i]['word'];
            $shouldAdd = true;
            // don't add if the word doesn't contain a yellow letter
            for ($y = 0; $y < strlen($yellowLetters); $y++) {
                if (!str_contains($temp, $yellowLetters[$y])) {
                    $shouldAdd = false;
                    break;
                }
            }
            // don't add if the word contains a letter that was yellow in that place
            for ($k = 0; $k <= 5; $k++) {
                for ($j = 0; $j < count($yellowPattern[$k]); $j++) {
                    if ($temp[$k] == $yellowPattern[$k][$j]) {
                        $shouldAdd = false;
                        break;
                    }
                }
            }
            // loop over each guess
            for ($z = 0; $z < count($guessArr) && $z < $numGuesses; $z++) {
                $tg = $guessArr[$z];
                // loop over each letter of that guess
                for ($h = 0; $h < 5; $h++) {
                    // if a letter is used in that guess multiple times
                    if (substr_count($tg, substr($tg, $h, 1)) > 1) {
                        // loop over the tile colors for that guess
                        $confcount = 0;
                        for ($d = 0; $d < 5; $d++) {
                            if ($flattilecolors[$z * 5 + $d] > 0) {
                                $confcount++;
                            }
                        }
                        // don't add words where the count of letters doesn't match
                        if (substr_count($temp, $tg[$h]) != $confcount) {
                            $shouldAdd = false;
                            break;
                        }
                    }
                }
            }
            if ($shouldAdd) {
                array_push($possibleWords, $temp);
            }
        }
        // need to account for multiple letters in cases:
        // one yellow and another yellow or green
        // one yellow/green and one black
        include("wordle.php");
    }

    public function home()
    {
        include("home.php");
    }

    public function profile()
    {
        include("profile.php");
    }

    public function logout()
    {
        session_destroy();
        header("Location: /home");
    }

    public function pagenotfound()
    {
        http_response_code(404);
        include("pagenotfound.php");
    }
}
