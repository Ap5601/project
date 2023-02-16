    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <link rel="stylesheet" href="style3.css">
        <title>Tdiscuss - Tourism Fourms</title>
        <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
      </head>
      <body>
        <section class="header">
      <?php include 'partials/_dbconnect.php';?>
      <?php include 'partials/_header.php';?>
      
      <div class="container my-3" id="maincontainer">
      <div class="container">
      <div class="row">
        <div class="card d-flex justify-content-center mx-auto my-3 p-5">
          <h2>Contact Us</h2>
              <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6 first">
                  <label for="inputFirstName">FIRST NAME <span>*</span></label>
                  <input type="text" class="form-control" id="inputFirstName" name="firstname" required>
                  <div id="fname_error" class="val_error"></div>
                </div>
                <div class="form-group col-md-6 first">
                    <label for="inputLastName">LAST NAME <span>*</span></label>
                    <input type="text" class="form-control" id="inputLastName" name="lastname">
                    <div id="lname_error" class="val_error"></div>
                </div>	
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail">EMAIL <span>*</span></label>
                  <input type="email" class="form-control" id="inputEmail" name="email">
                  <div id="email_error" class="val_error"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPhone">PHONE <span>*</span></label>
                    <input type="text" class="form-control" id="inputPhone" name="phone">
                    <div id="phone_error" class="val_error"></div>
                </div>	
              </div>
              <div class="form-group mt-0">
                <label for="exampleFormControlTextarea1">MESSAGE <span>*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea><div id="message_error" class="val_error"></div>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Can send reply on phone no.</label>
            </div>
            <div class="form-button pt-4">
              <button type="submit" class=" btn-primary btn-block btn-lg" value="Register" name="register"><span>SEND MESSAGE</span></button>
            </div>
            </form>
        </div>
      </div>
    </div>
      </div>

      <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

            $sql = "INSERT INTO `contactus`(`Fname`, `Lname`, `email`, `phone no.`, `message`, `datetime`) VALUES ('$fname','$lname','$email','$phone','$message', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            }   
    ?>

      <?php include 'partials/_footer.php';?> 
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      </body>
    </html>