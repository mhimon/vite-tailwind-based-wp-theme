<?php
/**
 * Single
 *
 * Author: Mahbub Hasan Imon <mhimon.dev@gmail.com>
 * Author URI: https://mhimon.dev / https://ultradevs.com
 *
 * @package VTBT
 */

get_header();
?>

<main class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<h1><?php the_title(); ?></h1>
					<?php
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
</main>

<?php
get_footer();
?>
