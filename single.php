<?php
	session_start();
	if(!isset($_SESSION['user_login'])){
		echo "<script>alert('Please Login First');window.location='index.php';</script>";
	}
	require_once"admin/db/db_config.php";
	$movie_data = mysqli_fetch_array(select("select * from workout where workoutid='".$_REQUEST['workoutid']."'"));
?>
<!DOCTYPE html>
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
				<div class="inner-agile-w3l-part-head">
					<h3 class="w3l-inner-h-title"><?=$movie_data['workout_name']?></h3>
				</div>
				<div class="latest-news-agile-info text-center" >
					<div class="col-md-8 latest-news-agile-left-content">
						<img src="movies/<?=$movie_data['movies_image']?>" alt=" " style="margin-left:130px;height:300px; text-align:center" class="img-responsive">
						<div class="single video_agile_player">
							<h4><?=$movie_data['workout_name']?> | Workout </h4>
							<h4>Fill The Registration | Form </h4>
						</div>
						<div >
							 <form  method="post">
  <div class="form-group">
  <input type="text" name="name" class="form-control" placeholder="Name"></div>
  
  <div class="form-group">
  <input type="text" name="mobile" class="form-control" placeholder="Mobile"></div>
  
  <div class="form-group">
   <input type="text" name="email" class="form-control" placeholder="Email" ></div>
  
  <div class="form-group">
   <input type="text" name="age" class="form-control" placeholder="Age"></div>
  
  <div class="form-group">
  <label>Male
  <input type="radio" name="sex" value="male"></label>
  <label>Female
  <input type="radio" name="sex" value="female"></label>
  </div>
  <div class="form-group">
  <select name="workout" class="form-control">
  <?php
  $p=mysqli_query($cid,"select * from workout where workoutid='".$_REQUEST['workoutid']."'");
  while($rr=mysqli_fetch_array($p))
  {
	  extract($rr);
  
  ?>
 <option value="<?=$rr['workoutid']?>"><?=$rr['workout_name']?></option><?php
 }
 ?>
  </select>
  </div>
  
  <div class="form-group">
  <select name="package" class="form-control"><option>Select Packages</option>
  

<option value="1-Month-999">1 Month &nbsp;&nbsp; 999 /-</option>
<option value="3-Month-3499">3 Month &nbsp;&nbsp;   3499 /-</option>
<option value="6-Month-5499">6 Month  &nbsp;&nbsp; 5499/-</option>
<option value="1-Year-8499">1 Year   &nbsp;&nbsp;8499/-</option>
 
  
  
  </select></div>
  <div class="form-group">
  <select name="time_slot" class="form-control"><option>Select Time</option>
  

<option value="Morning">Morning</option>
<option value="Afternoon">Afternoon</option>
<option value="Evening">Evening</option>
 </select>
  </div>
  <input type="submit" name="rag_submit" value="Payment" class="form-control btn btn-success">
  </form>
  
  
  <?php
  if(isset($_REQUEST['rag_submit']))
{
	 extract($_REQUEST);
	 $uid= $_SESSION['usersid'];
	 $query="INSERT INTO `registration`(`userid`, `name`, `mobile`, `email`, `age`, `sex`, `workoutplan`, `package`, `timslot`) VALUES 
	 ('$uid','$name','$mobile','$email','$age','$sex','$workout','$package','$time_slot')";
	 $n=iud($query);
if($n==1)
	{
		$t=iud("INSERT INTO `bill`( `userid`, `payment`) VALUES ('$uid','$package')");
      echo '<script>alert("Payment Successful We Will Contact You Soon"); window.location="index.php";</script>';
	}
	else
	{
		echo"something wrong";
	}
	 
}
  ?>
						</div>
					</div>
					<div class="col-md-4 latest-news-agile-right-content">
						<div class="clearfix"> </div>
						<div class="agile-info-recent">
							<h4 class="side-t-w3l-agile">Latest <span>workout</span></h4>
							<div class="w3ls-recent-grids">
							<input type="hidden" id="workoutid"  data-workoutid="<?=$movie_data['workoutid']?>" >
								<?php $q = select("select * from workout  where workoutid!='".$_REQUEST['workoutid']."' limit 0,6"); while($workout = mysqli_fetch_array($q)) {  extract($workout); ?>
									<div class="w3l-recent-grid" style="margin-left:200px">
										<div class="wom">
											<a href="single.php?workoutid=<?=$workoutid?>">
											
											<h5><a href="single.php?workoutid=<?=$workoutid?>"><?=$workout_name?></h5>
											
											<img src="movies/<?=$movies_image?>" alt=" " class="img-responsive"></a>
										</div>
										<div class="wom-right">
											<div class="mid-2 agile_mid_2_home">
												<div class="clearfix"></div>
												<div class="block-stars">
													<ul class="w3l-ratings">
														
														<li></a></li>
														
													</ul>
												</div>
												<div class="clearfix"></div>
												
												<div class="clearfix"></div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--//content-inner-section-->
		<!--/footer-bottom-->
		<?php include_once"footer.php";?>
		<?php include_once"footer_scripts.php";?>
	</body>
	</html>	