<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ePortfolio
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			$eportfolio_copyright_text = eportfolio_get_option('copyright_text');
			if (!empty ($eportfolio_copyright_text)) {
			    echo wp_kses_post($eportfolio_copyright_text);
			}
			?>
        	<?php if ((eportfolio_get_option('enable_copyright_credit')) == 1) { ?>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'eportfolio' ), 'ePortfolio', '<a href="https://www.themeinwp.com/">ThemeInWP</a>' );
					?>
			<?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
