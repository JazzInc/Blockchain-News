<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			/**
		     * news_vibrant_related_posts hook
		     *
		     * @hooked - news_vibrant_related_posts_start - 5
		     * @hooked - news_vibrant_related_posts_section - 10
		     * @hooked - news_vibrant_related_posts_end - 15
		     *
		     * @since 1.0.0
		     */
			if ( ! class_exists( 'WooCommerce' ) ) {
				do_action( 'news_vibrant_related_posts' );
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
news_vibrant_get_sidebar();
get_footer();