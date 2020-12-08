<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.1.0
 *
 * @package    Uka_Share_Buttons
 * @subpackage Uka_Share_Buttons/admin
 */

class Uka_Share_Buttons_Admin {

	/**
	 * Create settings page submenu.
	 *
	 * @since    1.0.0
	 */
	public function create_settings_submenu() {

		add_options_page(
			esc_html__( 'Share Buttons Settings', 'uka-share-buttons' ),
			esc_html__( 'Share Buttons', 'uka-share-buttons' ),
			'manage_options',
			'share-buttons',
			array( $this, 'settings_page' )
		);

		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register settings for settings page.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		register_setting( 'uka_share_buttons_settings_group', 'uka_share_buttons_options', 'sanitize_options' );

		// Add main settings section
		add_settings_section(
			'main_settings',
			null,
			null,
			'share-buttons'
		);

		add_settings_field(
			'share_text',
			esc_html__( 'Share Text', 'uka-share-buttons' ),
			array( $this, 'share_text_field'),
			'share-buttons',
			'main_settings',
			array(
				'label_for' => 'share_text',
			)
		);

		add_settings_field(
			'social_services',
			esc_html__( 'Social Services', 'uka-share-buttons' ),
			array( $this, 'social_services_field'),
			'share-buttons',
			'main_settings',
			array(
				'label_for' => 'social_services',
			)
		);

	}

	/**
	 * Sanitize_options for settings page.
	 *
	 * @since    1.1.0
	 */
	public function sanitize_options( $input ) {

		$input[ 'share_text' ] = sanitize_text_field( $input[ 'share_text' ] );
		$input[ 'facebook' ] = sanitize_text_field( $input[ 'facebook' ] );
		$input[ 'twitter' ] = sanitize_text_field( $input[ 'twitter' ] );
		$input[ 'reddit' ] = sanitize_text_field( $input[ 'reddit' ] );
		$input[ 'linkedin' ] = sanitize_text_field( $input[ 'linkedin' ] );
		$input[ 'pinterest' ] = sanitize_text_field( $input[ 'pinterest' ] );
		$input[ 'telegram' ] = sanitize_text_field( $input[ 'telegram' ] );
		$input[ 'vk' ] = sanitize_text_field( $input[ 'vk' ] );
		$input[ 'whatsapp' ] = sanitize_text_field( $input[ 'whatsapp' ] );
		$input[ 'skype' ] = sanitize_text_field( $input[ 'skype' ] );
		$input[ 'google' ] = sanitize_text_field( $input[ 'google' ] );
		$input[ 'pocket' ] = sanitize_text_field( $input[ 'pocket' ] );
		$input[ 'ok' ] = sanitize_text_field( $input[ 'ok' ] );
		$input[ 'evernote' ] = sanitize_text_field( $input[ 'evernote' ] );
		$input[ 'tumblr' ] = sanitize_text_field( $input[ 'tumblr' ] );
		$input[ 'blogger' ] = sanitize_text_field( $input[ 'blogger' ] );
		$input[ 'livejournal' ] = sanitize_text_field( $input[ 'livejournal' ] );
		$input[ 'email' ] = sanitize_text_field( $input[ 'email' ] );

		return $input;

	}

