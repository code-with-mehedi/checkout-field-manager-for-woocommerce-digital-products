<?php
/**
 * Class admin settings.
 */
namespace WPBP;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


use WPBP\Traits\Singleton;

class Admin_settings {

	use Singleton;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wccfm_admin_menu' ) );

	}
	/**
	 * Add submenu page under WooCommerce.
	 */
	function wccfm_admin_menu() {
		add_submenu_page( 'woocommerce', 'Checkout field manager for digital / virtual products', 'Checkout Field Manager', 'manage_options', 'wccfm_settings_tab', array( $this, 'wccfm_admin_page' ) );
	}
	/**
     * Admin page callback
     */
	function wccfm_admin_page() {
		// Get the active tab from the $_GET param
		$default_tab = null;

		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $default_tab;

		?>
        <!-- Our admin page content should all be inside .wrap -->
        <div class="wrap">
            <!-- Print the page title -->
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <!-- Here are our tabs -->
            <nav class="nav-tab-wrapper">
                <a href="?page=wccfm_settings_tab" class="nav-tab 
                        <?php
                        if ( $tab === null ) :
                            ?>
                            nav-tab-active<?php endif; ?>">Fields Manager</a>
                <a href="?page=wccfm_settings_tab&tab=settings" class="nav-tab 
                            <?php
                            if ( $tab === 'settings' ) :
                                ?>
                                nav-tab-active<?php endif; ?>">Settings</a>
                <a href="?page=wccfm_settings_tab&tab=tools" class="nav-tab 
                            <?php
                            if ( $tab === 'tools' ) :
                                ?>
                                nav-tab-active<?php endif; ?>">Support</a>
            </nav>

            <div class="tab-content">
                <?php
                        switch ( $tab ) :
                            case 'settings':
                                echo 'Settings'; // Put your HTML here
                                break;
                            case 'tools':
                                echo 'Tools';
                                break;
                            default:
                            //include simple checkout form field template
                            include_once  __DIR__.'/templates/digital-product-checkout-fields.php';

                                break;
                    endswitch;
                ?>
            </div>
        </div>
<?php
	}
}