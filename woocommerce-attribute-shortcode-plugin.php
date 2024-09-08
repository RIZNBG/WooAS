<?php
/**
 * Plugin Name: WooCommerce Attribute Shortcode with WPML Support
 * Description: Adds a shortcode to display selected WooCommerce product attributes with multilingual support.
 * Version: 1.1
 * Author: RIZN
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Check if WooCommerce is active
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    return;
}

// Add shortcode
add_shortcode('wc_attribute', 'wc_attribute_shortcode');

function wc_attribute_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(
        array(
            'name' => '',     // Attribute name/slug
            'product_id' => '' // Optional: specific product ID
        ),
        $atts,
        'wc_attribute'
    );

    // If no attribute name is provided, return empty
    if (empty($atts['name'])) {
        return '';
    }

    // Get the product
    if (!empty($atts['product_id'])) {
        $product = wc_get_product($atts['product_id']);
    } else {
        global $product;
    }

    // If no product is found, return empty
    if (!is_a($product, 'WC_Product')) {
        return '';
    }

    // Get the attribute value
    $attribute_value = $product->get_attribute($atts['name']);

    // WPML integration
    if (function_exists('icl_object_id') && function_exists('icl_translate')) {
        // Get the current language
        $current_language = apply_filters('wpml_current_language', NULL);
        
        // Translate the attribute name
        $translated_name = icl_translate('WordPress', 'taxonomy singular name: ' . $atts['name'], $atts['name'], $current_language);
        
        // Translate the attribute value
        $translated_value = icl_translate('woocommerce', $atts['name'] . '_' . $attribute_value, $attribute_value, $current_language);
        
        // Use translated values
        $attribute_name = $translated_name;
        $attribute_value = $translated_value;
    } else {
        $attribute_name = $atts['name'];
    }

    // Return the attribute value
    return esc_html($attribute_value);
}

// Add filter to translate attribute labels
add_filter('woocommerce_attribute_label', 'translate_attribute_label', 10, 3);

function translate_attribute_label($label, $name, $product) {
    if (function_exists('icl_translate')) {
        $label = icl_translate('WordPress', 'taxonomy singular name: ' . $name, $label);
    }
    return $label;
}

// Add filter to translate attribute values
add_filter('woocommerce_attribute', 'translate_attribute_value', 10, 3);

function translate_attribute_value($value, $attribute, $values) {
    if (function_exists('icl_translate') && is_string($value)) {
        $value = icl_translate('woocommerce', $attribute . '_' . $value, $value);
    }
    return $value;
}
