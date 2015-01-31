<?php

/**
 *  カテゴリーウィジェット用のワーカー
 *  @see category-template.php
 */
class BSWidgetCategoryWalker extends Walker_Category {
	function start_el(&$output, $category, $depth, $args) {
		extract($args);
		$cat_name = apply_filters(
				'list_cats',
				esc_attr( $category->name ),
				$category
		);

		$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link .= '>';
		$link .= $cat_name . '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$alt = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
			}
			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( ! empty( $args['show_count'] ) ) {
			$link .= '<span class="badge">' . number_format_i18n( $category->count ) . '</span> ';
		}
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'list-group-item cat-item cat-item-' . $category->term_id;
			if ( ! empty( $args['current_category'] ) ) {
				$_current_category = get_term( $args['current_category'], $category->taxonomy );
				if ( $category->term_id == $args['current_category'] ) {
					$class .=  ' current-cat';
				} elseif ( $category->term_id == $_current_category->parent ) {
					$class .=  ' current-cat-parent';
				}
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
	public function start_lvl( &$output, $depth, $args ) {
		extract($args);
		if ( 'list' != $args['style'] )
			return;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='list-group-item'>\n";
	}
}

class BSWidgetCategory extends WP_Widget {
	function BSWidgetCategory() {
		parent::WP_Widget ( false, $name = 'Category (Bootstrap3 ver)' );
	}
	function widget($args, $instance) {
		extract ( $args );
		if(!empty($instance ['title'])){
			$title = apply_filters ( 'widget_title', $instance ['title'] );
		}else{
			$title = __('category');
		}


		$BSWalker = new BSWidgetCategoryWalker();
		$args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 1,
				'hide_empty'         => 1,
				'use_desc_for_title' => 1,
				'child_of'           => 0,
				'feed'               => '',
				'feed_type'          => '',
				'feed_image'         => '',
				'exclude'            => '',
				'exclude_tree'       => '',
				'include'            => '',
				'hierarchical'       => 1,
				'title_li'           => '',
				'show_option_none'   => __( 'No categories' ),
				'number'             => null,
				'echo'               => 1,
				'depth'              => 0,
				'current_category'   => 0,
				'pad_counts'         => 0,
				'taxonomy'           => 'category',
				'walker'             => $BSWalker
		);
		//$categories = get_categories('parent=0&hide_empty=0&orderby=id');
		// Web表示部
		?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) ?>
		<?php echo $before_title . $title . $after_title; ?>
		<?php echo '<ul class="list-group">';
			echo wp_list_categories($args);
			echo '</ul>';
		?>
		<?php echo $after_widget; ?>
		<?php
		// /Web表示部
	}
	// オプション内容
	function form($instance) {
		$title = esc_attr ( $instance ['title'] );
		?>
		<div>title:<br /><input name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></div>
		<?php
	}
	// 設定保存
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance ['title'] = strip_tags ( $new_instance ['title'] );
		return $instance;
	}
}
