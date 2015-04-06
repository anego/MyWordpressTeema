
	<hr>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<ul class="list-inline text-center">
					<?php
						$user_info = get_userdata(1);
						if ($user_info->twitter){
							?>
						<li><a href="https://twitter.com/<?php echo $user_info->twitter; ?>" target="_blank"> <span class="fa-stack fa-lg"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
						if ($user_info->facebook){
							?>
						<li><a href="https://www.facebook.com/<?php echo $user_info->facebook; ?>" target="_blank"> <span class="fa-stack fa-lg"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
						if ($user_info->github){
							?>
						<li><a href="https://github.com/<?php echo $user_info->github; ?>" target="_blank"> <span class="fa-stack fa-lg"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-github fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
						if ($user_info->pixiv){
							?>
						<li>
							<a href="http://pixiv.me/<?php echo $user_info->pixiv; ?>" target="_blank">Pixiv</a>
						</li>
							<?php
						}
					?>
					</ul>
					<p class="creativecommons text-muted">
						<a href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />
						このブログは<a href="http://creativecommons.org/licenses/by-nc-nd/4.0/">クリエイティブ・コモンズ</a>でライセンスされています。
					</p>
					<p class="copyright text-muted">Copyright &copy; cubic-H 2015</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<!--
	<script src="js/jquery.js"></script>
	 -->

	<!-- Bootstrap Core JavaScript -->
	<!--
	<script src="js/bootstrap.min.js"></script>
	 -->

	<!-- Custom Theme JavaScript -->
	<!--
	<script src="js/clean-blog.min.js"></script>
	 -->
	<?php wp_footer(); ?>

</body>

</html>
