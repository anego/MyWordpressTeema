<?php get_header(); ?>
				<div class="column col-sm-3" id="sidebar">
					<a class="logo" href="<?php echo home_url(); ?>">
						<canvas id="logo"></canvas>
					</a>
					<div class="blog-header">
						<h5 class="blog-title">
							<?php bloginfo('name'); ?><br><?php bloginfo('description'); ?>
						</h5>
					</div>
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
							<div class="row">
								<h1>404 Not Found</h1>
								<p>お探しのページは存在しません。ページの情報が変更になった可能性がありますので、検索で探してみてください。</p>
								<?php get_search_form(); ?>
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