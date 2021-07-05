<?php
include_once("db.php");

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
	//$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($mysqli, (int)$_GET['id']) : false;
  // if(!$id)
  // {
  //  return http_response_code(400);
  // }

   $id=$_GET['id'];
   $leaves = $_GET['leave_left'];
 //  $ldays = (int)$leaves
  //$request = json_decode($postdata,true);
  //$id = mysqli_real_escape_string($mysqli, $request['id']);
  //$ldays = mysqli_real_escape_string($mysqli, $request['leave_left']);
  $sql = "UPDATE users SET leave_left=GREATEST(leave_left-$leaves,0) WHERE id = $id ";
  $mysqli->query($sql);


 //  UPDATE your_table
 //   SET score = GREATEST(score + ?, 0) -- This '?' is the adjustment to the score
 // WHERE user_id = ?
 //  if($mysqli->query($sql))
 //  {
 //    http_response_code(204);
 //  }
 //  else
 //  {
 //    return http_response_code(422);
 //  }
}