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



    private function fields(){

        $settings['standard'] = array(
            'title'       => __( 'Brief', "emkalab" ),
            'description' => __( 'These are fairly standard form input fields.', 'emkalab' ),
            'fields'      => array(
                array(
                    'id'          => 'text_field',
                    'label'       => __( 'Some Text', 'emkalab' ),
                    'description' => __( 'This is a standard text field.', 'emkalab' ),
                    'type'        => 'text',
                    'default'     => '',
                    'placeholder' => __( 'Placeholder text', 'emkalab' ),
                ),
                array(
                    'id'          => 'password_field',
                    'label'       => __( 'A Password', 'emkalab' ),
                    'description' => __( 'This is a standard password field.', 'emkalab' ),
                    'type'        => 'password',
                    'default'     => '',
                    'placeholder' => __( 'Placeholder text', 'emkalab' ),
                ),
                array(
                    'id'          => 'secret_text_field',
                    'label'       => __( 'Some Secret Text', 'emkalab' ),
                    'description' => __( 'This is a secret text field - any data saved here will not be displayed after the page has reloaded, but it will be saved.', 'emkalab' ),
                    'type'        => 'text_secret',
                    'default'     => '',
                    'placeholder' => __( 'Placeholder text', 'emkalab' ),
                ),
                array(
                    'id'          => 'text_block',
                    'label'       => __( 'A Text Block', 'emkalab' ),
                    'description' => __( 'This is a standard text area.', 'emkalab' ),
                    'type'        => 'textarea',
                    'default'     => '',
                    'placeholder' => __( 'Placeholder text for this textarea', 'emkalab' ),
                ),
                array(
                    'id'          => 'single_checkbox',
                    'label'       => __( 'An Option', 'emkalab' ),
                    'description' => __( 'A standard checkbox - if you save this option as checked then it will store the option as \'on\', otherwise it will be an empty string.', 'emkalab' ),
                    'type'        => 'checkbox',
                    'default'     => '',
                ),
                array(
                    'id'          => 'select_box',
                    'label'       => __( 'A Select Box', 'emkalab' ),
                    'description' => __( 'A standard select box.', 'emkalab' ),
                    'type'        => 'select',
                    'options'     => array(
                        'drupal'    => 'Drupal',
                        'joomla'    => 'Joomla',
                        'wordpress' => 'WordPress',
                    ),
                    'default'     => 'wordpress',
                ),
                array(
                    'id'          => 'radio_buttons',
                    'label'       => __( 'Some Options', 'emkalab' ),
                    'description' => __( 'A standard set of radio buttons.', 'emkalab' ),
                    'type'        => 'radio',
                    'options'     => array(
                        'superman' => 'Superman',
                        'batman'   => 'Batman',
                        'ironman'  => 'Iron Man',
                    ),
                    'default'     => 'batman',
                ),
                array(
                    'id'          => 'multiple_checkboxes',
                    'label'       => __( 'Some Items', 'emkalab' ),
                    'description' => __( 'You can select multiple items and they will be stored as an array.', 'emkalab' ),
                    'type'        => 'checkbox_multi',
                    'options'     => array(
                        'square'    => 'Square',
                        'circle'    => 'Circle',
                        'rectangle' => 'Rectangle',
                        'triangle'  => 'Triangle',
                    ),
                    'default'     => array( 'circle', 'triangle' ),
                ),
            ),
        );

        $settings['extra'] = array(
            'title'       => __( 'Extra', 'emkalab' ),
            'description' => __( 'These are some extra input fields that maybe aren\'t as common as the others.', 'emkalab' ),
            'fields'      => array(
                array(
                    'id'          => 'number_field',
                    'label'       => __( 'A Number', 'emkalab' ),
                    'description' => __( 'This is a standard number field - if this field contains anything other than numbers then the form will not be submitted.', 'emkalab' ),
                    'type'        => 'number',
                    'default'     => '',
                    'placeholder' => __( '42', 'emkalab' ),
                ),
                array(
                    'id'          => 'colour_picker',
                    'label'       => __( 'Pick a colour', 'emkalab' ),
                    'description' => __( 'This uses WordPress\' built-in colour picker - the option is stored as the colour\'s hex code.', 'emkalab' ),
                    'type'        => 'color',
                    'default'     => '#21759B',
                ),
                array(
                    'id'          => 'an_image',
                    'label'       => __( 'An Image', 'emkalab' ),
                    'description' => __( 'This will upload an image to your media library and store the attachment ID in the option field. Once you have uploaded an imge the thumbnail will display above these buttons.', 'emkalab' ),
                    'type'        => 'image',
                    'default'     => '',
                    'placeholder' => '',
                ),
                array(
                    'id'          => 'multi_select_box',
                    'label'       => __( 'A Multi-Select Box', 'emkalab' ),
                    'description' => __( 'A standard multi-select box - the saved data is stored as an array.', 'emkalab' ),
                    'type'        => 'select_multi',
                    'options'     => array(
                        'linux'   => 'Linux',
                        'mac'     => 'Mac',
                        'windows' => 'Windows',
                    ),
                    'default'     => array( 'linux' ),
                ),
            ),
        );

        $settings = apply_filters( $this->parent->_token . '_settings_fields', $settings );

        return $settings;
    }


}