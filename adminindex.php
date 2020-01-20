<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php 
if (isset($_POST["Submit"])) {
    $AdminUsername = $_POST["adminUsername"];
    $AdminPassword = $_POST['adminPassword'];

    if(empty($AdminUsername) || empty($AdminPassword)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("adminindex.php");
    }elseif (strlen($AdminUsername < 3)) {
      $_SESSION["ErrorMessage"] = "it must be less than 3";
      Redirect_to("adminindex.php");
    }
}
?>

<?php  include("includes/header.php"); ?>  

<!-- the body section starts here  -->
<section body-area>
<div class="page-title-area">
            
    <div class="container" id="logincontainer">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <?php 
                echo ErrorMessage();
                echo SuccessMessage();
             ?>
            <form class="form-signin" action="adminindex.php" method="post">
              <div class="form-label-group">
              <label for="inputEmail">Email address:</label>
                <input type="text" class="form-control" placeholder="username" name="adminUsername">
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Password:</label>
              <br>
                <input type="password" class="form-control" placeholder="Password" name="adminPassword">
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase " id="myfirstlogin" type="submit" name="Submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
        
        </div>
        <!-- the body section ends here -->
        </section>

<?php  include("includes/footer.php"); ?>  
        

        <div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/jquery.meanmenu.js"></script>
        <script src="assets/js/jquery.nice-select.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/form-validator.min.js"></script>
        <script src="assets/js/contact-form-script.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>