<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
      integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/find-result.css" />
  </head>
  <body>
    <section class="student-login-page">
      <div class="student-login-left">
        <div class="student-login-head">
          <img
            class="student-login-image"
            src="https://www.lpu.in/images/logo/logo.svg"
            alt=""
          />
        </div>
        <div class="student-login-container">
          <span class="student-login-title">Admin Login</span>
          <form class="student-login-form"  method="post">
            <input
              type="text"
              class="text-id"
              placeholder="username"
              name="username"
            />
            <input
              type="password"
              class="text-id"
              placeholder="Passsword"
              name="password"
            />

            <button name="login" type="submit" class="button-id">login</button>
          </form>
          <div class="student-login-footer">
            <p>
              <a href="index.php" class="student-login-link"
                ><i class="fa-solid fa-angle-left"></i> Back to home</a
              >
            </p>
          </div>
        </div>
      </div>
      <div class="student-login-right">
        <div class="student-login-back"></div>
      </div>
    </section>
  </body>
</html>
