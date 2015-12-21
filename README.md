# Exclude WooCommerce products on sale from Dynamic Pricing

This is a zero-configuration, zero-interface WordPress plugin that does a single thing: exclude [WooCommerce](https://github.com/woothemes/woocommerce) products which are currently on sale from all additional rebates and discounts that would be applied to them by active [Dynamic Pricing](https://www.woothemes.com/products/dynamic-pricing/) rules. Obviously, this plugin is only useful if your site runs both _WooCommerce_ and _Dynamic Pricing_ plugins.

[Dynamic Pricing's documentation](https://docs.woothemes.com/document/woocommerce-dynamic-pricing/#section-13) suggests adding [this snippet](https://gist.github.com/woogist/2b1b66d1569fbb7119f9#file-functions-php) to your theme's functions.php file to accomplish the same goal. While this _will_ work, it is not great advice. Using this plugin instead offers the following benefits:

1. Leave your theme untouched
2. Turn the behaviour on or off without modifying code

## Installation

1. Dowload [latest release](https://github.com/desaulniers-simard/wc-sales-products-not-dynamic/releases)
2. Extract archive
3. Rename extracted folder to `wc-sales-products-not-dynamic`
4. Upload folder to your site's `wp-content/plugins` directory

## Usage

1. Activate plugin through the Dashboard's Plugins page
2. 
3. Profit!

To have your Dynamic Pricing rules applied to _all_ products again (i.e. revert to the default behaviour), just deactivate plugin.
