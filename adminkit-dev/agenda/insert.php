<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');

if(isset($_POST["title"]))
{
    $query = "
 INSERT INTO conges 
 (title, doctor, start_event, end_event) 
 VALUES (:title,:doctor, :start_event, :end_event)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':doctor'  => $_POST['doctor'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end']
        )
    );
}


?>
