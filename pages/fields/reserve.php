<?php
session_start();
include_once('../sqlconnect.php');

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
    <link href="../../css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link href="../../css/bgimg.css" rel="stylesheet">
    <link href="../../css/scrollbar.css" rel="stylesheet">
    <link href="../../css/verticalmenu.css" rel="stylesheet">
    <script defer src="../../js/all.js"></script>
    <title>Reserve</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <a class="navbar-brand" href="#">Nuevo Grupo Dev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Field
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="basketball.php">Basketball Court</a>
                <a class="dropdown-item" href="swimmingpool.php">Swimming Pool</a>               
                <a class="dropdown-item" href="tennis.php">Tennis Court</a>
                <a class="dropdown-item" href="badminton.php">Badminton Court</a>
                <a class="dropdown-item" href="fitness.php">Fitness Gym</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Schedule</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'];?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="reservations.php">Reservations</a>
                    <a class="dropdown-item" href="#">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

<!-- content -->
    <div class="container-fluid d-flex justify-content-center"> 

        <div class="card mb-5"  style="width:60%;">
          <div class="card-body">
            <h3 class="card-title">Reserve Field</h3>
          <?php        
          $sql1 = 'select * from fields WHERE field_custom_id = "'.$_SESSION['res_field_id'].'"';
          $result1 = $con->query($sql1);
          while($row1 = mysqli_fetch_array($result1))
          {
            $res_field_name = $row1['field_name'];
            $res_field_address = $row1['field_address'];
            $res_field_img_url = $row1['field_img_url'];
            $res_field_status = $row1['field_status'];
          }
          ?>
          <hr>
          <form action= "confirm_rdct.php" method ="POST" >
          <label for="name_input">Field Name</label>
          <input type="input" value = "<?php echo $res_field_name;?>" name="res_name" id= "name_input" class="form-control mb-3" disabled required>
          <label for="name_input">Field Address</label>
          <textarea name="res_name" id= "name_input" style ="max-height:200px; min-height:60px;" class="form-control mb-3" disabled><?php echo $res_field_address;?></textarea>
          <p for="name_input">Field Image Preview</p>
          <?php
            if($res_field_img_url != '')
            {
            ?>
            <img class = "mb-3" src="<?php echo $res_field_img_url;?>" style="border-radius:5px; width:60%;" class="card-img-top" alt="...">
            <?php
            }
            else
            {
            ?>
            <img class = "mb-3" src="https://vollrath.com/ClientCss/images/VollrathImages/No_Image_Available.jpg" style="border-radius:5px; width:60%;" class="card-img-top" alt="...">
            <?php
            }
          ?>
            <div class="row">
                <div class="col-sm-4">
                    <label for="date_input">Reservation Date</label>
                    <div class="input-group mb-3"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                        <input type="date" min="<?php echo date("Y-m-d");?>" value = "<?php echo date("Y-m-d");?>" name="res_date" id= "date_input" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="time_input">Time-in</label>
                    <div class="input-group mb-3">    
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                        </div>                     
                        <input type="time" name="res_time" id= "time_input" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="hours_input">Number of Hour[s]</label>
                    <div class="input-group mb-3"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-hourglass"></i></div>
                        </div>
                        <input type="number" min="1" value = "1" name="res_hours" id= "hours_input" class="form-control" required>
                    </div>
                </div>
            </div>
                <label for="name_input">Reserved By</label>
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" min="1" value = "<?php echo $_SESSION['name'];?>" id= "name_input" class="form-control" required disabled>
                </div>
                <label for="name_input">Email</label>
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                    <input type="text" min="1" value = "<?php echo $_SESSION['email'];?>" name="res_date" id= "name_input" class="form-control" required disabled>
                </div>
                <div class="custom-control custom-checkbox mb-3 d-flex justify-content-center">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">I Agree to the Terms and Conditions</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button id = "submit" class="btn btn-primary" style="width: 80%">Reserve</button>
                </div>
              </form>  
          </div>
        </div> 
    </div>

    <!----------- Footer ------------>
    <footer class="footer-bs" style= "border-radius:0;">
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

$(document).ready(function(){

if($('#customCheck').checked)
{
    $('#submit').attr("disabled", false);    
}
else
{
    $('#submit').attr("disabled", true);
}
});


$('#customCheck').change(function(){
            if(this.checked)
            $('#submit').attr("disabled", false);
            else
            $('#submit').attr("disabled", true);
});
    </script>
  </body>
</html>