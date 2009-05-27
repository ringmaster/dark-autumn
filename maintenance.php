<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php Options::out( 'title' ) ?></title>
	<meta http-equiv="Content-Type" content="text/html">
	<meta name="generator" content="Habari">

	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php $theme->feed_alternate(); ?>">
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
		<div id="maintenance">
			<div class="sitetitle">
				<h1><?php Options::out( 'title' ) ?></h1>
				<p><?php Options::out( 'tagline' ) ?></p>
			</div>
			<div id="message">
			<p class="message-header"><?php echo $da_maintenancetitle ?></p>
			<p class="message-body">
				<?php echo $theme->maintenance_text; ?>
			</p>
            </div>
		</div>
	</div>
</body>
</html>