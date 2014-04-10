<?php
$path = explode('/', dirname(__FILE__));
$pcount = count($path);

// Windows hack.
if ($pcount <= 1) {
    $path = explode('\\', dirname(__FILE__));
    $pcount = count($path);
}

$skin_loc = $pcount - 2;
$current_skin = $path[$skin_loc];

$stylesheet = array(
    'href' => APPFOLDER.'/views/'.$current_skin.'/css/screen.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => 'screen',
    'charset' => 'utf-8'
);

$login_button = array(
    'id' => 'cp-signin-button',
    'value' => 'submit',
    'type' => 'submit',
    'name' => 'submit',
    'content' =>  ucwords(lang('actions_login'))
);

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>

    <meta name="description" content="<?php echo $this->config->item('meta_desc'); ?>" />
    <meta name="description" content="<?php echo $this->config->item('meta_keywords'); ?>" />
    <meta name="description" content="<?php echo $this->config->item('meta_author'); ?>" />

    <?php echo $_redirect; ?>

    <?php echo link_tag($stylesheet); ?>

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php include_once($this->config->item('include_main_head')); ?>

    <script type="text/javascript" src="<?php echo base_url() . APPFOLDER; ?>/views/<?php echo $current_skin; ?>/js/main.js"></script>
</head>

<body>

<noscript>
    <div class="system_warning"><?php echo lang_output('text_javascript_off', ''); ?></div>
</noscript>

<ul id="skip-ahead">
    <li><a href="#content">Skip to main content.</a></li>
    <li><a href="#navigation">Skip to navigation.</a></li>
    <?php if (Auth::is_logged_in()): ?>
    <li><a href="#control-panel">Skip to control panel.</a></li>
    <?php endif; ?>
</ul>

<header>
    <div>
        <section id="content-header">
            <?php include('control-panel.php'); ?>
        </section>
        
        <nav id="navigation"><?php echo $nav_main; ?></nav>
    </div>
</header>

<section id="dashboard" class="hidden"></section>

</html>
