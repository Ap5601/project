<style>
  .dropdown-menu {
    max-height: 70vh; 
   overflow:scroll;
   overflow-x: hidden; 
  }

   .navbar {
    padding: 0.2rem 0.2rem;
}

</style>


<?php include 'partials/_dbconnect.php';?>

<?php
 session_start();
 
 //  this is to display navbar

echo'
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
  <img class="mx-0" src="imgs\india.png" width="50" height="30" class="d-inline-block align-top" alt="" loading="lazy">
  TDiscuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        State\'s & UT\'s
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT category_name, category_id FROM `categories`";
        $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    echo' <a class="dropdown-item" href="threadlist.php?catid='. $row['category_id'] .'">'. $row['category_name'] .'</a>';
          
    echo'
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" tabindex="-1">ContactUs</a>
      </li>
    </ul>';


    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo'<form class="form-inline my-2 my-lg-0 " method="get" action="search.php">
        <input class="form-control mr-sm-2" name="search"  type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <p class="text-light my-0 mx-2"><i>Wellcome!</i><br><b>'. $_SESSION['user_email'] .'</b></p>
        <a href="partials/_logout.php" class="btn btn-primary mx-2">LogOut</a>
        </form>';
    }

else{
  echo'<form class="form-inline my-2 my-lg-0 " method="get" action="search.php">
  <input class="form-control mr-sm-2" name="search"  type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
<div class="mx-2">
<button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#loginModal">Login</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signupmodal">SignUP</button>
</div>
</form>';
    }
echo'
  </div>
</nav>';

 // navbar ends here

//  include partial files........

 include 'partials/_loginModal.php';
 include 'partials/_signupModal.php';
  
//  including partial files ends here.........

     if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can Login now...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
     }
    

 ?>