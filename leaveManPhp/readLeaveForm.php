<?php
include_once("db.php");


//$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($mysqli, (int)$_GET['id']) : false;
//$userId = ($_GET['userId'] !== null && (int)$_GET['userId'] > 0)? mysqli_real_escape_string($mysqli, (int)$_GET['userId']) : false;

$id = $_GET['id'];
$userId = $_GET['userId'];

if(!$id || !$userId)
{
  return http_response_code(400);
}

// $users = [];
// $userCheck = [];

$sql1 = "SELECT * FROM `users` WHERE `id` = $userId";

if($result1 = $mysqli->query($sql1)){

  while($row1 = mysqli_fetch_assoc($result1)){
    
    //$userCheck[0]['status'] = $row1['status'];
 
    if($row1['status'] == 'faculty'){
      $sql = "SELECT * FROM users INNER JOIN faculty_leave ON faculty_leave.user_id = users.id WHERE faculty_leave.user_id = $userId and faculty_leave.id = $id";


      if($result = $mysqli->query($sql)){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$i]['id']    = $row['id'];
            $users[$i]['username'] = $row['username'];
            $users[$i]['email'] = $row['email'];
            $users[$i]['status'] = $row['status'];
            $users[$i]['leave_days'] = $row['leave_days'];
            $users[$i]['date_from'] = $row['date_from'];


            $users[$i]['faculty_message'] = $row['faculty_message'];
            $users[$i]['hod_message'] = $row['hod_message'];    
            $i++;
        }

        echo json_encode($users);
      }else{
          http_response_code(404);
      }
    }

    if($row1['status'] == 'student'){
      $sql = "SELECT * FROM users INNER JOIN student_leave ON student_leave.user_id = users.id WHERE student_leave.user_id = $userId and student_leave.id = $id";


      if($result = $mysqli->query($sql)){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$i]['id']    = $row['id'];
            $users[$i]['username'] = $row['username'];
            $users[$i]['email'] = $row['email'];
            $users[$i]['status'] = $row['status'];
            $users[$i]['leave_days'] = $row['leave_days'];
            $users[$i]['date_from'] = $row['date_from'];
            $users[$i]['student_message'] = $row['student_message'];
            $users[$i]['hod_message'] = $row['hod_message'];    
            $i++;
        }

        echo json_encode($users);
      }else{
          http_response_code(404);
      }
    }
  }
}

//     else{
//         $sql = "SELECT * FROM `users` INNER JOIN `student_leave` ON `student_leave`.`user_id` = `users`.`id` WHERE `student_leave`.`user_id` = $userId AND `student_leave`.id = $id";
		

//         if($result = $mysqli->query($sql))


//         {
//           $i = 0;
//           while($row = mysqli_fetch_assoc($result))
//           {
            // $users[$i]['id']    = $row['id'];
            // $users[$i]['username'] = $row['username'];
            // $users[$i]['email'] = $row['email'];
            // $users[$i]['status'] = $row['status'];
            // $users[$i]['leave_days'] = $row['leave_days'];
            // $users[$i]['date_from'] = $row['date_from'];
            // $users[$i]['student_message'] = $row['student_message'];
            // $users[$i]['hod_message'] = $row['hod_message'];    
            // $i++;
//           }

//           echo json_encode($users);
//         }
//         else
//         {

//           http_response_code(404);
//         }
//       }

//     }

//   }
// }



