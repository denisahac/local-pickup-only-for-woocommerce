=== Local Pickup Only for WooCommerce ===
Contributors: denisahac 
Tags: local-pickup-only, local-pickup-only-for-woocommerce, woocommerce-local-pickup, local-pick-only, local-pickup
Requires at least: 4.7
Tested up to: 5.4
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Allow local pickup only for certain WooCommerce products.

== Description ==

Allow local pickup only for certain WooCommerce products.

== Installation ==

## Setup

### 1. Add Shipping Zone

First, setup the shipping zone in **WooCommerce** > **Settings** > **Shipping** > **Shipping zones** > **Add shipping zone**.

![Add shipping zone](assets/images/guides/add-shipping-zone.jpg)

**Zone name:** Flat rate

**Zone regions:** United States (US)

#### 1.1 Add Default Shipping Methods

Then, add the other shipping methods; i.e. Flat rate.

![Flat rate shipping zone](assets/images/guides/shipping-zone-flat-rate.jpg)

#### 1.2 Add "Local pickup" Shipping Method

After adding the default shipping methods, it's now time to setup the "Local pickup". Still on the Shipping Zone edit screen, click the "Add shipping method" and this time, select the "Local pickup".

![Add local pickup shipping method](assets/images/guides/add-local-pickup-shipping-method.jpg)

Here's how your shipping zone should look like after the above.

![Shipping zone](assets/images/guides/shipping-zone.jg)

### 2. Add Shipping Class

On this section, we're going to configure the "Local Pickup" shipping class that is responsible for showing the local pickup option for certain products.

### 2.1 Add "Local Pickup" Shipping Class

Navigate to **WooCommerce** > **Settings** > **Shipping** > **Shipping classes** > **Add shipping class**

**Shipping class name:** Local Pickup

**Slug:** local-pickup

![Local Pickup shipping class](assets/images/guides/shipping-class-local-pickup.jpg)

Don't forget to click the "Save shipping classes" button.

*Note:* The "local-pickup" slug is very important here as this is the exact string the code is using to filter the appropriate shipping methods. 

## 3. Edit Product

Next, we now assign which products gets the "Local pickup" only shipping method by editing the product's shipping class.

### 3.1 Assign The "Local Pickup" Shipping Class

On the product's edit screen navigate to **Shipping** tab > **Fees & dimensions** > **SHIPPING CLASS** and select "Local Pickup" then save the product.

![Edit product's shipping class](assets/images/guides/edit-product.jpg)

=== Testing ===

## 4. Testing

### 4.1 "Local Pickup" Only Products with Other Products

When products with "Local Pickup" shipping class are added together with other non local-pickup products, then only the "Local pickup" would show up as shipping method.

![Local pickup only products combined with other products](assets/images/guides/cart-with-other-items-local-pickup-only.jpg)

### 4.2 "Local Pickup" Only Products

When products with "Local Pickup" shipping class are only in the cart, then only the "Local Pickup" would show up as the shipping method.

![Local pickup only products](assets/images/guides/cart-local-pickup-only.jpg)

### 4.3 Other Products

When no "Local Pickup" products are on the cart, then the other shipping methods would show up.

Example 01:

Shipping Zone Methods:

- Free shipping
- Flat rate
- Local pickup

What would show up on the cart/checkout are:

- Free shipping
- Flat rate

---

Example 02:

Shipping Zone Methods:

- Flat rate
- Local pickup

What would show up on the cart/checkout is:

- Flat rate

![Other products](assets/images/guides/other-products.jpg)

== License ==

**License:** GPL v2 or later

**License URI:** [http://www.gnu.org/licenses/gpl-2.0.txt](http://www.gnu.org/licenses/gpl-2.0.txt)

== Changelog ==

= 1.0.0 =
* First stable version.

