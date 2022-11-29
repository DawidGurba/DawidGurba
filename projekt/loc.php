<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo "<p>Witaj <br>".$_SESSION['user'].'! [<a href="wyloguj.php">Wyloguj sie</a>]</p>';
echo"<p>E-mail: ".$_SESSION['email'];

    ?>
    
</body>
</html>