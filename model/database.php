<?php
    //HEROKU DATABASE CONNECTION
    
    $username = 'owzs8em1up7zunda';
    $password = 'p6hsseoock6gyigv';


    try {
        $db = new PDO('mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=j4ja3drkko4xna1i', $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
    

    //LOCAL CONNECTION TESTING DATABASE SETUP
    /*
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    
    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./view/error.php');
        exit();
    }
    */
?>