<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php 
if (isset($_POST["Submit"])) {
    $courseTitle = $_POST["courseTitle"];
    
    if(isset($_POST["Submit"])) {
        $courseTitle = $_POST["courseTitle"];
        date_default_timezone_set("Africa/Lagos");
        $currentTime = time();
        $courseDateTime=strftime("%B-%d-%Y %H:%M:%S", $currentTime);

        if(empty($courseTitle)) {
            $_SESSION["ErrorMessage"] = "All fields must be filled out";
            Redirect_to("courses.php");
        }elseif (strlen($courseTitle) < 3) {
            $_SESSION["ErrorMessage"] = "Title must not be less than two letters";
            Redirect_to("courses.php");
        }elseif (strlen($courseTitle) > 49) {
            $_SESSION["ErrorMessage"] = "Title must be more than 50 letters";
            Redirect_to("courses.php");
        } else {
            global $ConnectingDB;
            $sql = "INSERT INTO courses(course_title,course_datetime)";
            $sql .= "VALUES(:courseName,:courseDate)";
            $statement = $ConnectingDB->prepare($sql);
            $statement->bindValue(':courseName',$courseTitle);
            $statement->bindValue(':courseDate',$courseDateTime);
            $execute=$statement->execute();

            if($execute) {
                $_SESSION["SuccessMessage"]="Course added Successfully";
                Redirect_to("courses.php");
            } else {
                $_SESSION["ErrorMessage"]="Something went wrong";
                Redirect_to("courses.php");
            }
        }
    }

?>

<?php  include("includes/header.php"); ?> 

<section >
<div class="page-title-area">
    <div class= "container-fluid">
        <div class="row">
            <div class="col-md-3 rightareadashboard" style="min-height:100px; background:#0d1d3b;">
                <ul class="list-group list-group-flush py-4 rightareadashboards bg-success">
                    <a href="#" class="list-group-item list-group-item-action py-4">PROFILE</a>
                    <a href="#" class="list-group-item list-group-item-action py-4">CATEGORY</a>
                    <a href="#" class="list-group-item list-group-item-action py-4">POSTS</a>
                    <a href="#" class="list-group-item list-group-item-action py-4">ADMINS</a>
                    <a href="#" class="list-group-item list-group-item-action py-4">LEARNERS</a>
                </ul>
            </div>
            <div class="col-md-9 py-2" style="min-height:100px; background:white;">
                <div class="offset-lg-1 col-lg-10 mt-3" style="min-height:50px;" >
                    <form class="" action="courses.php" method="post">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h1 class="text-light">Add New Course</h1>
                                <?php 
                echo ErrorMessage();
                echo SuccessMessage();
                //date_default_timezone_set("Africa/Lagos");
        $currentTime = time();
        //$courseDateTime=strftime("%B-%d-%Y %H:%M:%S", $currentTime);
                //echo $courseDateTime;
                ?>

                            </div>
                            <div class="card-body bg-dark">
                                <div class= "form-group">
                            <label for="courseTitles"><span class="fieldinfo">Category Title: </span></label>
                            <input type="text" class="form-control" name="categoryTitle" id="categoryTitles" placeholder="type title name">
                            </div>
                            <button type="submit" name="Submit" class="btn btn-block btn-success mt-4">Submit </a>
                            </div>
                                                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
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
<?php var_dump($courseTitle); ?>