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
    <title>Fields</title>
  </head>
  <body>
    <!-- Modal -->
    <div class="modal fade" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete Field</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            This will delete this field permanently, are you sure you want to continue?
        </div>
        <div class="modal-footer">
            
                <button type="button" class="btn btn-warning" id="cancel_button">Confirm</button>
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
            <li class="nav-item active">
              <a class="nav-link" href="">Fields<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reservations.php">Reservations</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 d-flex justify-content-center mb-5">
                <div class="vertical-menu">
                
                    <a href="basketball.php" class = "btn btn-light" style="border-radius:5px 5px 0 0">Basketball Courts</a>
                    <a href="badminton.php" class = "btn btn-light" style="border-radius:0">Badminton Courts</a>
                    <a href="tennis.php" class = "btn btn-light" style="border-radius:0">Tennis Courts</a>
                    <a href="swimmingpool.php" class = "btn btn-primary" style="border-radius:0">Swimming Pools</a>
                    <a href="fitness.php" class = "btn btn-light" style="border-radius:0px 0px 5px 5px">Fitness Gyms</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="container-fluid">
                    <h3>Available Swimming pool/s</h3>
                    <div class="tblhead">
                    <table class="table mb-0 text-white">
                        <thead>
                            <tr>
                            <th scope="col" style= "width:50px;">#</th>
                            <th scope="col" style= "width:200px;">Name</th>
                            <th scope="col" style= "width:200px;">Address</th>
                            <th scope="col" style= "width:100px; text-align:center;">Status</th>
                            <th scope="col" style= "width:100px; text-align:center;">Field ID</th>
                            <th scope="col" style= "text-align:center;">Edit</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <div class="scrollable mb-2">
                    <table class="table">          
                        <tbody>
                        <?php
                        $result = $con->query("select * from fields WHERE field_category = 'swimming pool'");
                            //or die($con->error);
                            $x=1;                      
                            while($row = mysqli_fetch_array($result))
                            {                                          
                                ?>
                                <tr>
                                <th class="text-center" style="width:50px;"><?php echo $x;?></th>
                                <td style= "width:200px;"><?php echo $row['field_name']; ?></td>
                                <td style= "width:200px;"><?php echo $row['field_address']; ?></td>
                                <td style= "width:100px;">
                                    <?php 
                                        if($row['field_status'] == 1)
                                        {
                                            ?>
                                            <button name = "res_field_id" value = "<?php echo $row['field_custom_id'];?>" class = "btn btn-outline-success">Available</button>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a class = "btn btn-outline-danger" href= "#">Reserved</a>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td style= "width:100px;"><?php echo $row['field_custom_id']; ?></td>
                                <td>
                                <?php
                                    if($row['field_status'] == 1)
                                    {
                                ?>
                                <form class= "d-flex justify-content-center" action="editfield_rdct.php" method="POST">
                                    <button name = "edit_field_id" style="width:100%;" value="<?php echo $row['field_custom_id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i> Edit</button>
                                </form>
                                <form action= "deletefield.php" method = "POST" id="del_field_conf">
                                    <button style="width:100%;" value="<?php echo $row['field_custom_id']; ?>" data-toggle="modal" data-target="#cancelmodal" class="btn btn-danger del_field_btn"><i class="fas fa-trash"></i> Delete</button>
                                    <input type="text" id = "del_field_id" name = "del_field_id" hidden>
                                </form>
                                <?php } else { ?>
                                    <button name = "edit_field_id" style="width:100%;" value="<?php echo $row['field_custom_id']; ?>" class="btn btn-primary mb-2 disabled"><i class="fas fa-edit"></i> Edit</button>
                                    <button style="width:100%;" value="<?php echo $row['field_custom_id']; ?>" class="btn btn-danger disabled"><i class="fas fa-trash"></i> Delete</button>
                                <?php } ?>
                                </td>
                                </tr> 
                                <?php
                                $x++;
                            }  
                        ?>        
                        </tbody>                                           
                    </table>
                    </div>
                        <div class="d-flex justify-content-center">
                        <a href="newfield.php" class="btn btn-primary mb-5 " style="width:50%" >Add new field <i class="fas fa-plus ml-1"></i></a>
                        </div>
                </div>
            </div>
        </div>    
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

    $('.del_field_btn').click(function(){
        event.preventDefault();
        $('#del_field_id').val($(this).val());
        
    });
    $('#cancel_button').click(function(){
        $('#del_field_conf').submit();
    });

    </script>
  </body>
</html>

