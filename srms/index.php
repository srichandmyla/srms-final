<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header class="homepage-header">
        <a class="homepage-brand" href="/">
            <img src="https://www.lpu.in/images/logo/logo.svg" class="homepage-image" alt="lpu logo">
        </a>
        <ul class="homepage-header-list">
        <li class="homepage-list-item"><a aria-current="page" href="#!">Home</a></li>
                        <li class="homepage-list-item"><a href="find-result.php">Students</a></li>
                        <li class="homepage-list-item"><a  href="admin-login.php">Admin</a></li>
        </ul>
    </header>

    <section class="homepage-main">

        <div class="homepage-impact-pic">

        </div>

        <div class="homepage-notices">
               <span class="homepage-notice"style="color:orangered;">Notices</span>
               <marquee class="homepage-notice-container" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                   
                   <?php $sql = "SELECT * from tblnotice";
                         $query = $dbh->prepare($sql);
                         $query->execute();
                         $results=$query->fetchAll(PDO::FETCH_OBJ);
                         $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {   ?>
                            <a href="notice-details.php?nid=<?php echo htmlentities($result->id);?>" target="_blank">
                              <p  class="homepage-notice-item"><?php echo htmlentities($result->noticeTitle);?></p> </a>
                            <?php }} ?>
               </marquee>
        </div>

    </section>

    <footer class="homepage-footer">
        <p>&copy; Copyright 2022</p>
        <a class="homepage-footer-authors" href="">Project Authors</a>
    </footer> 
</body>
</html>