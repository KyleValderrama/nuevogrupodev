<!doctype html>
<?php
session_start();

if(!isset($_SESSION['reset_token']))
{
    header("Location: login.php");
}
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

    <div id = "notmatched" class="alert alert-danger alert-dismissible fade show text-center" style="margin:0;" role="alert">
        <strong>Invalid Password!</strong> The Password didn't matched, please try again.
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
                <h3 class="card-title">Reset Password</h5>
                <p class="card-text">Please Enter your email</p><hr>
                <!--form-->
                <form action = "accountreset_rdct.php" method = "POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="inlineFormInputGroupUsername" value = "<?php echo $_SESSION['reset_email'];?>" disabled required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" name = "new_pass" class="form-control" id="inlineFormInputGroupUsername" placeholder="Create New Password" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" name = "confirm_pass" class="form-control" id="inlineFormInputGroupUsername" placeholder="Confirm Password" required>
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
if(!isset($_SESSION['not_matched']))
{
?>
<script>
    $('#notmatched').hide();
</script>
<?php
}
else
{
?>
<script>
    $('#notmatched').show();
</script>
<?php   
    unset($_SESSION['not_matched']);
}
?>