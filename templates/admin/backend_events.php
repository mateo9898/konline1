<?php
//require_once '_db.php';
    
$stmt = $db->prepare('SELECT * FROM consultation WHERE NOT ((end <= :start) OR (start >= :end))');

$stmt->bindParam(':start', $_GET['start']);
$stmt->bindParam(':end', $_GET['end']);

$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id_consultation'];
  $e->text = $row['name'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $events[] = $e;
}

echo json_encode($events);

?>