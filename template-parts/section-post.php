<?php 
$count = esc_attr(get_option('recent_posts'));   
$args = array(
	'numberposts' => $count,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true );

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
?>

<section id="post">
	<div class="section-inner">
		<div class="wrapper">
			<div class="section-title">
				<h2>Last News</h2>
				<div class="seperator size-small"><span></span></div>
				<h4 class="subtitle">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h4>
			</div>
			<div class="wrap-post">
				<?php foreach( $recent_posts as $recent ){ ?>
					<?php 
					$thumbnail = get_the_post_thumbnail($recent['ID'], 'medium');
					$trimwords = wp_trim_words( $recent["post_content"], '50', '...' );
					?>
					<div class="post-item">
						<?php echo $thumbnail; ?>
						<h3 class="title-post"><?php echo $recent["post_title"]; ?></h3>
						<div class="seperator size-small"><span></span></div>
						<p class="text-post"><?php echo $trimwords ?></p>
						<div class="seperator size-small"><span></span></div>
						<div class="more-post">
							<a href="<?php echo get_post_permalink($recent['ID']); ?>">MORE</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	