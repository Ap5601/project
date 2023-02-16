<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">

        <title>Tdiscuss - Tourism Fourms</title>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>

<body>
  <section class="header">
    <!-- connect paritals files..............  -->

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php'; ?>

    <!-- // connect paritals files ends here............ -->

    <!-- to add comments in database using form......... -->

    <?php
    $id = $_GET['threadid'];
    $showalert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $comment_desc = $_POST['comment'];
$comment_desc = str_replace("<", "&lt;", $comment_desc);
$comment_desc = str_replace(">", "&gt;", $comment_desc); 
        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `comments`(`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_desc','$id','$sno    ', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
        if ($showalert) {
            echo'
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Comment is been added! Thank You for your respond...
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }
    };
    ?>

    <!-- to fetch data from database...........   -->

    <?php
    $id = $_GET['threadid'];
  $sql = "SELECT * FROM `threads` where thread_id=$id";
  $result = mysqli_query($conn, $sql);
  $noresult = true;
    while($row = mysqli_fetch_assoc($result)){
  $noresult = false;  
  $title = $row['thread_title'];
    $desc = $row['thread_desc'];
    $user_id = $row['thread_user_id'];
    $sql2 = "SELECT name FROM `users` WHERE sno='$user_id';";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2); 

    //   jumbotron starts here................

   echo' <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">'. $title .'</h1>
            <p>'. $desc .'</p>
            <p class="text-right"><b>Posted by: '. $row2['name'] .' </b></p>
            <hr class="my-4">
            <p class="lead">No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images.Do not PM users asking for help. Remain respectful of other members at all times.</p>
        </div>
    </div>';
}
    ?>

    <!-- jumbotron ends here................. -->

    <div class="container">

        <?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    // <!-- form to add questions.......... -->

  echo'
    <!-- form to get comments.............. -->

    
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
        <h1 class="py-2">Post your Comment here....</h1>
        <form action="'. $_SERVER['REQUEST_URI'] .'" method="POST">
            <div class="form-group">
            <label for="exampleInputPassword1">Comment...</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <input type="hidden" name="sno" value="'. $_SESSION['sno'] .'">
            <div class="container mb-2">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>
    </div>';
}
    else{
        echo'<h1 class="py-2">Post your Comment here....</h1>
    <p class="lead"><strong>Not Logged in!</strong> Please login to Post a comment...</p>';
    }
    ?>

        <h1 class="py-2">Discussions</h1>

        <!-- // code to fect comments............. -->

        <?php
$id = $_GET['threadid'];
$sql = "SELECT * FROM `comments` where thread_id=$id";
$result = mysqli_query($conn, $sql);
$noresult = true;
while($row = mysqli_fetch_assoc($result)){
$noresult = false;
$id = $row['thread_id'];
$desc = $row['comment_content'];
$time = $row['comment_time'];
$thread_user_id = $row['comment_by'];

$sql2 = "SELECT name,sno FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $sno = $row2['sno'];

// <!-- display comments code starts here............... -->

echo'
<div class="container">
    <div class="media my-3">
        <img src="imgs\user.png" width="50px" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0"><a class="text-dark" href="profile.php?sno='. $sno .'"><b>'. $row2['name'] .'</b></a> &nbsp; &nbsp;<small><em>~'. $time .'</em></small></h5>
            '. $desc .'
        </div>
    </div>
</div>    
';

// <!-- display comments code ends here............... -->
}
if($noresult){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>No Comments yet!</strong> Be the first Preson to comment....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> 
    </div>';
}
?>

    </div>


    <!-- // this is to display footer............ -->

    <?php include 'partials/_footer.php'; ?>

    <!-- // footer ends here........... -->



    <!-- // connect paritals files ends here............ -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>