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
    
    if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' ",
    mysqli_real_escape_string($polaczenie,$login))))
    {
$ile_user = $rezultat->num_rows;
if($ile_user>0)
{
            $wiersz = $rezultat->fetch_assoc();

            if(password_verify($haslo, $wiersz['pass'])){

            

            $_SESSION['zalogowany'] = true;


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
        exit();
        }

}
else
{
$_SESSION['blad'] = '<span style="color:red">Błędny login lub hasło</span>';
header('Location: index.php');
exit();
}
    }

    $polaczenie->close();
}

echo $login."<br/>";
echo $haslo;
?>