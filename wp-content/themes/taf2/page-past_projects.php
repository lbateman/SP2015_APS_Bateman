<?php
/*
Template Name: PastProjects
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<h1><?php the_title(); ?></h1>
					<?php

						//set up variable for year
						$currentyear = date("Y") ;

						// set up loop to cycle through years
						while ($currentyear >= 2004) : // 2004 was the first year of productions
						
							// print year name						
							echo "<h2>$currentyear</h2>" ;

							// set up new query
							$thisyear = new WP_Query( array ( 
								'post_type' => 'show_post',
								'category_name' => 'past-shows', 
								'show_year' => $currentyear,
							) ) ;

							// get posts that match query
							if( $thisyear->have_posts() ):
		    					while ( $thisyear->have_posts() ) :
		    						$thisyear->the_post(); ?>
		    						<a href="<?php the_permalink(); ?>"><img class="pastprojects" src="<?php the_field('past_projects_logo'); ?>" alt="<?php the_title(); ?> Logo"</a>
							        <p><?php the_title(); ?></p>
						        	<p><?php the_field('performance_dates'); ?></p>
						        	<img src="http://localhost:1337/taf2/wp-content/uploads/2015/08/pdf-icon_sm.jpg" alt="PDF File"><a href="<?php the_field('program_file'); ?>"><strong>Program</strong></a>
		    					<?php endwhile;
							endif;

							// reset query and decrement year
							wp_reset_postdata() ;
							--$currentyear ;
						endwhile ;

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
