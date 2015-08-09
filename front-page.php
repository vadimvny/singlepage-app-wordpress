<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Simone
 */

get_header(); ?>

	<div id="primary" class="content-area-lander-page">
		<main id="main" class="site-main" role="main">
			<section id="call-to-action">
				<div class="indent">	
					<div class="align-right">
						<?php 
							$query = new WP_query( 'pagename=doctors-appointment' );
								if ( $query->have_posts() ) {
									while( $query->have_posts() ) {
										$query->the_post(); 
										echo '<div class="entry-content">';
										the_content();
										echo '</div>';
									}
								}
						wp_reset_postdata();
						?>
					</div>
				</div>	
			</section>
			<section id="testimonials">
				<div class="indent">
				<?php 
					$args = array(
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'category_name' => 'testimonials' //pointing to slug in our case its testimonials
					);	

					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
						echo '<ul class="testimonials">';
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<li class="clear">';
							echo '<figure class="testimonial-thumb">';
							the_post_thumbnail('testimonial-mug');
							echo '</figure>';
							echo '<aside class="testimonial-text">';
							echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
							echo '<div class="testimonial-excerpt">';
							the_content('');
							echo '</div>';
							echo '</aside>';
							echo '</li>';
						}
						echo '</ul>';
					}

					/* Restore original Post Data */
					wp_reset_postdata();
				?> 
				</div>	
			</section>
			<section id="services">
				<div class="indent">
					<h2 class="section-title">Services</h2>
					<ul>
						<li>Item1</li>
						<li>Item2</li>
						<li>Item3</li>
					</ul>
				</div>	
			</section>
			<section id="meet">
				<div class="indent">
					<h2 class="section-title">Meet the Doctor</h2>
						<div class="front-left">
							Left Content
						</div>
						<div class="front-right">
							Right Content
						</div>
				</div>	
			</section>
			<section id="contact">
				<div class="indent">
					<h2 class="section-title">Contact Us</h2>
				</div>	
			</section>	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>