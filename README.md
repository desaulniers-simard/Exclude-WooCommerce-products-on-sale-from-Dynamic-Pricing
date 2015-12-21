# Exclude WooCommerce products on sale from Dynamic Pricing

This is a zero-configuration, zero-interface WordPress plugin that does a single thing: exclude [WooCommerce](https://github.com/woothemes/woocommerce) products which are currently on sale from all additional rebates and discounts that would be applied to them by active [Dynamic Pricing](https://www.woothemes.com/products/dynamic-pricing/) rules. Obviously, this plugin is only useful if your site runs both _WooCommerce_ and _Dynamic Pricing_ plugins.

[Dynamic Pricing's documentation](https://docs.woothemes.com/document/woocommerce-dynamic-pricing/#section-13) suggests adding [this snippet](https://gist.github.com/woogist/2b1b66d1569fbb7119f9#file-functions-php) to your theme's functions.php file to accomplish the same goal. While this _will_ work, it is not great advice. Using this plugin instead offers the following benefits:

1. Leave your theme untouched
2. Turn the behaviour on or off without modifying code
