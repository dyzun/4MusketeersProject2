<?php
    
    $username = $_POST["name"];
    $password = $_POST["password"];

    $servername = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "password";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=gis", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM p2users WHERE name = '$username' and pw = '$password'";
        $userAccount = $conn->query($sql);
        if($userAccount->rowCount() > 0){
        session_start();
        $_SESSION["username"] = $username;
        //echo "login successful";
        header("Location: todolist.php"); /* Redirect browser */
        die();
        }
        else{
            //echo "login unsuccessful";
            header("Location: index.html");
            die();
        }
            }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        echo "<br> test";
        }
    ?>
