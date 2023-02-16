<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

         $sql = "INSERT INTO `contactus`(`Fname`, `Lname`, `email`, `phone no.`, `message`, `datetime`) VALUES ('$fname','$lname','$email','$phone','$message', current_timestamp())";
         $result = mysqli_query($conn, $sql);
         
         if($result){
             header("Location: /forum/contact.php?messagesent=true");
             exit();
         }
        }   
?>