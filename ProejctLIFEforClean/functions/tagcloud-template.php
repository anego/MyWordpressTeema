<?php


class BSWidgetTagCloud extends WP_Widget {
	function BSWidgetTagCloud() {
		parent::WP_Widget ( false, $name = 'Tag Cloud (Bootstrap3 ver)' );
	}
	public function widget( $args, $instance ) {
		extract ( $args );

		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = __('Tags');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTagcloud">' . $title . '</a>' . $args['after_title'];
		}
?>
	<div id="collapseTagcloud" class="panel-collapse collapse in">
		<div class="panel panel-default">
			<div class="panel-body">
<?php
		$tags = wp_tag_cloud(
			array(
					'format' => 'array',
					'number' => '0',
					'order' => 'DESC',
					'orderby' => 'count'
			)
		);
		foreach($tags as $tag){
			preg_match('/href=\'http:\/\/.+?\'/', $tag, $matche);
			$wtc_href = $matche[0];

			preg_match('/style=\'.+?\'/', $tag, $matche);
			$wtc_score = round(floatval(preg_replace('/[^0-9\.]/', '', $matche[0])));
			$wtc_class_score = "tag-score-". $wtc_score;

			preg_match('/title=\'.+?\'/', $tag, $matche);
			$wtc_title = $matche[0];
			$wtc_count = mb_ereg_replace('[^0-9]', '', $wtc_title);
			$tag_name = strip_tags($tag);

?>
				<a class="label label-default" <?php echo $wtc_href;?> rel="tag"><?php echo $tag_name; ?>(<?php echo $wtc_count; ?>)</a>
<?php
		}
?>
			</div>
		</div>
	</div>
<?php
		echo "\n";
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		return $instance;
	}

	public function form( $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:') ?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
	<?php foreach ( get_taxonomies() as $taxonomy ) :
				$tax = get_taxonomy($taxonomy);
				if ( !$tax->show_tagcloud || empty($tax->labels->name) )
					continue;
	?>
		<option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo $tax->labels->name; ?></option>
	<?php endforeach; ?>
	</select></p><?php
	}

	public function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}