<?php
    //HEROKU DATABASE CONNECTION
    $dsn = 'mysql://qkdogx3kgq1cdzoz:z1b3pghf5lo5cao9@td5l74lo6615qq42.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/j9xaajjl1ma7nqmg';
    $username = 'qkdogx3kgq1cdzoz';
    $password = 'z1b3pghf5lo5cao9';


    try {
        $db = new PDO($dsn, $username, $password);
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