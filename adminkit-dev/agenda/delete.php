<?php

//delete.php

if(isset($_POST["id"]))
{
    $connect = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
    $query = "
 DELETE from conges WHERE id=:id
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id']
        )
    );
}

?>
