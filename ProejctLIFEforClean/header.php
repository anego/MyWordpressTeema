<!DOCTYPE html>
<html lang="ja" manifest="<?php bloginfo('template_url'); ?>/main.appcache">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php
if(is_home()):
	// トップページ用
	if ( $post->my_description ):
		echo esc_attr( $post->my_description );
	else:
		echo bloginfo('description');
	endif;
elseif(is_single()):
	// 投稿ページ
	$content_summary = strip_tags($post->post_content);
	$content_summary = preg_replace("/(?:\n|\r|\r\n)/", "", $content_summary);
	$content_summary = mb_substr($content_summary, 0, 50). "...";
	echo $content_summary;
elseif(is_category()):
	// カテゴリーページ
	$cat = get_the_category();
	echo "Category : " . $cat[0]->cat_name;
elseif(is_archive()):
	// アーカイブページ
	echo "Archives : " . get_the_archive_title();
else:
	?><?php bloginfo('description'); ?><?php
endif; ?>">
<?php if ( $post->my_keywords ): //meta keywordsの設定 ?>
	<meta name="keywords" content="<?php echo esc_attr( $post->my_keywords ); ?>" />
<?php endif; ?>
<meta name="author" content="anego">

<?php if ( $post->my_title ): //titleタグの設定 ?>
<title><?php echo esc_html( $post->my_title ); ?></title>
<?php else: ?>
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>

<!-- Custom Fonts -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
<?php
if ( get_option('projectlife_clean_header_background_image') ) : // 背景画像が設定されているとき ?>
<style type="text/css">
.intro-header{
	background-image: url('<?php echo esc_url(get_option('projectlife_clean_header_background_image')); ?>');
}
</style>
<?php
else :
	// 未設定のとき
endif;
?>
<?php $header_color = get_option( 'projectlife_clean_header_color'); ?>
<style type="text/css">
.site-heading hr.small {
	border-color: <?php echo $header_color; ?>;
}
@media only screen and (min-width: 768px) {
	.navbar-custom .navbar-brand,
	.navbar-custom .nav li a {
		color: <?php echo $header_color; ?>;
	}
}
.intro-header .site-heading,
.intro-header .post-heading,
.intro-header .page-heading,
.intro-header .post-heading .meta a,
.site-heading {
  color: <?php echo $header_color; ?>;
}
</style>
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php
				$args = array(
					'theme_location'  => 'mainmenu',
					'menu'            => 'mainmenu',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);
				wp_nav_menu($args);
			?>

			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
