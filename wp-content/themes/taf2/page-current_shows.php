<?php
/*
Template Name: CurrentShows
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<h1>Current Projects</h1>
				<?php
					// Set up a custom query that pulls show posts in the current-shows category
					$the_query = new WP_Query( array(
						'post_type' => 'show_post',
						'category_name' => 'current-shows', 
						'posts_per_page' => 10
					) );

					// Use the custom query in the Loop
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : 
							$the_query->the_post() ; ?>
							<a href="<?php the_permalink() ?>"><img class="shows" src="<?php the_field('show_logo'); ?>" alt="<?php the_title(); ?>"></a>
							<h2><?php the_title(); ?></h2>
							<p><a href="<?php the_permalink() ?>" class="text-link"><strong>Performances:</strong></a> <?php the_field('performance_dates'); ?></p>
						<? endwhile;
					else :
						    echo "<p>Theatre@First is not currently producing any shows. For announcements about upcoming shows, join our <a href=\"http://www.theatreatfirst.org/mailinglist.shtml\">mailing list</a> or email <a href=\"mailto:taf@theatreatfirst.org\">taf@theatreatfirst.org</a>.</p>" ;
					endif;

					//Reset the query to the default
					wp_reset_postdata() ;
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
