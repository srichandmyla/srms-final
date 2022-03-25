<?php
session_start();
//error_reporting(0);
include('includes/config.php');?>

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
          <span class="student-login-title">Student Login</span>
          <form class="student-login-form" action="result.php" method="post">
            <input
              type="text"
              class="text-id"
              placeholder="registration id"
              name="rollid"
            />
            <select name="class" class="select-id">
              <option value="">Select Class</option>
              <?php $sql = "SELECT * from tblclasses";
                    $query = $dbh->prepare($sql); $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ); if($query->rowCount() >
              0) { foreach($results as $result) { ?>
              <option value="<?php echo htmlentities($result->id); ?>">
                <?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section);
                ?>
              </option>
              <?php }} ?>
            </select>
            <button type="submit" class="button-id">login</button>
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