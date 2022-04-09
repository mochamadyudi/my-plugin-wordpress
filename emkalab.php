<?php
/**
 * Emkalab Pro
 *
 * Plugin Name: Emkalab Pro
 * Description: Lorem ipsum dolor sit amet
 * Version:     1.0.0
 * Author:      Mochamad Yudi Sobari
 * Author URI:  https://github.com/mochamadyudi/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: emkalab-pro
 * Domain Path: /languages
 * Requires at least: 4.9
 * Tested up to: 7.2
 * Requires PHP: 7.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

update_option( 'emkalab-license', [
    'type' => 'pro',
    'key' => 'valid',
    'is_expired' => false,
    'is_disabled' => false,
    'is_invalid' => false,
] );

if(! defined("EMKALAB_LICENSE_KEY")){
    define( 'EMKALAB_LICENSE_KEY', 'activated' );
}


// Plugin version.
if ( ! defined( 'EMKALAB_VERSION' ) ) {
    define( 'EMKALAB_VERSION', '1.0.0' );
}

// Plugin Folder Path.
if ( ! defined( 'EMKALAB_PLUGIN_DIR' ) ) {
    define( 'EMKALAB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'EMKALAB_PLUGIN_URL' ) ) {
    define( 'EMKALAB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File.
if ( ! defined( 'EMKALAB_PLUGIN_FILE' ) ) {
    define( 'EMKALAB_PLUGIN_FILE', __FILE__ );
}

if(function_exists('emkalab')){
    if(! function_exists('emkalab_pro_just_activated')){
        function emkalab_pro_just_activated(){

        }
    }

    if( ! function_exists("emkalab_deactivate")){
        function emkalab_deactivate(){
            $plugin = "emkalab/emkalab.php";
            deactivate_plugins($plugin);
            do_action("emkalab_plugin_deactivated", $plugin);
        }
    }
}

if ( file_exists( dirname( EMKALAB_PLUGIN_DIR ) . '/vendor/autoload.php' ) ) :
    require_once dirname( EMKALAB_PLUGIN_DIR ) . '/vendor/autoload.php';
endif;





if ( class_exists( 'Emkalab\\Init' ) ) :
    Emkalab\Init::register_services();
endif;