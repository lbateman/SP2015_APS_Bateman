<?php
/*
Template Name: MailingList
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

				<form name="MailList" method="POST" action="http://formmail.dreamhost.com/cgi-bin/formmail.cgi">
					<p class="caption">
						<input type="hidden" name="recipient" value="list@theatreatfirst.org">
						<input type="hidden" name="subject" value="Please add me to the Theatre@First mailing list">
						<input type=hidden name="required" value="FirstName,LastName,E-mail"></p>

					<table border="0" align="center" cellpadding="0" cellspacing="0">
						<!--DWLayoutTable-->
						<tr>
							<td align="right" valign="top" nowrap>First Name:&nbsp;&nbsp;</td>
							<td align="left"><input name="FirstName" type="text" id="FirstName"></td>
						</tr>
						<tr>
							<td align="right" nowrap>Last Name:&nbsp;&nbsp;</td>
							<td align="left"><input name="LastName" type="text" id="LastName"></td>
						</tr>
						<tr>
							<td align="right" nowrap>E-mail:&nbsp;&nbsp;</td>
							<td align="left"><input name="E-mail" type="text" id="E-mail" size="40"></td>
						</tr>
						<tr>
							<td colspan="2" align="center" nowrap><br>
								<input type="submit" value="Submit"> &nbsp; <input type="reset" value="Clear"></td>
						</tr>
					</table>
				</form>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
