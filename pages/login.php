<?php
session_start();

if(isset($_SESSION['logintoken']))
{
    header("Location: index.php");
}
if(isset($_SESSION['verify']))
{
    header("Location: verify.php");
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
    <script defer src="../js/all.js"></script>
    <title>Login</title>
  </head>
  <body>

    <!--alert-->
    <div id = "loginfailed" class="alert alert-danger alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Login Failed!</strong> Email or password is incorrect, please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id = "captchaerror" class="alert alert-danger alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Invalid Captcha!</strong> Please validate captcha before loging in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id = "createsuccess" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Account Created!</strong> You can now login your newly created account.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id = "resetsuccess" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Reset Success</strong> Please Login your account.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 

    <div id= "loginbg" class="jumbotron jumbotron-fluid text-center bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Schedule</h1>
            <p class="lead mb-3">Reserve fields and courts in just one click.</p>
        </div>
    </div>
    <div class="container-fluid text-primary text-center d-flex justify-content-center">
        <div class="card mb-5 " style="width: 25rem">
            <div class="card-body">
                <h3 class="card-title">Nuevo Group Dev</h5>
                <p class="card-text">Login Account</p><hr>
                <form action="logincheck.php" method="POST">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="email" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="Password" required>
                    </div>
                    <div class = "container-fluid d-flex justify-content-center mb-3">
                    <div class="g-recaptcha" data-sitekey="6LcqKt8UAAAAANEJBBsdbbmMRCFS2E00fdyV5SGf"></div>
                    </div>
                    <button class="btn btn-primary" style="width: 80%">Login</button><br>
                </form>
                <a href="forgetpassword.php">Forgot Password?</a>
                <hr>
                <p style="margin:0;">Don't Have account?</p>
                <a href="signup.php">Sign-Up Here</a>              
            </div>
           
            
        </div>         
    </div>

    <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
            	<h2>Nuevo Group Dev</h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                <p>© 2019 Nueve Grupo Reality and Development Corp.</p>
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
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
//------- Danger Alert
if(!isset($_SESSION['loginfailed']))
{
?>
<script>
    $('#loginfailed').hide();
</script>
<?php
}
else
{
?>
<script>
        $('#loginfailed').show();
</script>
<?php   
    session_unset();
    session_destroy();
}
//------- Success Alert
if(isset($_SESSION['createuser_token']))
{
?>
<script>
    
    $('#createsuccess').show();
</script>
<?php
    session_unset();
    session_destroy();
}
else
{
?>
<script>
    $('#createsuccess').hide();    
</script>
<?php   
}

if(isset($_SESSION['reset_success']))
{
?>
<script>
    
    $('#resetsuccess').show();
</script>
<?php
    session_unset();
    session_destroy();
}
else
{
?>
<script>
    $('#resetsuccess').hide();    
</script>
<?php   


}

if(isset($_SESSION['captchaerror']))
{
?>
<script>
    
    $('#captchaerror').show();
</script>
<?php
    session_unset();
    session_destroy();
}
else
{
?>
<script>
    $('#captchaerror').hide();    
</script>
<?php  

}
?>