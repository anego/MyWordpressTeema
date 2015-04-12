<?php
/**
 * @function get_archives_array
 * @param post_type(string) / period(string) / year(Y) / limit(int)
 * @return array
 * @link http://qiita.com/hisa_k/items/b26d0b466c0274fd085a
 */
if (! function_exists ( 'get_archives_array' )) {
	function get_archives_array($args = '') {
		global $wpdb, $wp_locale;

		$defaults = array (
				'post_type' => '',
				'period' => 'monthly',
				'year' => '',
				'limit' => ''
		);
		$args = wp_parse_args ( $args, $defaults );
		extract ( $args, EXTR_SKIP );

		if ($post_type == '') {
			$post_type = 'post';
		} elseif ($post_type == 'any') {
			$post_types = get_post_types ( array (
					'public' => true,
					'_builtin' => false,
					'show_ui' => true
			) );
			$post_type_ary = array ();
			foreach ( $post_types as $post_type ) {
				$post_type_obj = get_post_type_object ( $post_type );
				if (! $post_type_obj) {
					continue;
				}

				if ($post_type_obj->has_archive === true) {
					$slug = $post_type_obj->rewrite ['slug'];
				} else {
					$slug = $post_type_obj->has_archive;
				}

				array_push ( $post_type_ary, $slug );
			}

			$post_type = join ( "', '", $post_type_ary );
		} else {
			if (! post_type_exists ( $post_type )) {
				return false;
			}
		}
		if ($period == '') {
			$period = 'monthly';
		}
		if ($year != '') {
			$year = intval ( $year );
			$year = " AND DATE_FORMAT(post_date, '%Y') = " . $year;
		}
		if ($limit != '') {
			$limit = absint ( $limit );
			$limit = ' LIMIT ' . $limit;
		}

		$where = "WHERE post_type IN ('" . $post_type . "') AND post_status = 'publish'{$year}";
		$join = "";
		$where = apply_filters ( 'getarchivesary_where', $where, $args );
		$join = apply_filters ( 'getarchivesary_join', $join, $args );

		if ($period == 'monthly') {
			$query = "SELECT YEAR(post_date) AS 'year', MONTH(post_date) AS 'month', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
		} elseif ($period == 'yearly') {
			$query = "SELECT YEAR(post_date) AS 'year', count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC $limit";
		}

		$key = md5 ( $query );
		$cache = wp_cache_get ( 'get_archives_array', 'general' );
		if (! isset ( $cache [$key] )) {
			$arcresults = $wpdb->get_results ( $query );
			$cache [$key] = $arcresults;
			wp_cache_set ( 'get_archives_array', $cache, 'general' );
		} else {
			$arcresults = $cache [$key];
		}
		if ($arcresults) {
			$output = ( array ) $arcresults;
		}

		if (empty ( $output )) {
			return false;
		}

		return $output;
	}
}

// アーカイブウィジェット
class BSWidgetArchive extends WP_Widget {
	function BSWidgetArchive() {
		parent::WP_Widget ( false, $name = 'Archive (Bootstrap3 ver)' );
	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives' ) : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		echo "\n";
		if ( $title ) {
			echo $args['before_title'] . '<a data-toggle="collapse" data-parent="#accordion" href="#collapseArchives">' . $title . "</a>" . $args['after_title'];
		}

?>
		<div id="collapseArchives" class="panel-collapse collapse in">
			<div class="panel-group" id="accordion">
<?php
	$archives = get_archives_array();
	if($archives):
		$yearbefo = 0;
		$maxcount = count($archives);
		$count = 0;
		foreach($archives as $archive):
			$count++;
			if($yearbefo != $archive->year){
				// 年のヘッダ
				if($yearbefo != 0){
echo "							</ul>";
echo "						</div>";
echo "					</div>";
echo "				</div>";
				}
?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $archive->year; ?>"><?php echo $archive->year; ?>年</a>
						</h4>
					</div>
					<div id="collapse<?php echo $archive->year; ?>" class="panel-collapse collapse in">
						<div class="panel-body">
							<ul class="list-group">
<?php
			}
?>
								<li class="list-group-item"><span class="badge"><?php echo $archive->posts; ?></span> <a href="<?php echo get_month_link($archive->year, $archive->month); ?>" title=""><?php echo $archive->month; ?>月</a></li>
<?php

			if($count == $maxcount){
				// 最後のループ用
?>
							</ul>
						</div>
					</div>
				</div>
<?php
			}

			$yearbefo = $archive->year;
		endforeach;
	endif;
?>
			</div>
		</div>
<?php

			echo $args['after_widget'];
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '') );
			$instance['title'] = strip_tags($new_instance['title']);

			return $instance;
		}

		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
			$title = strip_tags($instance['title']);
	?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
	<?php
		}
}
