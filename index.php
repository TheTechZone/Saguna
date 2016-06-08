<?php include("includes/db.php"); ?>
<?php include "includes/header.php" ?>
<?php include("includes/navigation.php"); ?>

	<div class="wrapper">

		<div id="myCarousel" class="carousel slide fluid" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators hidden-sm hidden-xs">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li class="" data-target="#myCarousel" data-slide-to="1"></li>
				<li class="" data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="images/1.jpg" style="width:100%" alt="First slide" class="img-responsive">
					<div class="container">
						<div class="carousel-caption">
							<h1>Slide 1</h1>
							<p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="images/2.jpg" style="width:100%" data-src="" alt="Second slide" class="img-responsive">
					<div class="container">
					</div>
				</div>
				<div class="item">
					<img src="images/3.jpg" style="width:100%" data-src="" alt="Third slide" class="img-responsive">
					<div class="container">
					</div>
				</div>
			</div>
			<!--Buttons-->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left hidden-sm hidden-xs" aria-hidden="true"></span>
				<span class="sr-only">Prev</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs " aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<section class="section section-dark">
	        <div class="container section-dark">
	            <div class="row">
	                <div class="col-lg-12">
	                	<hr>
	                    <h1 class=" centered section-heading">Colegiul National "Andrei Saguna"</h1>
	                    <hr>
	                    <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                    <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
	                </div>
	            </div>
	        </div>
	    </section>

		<section class="section news">
			<div class="description">
				<div class="container">
					<hr>
					<div class="page-header">
						<h2  class="centered section-heading">Nautati, evenimente, stiri</h2>
					</div>
					<!-- Page Content -->
						<div class="container">
							<div class="row">
						<?php
						$query = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 6 ";
                    	$select_all_posts_query = mysqli_query($connection,$query);

                    	// $row = mysqli_fetch_assoc($select_all_posts_query);
                    	// var_dump($row);
                    	$i=0;
                    	while ($i < 3) {
                    		$row = mysqli_fetch_assoc($select_all_posts_query);
	                        $post_id = $row['post_id'];
	                        $post_title = $row['post_title'];
	                        $post_author = $row['post_author'];
	                        $post_date = $row['post_date'];
	                        $post_image = $row['post_image'];
	                        $post_content = substr($row['post_content'] ,0,100);
	                        $post_tags = $row['post_tags'];
	                        $i += 1;
						 ?>
								<div class="col-md-4">
									<h2><?php echo $post_title; ?></h2>
									<p><?php echo $post_content; ?></p>
									<p><a class="btn btn-default" href="post.php?p_id=<?php echo $post_id; ?>" role="button">View details &raquo;</a></p>
								</div>
							<?php } ?>
							</div>
							<hr class="article-spacing">
							<div class="row">
						<?php 
						$i=0;
                    	while ($i < 3) {
                    		$row = mysqli_fetch_assoc($select_all_posts_query);
	                        $post_id = $row['post_id'];
	                        $post_title = $row['post_title'];
	                        $post_author = $row['post_author'];
	                        $post_date = $row['post_date'];
	                        $post_image = $row['post_image'];
	                        $post_content = substr($row['post_content'] ,0,255);
	                        $post_tags = $row['post_tags'];
	                        $i += 1;
						?>
								<div class="col-md-4">
									<h2><?php echo $post_title; ?></h2>
									<p><?php echo $post_content; ?></p>
									<p><a class="btn btn-default" href="post.php?p_id=<?php echo $post_id; ?>" role="button">View details &raquo;</a></p>
								</div>
						<?php } ?>
						</div>
				</div>
			</div>
	    </section>

	</div>

<?php include("includes/footer.php"); ?>