<?php
session_start();
require_once"admin/db/db_config.php";

$q="SELECT * FROM ((`registration` INNER JOIN schedule on registration.workoutplan=schedule.workout_id) INNER JOIN workout on registration.workoutplan=workout.workoutid) where registration.userid='".$_SESSION['usersid']."' ";
$query_fetch =select($q);



?>
<html>
<head>
<title>BESTRONG | Home</title>
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
<h2><?=ucwords($_SESSION['usersname'])?>'s Schedule</h2></br>
<?php

if(mysqli_num_rows($query_fetch)>0){
?>




<table class="table table-hover">
<thead>
<tr style="font-family: Times ;font-size: 30px ">
<th>Workout Name</th>
<th>Image</th>
<th>Start Time</th>
<th>End Time</th>
<th>Mon</th>
<th>Tue</th>
<th>Wed</th>
<th>Thu</th>
<th>Fri</th>
<th>Sat</th>
<th>Sun</th>

</tr>
</thead>
<tbody>


<?php 
while($row = mysqli_fetch_array($query_fetch)){
extract($row);
?>

<tr class="info" style="font-family: Times ;font-size: 20px ">

<td><?=$workout_name?></td>
<td><img src="movies/<?=$movies_image?>" style="height:50px"></td>
<td><?=$start_time?></td>
<td><?=$end_time?></td>
<td><?php
if($mon==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>Yes<p>";
}?></td><td><?php
if($tue==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>Yes<p>";
}?></td><td><?php
if($wed==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>Yes<p>";
}?></td><td><?php
if($thu==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>Yes<p>";
}?></td><td><?php
if($fri==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>yes<p>";
}?></td><td><?php
if($sat==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:green'>yes<p>";
}?></td><td><?php
if($sun==1)
{
	echo"<p style='color:green'>Yes<p>";
}
else
{
	echo"<p style='color:red'>No<p>";
}?></td>

<?php } ?>


</tbody>
</table>
<?php } else { echo "No Booking Till yet"; } ?>
</div>

<!--//top-workout-->
</div>
</div>
<!--//content-inner-section-->
<!--/footer-bottom-->
<?php include_once"footer.php";?>
<?php include_once"footer_scripts.php";?>
</body>
</html>				