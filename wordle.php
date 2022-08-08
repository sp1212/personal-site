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
                    <div class="col-2 tile" id="tile0">

                    </div>
                    <div class="col-2 tile" id="tile1">

                    </div>
                    <div class="col-2 tile" id="tile2">

                    </div>
                    <div class="col-2 tile" id="tile3">

                    </div>
                    <div class="col-2 tile" id="tile4">

                    </div>
                </div>
                <div class="row justify-content-center" id="row1">
                    <div class="col-2 tile" id="tile5">

                    </div>
                    <div class="col-2 tile" id="tile6">

                    </div>
                    <div class="col-2 tile" id="tile7">

                    </div>
                    <div class="col-2 tile" id="tile8">

                    </div>
                    <div class="col-2 tile" id="tile9">

                    </div>
                </div>
                <div class="row justify-content-center" id="row2">
                    <div class="col-2 tile" id="tile10">

                    </div>
                    <div class="col-2 tile" id="tile11">

                    </div>
                    <div class="col-2 tile" id="tile12">

                    </div>
                    <div class="col-2 tile" id="tile13">

                    </div>
                    <div class="col-2 tile" id="tile14">

                    </div>
                </div>
                <div class="row justify-content-center" id="row3">
                    <div class="col-2 tile" id="tile15">

                    </div>
                    <div class="col-2 tile" id="tile16">

                    </div>
                    <div class="col-2 tile" id="tile17">

                    </div>
                    <div class="col-2 tile" id="tile18">

                    </div>
                    <div class="col-2 tile" id="tile19">

                    </div>
                </div>
                <div class="row justify-content-center" id="row4">
                    <div class="col-2 tile" id="tile20">

                    </div>
                    <div class="col-2 tile" id="tile21">

                    </div>
                    <div class="col-2 tile" id="tile22">

                    </div>
                    <div class="col-2 tile" id="tile23">

                    </div>
                    <div class="col-2 tile" id="tile24">

                    </div>
                </div>
                <div class="row justify-content-center" id="row5">
                    <div class="col-2 tile" id="tile25">

                    </div>
                    <div class="col-2 tile" id="tile26">

                    </div>
                    <div class="col-2 tile" id="tile27">

                    </div>
                    <div class="col-2 tile" id="tile28">

                    </div>
                    <div class="col-2 tile" id="tile29">

                    </div>
                </div>
                <div class="form-floating m-3 content">
                    <input type="text" class="form-control" id="guess" placeholder="guess" maxlength="5" minlength="5" pattern="[A-Za-z]{5}">
                    <label for="guess">Guess</label>
                </div>
                <div class="content">
                    <button class="btn btn-primary" id="addGuess">Add Guess</button>
                </div>
                <div class="form-floating m-3 content">
                    <form action="/wordle" method="post">
                        <input type="text" id="guess0" name="guess0" hidden />
                        <input type="text" id="guess1" name="guess1" hidden />
                        <input type="text" id="guess2" name="guess2" hidden />
                        <input type="text" id="guess3" name="guess3" hidden />
                        <input type="text" id="guess4" name="guess4" hidden />
                        <input type="text" id="guess5" name="guess5" hidden />
                        <input type="text" id="flattilecolors" name="flattilecolors" value="------------------------------" hidden />
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            echo $_POST['guess0'];
            echo $_POST['guess1'];
            echo $_POST['guess2'];
            echo $_POST['guess3'];
            echo $_POST['guess4'];
            echo $_POST['guess5'];
            echo $_POST['flattilecolors'];
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/assets/js/wordle.js"></script>
</body>

</html>