<?php

namespace DanielLucia\FloatButtonWhatsapp\Classes;

class Plugin
{

    private $option_name_phone = 'dl_whatsapp_link_phone';
    private $option_name_text = 'dl_whatsapp_default_text';

    public function __construct()
    {
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('plugins_loaded', [$this, 'load_textdomain']);
        add_action('wp_enqueue_scripts', [$this, 'add_assets']);
        add_action('wp_footer', [$this, 'show_button']);
    }

    /**
     * Registramos configuraciones
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */
    public function register_settings()
    {
        register_setting('whatsapp_link_group', $this->option_name_phone);
        register_setting('whatsapp_link_group', $this->option_name_text);
    }

    /**
     * Cargamos textdomain para trraducciones
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */
    function load_textdomain()
    {
        load_plugin_textdomain('dl_float_button_whatsapp', false, DL_FLOAT_BUTTON_WHATSAPP_DIRNAME . '/languages/');
    }

    /**
     * Añadimos el menú de administración
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */

    public function add_admin_menu()
    {

        add_submenu_page(
            'options-general.php',
            __('Button WhatsApp' . 'dl_float_button_whatsapp'),
            __('Button WhatsApp', 'dl_float_button_whatsapp'),
            'manage_options',
            'dl_float_button_whatsapp',
            [$this, 'admin_page'],
            20
        );
    }

    /**
     * Página de administración
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */
    public function admin_page()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Button WhatsApp Settings', 'dl_float_button_whatsapp'); ?></h1>
            <form method="post" action="options.php">
                <?php
                
                settings_fields('whatsapp_link_group');
                do_settings_sections('whatsapp-link-settings');

                ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="whatsapp_link_phone"><?php esc_html_e('Phone number:', 'dl_float_button_whatsapp'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="whatsapp_link_phone" name="<?php echo esc_attr($this->option_name_phone); ?>" value="<?php echo esc_attr(get_option($this->option_name_phone, '')); ?>" class="regular-text" />
                            <p class="description"><?php esc_html_e('Enter the phone number to use in the WhatsApp link.', 'dl_float_button_whatsapp'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="whatsapp_default_text"><?php esc_html_e('Default text:', 'dl_float_button_whatsapp'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="whatsapp_default_text" name="<?php echo esc_attr($this->option_name_text); ?>" value="<?php echo esc_attr(get_option($this->option_name_text, '')); ?>" class="regular-text" />
                            <p class="description"><?php esc_html_e('Enter the text to display with the WhatsApp link.', 'dl_float_button_whatsapp'); ?></p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(__('Save Settings', 'dl_float_button_whatsapp')); ?>

            </form>
        </div>
        <?php
    }

    /**
     * Añadimos los assets
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */
    public function add_assets()
    {
        wp_enqueue_style('dl_float_button_whatsapp', plugins_url('assets/css/style.css', DL_FLOAT_BUTTON_WHATSAPP_FILE), [], DL_FLOAT_BUTTON_WHATSAPP_VERSION);
    }

    /**
     * Mostramos el botón
     * @return void
     * @author Daniel Lucia <daniellucia84@gmail.com>
     */
    public function show_button() {
        $phone = get_option($this->option_name_phone);
        $text = get_option($this->option_name_text);
        $url = 'https://wa.me/' . $phone . '?text=' . $text;

        if (!$phone) {
            return;
        }

        ?>
        <a href="<?php echo esc_url($url); ?>" class="float-button-whatsapp" target="_blank">
            <img src="<?php echo plugins_url('assets/images/whatsapp-icon.svg', DL_FLOAT_BUTTON_WHATSAPP_FILE); ?>" alt="WhatsApp">
        </a>
        <?php
    }
}
