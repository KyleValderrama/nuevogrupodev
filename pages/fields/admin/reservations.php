<?php
session_start();
include_once('../../sqlconnect.php');

if(!isset($_SESSION['logintoken']))
{
    header("Location: ../../logout.php");
}
if(!isset($_SESSION['admin']))
{
    header("Location: ../../");
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
    <link href="../../../css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="../../../css/footer.css" rel="stylesheet">
    <link href="../../../css/bgimg.css" rel="stylesheet">
    <link href="../../../css/scrollbar.css" rel="stylesheet">
    <link href="../../../css/verticalmenu.css" rel="stylesheet">
    <script defer src="../../../js/all.js"></script>
    <title>Reservations</title>
  </head>
  <body>
    <!--alert-->
    <div id = "declined" class="alert alert-warning alert-dismissible text-center fade show" style="margin:0;" role="alert">
        <strong>Reservation Declined!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!--alert-->
    <div id = "approved" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Reservation Approved!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!--alert-->
    <div id = "dismissed" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Reservation Dismissed!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!--alert-->
    <div id = "paid" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Payment Approved!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Modal Decline Res-->
    <div class="modal fade" id="declinemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Decline Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to decline this reservation?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-warning" id="btn_decline_modal">Confirm</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Dismiss Res-->
    <div class="modal fade" id="dismissmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Dismiss Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to dismiss this reservation?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-warning" id="btn_dismiss_modal">Confirm</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Approve Res-->
    <div class="modal fade" id="approvemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Approve Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to Approve this reservation?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-success" id="btn_approve_modal">Confirm</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Paid Res-->
    <div class="modal fade" id="paidmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Approve Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure this transaction is Paid?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-success" id="btn_paid_modal">Confirm</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <a class="navbar-brand" href="#">Nuevo Grupo Dev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../../admin.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Fields<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="reservations.php">Reservations</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../../logout.php">Logout</a>
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
                <th scope="col">Reserved By</th>
                <th scope="col">Field ID</th>
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
                        $sql1 = "select * from reservations";
                        $result = $con->query($sql1);
                            //or die($con->error);
                            $x=1;                      
                            while($row = mysqli_fetch_array($result))
                            {                                    
                                ?>
                                <tr>
                                <th><?php echo $x;?></th>
                                <td><?php echo $row['res_name']; ?></td>
                                <td><?php echo $row['res_field_id']; ?></td>
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
                                <td>
                                <form method = "POST" action="paid.php"  id="paid_confirm">
                                    <button name = "btn_paid" value = "<?php echo $row['res_field_id'];?>" id= "btn_paid" class='btn btn-outline-secondary btn_paid' data-toggle="modal" data-target="#paidmodal">
                                        Unpaid
                                    </button>
                                    <input class = "input_res_id" name = "res_id" hidden>
                                </form>
                                </td>
                                <?php
                                }
                                else{
                                ?>
                                    <td><button class='btn btn-outline-primary'>Paid</button></td>
                                <?php
                                }
                                if($row['res_status'] == "pending")
                                {
                                ?>
                                <td><button class="btn btn-outline-warning"><?php echo $row['res_status']; ?>
                                </button></td>
                                <td>
                                <form method = "POST" action="approve.php"  id="approve_confirm">
                                <button name = "btn_approve" value = "<?php echo $row['res_field_id'];?>" class="btn btn-success mb-1 btn_approve" style="width:100%"  data-toggle="modal" data-target="#approvemodal"><i class="fas fa-check"></i> Approve</button>
                                <input type="text" class = "input_res_id" name = "res_id" hidden>
                                </form>
                                <form method = "POST" action="decline.php"  id="decline_confirm">
                                <button style="width:100%" name = "btn_decline" value = "<?php echo $row['res_field_id'];?>" class="btn btn-danger btn_decline" data-toggle="modal" data-target="#declinemodal">
                                <i class="fas fa-times"></i> Decline
                                </button>
                                <input class = "input_res_id" name = "res_id" hidden>
                                </form>
                                </td>
                                <?php
                                }
                                else
                                {
                                ?>
                                <td><button class="btn btn-outline-success"><?php echo $row['res_status']; ?>
                                </button></td>
                                <td>
                                <form method = "POST" action="dismiss.php"  id="dismiss_confirm">
                                <button value = "<?php echo $row['res_field_id'];?>" class="btn btn-primary btn_dismiss" style="width:100%" data-toggle="modal" data-target="#dismissmodal">Dismiss</button>
                                <input type="text" class = "dismiss_res_id" name = "res_id" hidden>
                                </form>
                                </td>
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
<!--logs-->
    <div class="container-fluid mt-5 mb-5">
    <h3>Logs</h3>
    <div class="card mb-3 scrollable" style="border:0;">
        <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                        $sql1 = "select * from reservation_logs ORDER BY log_timestamp DESC";
                        $result = $con->query($sql1);
                            //or die($con->error);
                            $x=1;                      
                            while($row = mysqli_fetch_array($result))
                            {                                    
                                ?>
                                <tr>
                                <th><?php echo $x;?></th>
                                <td><?php echo $row['log_user_email']; ?></td>
                                <td><?php echo $row['log_user_name']; ?></td>
                                <td><?php echo $row['log_description']; ?></td>
                                <td><?php echo date('M j Y g:i A', strtotime($row['log_timestamp']));?></td>
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
    $('.btn_approve').click(function(){
        event.preventDefault();
        $('.input_res_id').val($(this).val()); 
    });

    $('.btn_decline').click(function(){
        event.preventDefault();
        $('.input_res_id').val($(this).val());   
    });

    $('.btn_dismiss').click(function(){
        event.preventDefault();
        $('.dismiss_res_id').val($(this).val());   
    });

    $('#btn_approve_modal').click(function(){
        $('#approve_confirm').submit();
    });

    $('#btn_decline_modal').click(function(){
        $('#decline_confirm').submit();
    });

    $('#btn_dismiss_modal').click(function(){
        $('#dismiss_confirm').submit();
    });

    $('#btn_paid_modal').click(function(){
        $('#paid_confirm').submit();
    });

    $('.btn_paid').click(function(){
        event.preventDefault();
        $('.input_res_id').val($(this).val()); 
    });

    

    </script>
  </body>
</html>


<?php
//------- Success Alert ADD
if(!isset($_SESSION['approved']))
{
?>
<script>
    $('#approved').hide();
</script>
<?php
}
else
{
?>
<script>
        $('#approved').show();
</script>
<?php   
    unset($_SESSION['approved']);
}
?>

<?php
//------- Success Alert ADD
if(!isset($_SESSION['declined']))
{
?>
<script>
    $('#declined').hide();
</script>
<?php
}
else
{
?>
<script>
        $('#declined').show();
</script>
<?php   
    unset($_SESSION['declined']);
}
?>

<?php
//------- Success Alert ADD
if(!isset($_SESSION['dismissed']))
{
?>
<script>
    $('#dismissed').hide();
</script>
<?php
}
else
{
?>
<script>
        $('#dismissed').show();
</script>
<?php   
    unset($_SESSION['dismissed']);
}
?>

<?php
//------- Success Alert ADD
if(!isset($_SESSION['paid']))
{
?>
<script>
    $('#paid').hide();
</script>
<?php
}
else
{
?>
<script>
        $('#paid').show();
</script>
<?php   
    unset($_SESSION['paid']);
}
?>