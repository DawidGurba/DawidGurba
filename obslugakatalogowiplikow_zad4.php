<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "" method="POST">
<textarea name="opinia"></textarea>
<input type="submit" value="Zapisz opinie">
</form>

    <?php
    //zapis w pliku
if(isset($_POST['opinia'])){
    $opinia = $_POST['opinia'].PHP_EOL;
    $plikOpinie = './katalog/opinie.txt';
    file_put_contents('opinie.txt', $opinia., FILE_APPEND | LOCK_EX);

    $tab = explode(PHP_EOL, file_get_contents($plikOpinie));
    foreach($tab as $t ){
        echo "<p> $t </p>"
    }
}
    ?>

    
</body>
</html>