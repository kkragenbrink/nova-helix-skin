<?php

$path = explode('/', dirname(__FILE__));
$pcount = count($path);

// Windows hack.
if ($pcount <= 1) {
    $path = explode('\\', dirname(__FILE__));
    $pcount = count($path);
}

$skin_loc = $pcount - 1;
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
    <section id="content-header">
        <section id="control-panel">
        <?php if (true || !Auth::is_logged_in()): ?>
            <?php echo form_open('login/check_login'); ?>
            <span class="form-element input">
                <label for="cp-signin-email"><?php echo ucwords(lang('labels_email_address')); ?></label>
                <input type="email" name="email" id="cp-signin-email" />
            </span>
            <span class="form-element input">
                <label for="cp-signin-password"><?php echo ucwords(lang('labels_password')); ?></label>
                <input type="password" name="password" id="cp-signin-password" />
            </span>
            <span class="form-element checkbox">
                <input type="checkbox" name="remember" id="cp-signin-remember" value="yes" />
                <label for="cp-signin-remember"><?php echo ucfirst(lang('actions_remember').' '.lang('labels_me')); ?></label>
            </span>
            <span class="form-element">
                <?php echo anchor('login/reset_password', lang('login_forgot')); ?>
            </span>
            <span class="form-element button">
                <?php echo form_button($login_button); ?>
            </span>
        <?php endif; ?>
        </section>
    </section>
</header>

<section id="dashboard" class="hidden"></section>

</html>
