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
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );

				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;

				the_post_navigation( array(
				'next_text' => '<span class="screen-reader-text">' . __( 'Next post:', 'ProejctLIFEforClean' ) . '</span> ' .
					'<span class="post-title">%title</span>' .
					'<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-right fa-stack-1x  fa-inverse"></i></span>',
				'prev_text' => '<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-left fa-stack-1x  fa-inverse"></i></span>'.
					'<span class="screen-reader-text">' . __( 'Previous post:', 'ProejctLIFEforClean' ) . '</span> ' .
					'<span class="post-title">%title</span>' ,
				'screen_reader_text' => 'Post navi'
			) );

			endwhile;
			?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>