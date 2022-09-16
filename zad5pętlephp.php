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
       $a = 32;
       $b = 12;
       echo ("Największy wspólny dzielnik liczb $a i $b to: ");
       while ($a != $b) {
         if ($a < $b) {
           $pom = $a; $a = $b; $b = $pom;
         }
         $a = $a - $b;
       }
      echo ($a);
 ?>
    
</body>
</html>
