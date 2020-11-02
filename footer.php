	</div> <!-- #content -->

	<footer class="footer" role="contentinfo">

		<?php
		$part1 = '<a href="https://www.alunizar.co" target="_blank" rel="nofollow noopener">';
		$part2 = '</a>';
		?>

		<div class="footer__col footer__col--exhibition">

			<?php get_template_part( 'includes/current-exhibition' ); ?>

		</div>

		<div class="footer__col footer__col--credits">

			<p id="footer__info">
				&copy; <?php echo date("Y"); ?> <a href="<?php esc_url( bloginfo( 'url' ) ); ?>"><?php esc_html__( bloginfo( 'mc2020' ) ); ?></a>.<br>
				<?php _e('All rights reserved.', 'mc2020'); ?><br>
				<?php printf(__('By %1$sAlunizar%2$s.', 'mc2020'), $part1, $part2);?>
			</p>

			<p class="footer__legal-links">
				<a href="<?php echo get_privacy_policy_url(); ?>"><?php _e( 'Privacy Policy', 'mc2020' ); ?></a><span> &ndash; </span><a href="/terms-of-service/"><?php _e( 'Terms of Service', 'mc2020' ); ?></a>
			</p>

		</div>

		<div class="footer__col footer__col--contact">

			<a class="footer__email" href="mailto:<?php the_field( 'contact_email', 1754 ); ?>"><?php the_field( 'contact_email_display', 1754 ); ?></a>

			<?php get_template_part( 'includes/social-links' ); ?>

		</div>

	</footer>

</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
