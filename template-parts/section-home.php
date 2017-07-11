<?php

?>

<section id="section-home">
    <div class="section-inner">
        <ul class="bxslider">
            <?php for($i = 1; $i <= 3; $i++): ?>
            <?php
                $slide = esc_attr(get_option('slide-' . $i));
                $title = esc_attr(get_option('slide-title-' . $i));
                $desc = esc_attr(get_option('slide-desc-' . $i));
                $action =esc_attr(get_option('slide-action-' . $i));
            ?>
            <li class="slide-<?php echo $i; ?>" style="background: url('<?php print $slide; ?>') no-repeat">
                <div class="text-slider">
                    <h1 class="wow slideInLeft" data-wow-iteration="1"><?php echo $title; ?></h1>
                    <p class="wow bounceInUp" data-wow-delay=".5s" data-wow-iteration="1"><?php echo $desc; ?></p>
                    <a href="<?php echo $action; ?>" class="wow bounceInDown" data-wow-delay="1s" data-wow-iteration="1">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                </div>
            </li>
            <?php endfor; ?>
        </ul>
    </div>
</section>