<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="style.css">

    <title>Tdiscuss - Tourism Fourms</title>
    
    
  </head>
  <body>

  <section class="header">

<!-- connect paritals files..............  -->

<?php include 'partials/_dbconnect.php';?>
<?php include 'partials/_header.php'; ?>

<!-- connect paritals files ends here............ -->


    <!-- // to display sliding images -->
    <?php

echo'
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
  <div class="carousel-item active">
    <img src="imgs/travelsld1.jpg" class="d-block w-100" alt="..." height="510">
    <div class="carousel-caption d-none d-md-block">
      <h1 style="color:black">...Tourism...</h1>
      <h5 style="color:rgb(0, 0, 0); font-weight: bold  ">Looking for something useful to read about travelling in India? You’ve come to the right place. Join the league to find here detailed insights, interesting travel tips and ideas.</h5>
    </div>
  </div>
  <div class="carousel-item">
    <img src="imgs/tourismsld2.jpg" class="d-block w-100" alt="..." height="510">
    <div class="carousel-caption d-none d-md-block">
    <h1 style="color:rgb(251, 255, 0)">...Tourism...</h1>
    <h5 style="color:rgb(251, 255, 0)"; "font-weight: bold">One of the oldest civilisations in the world, India is a mosaic of multicultural experiences. With a rich heritage and myriad attractions, the country is among the most popular tourist destinations in the world.</h5>
    </div>
  </div>
  <div class="carousel-item">
    <img src="imgs/foodsld3.jpg" class="d-block w-100" alt="..." height="510">
    <div class="carousel-caption d-none d-md-block">
      <h1 style="color:white">...Food...</h1>
      <h5 style= font-weight: bold >Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. </h5>
    </div>
  </div>
  <div class="carousel-item">
    <img src="imgs/marketsld4.jpg" class="d-block w-100" alt="..." height="510">
    <div class="carousel-caption d-none d-md-block">
      <h1 style="color:white">...Market...</h1>
      <h5 style="font-weight: bold">There are hundreds of markets you can visit across India such as Johari Bazaar and Kannauj Market. Each market specializes in selling certain types of products. Some markets offer a mixed range of products including clothes, food, jewelry, and antiques. Here are some of the best markets worthy of a visit to India.</h5>
    </div>
  </div>
 </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
';
 //  <-- // sliding imgs ends here -->
 ?>

    <!-- // main body starts here................. -->

    <div class="container my-1">
        <center>
            <h1 style="font-family: 'Oleo Script Swash Caps', cursive;">Wellcome to Tdiscuss - Tourism Fourms</h1>
        </center>
    </div>
    <hr>
    <div class="container">
        <center>
            <h3>~~~~~~~~~~~~~~~~ States and Union Territories ~~~~~~~~~~~~~~~~~ </h3>
        </center>

        <div class="row my-4">
            <!-- // main body ends here.............. -->


            <!-- fetch all the categories....... -->
            <?php
  $sql = "SELECT * FROM `categories`";
  $result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  // echo $row['category_id'];
  // echo $row['category_name'];
  // <!-- // this is to display cards using for loop............... -->
  $cat2 = $row['category_img'];
  $cat = $row['category_description'];
  $cat3 = $row['category_name'];
  $id = $row['category_id'];
  echo'
  
  
<div class="col-md-3">
  <div class="card my-2" style="width: 17rem;">
    <img src="'. $cat2 .' " class="card-img-top" alt="...">
    <div class="card-body">
    <hr>
    <h5 class="card-title text-center"><b>'. $cat3 .'</b></h5>
      <p class="card-text">'. $cat .'</p>
      <a href="threadlist.php?catid='. $id .'" class="btn btn-success">View Threads</a>
    </div>
  </div>
</div>

';
  
  
  // <!-- // cards ends here..................... -->

}
?>
        </div>
    </div>


    <!-- // this is to display footer............ -->

    <?php include 'partials/_footer.php'; ?>

    <!-- // footer ends here........... -->
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>