<!doctype html>
<html <?php language_attributes(); ?>>
<head id="<?php echo of_get_option('meta_headid'); ?>">
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>	
	<?php if (true == of_get_option('meta_author')) echo '<meta name="author" content="'.of_get_option("meta_author").'" />'; ?>
	<?php if (true == of_get_option('meta_google')) echo '<meta name="google-site-verification" content="'.of_get_option("meta_google").'" />'; ?>
	<?php if (true == of_get_option('meta_viewport')) { echo '<meta name="viewport" content="'.of_get_option("meta_viewport").'" />'; } ?>
	
	<title><?php wp_title(' - ', true, 'right'); ?></title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/icons/64_favicon.png" sizes="64x64" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/icons/32_favicon.png" sizes="32x32" />
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" sizes="16x16" />

	<?php if (true == of_get_option('meta_app_twt_card')) {
		echo '<!-- Twitter -->';
		echo '<meta name="twitter:card" content="'.of_get_option("meta_app_twt_card").'" />';
		echo '<meta name="twitter:site" content="'.of_get_option("meta_app_twt_site").'" />';
		echo '<meta name="twitter:title" content="'.of_get_option("meta_app_twt_title").'">';
		echo '<meta name="twitter:description" content="'.of_get_option("meta_app_twt_description").'" />';
		echo '<meta name="twitter:url" content="'.of_get_option("meta_app_twt_url").'" />';
	} ?>

	<?php if (true == of_get_option('meta_app_fb_title')) {
		echo '<!-- Facebook -->';
		echo '<meta property="og:title" content="'.of_get_option("meta_app_fb_title").'" />';
		echo '<meta property="og:description" content="'.of_get_option("meta_app_fb_description").'" />';
		echo '<meta property="og:url" content="'.of_get_option("meta_app_fb_url").'" />';
		echo '<meta property="og:image" content="'.of_get_option("meta_app_fb_image").'" />';
	} ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-48748714-1']);
    _gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="wrapper" <?php if(is_front_page()){ echo 'class="homepage"'; } ?>>
	<header role="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="primary-nav">
                    <?php wp_nav_menu( array('menu' => 'primary', 'menu_class' => 'nav navbar-nav navbar-right') ); ?>
                </div>
            </div>
        </nav>
	</header>
