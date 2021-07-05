<?php
include_once("db.php");
// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata,true);
  if (trim($request['id']) == '') {
    return http_response_code(400);
  }

  $id = mysqli_real_escape_string($mysqli, (int)$request['id']);
  $name = mysqli_real_escape_string($mysqli, trim($request['username']));
  $email = mysqli_real_escape_string($mysqli, trim($request['email']));
  $status = mysqli_real_escape_string($mysqli, trim($request['status']));
  $sql = "UPDATE users SET username='$name',email='$email', status='$status' WHERE id = $id";
  
  if($mysqli->query($sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }
}

