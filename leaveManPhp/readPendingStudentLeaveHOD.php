<?php
include_once("db.php");

$users = [];
$sql = "SELECT * FROM student_leave where faculty_approval='approved' and hod_approval='pending'";

if($result = $mysqli->query($sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $users[$i]['id']    = $row['id'];
    $users[$i]['user_id']    = $row['user_id'];
    $users[$i]['leave_days'] = $row['leave_days'];
    $users[$i]['date_from'] = $row['date_from'];
    $users[$i]['hod_approval'] = $row['hod_approval'];
    $users[$i]['faculty_approval'] = $row['faculty_approval'];
    $users[$i]['student_message'] = $row['student_message'];
    $users[$i]['hod_message'] = $row['hod_message'];
    $i++;
  }

  echo json_encode($users);
}
else
{
  http_response_code(404);
}
