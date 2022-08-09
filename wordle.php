<?php
    function echoColorClass($numeral, $colors) {
        if (strcmp($colors[$numeral], "0") == 0) {
            echo "gray";
        }
        else if (strcmp($colors[$numeral], "1") == 0) {
            echo "yellow";
        }
        else if (strcmp($colors[$numeral], "2") == 0) {
            echo "green";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/styles/main.css" />
    <link rel="stylesheet" href="/assets/styles/wordle.css" />

    <title>Wordle</title>
</head>

<body>
    <header>
        <div id="top-navbar-placeholder">
            <?php include("top-navbar.php"); ?>
        </div>
    </header>

    <main>
        <div class="row content">
            <h1 class="display-4">Wordle Helper</h1>
        </div>
        <div class="row justify-content-center content">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="row justify-content-center" id="row0">
                    <div class="col-2 tile <?php echoColorClass(0, $flattilecolors) ?>" id="tile0">
                        <?php if ($guess0) echo strtoupper($guess0[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(1, $flattilecolors) ?>" id="tile1">
                        <?php if ($guess0) echo strtoupper($guess0[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(2, $flattilecolors) ?>" id="tile2">
                        <?php if ($guess0) echo strtoupper($guess0[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(3, $flattilecolors) ?>" id="tile3">
                        <?php if ($guess0) echo strtoupper($guess0[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(4, $flattilecolors) ?>" id="tile4">
                        <?php if ($guess0) echo strtoupper($guess0[4]); ?>
                    </div>
                </div>
                <?php if ($numGuesses == 1) echo '<hr/>'; ?>
                <div class="row justify-content-center" id="row1">
                    <div class="col-2 tile <?php echoColorClass(5, $flattilecolors) ?>" id="tile5">
                        <?php if ($guess1) echo strtoupper($guess1[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(6, $flattilecolors) ?>" id="tile6">
                        <?php if ($guess1) echo strtoupper($guess1[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(7, $flattilecolors) ?>" id="tile7">
                        <?php if ($guess1) echo strtoupper($guess1[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(8, $flattilecolors) ?>" id="tile8">
                        <?php if ($guess1) echo strtoupper($guess1[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(9, $flattilecolors) ?>" id="tile9">
                        <?php if ($guess1) echo strtoupper($guess1[4]); ?>
                    </div>
                </div>
                <?php if ($numGuesses == 2) echo '<hr/>'; ?>
                <div class="row justify-content-center" id="row2">
                    <div class="col-2 tile <?php echoColorClass(10, $flattilecolors) ?>" id="tile10">
                        <?php if ($guess2) echo strtoupper($guess2[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(11, $flattilecolors) ?>" id="tile11">
                        <?php if ($guess2) echo strtoupper($guess2[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(12, $flattilecolors) ?>" id="tile12">
                        <?php if ($guess2) echo strtoupper($guess2[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(13, $flattilecolors) ?>" id="tile13">
                        <?php if ($guess2) echo strtoupper($guess2[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(14, $flattilecolors) ?>" id="tile14">
                        <?php if ($guess2) echo strtoupper($guess2[4]); ?>
                    </div>
                </div>
                <?php if ($numGuesses == 3) echo '<hr/>'; ?>
                <div class="row justify-content-center" id="row3">
                    <div class="col-2 tile <?php echoColorClass(15, $flattilecolors) ?>" id="tile15">
                        <?php if ($guess3) echo strtoupper($guess3[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(16, $flattilecolors) ?>" id="tile16">
                        <?php if ($guess3) echo strtoupper($guess3[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(17, $flattilecolors) ?>" id="tile17">
                        <?php if ($guess3) echo strtoupper($guess3[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(18, $flattilecolors) ?>" id="tile18">
                        <?php if ($guess3) echo strtoupper($guess3[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(19, $flattilecolors) ?>" id="tile19">
                        <?php if ($guess3) echo strtoupper($guess3[4]); ?>
                    </div>
                </div>
                <?php if ($numGuesses == 4) echo '<hr/>'; ?>
                <div class="row justify-content-center" id="row4">
                    <div class="col-2 tile <?php echoColorClass(20, $flattilecolors) ?>" id="tile20">
                        <?php if ($guess4) echo strtoupper($guess4[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(21, $flattilecolors) ?>" id="tile21">
                        <?php if ($guess4) echo strtoupper($guess4[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(22, $flattilecolors) ?>" id="tile22">
                        <?php if ($guess4) echo strtoupper($guess4[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(23, $flattilecolors) ?>" id="tile23">
                        <?php if ($guess4) echo strtoupper($guess4[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(24, $flattilecolors) ?>" id="tile24">
                        <?php if ($guess4) echo strtoupper($guess4[4]); ?>
                    </div>
                </div>
                <?php if ($numGuesses == 5) echo '<hr/>'; ?>
                <div class="row justify-content-center" id="row5">
                    <div class="col-2 tile <?php echoColorClass(25, $flattilecolors) ?>" id="tile25">
                        <?php if ($guess5) echo strtoupper($guess5[0]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(26, $flattilecolors) ?>" id="tile26">
                        <?php if ($guess5) echo strtoupper($guess5[1]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(27, $flattilecolors) ?>" id="tile27">
                        <?php if ($guess5) echo strtoupper($guess5[2]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(28, $flattilecolors) ?>" id="tile28">
                        <?php if ($guess5) echo strtoupper($guess5[3]); ?>
                    </div>
                    <div class="col-2 tile <?php echoColorClass(29, $flattilecolors) ?>" id="tile29">
                        <?php if ($guess5) echo strtoupper($guess5[4]); ?>
                    </div>
                </div>
                <div class="form-floating m-3 content">
                    <input type="text" class="form-control" id="guess" placeholder="guess" maxlength="5" minlength="5" pattern="^[A-Za-z]{5}$">
                    <label for="guess">Guess</label>
                </div>
                <div class="content">
                    <button class="btn btn-primary" id="addGuess">Add Guess</button>
                </div>
                <div class="form-floating m-3 content">
                    <form action="/wordle" method="post">
                        <input type="text" id="guess0" name="guess0" hidden <?php if ($guess0) echo 'value="' . $guess0 . '"'; ?> />
                        <input type="text" id="guess1" name="guess1" hidden <?php if ($guess1) echo 'value="' . $guess1 . '"'; ?> />
                        <input type="text" id="guess2" name="guess2" hidden <?php if ($guess2) echo 'value="' . $guess2 . '"'; ?> />
                        <input type="text" id="guess3" name="guess3" hidden <?php if ($guess3) echo 'value="' . $guess3 . '"'; ?> />
                        <input type="text" id="guess4" name="guess4" hidden <?php if ($guess4) echo 'value="' . $guess4 . '"'; ?> />
                        <input type="text" id="guess5" name="guess5" hidden <?php if ($guess5) echo 'value="' . $guess5 . '"'; ?> />
                        <input type="text" id="flattilecolors" name="flattilecolors" <?php if ($flattilecolors) {
                                                                                            echo 'value="' . $flattilecolors . '"';
                                                                                        } else {
                                                                                            echo 'value="------------------------------"';
                                                                                        } ?> hidden />
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </form>
                </div>
                <div class="form-floating m-3 content">
                    <a class="refresh" href="/wordle">Refresh to reset</a>
                </div>
            </div>
        </div>
        <?php
        echo $guess0;
        echo $guess1;
        echo $guess2;
        echo $guess3;
        echo $guess4;
        echo $guess5;
        echo $flattilecolors;
        echo "numGuesses=" . $numGuesses;
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/assets/js/wordle.js"></script>
</body>

</html>