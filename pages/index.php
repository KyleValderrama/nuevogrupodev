<?php
session_start();
include_once('sqlconnect.php');

if(!isset($_SESSION['logintoken']))
{
    header("Location: logout.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/bgimg.css" rel="stylesheet">
    <script defer src="../js/all.js"></script>
    <title>Home</title>
  </head>
  <body>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle">Acceptance of Terms</h5>
        </div>
        <div class="modal-body">
            Welcome to Neuvo Grupo!<br>
            <br>
            This is a legal agreement between you (either an individual or an entity) the end-user, and the company.<br>
            <br>
            Subject to your compliance with these terms and condition.<br>
        </div>
        <div class="modal-footer">
        <div class="container-fluid">
            <div class="custom-control custom-checkbox d-flex justify-content-center mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                <label class="custom-control-label" for="customCheck">Do you agree to the Nuevo Grupo license agreement above?</label>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" onclick= "agree()" id = "agree" class="btn btn-primary" data-dismiss="modal" disabled>I Agree</button>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Nuevo Grupo Dev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Field
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="fields/basketball.php">Basketball Court</a>
                <a class="dropdown-item" href="fields/swimmingpool.php">Swimming Pool</a>                
                <a class="dropdown-item" href="fields/tennis.php">Tennis Court</a>
                <a class="dropdown-item" href="fields/badminton.php">Badminton Court</a>
                <a class="dropdown-item" href="fields/fitness.php">Fitness Gym</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="reservations.php">Reservations</a>
                    <a class="dropdown-item" href="myaccount.php">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/carouselimg1.jfif" style="height: 700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/carouselimg2.jfif" style="height: 700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/carouselimg3.jpg" style="height: 700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/carouselimg4.jpg" style="height: 700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/carouselimg5.jpg" style="height: 700px" class="d-block w-100" alt="...">
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
    </div>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid mb-3" style="margin:0;">
        <div class="container">
            <h1 class="display-4">Schedule</h1>
            <p class="lead">Reserve fields in just one click</p>
        </div>
    </div>
    <!-- Cards -->
    <div class="row container-fluid">
        <div class="col-sm-3">
            <div class="card mb-3">
                <img src="../assets/img/BasketballCourt.jpeg" style="height:200px" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Basketball Court</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><hr>
                    <a href="fields/basketball.php" class="btn btn-primary float-right">Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img src="../assets/img/swimmingpool.jpg" style="height:200px" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Swimming Pool</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><hr>
                    <a href="fields/swimmingpool.php" class="btn btn-primary float-right">Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img src="../assets/img/tenniscourt.jfif" style="height:200px" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Tennis Court</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><hr>
                    <a href="fields/tennis.php" class="btn btn-primary float-right">Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img src="../assets/img/badmintoncourt.jpg" style="height:200px" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Badminton Court</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><hr>
                    <a href="fields/badminton.php" class="btn btn-primary float-right">Schedule</a>
                </div>
            </div>
        </div>
    </div> 
    <div class="container-fuild mb-3 d-flex justify-content-center">
        <button class="btn btn-primary" onclick = "location.href='fields/basketball.php'" style="width: 200px">See All</button>
    </div>

    <!----------- Footer ------------>
    <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
            	<h2>Nuevo Grupo Dev</h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                <p>© 2014 BS3 UI Kit, All rights reserved</p>
            </div>
        	<div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu —</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="pages">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Nature</a></li>
                            <li><a href="#">Explores</a></li>
                            <li><a href="#">Science</a></li>
                            <li><a href="#">Advice</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        	<div class="col-md-2 footer-social animated fadeInDown">
            	<h4>Follow Us</h4>
            	<ul>
                	<li><a href="#">Facebook</a></li>
                	<li><a href="#">Twitter</a></li>
                	<li><a href="#">Instagram</a></li>
                	<li><a href="#">RSS</a></li>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns animated fadeInRight">
            	<h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><span class="fa fa-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
                 </p>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
$('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});



$('#customCheck').change(function(){
            if(this.checked)
            $('#agree').attr("disabled", false);
            else
            $('#agree').attr("disabled", true);
});

function agree() {
    window.location = "unsetagree.php";
 }



    </script>
  </body>
</html>
<?php
if(isset($_SESSION['agree']))
{
?>
<script>
$('#modal').modal('show');
</script>
<?php
}
?>