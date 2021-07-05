<?php
include_once("db.php");
// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
	$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($mysqli, (int)$_GET['id']) : false;
if(!$id)
{
  return http_response_code(400);
}

  $strr = "rejected";
  $msg = $_GET['msg'];
  //$id = mysqli_real_escape_string($mysqli, (int)$request['id']);
  $sql = "UPDATE student_leave SET hod_approval='$strr', hod_message='$msg' WHERE id = $id";
  if($mysqli->query($sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }
}