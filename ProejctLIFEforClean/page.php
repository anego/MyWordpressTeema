<?php get_header(); ?>

	<header class="intro-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1><?php the_title(); ?></h1>
						<hr class="small">
						<span class="subheading"><?php bloginfo('name'); ?></span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
				?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>