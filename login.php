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

            /*
            Determines the current time
            */
            date_default_timezone_set('America/New_York');
            $timeStamp = new DateTime();
            $timeOfLogin = date("D d M Y, g:i:s a", $timeStamp->getTimeStamp());

            setcookie('time', $timeOfLogin);
            header("Location: todolist.php"); // login successful so redirect to the TO-DO LIST
            die();
        }
        else{
            header("Location: index.php"); // login unsuccessful so redirect to login page
            die();
        }
        
            }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
    ?>
