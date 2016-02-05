	<hr>

	<!-- widget -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<?php dynamic_sidebar('footer'); ?>
			</div>
		</div>
	</div>
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
						<li><a href="https://twitter.com/<?php echo $user_info->twitter; ?>" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
						if ($user_info->facebook){
							?>
						<li><a href="https://www.facebook.com/<?php echo $user_info->facebook; ?>" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
						if ($user_info->github){
							?>
						<li><a href="https://github.com/<?php echo $user_info->github; ?>" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-github fa-stack-1x fa-inverse"></i>
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
						if ($user_info->tumblr){
							?>
						<li><a href="https://www.tumblr.com/blog/<?php echo $user_info->tumblr; ?>" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-tumblr fa-stack-1x fa-inverse"></i>
							</span>
						</a></li>
							<?php
						}
					?>
					</ul>
					<p class="creativecommons text-muted">
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="クリエイティブ・コモンズ・ライセンス" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br />
						このサイトは <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">クリエイティブ・コモンズ 表示 - 非営利 - 継承 4.0 国際 ライセンスの下に提供されています。</a>
					</p>
					<p class="creativecommons text-muted">
					このブログは Apache License, Version 2.0 のライセンスで配布されている成果物を含んでいます。
					</p>
					<p class="copyright text-muted">Copyright &copy; 1999-2015 anego All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>

</html>
