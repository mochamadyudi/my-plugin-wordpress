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


    public static function register(){

    }

}