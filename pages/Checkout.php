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
    <link href="../css/bgimg.css" rel="stylesheet">
    <link href="../css/all.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" >
    <script defer src="../js/all.js"></script>
    <title>Sign Up</title>
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
            <li class="nav-item">
                <a class="nav-link" href="#">Schedule</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'];?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../reservations.php">Reservations</a>
                    <a class="dropdown-item" href="#">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

<!-- content -->

<?php
$sql = "SELECT * FROM reservations WHERE res_field_id = '".$_SESSION['chk_field_id']."' AND res_name = '".$_SESSION['name']."' ";
$result = $con->query($sql);                      
while($row = mysqli_fetch_array($result))
{ 
  $hours = $row['res_sched_hours'];
}

$result2 = $con->query("SELECT * FROM fields WHERE field_custom_id = '".$_SESSION['chk_field_id']."'");
while($row2 = mysqli_fetch_array($result2))
{ 
  $fieldname = $row2['field_name'];
}
$rate = 175;
$total = $rate*$hours;

$_SESSION['total'] = $total;
?>
 

  <div class="container d-flex justify-content-center">
    <div class="card mb-5 " style="width: 50rem">
      <div class="card-body">
        <h3>Checkout</h3>
        <hr>
        <div class="row mb-5 mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
          <strong>PHP</strong>
          <h4 class='display-3 text-center'><?php echo $total;?>.00</h4>
          <p class="text-center">will be charged on your account<p>
          </div>
        </div>

        <h3><?php echo $hours; ?> Hour Reservation for <?php echo $fieldname; ?></h3>
        <hr>

        <form action="charge.php" method="post" id="payment-form">

            <label>Credit / Debit Card</label>
            <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert" ></div>

            <label class="mt-3">Full Name</label>
            <input type="text" value = "<?php echo $_SESSION['name']; ?>" name = "full_name" class="form-control mb-3 StripeElement StripeElement--empty"  placeholder="Full Name" required>

            <label>Email</label>
            <input type="email" value = "<?php echo $_SESSION['email']; ?>" name = "email" class="form-control StripeElement StripeElement--empty"  placeholder="Email" required>



            <button class="btn btn-primary mt-3">Submit Payment</button>
        </form>
      </div>
    </div>  
  </div>      



    <footer class="footer-bs" style="border-radius:0;">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
            	<h2>Nuevo Grupo Dev</h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                <p>© 2019 The Nuevo Grupo Realty and Development Corporation</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/charge.js"></script>
    
    <script>
    </script>
  </body>
</html>