<h3 class="agile_w3_title"> Latest <span>workout</span></h3>
<!--/workout-->
<div class="w3_agile_latest_workout">
	<div id="owl-demo" class="owl-carousel owl-theme">
		<?php $q = select("select * from workout"); while($workout = mysqli_fetch_array($q)) {  extract($workout); ?>
		<div class="item">
			<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
				<a href="single.php?workoutid=<?=$workoutid?>" class="hvr-sweep-to-bottom"><img src="movies/<?=$movies_image?>" title="workout Pro" style="height:200px;width:400px"class="img-responsive" alt=" " />
					<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
				</a>
				<div class="mid-1 agileits_w3layouts_mid_1_home">
					<div class="w3l-movie-text">
						<h6><a href="single.php"><?=$workout_name?> Workout	</a></h6>
					</div>
					<div class="mid-2 agile_mid_2_home">
						<p><?=$workout_label?></p>
						<div class="block-stars">
							<ul class="w3l-ratings">
								
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php if(strlen($workout_description)>0):?>
				<div class="ribben one">
					<p><?=ucwords($workout_description)?></p>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>