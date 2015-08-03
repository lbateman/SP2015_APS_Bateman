<?php
/**
 * The Template for displaying all single posts.
 *
 * @package taf
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<section class="show-info">
					<a href="<?php the_permalink() ?>"><img class="shows" src="<?php the_field('show_logo'); ?>" alt="<?php the_title(); ?>"></a>
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field('authors'); ?></h2>
					<h3><?php the_field('directors'); ?></h3>
					<p class="licensing"><?php the_field('text_for_licensing_company'); ?></p>
					<div class="wide"><?php the_field('description_of_show'); ?></div>
				</section> <!-- End of show-info -->

				<section class="performance-info">
					<h2>Performance Schedule</h2>
					<table>
						<?php if( have_rows('performance_schedule') ) :
							while( have_rows('performance_schedule') ) :
								the_row(); ?>
								<tr>
									<section class="schedule">
										<td><?php the_sub_field('perf_day'); ?></td>
										<td><?php the_sub_field('perf_date'); ?></td>
										<td><?php the_sub_field('perf_time'); ?></td>
									</section> <!-- End of schedule -->
								</tr>
							<?php endwhile; 
						endif; ?>
					</table>
				</section><!-- End of performance-info -->
				
				<section class="location-info">
					<h2>Location</h2>
					<a href="<?php the_field('venue_url'); ?>"><?php the_field('venue_name'); ?></a>
					<p><?php the_field('venue_address'); ?></p>
					<?php 
						$location = get_field('location');
						if( !empty($location) ): ?>
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
						<?php endif; ?>
				</section><!-- End of location-info -->
				
				<section class="ticket-info">
					<h2>Ticket Information</h2>
					<?php if( have_rows( 'ticket_information' ) ) :
						while( have_rows( 'ticket_information' ) ) : 
							the_row(); ?>
							<section class="ticket-service">
								<img class="ticket-logo" src="<?php the_sub_field('ticket_service_logo'); ?>" alt="Ticket service logo">
								<?php the_sub_field('ticket_service_description'); ?>
							</section> <!-- End of ticket-service -->
						<?php endwhile; 
					else : ?>
						<p>Please check back soon for ticket information.</p>
					<?php endif; ?>
				</section><!-- End of ticket-info -->
				
				<section class="director-info">
					<h2>The Director</h2>
					<div class="wide"><?php the_field('description_of_director'); ?></div>
				</section><!-- End of director-info -->
				
				<section class="cast-info">
					<h2>Cast</h2>
					<table>
						<?php while (have_rows('cast_list')): the_row(); ?>
							<tr>
								<section class="actors">
									<td><?php the_sub_field('characters_name'); ?></td>
									<td><?php the_sub_field('actors_name'); ?></td>
								</section> <!-- End of actors -->
							</tr>
						<?php endwhile; ?>
					</table>
				</section><!-- End of cast-info -->
				
				<section class="crew-info">
					<h2>Production Team</h2>
					<table>
						<?php while (have_rows('production_team')): the_row(); ?>
							<tr>
								<section class="crew">
									<td><?php the_sub_field('production_role'); ?></td>
									<td><?php the_sub_field('crewmember_name'); ?></td>
								</section> <!-- End of crew -->
							</tr>
						<?php endwhile; ?>
					</table>
				</section><!-- crew-info -->
			</section> <!-- main-content -->
				
			<!-- Sidebar (right column) -->
			<section class="custom-sidebar">
				<section class="sidebar-icons clear">
					<section class="social-media">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/facebook.png" alt="Facebook icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/twitter.png" alt="Twitter icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/youtube.png" alt="YouTube icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/googleplus.png" alt="Google+ icon">
					</section>
					<section class="awards">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/phoenix-best2010-ribbon.png" alt="Boston Phoenix Best of 2010 ribbon icon">
					</section>
				</section>
				
				<section class="sidebar-buttons clear">
					<button type="button">Buy Tickets</button>
					<button type="button">Subscribe</button>
					<button type="button">Donate</button>
				</section>
				
				<section class="about-us">
					<h1>About Us</h1>
					<p>Theatre@First is an all-volunteer community theatre based in Somerville, MA. Founded in 2003, we fill a vital niche in the vibrant Davis Square arts scene. We draw upon the talents and support of individuals and organizations throughout the community to provide opportunities for our participants and audiences to experience quality live theatre in a variety of local venues. For more about our recent history, see our In the Press page.</p>
				</section>
			</section>

			<!-- cast photo gallery -->
			<section class="cast-photo-gallery clear">
				<?php $images = get_field('cast_photos');
					if ($images): ?>
						<section class="flexslider">
							<ul class="slides clear">
								<?php foreach ($images as $image): ?>
									<li data-thumb="<?php echo $image['sizes']['thumbnail']; ?>">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									</li>
								<?php endforeach; ?>
							</ul>
						</section> <!-- End of flexslider -->
					<?php endif; ?>
			</section> <!-- cast-photo-gallery -->
				
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>