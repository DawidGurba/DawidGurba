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
    <style>
        body{
            background-image: url("images/lotnisko.jpg");
            background-repeat:no-repeat;
            background-size: cover;
  background-position:center; 
  background-attachment:fixed; 
  height:100%; 
  width:100%; 
            color: white;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

            .form{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

        .form input{
            display: block;
            margin: 20px;
        }

                .form p,
                .form .error{
                    flex-basis: 30%;
                    text-align: center;
                }
        .form a{
            text-decoration: none;
            color: blue;
        }

            .form .error{
                color: black;
                border: 1px solid black;
                padding: 10px;
        }

        .logu_inp{
        height: 90px;
        border: 3px solid white;
        border-radius: 25px;
        background-color: transparent;
        cursor: pointer;
        font-size: 1.6rem;
        font-weight: 300;
        padding: 0 30px;
        margin-top: 10px;
        transition: 0.5s;
        width: 350px;
        color: white;
        }

        .logu_inp a{
            text-decoration: none;
            color: white;
        }

        .logu_inp:hover{
        background-color: black;
        color: white;
        }

                .log_inp{
                height: 50px;
                border: 3px solid white;
                font-size: 1.6rem;
                font-weight: 300;
                padding: 0 30px;
                margin-bottom: 5px;
                transition: 0.5s;
                width: 350px;
                }

        .log_inp:hover{
            background-color: white;
        color: white;
        }

        h1{
            font-family: 'Saira Condensed', sans-serif;
            font-size: 60px;
            text-transform: uppercase;
            color: white;
            margin-top: 60px;
            text-align: center;
        }


        p{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Saira Condensed', sans-serif;
            font-size: 50px;
            color: white;
            text-transform: uppercase;
            margin-left: 30px;
            margin-right: 30px;
            width: 100%;
            height: 100%;
        }

        p a{
            font-size: 30px;
            margin-top: 50px;
            border: 3px solid white;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 100px;
            background-color: transparent;
            color: white;
        }

        a{
            color: white;
        }

        p a:hover{
            transition: 0.5s;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 100px;
            background-color: black;
            color: white;
        }

      
    </style>
</head>
<body>
    <h1>Witam w serwisie</h1>
<div class="form">
    <form action="zaloguj.php" method="POST">
        <input type="text" name="login" class="log_inp" placeholder="login"/>
        <input type="password" name="haslo" class="log_inp" placeholder="haslo"/>
        <input type="submit" value="zaloguj sie" class="logu_inp" name="loguj"/>
        

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