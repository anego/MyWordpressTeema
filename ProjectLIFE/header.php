<!DOCTYPE html>
<html lang="ja" manifest="<?php bloginfo('template_url'); ?>/main.appcache">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php if ( $post->my_description ): //meta descriptionの設定 ?>
	<meta name="description" content="<?php echo esc_attr( $post->my_description ); ?>" />
<?php else: ?>
	<meta name="description" content="しがないプログラマーの更新しないブログ" />
<?php endif; ?>
<?php if ( $post->my_keywords ): //meta keywordsの設定 ?>
	<meta name="keywords" content="<?php echo esc_attr( $post->my_keywords ); ?>" />
<?php endif; ?>
<meta name="generator" content="Bootply" />
<meta name="author" content="anego">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link hreflang="ja-jp" title="<?php bloginfo('name'); ?>" rel="alternate" href="/">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
/* move special fonts to HTML head for better performance */
@import
	url('http://fonts.googleapis.com/css?family=Audiowide|Open+Sans:200,300,400,600,700')
	;
</style>
<?php if ( $post->my_title ): //titleタグの設定 ?>
	<title><?php echo esc_html( $post->my_title ); ?></title>
<?php else: ?>
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<?php
// get_theme_mod関数でテーマのプロパティを取得
$box_background_image = get_theme_mod( 'projectlife_box_background_image' );
?>
<?php if ( get_option('projectlife_box_background_image') ) : // 背景画像が設定されているとき ?>
<style type="text/css">
.box {
	background-image: url('<?php echo esc_url(get_option('projectlife_box_background_image')); ?>');
}
</style>
<?php else : // 未設定のとき ?>
<?php  ?>
<?php endif; ?>
<?php wp_head(); ?>

</head>
<body id="blog" class="layout-tw">
	<div class="wrapper">
		<div class="box">
			<div class="row">