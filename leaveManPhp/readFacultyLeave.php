<?php
include_once("db.php");

$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($mysqli, (int)$_GET['id']) : false;

$users = [];
$sql = "SELECT * FROM faculty_leave WHERE user_id=$id";

if($result = $mysqli->query($sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $users[$i]['id']    = $row['id'];
    $users[$i]['leave_days'] = $row['leave_days'];
    $users[$i]['date_from'] = $row['date_from'];
    $users[$i]['faculty_message'] = $row['faculty_message'];
    $users[$i]['hod_approval'] = $row['hod_approval'];
    $users[$i]['hod_message'] = $row['hod_message'];
    $i++;
  }

  echo json_encode($users);
}
else
{
  http_response_code(404);
}
