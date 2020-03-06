<!doctype html>
<?php
session_start();
?>
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
    <title>Reset Password</title>
  </head>
  <body>

    <!--alert-->
    <div id = "notexist" class="alert alert-danger alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Reset Failed!</strong> Account doesn't exist, please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id = "resetsuccess" class="alert alert-success alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Email Sent!</strong> Please Check your email to reset your password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
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
                <h3 class="card-title">Forget Password</h5>
                <p class="card-text">Please Enter your email</p><hr>
                <!--form-->
                <form action = "resetpassword.php" method = "POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" name = "email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" required>
                    </div>
                    <button id = "submit" class="btn btn-primary" style="width: 80%">Reset Password</button>
                </form>
                <hr>
                <p style="margin:0;">Have an account?</p>
                <a href="login.php">Login Here</a>              
            </div>
           
            
        </div>         
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    </script>
  </body>
</html>

<?php
//------- Danger Alert
if(!isset($_SESSION['not_exist']))
{
?>
<script>
    $('#notexist').hide();
</script>
<?php
}
else
{
?>
<script>
    $('#notexist').show();
</script>
<?php   
    unset($_SESSION['not_exist']);
}
?>

<?php
if(!isset($_SESSION['reset_success']))
{
?>
<script>
    $('#resetsuccess').hide();
</script>
<?php
}
else
{
?>
<script>
    $('#resetsuccess').show();
</script>
<?php   
    unset($_SESSION['reset_success']);
}
?>