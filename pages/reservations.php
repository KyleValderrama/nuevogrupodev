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
    <link href="../css/scrollbar.css" rel="stylesheet">
    <script defer src="../js/all.js"></script>
    
    <title>Reservations</title>
  </head>
  <body>
    <!--alert-->
    <div id = "res_cancelled" class="alert alert-warning alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Reservation Cancelled!</strong> Your Reservation has been cancelled just now.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!--alert-->
    <div id = "payment" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Payment Submitted!</strong> Your Reservation has been secured. Thank you for scheduling.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cancel Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to cancel your reservation?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-warning" id="cancel_button">Confirm</button>
            </form>
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
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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

    <div class="container-fluid mt-5 mb-5">
    <h3>Reservations</h3>
    <div class="card mb-3 scrollable" style="border:0;">
        <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Field Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Hours</th>
                <th scope="col">Payment</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php   
                        $sql1 = "select * from reservations WHERE res_name = '".$_SESSION['name']."'";
                        $result = $con->query($sql1);
                            //or die($con->error);
                            $x=1;                      
                            while($row = mysqli_fetch_array($result))
                            {                                    
                                ?>
                                <tr>
                                <th><?php echo $x;?></th>
                                <?php
                                $sql = "select * from fields where field_custom_id = '".$row['res_field_id']."'";
                                $result1 = $con->query($sql);
                                while($row1 = mysqli_fetch_array($result1))
                                { 
                                ?>
                                <td><?php echo $row1['field_name']; ?></td>
                                <?php
                                }
                                ?>
                                <td><?php echo date('M j Y', strtotime($row['res_sched_date']));?></td>
                                <td><?php echo date('g:i A', strtotime($row['res_sched_time_in']));?></td>
                                <td><?php echo $row['res_sched_hours']; ?></td>
                                <?php
                                if($row['res_payment_status'] == 0)
                                {
                                ?>
                                    <td><button class='btn btn-outline-secondary'>Unpaid</button></td>
                                <?php
                                }
                                else{
                                ?>
                                    <td><button class='btn btn-outline-primary'>Paid</button></td>
                                
                                <?php
                                }
                                if($row['res_payment_status'] == 0)
                                {
                                ?>
                                <td><button class="btn btn-outline-warning"><?php echo $row['res_status']; ?>
                                </button></td>
                                <td>
                                
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle mb-1"  id="dropdownMenuButton" data-toggle="dropdown" style="width:100%">
                                            <i class="fas fa-credit-card"></i> Pay Now
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form action="checkout_rdct.php" method="POST">
                                                <button class="dropdown-item" name= "checkout_field_id" value = "<?php echo $row['res_field_id']; ?>">
                                                    Pay with Credit / Debit Card
                                                </button>
                                            </form>
                                            <form action="checkout_rdct.php" method="POST">
                                                <button name= "checkout_field_id_slip" class="dropdown-item" value = "<?php echo $row['res_field_id']; ?>">
                                                    Pay with Payment Slip
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                               
                                <form method = "POST" action="res_cancel.php"  id="cancel_confirm">
                                <button style="width:100%" name = "res_cancel" value = "<?php echo $row['res_field_id'];?>" class="btn btn-danger res_cancel" data-toggle="modal" data-target="#cancelmodal">Cancel</button>
                                <input type="text" id = "input_cancel" name = "res_cancel_id" hidden>
                                </form>
                                </td>
                                <?php
                                }
                                else
                                {
                                ?>
                                <td><button class="btn btn-outline-success"><?php echo $row['res_status']; ?>
                                </button></td>
                                <td><button class="btn btn-danger disabled" style="width:100%">Cancel</button></td>
                                <?php } ?>
                                </tr> 
                                <?php
                                $x++;
                            }  
                        ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>

    <!----------- Footer ------------>
    <footer class="footer-bs" style="border-radius:0;">
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
    var del_res_id;
    $('.res_cancel').click(function(){
        event.preventDefault();
        $('#input_cancel').val($(this).val());
        
    });
    $('#cancel_button').click(function(){
        $('#cancel_confirm').submit();
    });

    </script>
  </body>
</html>


<?php
//------- Danger Alert
if(!isset($_SESSION['res_cancelled']))
{
?>
<script>
    $('#res_cancelled').hide();
</script>
<?php
}
else
{
?>
<script>
    $('#res_cancelled').show();
</script>
<?php   
    unset($_SESSION['res_cancelled']);
}
?>

<?php
//------- Success Alert
if(!isset($_SESSION['payment']))
{
?>
<script>
    $('#payment').hide();
</script>
<?php
}
else
{
?>
<script>
    $('#payment').show();
</script>
<?php   
    unset($_SESSION['payment']);
}
?>