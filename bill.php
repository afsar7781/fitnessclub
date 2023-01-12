<?php
session_start();
require_once"admin/db/db_config.php";

 $q="SELECT * FROM `bill` INNER JOIN registration on bill.userid=registration.userid where
 registration.userid='".$_SESSION['usersid']."' limit 0,1  ";
$query_fetch =select($q);



?>
<html>
<head>
<title>workout Pro | Home</title>
<?php include_once"head_files.php";?>
</head>
<body>
<!--/main-header-->
<!--/banner-section-->
<?php include_once"home_banner.php";?>
<!--/banner-section-->
<!--//main-header-->
<!--/banner-bottom-->
<?php include_once"login-section.php";?>
<!--/content-inner-section-->
<div class="w3_content_agilleinfo_inner">
<div class="agile_featured_workout">

<!--//tab-section-->
<?php //include_once"workout.php";?>

<div class="container">
<h2><?=ucwords($_SESSION['usersname'])?>'s Bill</h2></br>
<?php

if(mysqli_num_rows($query_fetch)>0){
?>



<div class="row">
<div class="col-lg-3">
</div>




<?php 
while($row = mysqli_fetch_array($query_fetch)){
extract($row);
?>
<div class="col-lg-6 bg-success" style="text-align:center;box-shadow: 10px 10px 5px grey;padding-top:30px">

<h2>Bill Number - <?=substr($_SESSION['usersname'],0,3)?><?=$bill_number?><h2></br>
<h3>Name - <?=ucwords($_SESSION['usersname'])?><h3>
<h3>Payment  - <?=$payment?> /-<h3>
</div>
<?php } ?>



<?php } else { echo "No Booking Till yet"; } ?>
<div class="col-lg-3">
</div>
</div>
</br>
<!--//top-workout-->
</div>
</div>
<!--//content-inner-section-->
<!--/footer-bottom-->
<?php include_once"footer.php";?>
<?php include_once"footer_scripts.php";?>
</body>
</html>				