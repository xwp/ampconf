<?php
/**
 * AMP News social share bar.
 *
 * @package AMPNews
 */

// @todo Integrate with Jetpack sharing extension.
?>

<div class="social-share">
	<span class="social-share__title"><?php esc_html_e( 'Share', 'ampnews' ); ?></span>
	<div class="social-share__buttons">
		<amp-social-share type="email" width="32" height="32"></amp-social-share>
		<amp-social-share type="facebook" data-param-app_id="<?php echo esc_attr( apply_filters( 'ampnews-facebook-app-id', '' ) ); ?>" width="32" height="32"></amp-social-share>
		<amp-social-share type="linkedin" width="32" height="32"></amp-social-share>
		<amp-social-share type="pinterest" width="32" height="32"></amp-social-share>
		<amp-social-share type="sms" width="32" height="32"></amp-social-share>
		<amp-social-share type="twitter" width="32" height="32"></amp-social-share>
	</div>
</div>
