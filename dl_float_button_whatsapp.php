<?php

/**
 * Plugin Name: Float Button WhatsApp
 * Plugin URI: https://www.daniellucia.es
 * Description: Plugin to add a floating WhatsApp button on your website.
 * Version: 1.0
 * Author: Daniel Lucia
 * Author URI: https://www.daniellucia.es
 * License: GPL2
 * Text Domain: dl_float_button_whatsapp
 */

use DanielLucia\FloatButtonWhatsapp\Classes\Plugin;

if (! defined('ABSPATH')) {
    exit;
}

define('DL_FLOAT_BUTTON_WHATSAPP_VERSION', '1.0');
define('DL_FLOAT_BUTTON_WHATSAPP_DIRNAME', dirname(plugin_basename(__FILE__)));
define('DL_FLOAT_BUTTON_WHATSAPP_DIR', plugin_dir_path(__FILE__));
define('DL_FLOAT_BUTTON_WHATSAPP_FILE', DL_FLOAT_BUTTON_WHATSAPP_DIRNAME . '/dl_float_button_whatsapp.php');

require 'vendor/autoload.php';

$dl_float_button_whatsapp = new Plugin();
