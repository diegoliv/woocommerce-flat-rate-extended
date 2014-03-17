<?php
/**
 * @package   WC_Flat_Rate_Extended
 * @author    Diego de Oliveira <diego@favolla.com.br>
 * @license   GPL-2.0+
 * @link      http://favolla.com.br
 * @copyright 2014 Favolla Comunicação
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Flat Rate Extended
 * Plugin URI:        https://github.com/diegoliv/woocommerce-flat-rate-extended
 * Description:       Adds a shipping method based on the Flat Rate that allows an alternative fixed price for extra items from a shipping class. 
 * Version:           1.0.0
 * Author:            Diego de Oliveira
 * Author URI:        http://github.com/diegoliv
 * Text Domain:       woocommerce-flat-rate-extended
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/diegoliv/woocommerce-flat-rate-extended
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
	function wc_fr_ext_init() {

		if ( ! class_exists( 'WC_Flat_Rate_Extended' ) ) {

			require_once( plugin_dir_path( __FILE__ ) . 'class-wc-flat-rate-extended.php' );

		}
	}

	add_action( 'woocommerce_shipping_init', 'wc_fr_ext_init' );
 
	function add_wc_fr_ext_method( $methods ) {
		$methods[] = 'WC_Flat_Rate_Extended';
		return $methods;
	}
 
	add_filter( 'woocommerce_shipping_methods', 'add_wc_fr_ext_method' );
}

/**
 * Load textdomain.
 */
function wc_fr_ext_load_textdomain(){
	load_plugin_textdomain( 'woocommerce-flat-rate-extended', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'wc_fr_ext_load_textdomain', 0 );
