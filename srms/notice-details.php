<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Result Management System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href ="css/index.css" rel="stylesheet"/>
    </head>
    <body>
        <!-- Responsive navbar-->
        <header class="homepage-header">
        <a class="homepage-brand" href="/">
            <img src="https://www.lpu.in/images/logo/logo.svg" class="homepage-image" alt="lpu logo">
        </a>
        <ul class="homepage-header-list">
        <li class="homepage-list-item"><a aria-current="page" href="index.php">Home</a></li>
                        <li class="homepage-list-item"><a href="find-result.php">Students</a></li>
                        <li class="homepage-list-item"><a  href="admin-login.php">Admin</a></li>
        </ul>
    </header>
        <!-- Header - set the background image for the header in the line below-->
 
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

 <?php 
$noticeid=$_GET['nid'];
$sql = "SELECT * from tblnotice where id='$noticeid'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>  

                        <h3><?php echo htmlentities($result->noticeTitle);?></h3>
                        <p><strong>Notice Posting Date:</strong>  <?php echo htmlentities($result->postingDate);?></p>
                                                <hr color="#000" />
                    
<p><?php echo htmlentities($result->noticeDetails);?></p>
<?php }} ?>

              
    

                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Student Result Management System <?php echo date('Y');?></p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
