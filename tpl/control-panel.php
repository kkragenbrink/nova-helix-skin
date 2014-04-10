<?php $this->load->helper('panel'); ?><section id="control-panel">
<?php if (Auth::is_logged_in()): ?>
    <span class="action"><?php echo panel_inbox(true, true, false, '(x)', '<span class="icon-16 mail"></span>'); ?></span>
    <span class="action"><?php echo panel_writing(true, true, false, '(x)', '<span class="icon-16 edit"></span>'); ?></span>
    <span class="action"><?php echo panel_dashboard(false, '<span class="icon-16 dash"></span>'); ?></span>
    
    <a href="<?php echo site_url('login/logout'); ?>" class="logout"><?php echo ucfirst(lang('actions_logout')); ?></a>
<?php else: ?>
    <?php echo form_open('login/check_login'); ?>
    <section id="cp-signin-details">
        <span class="form-element input">
            <label for="cp-signin-email"><?php echo ucwords(lang('labels_email_address')); ?></label>
            <input type="email" name="email" id="cp-signin-email" />
        </span>
        <span class="form-element input">
            <label for="cp-signin-password"><?php echo ucwords(lang('labels_password')); ?></label>
            <input type="password" name="password" id="cp-signin-password" />
        </span>
        <span class="form-element button">
            <?php echo form_button($login_button); ?>
        </span>
    </section>
    <section id="cp-signin-tools">
        <span class="form-element checkbox">
            <input type="checkbox" name="remember" id="cp-signin-remember" value="yes" />
            <label for="cp-signin-remember"><?php echo ucfirst(lang('actions_remember').' '.lang('labels_me')); ?></label>
        </span>
        <span class="form-element">
            <?php echo anchor('login/reset_password', lang('login_forgot')); ?>
        </span>
    </section>
    <?php echo form_close(); ?>
<?php endif; ?>
</section>