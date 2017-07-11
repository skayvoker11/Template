<div class="wrap">
    <h1>Our Team Info</h1>
    <h3><?php settings_errors();?></h3>
    <form method="post" action="options.php">
        <section class="team-info-settings">
            <?php settings_fields('zzrt-team-info-group'); ?>
            <?php do_settings_sections('zzrt-team-info'); ?>
        </section>
        <?php submit_button(); ?>
    </form>
</div>