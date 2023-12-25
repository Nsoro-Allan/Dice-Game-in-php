<?php
$score1 = isset($_POST['score1']) ? $_POST['score1'] : 0;
$score2 = isset($_POST['score2']) ? $_POST['score2'] : 0;

$btn1="enabled";
$btn2="enabled";

if (isset($_POST['player1'])) {
    $rand1 = rand(1, 6);
    echo
    '
    <div class="img-container">
    <img src="./Dice Images/'.$rand1.'.png">
    </div>
    ';
    $score1 += $rand1;

    if ($score1 >= 20) {
        echo
        '
        <div class="answer">
        <p>Player1 is the winner.</p>
        <button onclick="location.reload()">Play Again...</button>
        </div>
        ';
        $score1=0;
        $score2=0;
    }
    $btn1="disabled";
    $btn2="enabled";
}

if (isset($_POST['player2'])) {
    $rand2 = rand(1, 6);
    echo
    '
    <div class="img-container">
    <img src="./Dice Images/'.$rand2.'.png">
    </div>
    ';
    $score2 += $rand2;

    if ($score2 >= 20) {
        echo
        '
        <div class="answer">
        <p>Player2 is the winner.</p>
        <button onclick="location.reload()">Play Again...</button>
        </div>
        ';
        $score1=0;
        $score2=0;
    }
    $btn1="enabled";
    $btn2="disabled";
}

if ($score1 >=20 || $score2 >=20){
    $btn1="disabled";
    $btn2="disabled";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./Dice Images/icon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="title">
                <img src="./Dice Images/icon.png" alt="">
                <h1>Roll Dice</h1>
            </div>
            <div class="line"></div>

            <div class="player-container">
                <div class="player">
                    <label>Score:</label>
                    <input type="number" name="score1" value="<?= $score1 ?>" readonly>
                    <label>Player 1</label>
                    <button type="submit" name="player1" <?= $btn1;?>>Roll</button>
                </div>

                <div class="player">
                    <label>Score:</label>
                    <input type="number" name="score2" value="<?= $score2 ?>" readonly>
                    <label>Player 2</label>
                    <button type="submit" name="player2" <?= $btn2; ?>>Roll</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
