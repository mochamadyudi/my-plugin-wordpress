<?php

namespace Emkalab;


class Settings
{
    private static $_instance = null; //phpcs:ignore

    public $_parent = null;

    /**
     * Prefix for plugin settings.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $base = '';

    /**
     * Available settings for plugin.
     *
     * @var     array
     * @access  public
     * @since   1.0.0
     */
    public $settings = array();


    public function register(){
        add_action( 'wp_head', array($this , 'output') );

        add_action( 'customize_register', array( $this, 'setup' ) );
    }

}