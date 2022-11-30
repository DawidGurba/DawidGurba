<?php
session_start();

if(isset($_POST['email'])){
    //założenie udanej walidacji
    $wszystko_ok=true;
    //Sprawdzenie poprawności nicku użytkownik
    $nick = $_POST['nick'];

    //sprawdzenie długości nicku użytkownika
    if((strlen($nick)<3) || (strlen($nick)>20)){
        $wszystko_ok=false;
        $_SESSION['e_nick']="Nazwa użytkownika musi posiadać od 3 do 20 znaków";
    }

    if(ctype_alnum($nick)==false){
        $wszystko_ok=false;
        $_SESSION['e_nick']="Nazwa użytkownika może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    //Sprawdzanie poprawności adres e-mail
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
        $wszystko_ok=false;
        $_SESSION['e_email']="Podaj poprawny adres E-mail";
    }

    //Sprawdzanie poprawności hasło
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if((strlen($haslo1)<8) ||  (strlen($haslo1)>20)){
        $wszystko_ok=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
    }

    if($haslo1!=$haslo2){
        $wszystko_ok=false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    
    //czy zaakceptowano regulamin?
    if(!isset($_POST['regulamin']))
    {
        $wszystko_ok=false;
        $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu";
    }

    require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

    try 
    {
        $polaczenie = new mysqli($host, $user, $password, $database);
        if($polaczenie->connect_errno!=0)
{
    throw new Exception(mysqli_connect_errno());
}
else{

    //czy email już istnieje?
    $rezultat = $polaczenie->query("Select id FROM uzytk WHERE email='$email'");
    if(!$rezultat) throw new Exception($polaczenie->error);

    $ile_takich_maili = $rezultat->num_rows;
    if($ile_takich_maili>0){
        $wszystko_ok=false;
        $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu email";
    }
    $rezultat = $polaczenie->query("Select id FROM uzytk WHERE user='$nick'");
    if(!$rezultat) throw new Exception($polaczenie->error);

    $ile_takich_nickow = $rezultat->num_rows;
    if($ile_takich_nickow>0){
        $wszystko_ok=false;
        $_SESSION['e_nick']="Istnieje już konto z taką nazwą użytkownika";
    }

    if($wszystko_ok==true){
        //wszystko zatwierdzone, dodanie użytkownika do bazy
       if($polaczenie->query("INSERT INTO uzytk VALUES (NULL, '$nick', '$haslo_hash', '$email')")){
$_SESSION['udanarejestracja']=true;
header('Location: witamy.php');
       }else{
        throw new Exception($polaczenie->error);
       }
    }

    $polaczenie->close();
}
    }
    catch(Exception $e)
    {
        echo 'Błąd serwera. Proszę o rejestrację w innym terminie';
        echo '<br>Informacja deweloperska:'.$e;
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Załóż darmowe konto</title>

    <style>
.error{
    color:red;
    margin-top:10px;
    margin-bottom:10px;
}
        </style>
   
</head>
<body>

<h2>Wpisz dane do rejestracji.</h2>
    <form method="POST" action="rejestracja.php" >
    Nazwa użytkownika: <br> <input type="text" name="nick" class="log_inp" placeholder="nick"/></br>
    <?php
if(isset($_SESSION['e_nick'])){
    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
    unset($_SESSION['e_nick']);
}
    ?>
    E-mail: <br><input type="text" name="email" class="log_inp" placeholder="E-mail"/></br>
    <?php
if(isset($_SESSION['e_email'])){
    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
    unset($_SESSION['e_email']);
}
    ?>
    Twoje hasło: <br><input type="password" name="haslo1" class="log_inp" placeholder="Twoje hasło"/></br>
    <?php
if(isset($_SESSION['e_haslo'])){
    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
    unset($_SESSION['e_haslo']);
}
    ?>
    Powtórz hasło: <br><input type="password" name="haslo2" class="log_inp" placeholder="Powtórz hasło"/></br>

    <label>
    <br><input type="checkbox" name="regulamin" class="log_inp" />Akceptuję regulamin</br>
</label>
<?php
if(isset($_SESSION['e_regulamin'])){
    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
    unset($_SESSION['e_regulamin']);
}
    ?>
<br>
<input type="submit" value="Zarerejestruj sie"/>
</br>
    </form>
    
</body>
</html>