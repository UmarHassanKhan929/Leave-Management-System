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
  if(trim($request->username) === '' || trim($request->email) === '' || trim($request->password) === '' )
  {
    return http_response_code(400);
  }

  // Sanitize.
  $username = mysqli_real_escape_string($mysqli, trim($request->username));
  $email= mysqli_real_escape_string($mysqli, trim($request->email));
  $password = mysqli_real_escape_string($mysqli, trim($request->password));
  $status = mysqli_real_escape_string($mysqli, trim($request->status));
  
  $quotaforzeidk = 0;
  
  $sqlQ1 = "SELECT leave_quota from users where status = '$status' limit 1";
  if($result = $mysqli->query($sqlQ1)){
    while($row = mysqli_fetch_assoc($result)){
      $quotaforzeidk = $row['leave_quota'];
    }
    
  }

  // Create.
  $sql = "INSERT INTO users (username,email,password,status,leave_quota,leave_left) VALUES ('$username','$email','$password','$status',$quotaforzeidk,$quotaforzeidk)";

  if($result = $mysqli->query($sql))
  {
    http_response_code(201);
    $course = [
      'username' => $username,
      'email' => $email,
      'status'    => $status
    ];
    echo json_encode($course);
  }
  else
  {
    http_response_code(422);
  }


}

?>