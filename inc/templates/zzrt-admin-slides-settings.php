<div class="wrap">
    <h1>Header Slider Settings</h1>
    <h3><?php settings_errors();?></h3>
    <form method="post" action="options.php">
        <section class="slider-settings">
            <?php settings_fields('zzrt-slides-group'); ?>
            <?php do_settings_sections('zzrt-slides'); ?>
        </section>
        <?php submit_button(); ?>
    </form>
</div>