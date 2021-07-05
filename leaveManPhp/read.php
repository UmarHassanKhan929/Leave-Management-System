<?php
include_once("db.php");

$users = [];
$sql = "SELECT id, username, email, status FROM users";

if($result = $mysqli->query($sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $users[$i]['id']    = $row['id'];
    $users[$i]['username'] = $row['username'];
    $users[$i]['email'] = $row['email'];
    $users[$i]['status'] = $row['status'];
    $i++;
  }

  echo json_encode($users);
}
else
{
  http_response_code(404);
}