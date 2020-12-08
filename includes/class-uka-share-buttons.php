<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.1.0
 *
 * @package    Uka_Share_Buttons
 * @subpackage Uka_Share_Buttons/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class Uka_Share_Buttons {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Uka_Share_Buttons_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		if ( defined( 'UKA_SHARE_BUTTONS_VERSION' ) ) {
			$this->version = UKA_SHARE_BUTTONS_VERSION;
		} else {
			$this->version = '1.1.0';
		}
		$this->plugin_name = 'uka-share-buttons';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Uka_Share_Buttons_Loader. Orchestrates the hooks of the plugin.
	 * - Uka_Share_Buttons_i18n. Defines internationalization functionality.
	 * - Uka_Share_Buttons_Admin. Defines all hooks for the admin area.
	 * - Uka_Share_Buttons_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uka-share-buttons-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uka-share-buttons-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-uka-share-buttons-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-uka-share-buttons-public.php';

		$this->loader = new Uka_Share_Buttons_Loader();

	}

	/**
	 * Returns all the supported services.
	 *
	 * %1$s - url
	 * %2$s - title
	 * %3$s - image
	 *
	 * @since     1.1.0
	 * @return    string    Supported services.
	 */
	public static function get_services() {

		$services = array(
			'facebook' => array(
				'id'    => 'facebook',
				'title' => esc_html__( 'Facebook', 'uka-share-buttons' ),
				'url'   => 'https://www.facebook.com/sharer.php?u=%1$s',
			),
			'twitter' => array(
				'id'    => 'twitter',
				'title' => esc_html__( 'Twitter' ),
				'url'   => 'https://twitter.com/intent/tweet?url=%1$s&text=%2$s',
			),
			'reddit' => array(
				'id'    => 'reddit',
				'title' => esc_html__( 'Reddit' ),
				'url'   => 'https://reddit.com/submit?url=%1$s&title=%2$s',
			),
			'linkedin' => array(
				'id'    => 'linkedin',
				'title' => esc_html__( 'LinkedIn' ),
				'url'   => 'https://www.linkedin.com/sharing/share-offsite/?url=%1$s',
			),
			'pinterest' => array(
				'id'    => 'pinterest',
				'title' => esc_html__( 'Pinterest' ),
				'url'   => 'http://pinterest.com/pin/create/button/?url=%1$s',
			),
			'telegram' => array(
				'id'    => 'telegram',
				'title' => esc_html__( 'Telegram' ),
				'url'   => 'https://t.me/share/url?url=%1$s&text=%2$s',
			),
			'vk' => array(
				'id'    => 'vk',
				'title' => esc_html__( 'VK' ),
				'url'   => 'http://vk.com/share.php?url=%1$s&title=%2$s',
			),
			'whatsapp' => array(
				'id'    => 'whatsapp',
				'title' => esc_html__( 'WhatsApp' ),
				'url'   => 'https://api.whatsapp.com/send?text=%2$s %1$s',
			),
			'skype' => array(
				'id'    => 'skype',
				'title' => esc_html__( 'Skype' ),
				'url'   => 'https://web.skype.com/share?url=%1$s&text=%2$s',
			),
			'google' => array(
				'id'    => 'google',
				'title' => esc_html__( 'Google Bookmarks' ),
				'url'   => 'https://www.google.com/bookmarks/mark?op=edit&bkmk=%1$s&title=%2$s',
			),
			'pocket' => array(
				'id'    => 'pocket',
				'title' => esc_html__( 'Pocket' ),
				'url'   => 'https://getpocket.com/edit?url=%1$s',
			),
			'ok' => array(
				'id'    => 'ok',
				'title' => esc_html__( 'Odnoklassniki' ),
				'url'   => 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl=%1$s',
			),
			'evernote' => array(
				'id'    => 'evernote',
				'title' => esc_html__( 'Evernote' ),
				'url'   => 'https://www.evernote.com/clip.action?url=%1$s&title=%2$s',
			),
			'tumblr' => array(
				'id'    => 'tumblr',
				'title' => esc_html__( 'Tumblr' ),
				'url'   => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=%1$s&title=%2$s',
			),
			'blogger' => array(
				'id'    => 'blogger',
				'title' => esc_html__( 'Blogger' ),
				'url'   => 'https://www.blogger.com/blog-this.g?u=%1$s&n=%2$s',
			),
			'livejournal' => array(
				'id'    => 'livejournal',
				'title' => esc_html__( 'LiveJournal' ),
				'url'   => 'http://www.livejournal.com/update.bml?subject=%2$s&event=%1$s',
			),
			'email' => array(
				'id'    => 'email',
				'title' => esc_html__( 'Email' ),
				'url'   => 'mailto:?subject=%2$s&body=%1$s',
			),
		);

		return $services;

	}

	/**
	 * Gets the 'a' tag for sharing service.
	 *
	 * @since     1.0.0
	 * @return    string|bool    Return the created 'a' tag.
	 */
	public static function get_link_html( $service ) {

		$title = get_the_title();
		$url = get_permalink();
		$image_id = get_post_thumbnail_id();
		$image_object = wp_get_attachment_image_src( $image_id, 'full' );
		$image = $image_object[0];

		$title = rawurlencode( $title );
		$url = rawurlencode( $url );
		$image = rawurlencode( $image );

		$before_text = apply_filters( 'uka_share_buttons_before_share_text', '', $service );
		$after_text = apply_filters( 'uka_share_buttons_after_share_text', '', $service );

		$url = sprintf( $service[ 'url' ], $url, $title, $image );

		$html = sprintf( '<a href="%1$s" class="uka-share-button uka-share-button--%2$s" target="_blank">%4$s<span class="uka-share-button__text">%3$s</span>%5$s</a> ',
			$url,
			$service[ 'id' ],
			$service[ 'title' ],
			$before_text,
			$after_text
		);

		return $html;

	}

	/**
	 * Gets the html for the share buttons.
	 *
	 * @since     1.0.0
	 * @return    string    Html 'div' containing all the share links.
	 */
	public static function share_buttons() {

		$options = get_option( 'uka_share_buttons_options' );
		$services = static::get_services();

		if ( isset( $options['share-text'] ) ) {
			$share_text = trim( $options['share-text'] ) . ' ';
		}

		$html = '<div class="share-links">';

		if ( ! empty( $share_text ) ) {
			$html .= '<span class="share-links__title">' . esc_html__( $share_text ) . '</span>';
		}

		foreach ( $services as $service ) {
			if ( 'on' === $options[ 'services-settings' ][ $service[ 'id' ] ] && $service_html = static::get_link_html( $service ) ) {
				$html .= $service_html;
			}
		}

		$html .= '</div>';

		echo $html;

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Uka_Share_Buttons_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Uka_Share_Buttons_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Uka_Share_Buttons_Admin();

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'create_settings_submenu' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Uka_Share_Buttons_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Uka_Share_Buttons_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

/**
 * Set up wrapper function for easier access.
 *
 * @since     1.0.0
 */
if ( ! function_exists( 'uka_share_buttons' ) ) {
	function uka_share_buttons() {
		Uka_Share_Buttons::share_buttons();
	}
}
