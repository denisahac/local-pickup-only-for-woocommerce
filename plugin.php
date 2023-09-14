<?php
/**
 * Local Pickup Only for WooCommerce 
 *
 * @package           Local Pickup Only 
 * @author            Den Isahac
 * @copyright         2023 Den Isahac
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Local Pickup Only for WooCommerce
 * Plugin URI:        https://github.com/denisahac/local-pickup-only-for-woocommerce/
 * Description:       Allow local pickup only for certain WooCommerce products.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Den Isahac 
 * Author URI:        https://www.denisahac.xyz/ 
 * Text Domain:       local-pickup-only 
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/denisahac/local-pickup-only-for-woocommerce/
 */

function local_pickup_only_shipping_method( $methods, $raw_methods, $allowed_classes, $context ) {
        if( ! is_admin() ) {
                $cart_items = WC()->cart->get_cart();
                $cart_items_eligible_for_local_pickup = false;

                foreach( $cart_items as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if( 'local-pickup' === $_product->get_shipping_class() ) {
                                $cart_items_eligible_for_local_pickup = true;
                                break;
                        }
                }

                $new_methods = array();

                foreach( $methods as $method ) {
                        if( $method instanceof WC_Shipping_Local_Pickup && $cart_items_eligible_for_local_pickup ) {
                                return array( $method );
                        } else if( $method instanceof WC_Shipping_Local_Pickup ) {
                                continue;
                        } else {
                                $new_methods[] = $method;
                        }
                }


                return $new_methods;
        }

        return $methods;
}
add_filter( 'woocommerce_shipping_zone_shipping_methods', 'local_pickup_only_shipping_method', 10, 4 );
