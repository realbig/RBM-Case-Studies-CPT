<?php
/**
 * Plugin Name: RBM Case Studies CPT
 * Description: Creates Case Studies custom post types and its related Fields.
 * Version: 1.0.1
 * Author: Eric Defore
 * Author URI: http://realbigmarketing.com
 * Text Domain: rbm-case-studies
 * GitHub Plugin URI: realbig/rbm-case-studies-cpt
 * GitHub Branch: master
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class CPT_Case_Studies_Plugin {

	/**
     * @var         Holds our CPT
     * @since       1.0.0
     */
	public $cpt;

	private function __clone() {}

	private function __wakeup() {}

	/**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      object self::$instance The one true CPT_Case_Studies_Plugin
     */
	public static function get_instance() {
			
		static $instance = null;

		if ( null === $instance ) {
			$instance = new static();
		}

		return $instance;

	}
	
	protected function __construct() {
		
		$this->setup_constants();
		$this->require_necessities();
		
	}

	/**
     * Requires necessary, base filesystem_method
     * 
     * @access      private
     * @since       1.0.0
     * @return      void
     */
	private function require_necessities() {

		// CPT functionality
		require_once __DIR__ . '/core/cpt/class-rbm-cpt-case-studies.php';
		$this->cpt = new RBM_CPT_Case_Studies();

	}

	/**
     * Setup plugin constants
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function setup_constants() {
		
		// WP Loads things so weird. I really want this function.
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}
        
        $plugin_data = get_plugin_data( __FILE__ );
        
        // Plugin version
        define( 'CPT_Case_Studies_Plugin_VER', $plugin_data['Version'] );
        
        // Plugin path
        define( 'CPT_Case_Studies_Plugin_DIR', plugin_dir_path( __FILE__ ) );
        
        // Plugin URL
        define( 'CPT_Case_Studies_Plugin_URL', plugin_dir_url( __FILE__ ) );
        
    }

	/**
     * Error Message if dependencies aren't met
     * 
     * @access      public
     * @since       1.0.0
     * @return      void
     */
	public static function missing_dependencies() { ?>

		<div class="notice notice-error">
			<p>
				<?php printf( __( 'To use the %s Plugin, %s must be active as either a Plugin or a Must Use Plugin!', 'rbm-case-studies' ), '<strong>RBM Case Studies CPT</strong>', '<a href="//github.com/realbig/rbm-cpts/" target="_blank">RBM Custom Post Types</a>' ); ?>
			</p>
		</div>


		<?php
	}

}

/**
 * The main function responsible for returning the one true CPT_Case_Studies_Plugin
 * instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \CPT_Case_Studies_Plugin The one true CPT_Case_Studies_Plugin
 */
add_action( 'plugins_loaded', function() {

	if ( ! class_exists( 'RBM_CPTS' ) ) {

		add_action( 'admin_notices', array( 'CPT_Case_Studies_Plugin', 'missing_dependencies' ) );

	}
	else {

		require_once __DIR__ . '/core/rbm-case-studies-cpt-functions.php';

		RBMCASESTUDIESCPT();

	}

}, 999 );