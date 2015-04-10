
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'ProejctLIFEforClean' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div>
</article>
