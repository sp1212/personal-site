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
