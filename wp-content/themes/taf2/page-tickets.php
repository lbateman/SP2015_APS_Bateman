<?php
/*
Template Name: Tickets
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<h1>Tickets</h1>

					<?php if ('show_type' = "Main Stage Show") : ?>
						<a href="<?php get_field('show_url') ?>"><img src="<?php get_field('show_logo') ?>" alt="<?php the_field('show_name') ?>"></a>
						<p><?php the_field('show_description')?></p>
						<p><a href="<?php get_field('show_url') ?>"><strong>Performances:</strong></a> <?php get_field('performance_dates') ?></p>

						<h2>Ticket Prices:</h2>
							<?php if( have_rows('ticket_prices') ):
								while ( have_rows('ticket_prices') ) :
									the_row() ;
									the_sub_field('ticket_type') ;
									the sub_field('ticket_price') ;
								endwhile; 
							endif; ?>
						<p>Group discounts are available for 8 people or more &#8211; email <a href="mailto:groups@theatreatfirst.org">groups@theatreatfirst.org</a></p>

						<h2>Buy Tickets in Advance at <?php the_field('ticket_service_name') ?></h2>
						<a href="<?php get_field('ticket_service_url') ?>"><img src="<?php the_field('ticket_service_name') ?>"></a>
					
					<?php else if ('show_type' = "Bare Bones") : ?>
						<a href="<?php get_field('show_url') ?>"><img src="<?php get_field('show_logo') ?>" alt="<?php the_field('show_name') ?>"></a>
							<p><strong>ONE NIGHT ONLY!</strong> <?php get_field('performance_dates') ?></p>
							<p><em><a href="<?php get_field('show_url') ?>">An Evening with Death</a></em> will be presented at <?php the_field('venue_name') ?>, <?php the_field('venue_street') ?> <?php the_field('venue_city') ?></p>
							<p><strong>Suggested Donation $5</strong> - General Admission - No reservations required</p>
					<?php else : ?>
							<p>There are no current shows for which tickets are available. Please check <a href="http://www.theatreatfirst.org">our website</a> or sign up for our <a href="/mailinglist.shtml">mailing list</a> for updates.</p>
						<? endif;
					?>
					
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
