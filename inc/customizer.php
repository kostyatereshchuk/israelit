<?php

/**
 * Adds Theme Customizer fields.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function israelit_customize_register( $wp_customize )
{
    $wp_customize->add_section( 'contacts', array(
        'title' => __( 'Contacts', 'israelit' ),
        'priority' => 20,
    ) );


    $wp_customize->add_setting( 'site_copyright', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'site_copyright', array(
                'label' => __('Copyright', 'israelit'),
                'section' => 'title_tagline',
                'settings' => 'site_copyright',
                'type' => 'textarea'
            )
        )
    );

    $wp_customize->add_setting( 'site_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
        'label' => 'Site Logo',
        'section' => 'title_tagline',
        'settings' => 'site_logo',
    ) ) );


    $wp_customize->add_setting( 'email', array(
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email', array(
        'label' => __( 'Email', 'israelit' ),
        'section' => 'contacts',
        'settings' => 'email',
    ) ) );

    $wp_customize->add_setting( 'phone', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone', array(
        'label' => __( 'Phone', 'israelit' ),
        'section' => 'contacts',
        'settings' => 'phone',
    ) ) );

    $wp_customize->add_setting( 'facebook_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array(
        'label' => __( 'Facebook URL', 'israelit' ),
        'section' => 'contacts',
        'settings' => 'facebook_url',
    ) ) );

    $wp_customize->add_setting( 'linkedin_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_url', array(
        'label' => __( 'LinkedIn URL', 'israelit' ),
        'section' => 'contacts',
        'settings' => 'linkedin_url',
    ) ) );
    
}
add_action('customize_register', 'israelit_customize_register');
