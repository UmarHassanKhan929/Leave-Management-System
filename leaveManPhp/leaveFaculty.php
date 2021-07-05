<?php
include_once("db.php");
// Get the posted data.
$postdata = file_get_contents("php://input");

//echo $postdata;
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  //echo $request;
  // Validate.
  if(trim($request->date_from) === '' || trim($request->faculty_message) === '' )
  {
    return http_response_code(400);
  }

  // Sanitize.
  $user_id = mysqli_real_escape_string($mysqli, trim($request->user_id));
  $date_from= mysqli_real_escape_string($mysqli, trim($request->date_from));
  $leave_days = mysqli_real_escape_string($mysqli, trim($request->leave_days));
  $faculty_message = mysqli_real_escape_string($mysqli, trim($request->faculty_message));



  // Create.
  $sql = "INSERT INTO faculty_leave (user_id,date_from,leave_days,faculty_message,hod_approval) VALUES ($user_id,'$date_from',$leave_days,'$faculty_message','pending')";

  if($result = $mysqli->query($sql))
  {
    http_response_code(201);
    $course = [
      'user_id' => $user_id,
      'date_from' => $date_from,
      'leave_days'    => $leave_days,
      'faculty_message'    => $faculty_message
    ];
    echo json_encode($course);
  }
  else
  {
    http_response_code(422);
  }
}

?>
