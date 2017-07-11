<div class="wrap">
    <h1>Services</h1>
    <h3><?php settings_errors();?></h3>
    <form method="post" action="options.php">
        <section class="services-settings">
            <?php settings_fields('zzrt-services-group'); ?>
            <?php do_settings_sections('zzrt-services'); ?>
        </section>
        <?php submit_button(); ?>
    </form>
</div>