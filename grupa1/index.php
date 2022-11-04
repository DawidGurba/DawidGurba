<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis</title>
    <style>
        .body{
            font-family:arial;
            background-color:yellow;
        }
        .form{
            display:flex;
            justify-content:center;
            align-items:center;
flex-wrap:wrap;
flex-direction:column;
        }
       .form input{
display:flex;
margin:20px;
        }
       .form p{
            flex-basis: 100%;
            text-align:center;
        }
.form error{
color:crimson;
border:
padding:20px 20px;
}
    </style>
</head>
<body>
    <h2>Witaj, zaloguj się do serwisu</h2>
    <div>
        <form action="logowanie.php" method="POST">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="haslo" placeholder="hasło">
            <input type="button" value="">
            <?php 
            echo($_SESSION['error']);?>
            <div class="error">
unset($_SESSION['error']);
            </div>
        </form>
<?php endif; ?>
       
    <p>Nie masz konta? <a href="Rejestracja">Utwórz konto</a></p>
    </div>


</body>
</html>