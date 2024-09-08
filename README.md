# WooCommerce Attribute Shortcode Plugin with WPML Support

## Description

The WooCommerce Attribute Shortcode Plugin with WPML Support is a lightweight WordPress plugin that allows you to display WooCommerce product attributes anywhere on your site using a simple shortcode. It's particularly useful for multilingual stores as it includes built-in support for WPML (WordPress Multilingual Plugin).

## Features

- Easy-to-use shortcode for displaying product attributes
- Flexible usage on product pages, posts, or anywhere shortcodes are supported
- Option to display attributes for specific products
- WPML integration for automatic translation of attribute names and values
- Lightweight and performance-optimized

## Requirements

- WordPress 5.0 or higher
- WooCommerce 3.0 or higher
- PHP 7.0 or higher
- WPML and WooCommerce Multilingual (optional, for multilingual support)

## Installation

1. Download the plugin zip file
2. Log in to your WordPress admin panel
3. Go to Plugins > Add New > Upload Plugin
4. Upload the zip file and click "Install Now"
5. After installation, click "Activate Plugin"

## Usage

Use the shortcode in your posts, pages, or product descriptions:

1. To display an attribute on the current product page:
   ```
   [wc_attribute name="attribute-slug"]
   ```

2. To display an attribute for a specific product:
   ```
   [wc_attribute name="attribute-slug" product_id="123"]
   ```

Replace `"attribute-slug"` with the slug of your attribute, and `"123"` with the actual product ID if needed.

## WPML Integration

To use the plugin with WPML:

1. Install and activate WPML and its WooCommerce Multilingual add-on
2. Go to WPML > String Translation in your WordPress admin
3. Translate your attribute names and values

The plugin will automatically display the correct translation based on the user's selected language.

## Frequently Asked Questions

**Q: Do I need WPML to use this plugin?**
A: No, the plugin works without WPML. However, WPML is required for multilingual functionality.

**Q: Can I display multiple attributes at once?**
A: Yes, you can use the shortcode multiple times in the same post or page to display different attributes.

**Q: Will this plugin slow down my site?**
A: No, the plugin is designed to be lightweight and should not impact your site's performance.

## Support

For support, please open an issue in the GitHub repository or contact the plugin author.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the GPL v2 or later.

## Changelog

### 1.1
- Added WPML support
- Improved attribute translation handling

### 1.0
- Initial release

## Credits

Developed by RIZN

---

Thank you for using the WooCommerce Attribute Shortcode Plugin with WPML Support!
