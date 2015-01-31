<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
							<div class="row divider">
								<div class="col-sm-12">
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<div class="blog-post">
										<h3 class="blog-post-title">
											<canvas class="dot5"></canvas>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="blog-post-meta">
											<span class="blog-post-meta-date">
												<abbr class="published" title="<?php echo get_post_time(); ?>"><?php echo get_post_time('Y/m/d H:i:s'); ?></abbr>
											</span>
											<span class="blog-post-meta-category"> Category:[<?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if ( $categories ) {
	foreach( $categories as $category ) {
		$output .= '<a class="label label-default" href="' . get_category_link( $category->term_id ) . '" title="'
			. esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) )
			. '">' . $category->cat_name . '</a>' . $separator;
	}
echo trim( $output, $separator );
}
?>]</span>
											<span class="blog-post-meta-tag">Tag:[<?php
											$arr = get_the_tags();
											if (is_array($arr)) {
												foreach ( $arr as $tag ) {
													echo '<a class="label label-default" href="/?tag='.$tag->slug.'">'.$tag->name.'</a>';
												}
											}else{
												echo '<a class="label label-default" href="/?tag='.$arr->slug.'">'.$arr->name.'</a>';
											}
?>]</span>
										</div>
										<?php the_content(); ?>
									</div>
								</div>
							</div>
<?php
endwhile;
endif;
?>