<?php include('tpl/header.php'); ?>
<section id="viewpane">
    <nav id="subnavigation">
    	<?php echo $nav_sub;?>
    </nav>
    
    <main>
        <?php echo $flash_message;?>
        <?php echo $content;?>
        <?php echo $ajax;?>
        <div class="clearfix"></div>
    </main>
    
    <?php include('tpl/footer.php'); ?>
</section>
</body>

</html>