	/**
	 * Output the social services settings field.
	 *
	 * @since    1.1.0
	 */
	public function social_services_field() {

		$options = get_option( 'uka_share_buttons_options' );

		$facebook    = $options[ 'services-settings' ][ 'facebook' ];
		$twitter     = $options[ 'services-settings' ][ 'twitter' ];
		$reddit      = $options[ 'services-settings' ][ 'reddit' ];
		$linkedin    = $options[ 'services-settings' ][ 'linkedin' ];
		$pinterest   = $options[ 'services-settings' ][ 'pinterest' ];
		$telegram    = $options[ 'services-settings' ][ 'telegram' ];
		$vk          = $options[ 'services-settings' ][ 'vk' ];
		$whatsapp    = $options[ 'services-settings' ][ 'whatsapp' ];
		$skype       = $options[ 'services-settings' ][ 'skype' ];
		$google      = $options[ 'services-settings' ][ 'google' ];
		$pocket      = $options[ 'services-settings' ][ 'pocket' ];
		$ok          = $options[ 'services-settings' ][ 'ok' ];
		$evernote    = $options[ 'services-settings' ][ 'evernote' ];
		$tumblr      = $options[ 'services-settings' ][ 'tumblr' ];
		$blogger     = $options[ 'services-settings' ][ 'blogger' ];
		$livejournal = $options[ 'services-settings' ][ 'livejournal' ];
		$email       = $options[ 'services-settings' ][ 'email' ];

		$html  = '<fieldset>';
		$html  .= sprintf( '<legend class="screen-reader-text"><span>%1$s</span></legend>', esc_html__( 'Share Buttons Settings', 'uka-share-buttons' ) );

		$html  .= '<label for="facebook">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][facebook]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="facebook" name="uka_share_buttons_options[services-settings][facebook]" value="on" %1$s />', checked( $facebook, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Facebook', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="twitter">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][twitter]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="twitter" name="uka_share_buttons_options[services-settings][twitter]" value="on" %1$s />', checked( $twitter, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Twitter', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="reddit">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][reddit]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="reddit" name="uka_share_buttons_options[services-settings][reddit]" value="on" %1$s />', checked( $reddit, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Reddit', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="linkedin">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][linkedin]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="linkedin" name="uka_share_buttons_options[services-settings][linkedin]" value="on" %1$s />', checked( $linkedin, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Linkedin', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="pinterest">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][pinterest]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="pinterest" name="uka_share_buttons_options[services-settings][pinterest]" value="on" %1$s />', checked( $pinterest, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Pinterest', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="telegram">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][telegram]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="telegram" name="uka_share_buttons_options[services-settings][telegram]" value="on" %1$s />', checked( $telegram, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Telegram', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="vk">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][vk]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="vk" name="uka_share_buttons_options[services-settings][vk]" value="on" %1$s />', checked( $vk, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'VK', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="whatsapp">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][whatsapp]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="whatsapp" name="uka_share_buttons_options[services-settings][whatsapp]" value="on" %1$s />', checked( $whatsapp, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'WhatsApp', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="skype">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][skype]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="skype" name="uka_share_buttons_options[services-settings][skype]" value="on" %1$s />', checked( $skype, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Skype', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="google">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][google]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="google" name="uka_share_buttons_options[services-settings][google]" value="on" %1$s />', checked( $google, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Google Bookmarks', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="pocket">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][pocket]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="pocket" name="uka_share_buttons_options[services-settings][pocket]" value="on" %1$s />', checked( $pocket, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Pocket', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="ok">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][ok]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="ok" name="uka_share_buttons_options[services-settings][ok]" value="on" %1$s />', checked( $ok, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Odnoklassniki', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="evernote">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][evernote]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="evernote" name="uka_share_buttons_options[services-settings][evernote]" value="on" %1$s />', checked( $evernote, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Evernote', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="tumblr">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][tumblr]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="tumblr" name="uka_share_buttons_options[services-settings][tumblr]" value="on" %1$s />', checked( $tumblr, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Tumblr', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="blogger">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][blogger]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="blogger" name="uka_share_buttons_options[services-settings][blogger]" value="on" %1$s />', checked( $blogger, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Blogger', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="livejournal">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][livejournal]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="livejournal" name="uka_share_buttons_options[services-settings][livejournal]" value="on" %1$s />', checked( $livejournal, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'LiveJournal', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '<label for="email">';
		$html  .= '<input type="hidden" name="uka_share_buttons_options[services-settings][email]" value="off" />';
		$html  .= sprintf( '<input type="checkbox" class="checkbox" id="email" name="uka_share_buttons_options[services-settings][email]" value="on" %1$s />', checked( $email, 'on', false ) );
		$html  .= sprintf( '%1$s</label>', esc_html__( 'Email', 'uka-share-buttons' ) );
		$html  .= '<br />';

		$html  .= '</fieldset>';

		echo $html;

	}

	/**
	 * Output the share text settings field.
	 *
	 * @since    1.0.0
	 */
	public function share_text_field() {

		$options = get_option( 'uka_share_buttons_options' );
		?>
		<input name="uka_share_buttons_options[share-text]" type="text" id="share_text" value="<?php echo esc_attr( $options[ 'share-text' ] ) ?>">
		<?php

	}

	/**
	 * Create settings page.
	 *
	 * @since    1.0.0
	 */
	public function settings_page() {

		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Share Buttons Settings', 'uka-share-buttons' ); ?></h1>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'uka_share_buttons_settings_group' );
				do_settings_sections( 'share-buttons' );
				submit_button();
				?>
			</form>
		</div>
		<?php

	}

}
