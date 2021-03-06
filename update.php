<?php 

if(isset($_POST['location'], $_POST['hiddenToken'])){

    $address   = $_POST['location'];
    $valid = false;
    // 6) Extract the received CSRF token value
    $hiddenToken   = $_POST['hiddenToken'];
    // 6) Obtain the token cookie and compare that with the received token value.
    if(isset($_COOKIE['tokenID'])){
        $tokenCookie = $_COOKIE['tokenID'];
        if($tokenCookie == $hiddenToken){
            $valid = true;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CSRF - Double Submit Cookies Pattern</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper" style="margin-top: 20px;width: 600px">
          <div class="card fat">
            <div class="card-body">
              <?php 
                // 7) If the received CSRF token is valid, show success message. 
                // If not show error message.
                if($valid){
                    echo '<h2 style="color:green;">Token Matched! Update Success! </h2>';
                    echo ' <p>The provided CSRF token and the token stored as cookie are same. </p>';
                }else {
                    echo '<h2 style="color:red;">Token Error! Update Fail! </h2>';
                    echo ' <p>The provided CSRF token and the token stored as cookie are not same.</p>';
                }
                ?>
              <a href="index.php">Return Home</a>
            </div>
          </div>
          <div class="footer">
            Copyright &copy; CSRF Double Submit Cookies Pattern
          </div>
        </div>
      </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>