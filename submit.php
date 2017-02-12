<?php

session_start();
$servername = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=project2", $dbusername, $dbpassword);
    if($_POST["action"] == "Delete"){
		$statement = $conn->prepare("Delete From p2todo where p2todoitem = ? and p2user = ?");
                $statement->execute(array($_POST["item"], $_SESSION["username"])); 
		header("Location: todolist.php");
	} else if($_POST["action"] == "Add"){
                $statement = $conn->prepare("INSERT INTO p2todo(p2todoitem, p2user)VALUES(?, ?)");
                $statement->execute(array($_POST["item"], $_SESSION["username"]));
		header("Location: todolist.php");            
	}
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    //end try catch block

/*

    $html = new DOMDocument('1.0', 'iso-8859-1');
    $html->formatOutput = true;

    $ul = $html->createElement('ul');
    $li = $html->createElement('li');
    $label = $html->createElement('label', $_POST["item"]);

    $form = $html->createElement('form');
    $form->setAttribute('action', 'submit.php');
    $form->setAttribute('method', 'post');

    $name = $html->createElement('input');
    $name->setAttribute('type', 'hidden');
    $name->setAttribute('name', 'action');
    $name->setAttribute('value', 'delete');

    $name2 = $html->createElement('input');
    $name2->setAttribute('type', 'hidden');
    $name2->setAttribute('name', 'index');
    $name2->setAttribute('value', '0');

    $submit = $html->createElement('input');
    $submit->setAttribute('type', 'submit');
    $submit->setAttribute('value', 'delete');

    $form->appendChild($label);
    $form->appendChild($name);
    $form->appendChild($name2);
    $form->appendChild($submit);

    $li->appendChild($form);

    $ul->appendChild($li);
    //$ul->appendChild($_POST["item"]);
    $html->appendChild($ul);


    echo html_entity_decode($html->saveHTML());
 */