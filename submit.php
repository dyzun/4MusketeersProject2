<?php

session_start();

if(isset($_POST["item"])) {
    //header('Location:todolist.php');
//    echo "<h1>";
//    echo $_POST["item"];
//    echo "</h1>";

    //header('Location:todolist.php');



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
}