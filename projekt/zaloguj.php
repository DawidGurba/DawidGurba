<?php
session_start();

if(!isset($_POST['login']) || (!isset($_POST['haslo']))){
    header('Location: index.php');
    exit();
}
?>


<?php



require_once('connect.php');
$polaczenie = @new mysqli($host, $user, $password, $database);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");


    $sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
    if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
    mysqli_real_escape_string($polaczenie,$login),
    mysqli_real_escape_string($polaczenie,$haslo))))
    {
$ile_user = $rezultat->num_rows;
if($ile_user>0)
{
    $_SESSION['zalogowany'] = true;

$wiersz = $rezultat->fetch_assoc();
$_SESSION['id'] = $wiersz['id'];
$_SESSION['user'] = $wiersz['user'];
$_SESSION['email'] = $wiersz['email'];

unset($_SESSION['blad']);
$rezultat->close();
header('Location: loc.php');
}
else
{
$_SESSION['blad'] = '<span style="color:red">Błędny login lub hasło</span>';
header('Location: index.php');
}
    }

    $polaczenie->close();
}

echo $login."<br/>";
echo $haslo;
?>