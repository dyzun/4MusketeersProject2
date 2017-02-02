<?php
session_start();
if(isset($_SESSION["username"])){
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <title>Remember the Cow</title>
            <link href='cow.css' type='text/css' rel='stylesheet' />
            <link href='favicon.ico' type='image/ico' rel='shortcut icon' />
        </head>

        <body>
            <div class='headfoot'>
                <h1>
                    <img src='logo.gif' alt='logo' />
                    Remember<br />the Cow
                </h1>
            </div>

            <div id='main'>
                <h2>" . $_SESSION["username"] . "'s To-Do List</h2>

                <ul id='todolist'>
                    <li>
                        <form action='submit.php' method='post'>
                            <input type='hidden' name='action' value='delete' />
                            <input type='hidden' name='index' value='0' />
                            <input type='submit' value='Delete' />
                        </form>
                        eat
                    </li>
                    <li>
                        <form action='submit.php' method='post'>
                            <input type='hidden' name='action' value='delete' />
                            <input type='hidden' name='index' value='1' />
                            <input type='submit' value='Delete' />
                        </form>
                        sleep
                    </li>
                    <li>
                        <form action='submit.php' method='post'>
                            <input type='hidden' name='action' value='add' />
                            <input name='item' type='text' size='25' autofocus='autofocus' />
                            <input type='submit' value='Add' />
                        </form>
                    </li>
                </ul>

                <div>
                    <a href='logout.php'><strong>Log Out</strong></a>
                    <em>(logged in since ";
                    if (isset($_COOKIE['time'])){
                        echo $_COOKIE['time'];
                    } 
                     echo ")</em>
                </div>

            </div>

            <div class='headfoot'>
                <p>
                    &quot;Remember The Cow is nice, but it's a total copy of another site.&quot; - PCWorld<br />
                    All pages and content &copy; Copyright CowPie Inc.
                </p>


            </div>
        </body>
    </html>";
}

else{
    echo "Please log in.";
}

?>
