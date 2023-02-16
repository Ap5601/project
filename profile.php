<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    

</head>
<body>

<!-- connect paritals files..............  -->

<?php include 'partials/_dbconnect.php';?>

<!-- connect paritals files ends here............ -->

<?php
$id = $_GET['sno'];
$sql = "SELECT * FROM `comments` where Comment_by=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $thread_user_id = $row['comment_by'];

    $sql3 = "SELECT COUNT(comment_id) FROM `comments` WHERE comment_by='$thread_user_id';";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    // $total = $row['COUNT(comment_id)'];
    
    $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
            $sno = $row2['sno'];
            $name = $row2['name'];
            $age = $row2['Age'];
            $htown = $row2['home_town'];
            $email = $row2['user_email'];
            $date = $row2['timestamp'];

   echo'
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                <button class="btn btn-secondary"> <img src="imgs\userp.png" height="100" width="100" /></button>
                    <span class="name mt-3">'. $name .'</span>
                    <span class="idd">'. $email .'</span>
                 <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                     <spanclass="number"> <span class="follow">Followers</span></span> 
                 </div>
                 <div class="text mt-3">
                      <span>'. $name .' is '. $age .'yr old from '. $htown .'. </span> 
                 </div> 
                 <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                      <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span>
                 </div> 
                 <div class=" px-2 rounded mt-4 date "> 
                     <span class="join">Joined On: '. $date .'</span> 
                </div>
            </div>
         </div>
    </div>';
                }
    ?>

</body>
</html>