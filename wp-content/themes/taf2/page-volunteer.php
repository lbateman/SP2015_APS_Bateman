<?php
/*
Template Name: Volunteer
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">

				<?php if ( have_posts () ) : 
					while ( have_posts () ) : 
						the_post () ; ?>
						<h1><?php the_title () ; ?></h1>
						<?php the_content () ;
					endwhile ;
				endif ; ?>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
