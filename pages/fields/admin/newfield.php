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
                <a class="nav-link" href="#">Reservations</a>
            </li>
          </ul>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-primary d-flex justify-content-center">
        <div class="card mb-5 " style="width: 50rem">
            <div class="card-body">
                <h3 class="card-title">Add New Field</h5>
                <hr>
                <!--form-->
                <form action = "addfield.php" method = "POST">
                    <label for="field_select" class="text-left">Enter Field Name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-plus"></i></div>
                        </div>
                        <input type="text" name = "field_name" class="form-control" placeholder="Field Name" required>
                    </div>
                    <label for="field_select" class="text-left">Select Field</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-tree"></i></div>
                        </div>
                        <select name = "field_category" id="field_select" class="form-control">
                            <option>Basketball</option>
                            <option>Badminton</option>
                            <option>Tennis</option>
                            <option>Swimming Pool</option>
                            <option>Fitness Gym</option>
                        </select>
                        
                    </div>
                    <label for="field_select" class="text-left">Field Address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                        </div>
                        <textarea name="field_address" class="form-control" style="min-height:50px; max-height:200px;"></textarea>
                    </div>

                    <label for="field_select" class="text-left">Add Field Image Link</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-image"></i></div>
                        </div>
                        <input type="text" name = "field_img_url" class="form-control" placeholder="http://your-image-url.jpg/" optional>
                    </div>

                    <label for="field_select" class="text-left">Custom Field ID</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name = "field_custom_id" class="form-control" placeholder="CLNMNL_BDM_#" optional>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button id = "submit" class="btn btn-primary" style="width: 80%" >Add Field</button>
                    </div>
                </form>
            
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
$('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
    </script>
  </body>
</html>