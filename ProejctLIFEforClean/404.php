<?php get_header(); ?>

	<header class="intro-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1><?php bloginfo('name'); ?></h1>
						<hr class="small">
						<span class="subheading"><?php bloginfo('description'); ?></span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<h1>404 Not Found</h1>
				<p>お探しのページは存在しません。ページの情報が変更になった可能性がありますので、検索で探してみてください。</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>


<?php get_footer(); ?>