<?php
/** Header template segment
 *
 * @author Conrad Muan <con.mun@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>
<!doctype html>
<!--[if lt IE 7]> <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta property="og:type" content="cause" />
  <meta property="og:title" content="Hack for a Cause"/>
  <meta property="og:url" content="http://www.hackforacause.org/"/>
  <meta property="og:image" content="http://hackforacause.org/assets/img/logo.png"/>
  <meta property="og:site_name" content="Hack for a Cause"/>
  <meta property="fb:admins" content="28106434,1398995225,894480496"/>
  <meta property="og:description"
				content="Our community believes that entrepreneurial spirit, combined with social technology + focus, will solve real problems for specific causes via an overnight HACKATHON"/>

  <title><?php bloginfo('name'); ?> | <?php bloginfo('description');?></title>

  <!-- CSS -->
  <link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/boilerplate.css" />
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  
  <?php if (isset($_POST['signed_request'])) : ?>
  
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>fb-style.css" />
  
  <?php else: ?>
  
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  
  <?php endif; ?>
  
	<!-- For iPhone 4 with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-114.png">
	<!-- For first-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-72.png">
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-precomposed.png">
	<!-- For nokia devices: -->
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico" />
  <!-- end CSS-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
    <div id="cintainer-inner">
        <div id="header">
                <h1 class="header-logo">
                    <a href="<?php bloginfo('url'); ?>" id="logo"></a>
                </h1>	

                <div id="navigation">
                    
                    <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
                    
                </div><!-- end #navigation -->

        </div><!-- end #header -->

        <div id="main">