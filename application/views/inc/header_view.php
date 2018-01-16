<?php
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		if ($uid !=''){
			//header('Location:home');
		}else{
			//$this->load->view('login/login_view');
			$baseurl = base_url();
			echo $baseurl;
			header('Location:'.$baseurl.'login');
		}

?>

<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>RFID - UIR</title>

        <meta name="description" content="eSource">
        <meta name="author" content="Elvin Casem">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?=base_url()?>public/img/favicon.png">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?=base_url()?>public/img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/main.css">
		<link rel="stylesheet" href="<?=base_url()?>public/css/fontsgoogleapis.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?=base_url()?>public/css/themes.css">
       
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?=base_url()?>public/js/vendor/modernizr-3.3.1.min.js"></script>
		
		
		
		<!-- fushion charts -->
		
		<script src="<?=base_url()?>public/js/fushion/fusioncharts.js"></script>
		<script src="<?=base_url()?>public/js/fushion/fusioncharts.charts.js"></script>
		<script src="<?=base_url()?>public/js/fushion/fusioncharts.zoomscatter.js"></script>
		<script src="<?=base_url()?>public/js/fushion/themes/fusioncharts.theme.fint.js"></script>
    </head>

    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
            -->