<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');

$data = array();

$query = "SELECT * FROM conges ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
    $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["title"],
        'doctor'   => $row["doctor"],
        'start'   => $row["start_event"],
        'end'   => $row["end_event"]
    );
}

echo json_encode($data);

?>