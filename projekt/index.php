<?php
session_start();

if((isset($_SESSION['zalogowany'])) &&($_SESSION['zalogowany']==true))
{
    header('Location: loc.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja internetowa </title>
</head>
<body>
    <h1>Witam w serwisie</h1>
<div class="form">
    <form action="zaloguj.php" method="POST">
        <input type="text" name="login" class="log_inp" placeholder="login"/>
        <input type="password" name="haslo" class="log_inp" placeholder="haslo"/>
        <input type="submit" value="zaloguj sie" class="log_inp" name="loguj"/>

    </form>
<?php
if(isset($_SESSION['blad']))
echo $_SESSION['blad'];
?>
   

    <p>Nie masz konta? <a href="rejestracja.php">Utwórz teraz</a></p>   
<button class="log_inp"><a href="Start.php">Powrot</a></button>     
</div>

</body>
</html>