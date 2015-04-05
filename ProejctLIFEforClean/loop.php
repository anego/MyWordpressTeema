				<div class="post-preview">
					<a href="<?php the_permalink(); ?>">
						<h2 class="post-title"><?php the_title(); ?></h2>
					</a>
					<p class="post-meta">
						Posted by <a href="#"><?php echo the_author_nickname(); ?></a> on <?php echo get_the_date(); ?>
					</p>
				</div>
				<hr>