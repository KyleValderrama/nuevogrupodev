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
    <script defer src="../js/all.js"></script>
    <title>Sign Up</title>
  </head>
  <body>
    <!--alert-->
    <div class="alert alert-warning fade show text-center" style="margin:0;" role="alert">
        <strong>Password not matched!</strong> There's something wrong with your password, please try again.
    </div> 

    <div id= "loginbg" class="jumbotron jumbotron-fluid text-center bg-primary text-white mb-5" style="margin:0;">
        <div class="container">
            <h1 class="display-4">Schedule</h1>
            <p class="lead mb-3">Reserve fields and courts in just one click.</p>
        </div>
    </div>
    <div class="container-fluid text-primary text-center d-flex justify-content-center">
        <div class="card mb-5 " style="width: 50rem">
            <div class="card-body">
                <h3 class="card-title">Nuevo Grupo Dev</h5>
                <p class="card-text">Create Account</p><hr>
                <!--form-->
                <form action = "createaccount.php" method = "POST">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name = "name" class="form-control" id="inlineFormInputGroupUsername" placeholder="Full Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" name = "email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-check"></i></div>
                        </div>
                        <input name = "password" type="password" class="form-control" id="confirm" placeholder="Confirm Password" required>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">I Agree to the Terms and Conditions</label>
                    </div>
                    <button id = "submit" class="btn btn-primary" style="width: 80%" disabled>Create Account</button>
                </form>
                <hr>
                <p style="margin:0;">Have an account?</p>
                <a href="login.php">Login Here</a>              
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
    <script>
        $(document).ready(function(){
            $('.alert').hide();
        });
        $('#customCheck').change(function(){
            if(this.checked)
            $('#submit').attr("disabled", false);
            else
            $('#submit').attr("disabled", true);
        });
        $('#submit').click(function(){
            if($('#password').val() == $('#confirm').val())
            {
                this.submit();
            }
            else
            {
                $('.alert').show();
                event.preventDefault();
                
            }
        });
        $('.close').click(function(){
            $('.alert').hide();
            event.preventDefault();
        });
    </script>
  </body>
</html>