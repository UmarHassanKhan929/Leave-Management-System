<?php
include_once("db.php");
// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata,true);
  if (trim($request['quota']) == '') {
    return http_response_code(400);
  }

  $quota = mysqli_real_escape_string($mysqli, (int)$request['quota']);
  $status = mysqli_real_escape_string($mysqli, trim($request['status']));
  $sql = "UPDATE users SET leave_quota=$quota, leave_left=$quota WHERE status = '$status'";

  if($mysqli->query($sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }
}
