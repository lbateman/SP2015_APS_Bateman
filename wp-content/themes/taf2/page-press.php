<?php
/*
Template Name: Press
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<h1>Theatre@First in the Press</h1>

					<?php

						// vars
						$articleYears = array() ; // an array to hold all article_years in the database

						// populate the array with the article_year values from each article record
						if( have_rows('article') ) :
							while ( have_rows ('article') ) : the_row() ;
								$articleYears[] = get_sub_field ('article_year') ;
							endwhile ;
						endif ;

						// eliminate duplicate values from the articleYears array
						$cleanYears = array_unique ($articleYears) ;

						// order the values in the new cleanYears array
						rsort ($cleanYears) ;

						// for each value in the cleanYears array, ...
						foreach ($cleanYears as $year) : ?>

							<!-- print the year as a header... -->
							<h2><?php echo "$year" ?></h2>

							<!-- -->
							<?php $args = array(
								'key' => 'article_%_article_year',
								'value' => $year,
							) ;
							$my_query = new WP_Query($args); ?>

							<!-- ...and run The Loop -->
							<?php if ( $my_query->have_rows('article') ) :
								while ( $my_query->have_rows('article') ) : $my_query->the_row() ;?>
						    			<h3><?php the_sub_field('show_name'); ?></h3>
						    			<p><em><strong><?php the_sub_field('publication_name'); ?></em></strong>
						    				<?php the_sub_field('publication_date'); ?><br>
					    					<?php the_sub_field('article_title'); ?><br>
					    					<?php the_sub_field('byline'); ?></p>
					    				<blockquote><?php the_sub_field('synopsis'); ?> <a href="<?php the_field('publication_link'); ?>">(Read more)</a></blockquote>
					    			<?php // endif;
				    			endwhile;
							endif;
						endforeach;

						//reset the query just in case
						wp_reset_query() ;
					?>


					<!-- The simpler version of the code, which outputs stuff, but not in the right format -->
					<?php
						if( have_rows('article') ): ?>
	    					<?php while ( have_rows('article') ) : the_row(); ?>
								<h2><?php echo( the_sub_field('article_year') ) ; ?></h2>
			    				<h3><?php the_sub_field('show_name'); ?></h3>
			    				<p><em><strong><?php the_sub_field('publication_name'); ?></em></strong>
			    					<?php the_sub_field('publication_date'); ?><br>
		    						<?php the_sub_field('article_title'); ?><br>
		    						<?php the_sub_field('byline'); ?></p>
		    					<blockquote><?php the_sub_field('synopsis'); ?> <a href="<?php the_field('publication_link'); ?>">(Read more)</a></blockquote>
		    				<?php endwhile;
						endif;
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
