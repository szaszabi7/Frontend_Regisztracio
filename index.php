<?php

$userHiba = false;
$userHibaUzenet = '';
$jelszoHiba = false;
$jelszoHibaUzenet = '';
$sikeresReg = false;
$sikeresRegisztracioUzenet = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username'])) {
        $userHiba = true;
        $userHibaUzenet = "Nem adtál meg nevet";
    } elseif (strlen($_POST['username']) < 3) {
        $userHiba = true;
        $userHibaUzenet = "A felhasználónévnek legalább 3 karakternek kell lennie";
    } elseif (strlen($_POST['username']) > 20) {
        $userHiba = true;
        $userHibaUzenet = "A felhasználónév nem lehet több 20 karakternél";
    } elseif (strtolower($_POST['username']) == 'admin') {
        $userHiba = true;
        $userHibaUzenet = "A név nem lehet " . $_POST['username'];
        $username = "";
    } else {
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    }


    if (empty($_POST['password'])) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = "Nem adtál meg jelszót";
        $password = '';
        $password2 = '';
    } elseif (strlen($_POST['password']) < 8) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = "A jelszónak legalább 8 karakternek kell lennie";
        $password = '';
        $password2 = '';
    } elseif (strlen($_POST['password']) > 26) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = "A jelszó nem lehet több 26 karakternél";
        $password = '';
        $password2 = '';
    } elseif ($_POST['password'] !== $_POST['password2']) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = "A két jelszó nem egyezik meg";
    }
    else {
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES);
    }

    if (!$userHiba && !$jelszoHiba) {
     $sikeresRegisztracioUzenet = 'Sikeres regisztráció!';
     $sikeresReg = true;
    }
    else $username = $password = $password2 = "";
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Regisztráció</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <?php if (!$sikeresReg) {?>
    <form method="POST">
        <div>
            <label>
                Usernév:<br>
                <input type='text' name='username' id="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>"><span id="userLength"></span>
            </label>
            <div class='errormessage'><?php echo $userHibaUzenet; ?></div>
        </div>
        <div>
            <label>
                Jelszó:<br>
                <input type='password' name='password' id="password1"><span id="pass1Length"></span>
            </label>
            <div class='errormessage'><?php echo $jelszoHibaUzenet; ?></div>
        </div>
        <div>
            <label>
                Jelszó még egyszer:<br>
                <input type='password' name='password2' id="password2"><span id=pass2Length></span>
            </label>
        </div>
        <div>
            <input type='submit' value='Regisztráció' id="gonb">
        </div>
    </form>
    <?php } else { sleep(2)?>
    <p><?php echo $sikeresRegisztracioUzenet; ?></p>
    <?php } ?>
</body>
</html>