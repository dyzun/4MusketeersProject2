<?php


    $username = $_POST["name"];
    $password = $_POST["password"];

    $servername = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "Jaljap2732!";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=gis2", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        // check username and password validation
        if (preg_match('/^[a-z][a-z0-9]{2,7}/', $username) 
		&& preg_match('/^[0-9][a-z0-9]{4,10}[^a-z0-9]$/', $password)) {
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
            else {
                $newSql = "INSERT INTO p2users (name, pw) VALUES ('$username', '$password')";
                $userAccount = $conn->query($newSql);
                header("Location: todolist.php"); // login unsuccessful so redirect to login page
                die();
            }
        } // if
        else {
            echo "Username and/or password invalid.";
            throw new PDOException();
        }
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
