<!-- <div class="contact-w3ls" id="contact">
	<div class="footer-w3lagile-inner">
		<div class=" w3-agileits">
			<div class="col-md-6 footer-grid">
				<h4>Latest workout</h4>
				<?php $q = select("select * from workout limit 0,4"); while($workout = mysqli_fetch_array($q)) {  extract($workout); ?>
					<div class="footer-grid1">
						<div class="footer-grid1-left">
							<a href="single.php?workoutid=<?=$workoutid?>"><img src="movies/<?=$movies_image?>" alt=" " class="img-responsive"></a>
						</div>
						<div class="footer-grid1-right">
							<a href="single.php?workoutid=<?=$workoutid?>"><?=ucwords($workout_name)," | Workout "?></a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<?php } ?>
			</div>
			<div class="col-md-2 footer-grid" style="float:right">
				<h4 class="b-log"><a href="index.php"><span>W</span>ORK<span>P</span>LUS!!</a></h4>
				<?php $q2 = select("select * from workout order by  workoutid desc  limit 0,6"); while($workout2 = mysqli_fetch_array($q2)) {  extract($workout2); ?>
					
				<div class="footer-grid-instagram">
					<a href="single.php?workoutid=<?=$workoutid?>"><img  src="movies/<?=$movies_image?>" alt=" " class="img-responsive"></a>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<div class="footer">
	<p>© The Gym © 2022 AFSAR FITNESS Pvt. Ltd </p>
</div>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>