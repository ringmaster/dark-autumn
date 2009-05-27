<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php Options::out( 'title' ) ?></title>
	<meta http-equiv="Content-Type" content="text/html">
	<meta name="generator" content="Habari">

	<link rel="alternate" type="application/atom+xml" title="Atom 1.0 Feed" href="<?php $theme->feed_alternate(); ?>">
	<link rel="edit" type="application/atom+xml" title="Atom Publishing Protocol" href="<?php URL::out( 'atompub_servicedocument' ); ?>">
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out( 'rsd' ); ?>">

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme_url; ?>/css/init.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme_url; ?>/css/main.css">

	<!-- Put JS links here -->

	<link rel="Shortcut Icon" href="/favicon.ico">
	<?php $theme->header(); ?>
</head>
<body>
	<div class="wrapper">
		<div id="banner">&nbsp;</div>
		<div id="branch">&nbsp;</div>
		<div id="primary" class="clearfix">
			<div class="navigation">
				<ul>
					<li class="noborder"><a href="<?php echo $this->base_url; ?>" <?php if ( $matched_rule->name == 'display_home' ) echo 'class="active"'; ?> title="<?php _e( 'Homepage' ); ?>"><?php _e( 'Homepage' ); ?></a></li>
				<?php foreach ( $pages as $pagelink ) : ?>
					<li>
						<a  href="<?php echo $pagelink->permalink; ?>" title="<?php echo $pagelink->title; ?>" <?php if ($pagelink->id == $post_id) echo 'class="active"'; ?>><?php echo $pagelink->title; ?></a>
					</li>
				<?php endforeach; ?>
					<li><a href="<?php URL::out( 'atom_feed', array( 'index' => '1' ) ); ?>" title="<?php echo $da_feedtext; ?>" class="feedlink"><?php echo $da_feedtext; ?></a></li>
				</ul>
			</div>
			<div class="sitetitle">
				<h1><?php Options::out( 'title' ) ?></h1>
				<p><?php Options::out( 'tagline' ) ?></p>
			</div>