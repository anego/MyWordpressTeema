<?php get_header(); ?>
				<div class="column col-sm-3" id="sidebar">
					<a class="logo" href="<?php echo home_url(); ?>">
					</a>
					<div class="blog-header">
						<h5 class="blog-title">
							<?php bloginfo('name'); ?><br><?php bloginfo('description'); ?>
						</h5>
					</div>
					<ul class="nav">
						<li><a href="<?php echo site_url(); ?>/about/"><i class="glyphicon glyphicon-user"></i>About</a></li>
						<li><a href="#bswidgetcategory-2"><i class="glyphicon glyphicon-list-alt"></i>Category</a></li>
						<li><a href="#bswidgetarchive-2"><i class="glyphicon glyphicon-th"></i>Archive</a></li>
						<li><a href="#bswidgettagcloud-2"><i class="glyphicon glyphicon-tags"></i>Tagcloud</a></li>
						<li><a href="#connextUs"><i class="glyphicon glyphicon-share-alt"></i>Connect with Us</a></li>
					</ul>
					<?php
					#get_sidebar();
					dynamic_sidebar('sidebar');
					?>
					<ul class="nav hidden-xs" id="sidebar-footer">
						<li><a href="http://www.bootstrapzero.com/bootstrap-template/basis" target="_blank">Use templates</a></li>
					</ul>
				</div>
				<div class="column col-sm-9" id="main">
					<div class="padding">
						<div class="full col-sm-9">
							<!-- 記事本文 -->
							<?php get_template_part( 'loop' ); ?>
							<div class="row">
								<div class="col-sm-12 text-center">
									<nav>
									<?php
									if (function_exists("pagination")) {
										pagination($additional_loop->max_num_pages);
									}
									?>
									</nav>
								</div>
							</div>
							<div class="row">
								<!-- ウィジット -->
								<?php dynamic_sidebar('footer'); ?>
							</div>
							<div class="col-sm-12">
								<div id="connextUs" class="page-header text-muted divider">
									<canvas class="dot3"></canvas>
									Connect with Us
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<a href="https://twitter.com/anegojp" target="_blank">Twitter</a> <small class="text-muted">|</small> <a href="http://pixiv.me/anego" target="_blank">Pixiv</a> <small
										class="text-muted"
									></small>
								</div>
							</div>
							<hr>
							<div class="row" id="footer">
								<div class="col-sm-6">
									<p>
										<a href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />
										このブログは<a href="http://creativecommons.org/licenses/by-nc-nd/4.0/">クリエイティブ・コモンズ</a>でライセンスされています。
									</p>
								</div>
								<div class="col-sm-6">
									<p>
										<a href="#" class="pull-right"> ©Copyright1999-2014 anego All Rights Reserved. </a>
									</p>
								</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
<?php get_footer(); ?>