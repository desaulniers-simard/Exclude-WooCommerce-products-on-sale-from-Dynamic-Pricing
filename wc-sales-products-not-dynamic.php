<?php
/*
Plugin Name: Exclude WooCommerce products on sale from Dynamic Pricing
Description: Zero-configuration, zero-interface WordPress plugin that does a single thing: exclude WooCommerce products which are currently on sale from all additional rebates and discounts that would be applied to them by active Dynamic Pricing rules.
Version: 1.0.0
Author: Desaulniers Simard
Author URI: https://desaulniers-simard.com/
Requires at least: 4.2.5
Tested up to: 4.4
Text Domain: wc-sales-products-not-dynamic
Domain Path: /languages/

Copyright: © 2015 Desaulniers Simard
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace {
    // If this file is called directly, abort.
    if (!defined('WPINC')) {
        die;
    }

}

namespace wc_sales_products_not_dynamic {

    function check_requirements()
    {
        if (!is_plugin_active('woocommerce/woocommerce.php') || !is_plugin_active('woocommerce-dynamic-pricing/woocommerce-dynamic-pricing.php')) {
            load_translations();
            deactivate_plugins(basename(__FILE__));
            wp_die(
                '<h1>' .
                __('Missing Requirements', 'wc-sales-products-not-dynamic')
                . '</h1>' .
                '<p><em>' . __('Exclude WooCommerce products on sale from Dynamic Pricing', 'wc-sales-products-not-dynamic') . '</em>' .
                __(' can not be activated because it requires the WooCommerce and WooCommerce Dynamic Pricing plugins to be installed and activated.', 'wc-sales-products-not-dynamic')
                . '</p> <a href="' . admin_url('plugins.php') . '">' . __('Go back', 'wc-sales-products-not-dynamic') . '</a> </p>'
            );

        }
    }

    register_activation_hook(__FILE__, '\wc_sales_products_not_dynamic\check_requirements');

    add_filter('woocommerce_dynamic_pricing_process_product_discounts', '\wc_sales_products_not_dynamic\on_sale_ineligible', 10, 4);

    function on_sale_ineligible($eligible, $product, $discounter_name, $discounter_object)
    {
        remove_filter('woocommerce_dynamic_pricing_process_product_discounts', '\wc_sales_products_not_dynamic\on_sale_ineligible', 10, 4);

        if ($product->is_on_sale()) {
            $eligible = false;
        }

        add_filter('woocommerce_dynamic_pricing_process_product_discounts', '\wc_sales_products_not_dynamic\on_sale_ineligible', 10, 4);

        return $eligible;
    }

    function load_translations() {
        load_plugin_textdomain( 'wc-sales-products-not-dynamic' , false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }

    add_action( 'plugins_loaded', '\wc_sales_products_not_dynamic\load_translations');
}
