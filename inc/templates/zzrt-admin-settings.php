<div class="wrap">
    <h1>Settings</h1>
    <h3><?php settings_errors();?></h3>
    <form method="post" action="options.php">
        <section class="about-us-settings">
            <?php settings_fields('zzrt-settings-group'); ?>
            <?php do_settings_sections('zzrt_settings'); ?>
        </section>
        <?php submit_button(); ?>
    </form>
</div>