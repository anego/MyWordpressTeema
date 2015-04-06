<?php get_header(); ?>

	<header class="intro-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1><?php the_title(); ?></h1>
						<hr class="small">
						<span class="subheading">Posted by <a href="#"><?php the_author(); ?></a> on <?php echo get_the_date(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>

				<!-- Pager -->
				<ul class="pager">
					<?php
					if (function_exists("pagination")) {
						pagination($additional_loop->max_num_pages);
					}
					?>
				</ul>
			</div>
		</div>
	</div>

<?php get_footer(); ?>