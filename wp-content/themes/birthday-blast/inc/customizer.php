<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */
//---------------------Code to add the Upgrade to Pro button in the Customizer----------

function birthday_blast_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    get_template_part('inc/customizer-button/upsell-section');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'birthday_blast_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'birthday_blast_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'Birthday_Blast_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new Birthday_Blast_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Birthday Pro', 'birthday-blast' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'birthday-blast' ),
                'pro_url'  => 'https://cawpthemes.com/birthday-blast-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'birthday_blast_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function birthday_blast_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function birthday_blast_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function birthday_blast_customize_preview_js() {
    wp_enqueue_script( 'birthday-blast-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'birthday_blast_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function birthday_blast_customizer_control_scripts() {

    wp_enqueue_style( 'birthday-blast-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'birthday-blast-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'birthday_blast_customizer_control_scripts', 0 );


//---------------------Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------


function birthday_blast_customize_register( $wp_customize ) {


      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'birthday_blast_site_identity_color', array(
    'default' => '#45b3df',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birthday_blast_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'birthday-blast' ),
    'section' => 'title_tagline',
    'settings' => 'birthday_blast_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'birthday_blast_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birthday_blast_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'birthday-blast' ),
    'section' => 'title_tagline',
    'settings' => 'birthday_blast_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------

  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'birthday_blast_primary_color', array(
    'default' => '#0073aa',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birthday_blast_primary_color', array(
    'label' => __( 'Primary Color', 'birthday-blast' ),
    'section' => 'colors',
    'settings' => 'birthday_blast_primary_color',
  ) ) );

  //-----------------------------------Home Front Page-------------------------------

  $wp_customize->add_panel( 'birthday_blast_panel', array(
    'title'    => __( 'Front Page Settings', 'birthday-blast' ),
    'priority' => 100,
  ) );


  //-------------------------------------Banner Image Section--------------

      $wp_customize->add_section( 'birthday_blast_section_banner', array(
        'title'    => __( 'Home First Section', 'birthday-blast' ),
        'priority' => 8,
        'panel'    => 'birthday_blast_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('birthday_blast_section_banner',array(
      'default' => 'Enable',
      'sanitize_callback' => 'birthday_blast_sanitize_choices'
  ));
  $wp_customize->add_control('birthday_blast_section_banner',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'birthday-blast'),
        'section' => 'birthday_blast_section_banner',
        'choices' => array(
            'Enable' => __('Enable', 'birthday-blast'),
            'Disable' => __('Disable', 'birthday-blast')
  )));

  $wp_customize->add_setting('birthday_blast_section_bannerimage_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'birthday_blast_section_bannerimage_section',array(
    'label' => __('Section Background Image','birthday-blast'),
    'description' => __('Dimention 1600 * 800','birthday-blast'),
    'section' => 'birthday_blast_section_banner',
    'settings' => 'birthday_blast_section_bannerimage_section'
  )));

    $wp_customize->add_setting('birthday_blast_section_bannerimage_section_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_section_bannerimage_section_title',array(
      'label' => __('Banner Title','birthday-blast'),
      'section' => 'birthday_blast_section_banner',
      'setting' => 'birthday_blast_section_bannerimage_section_title',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('birthday_blast_section_bannerimage_section_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_section_bannerimage_section_text',array(
      'label' => __('Banner Text','birthday-blast'),
      'section' => 'birthday_blast_section_banner',
      'setting' => 'birthday_blast_section_bannerimage_section_text',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('birthday_blast_banner_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_banner_btn_text',array(
      'label' => __('Button Text','birthday-blast'),
      'section' => 'birthday_blast_section_banner',
      'setting' => 'birthday_blast_banner_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('birthday_blast_banner_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_banner_btn_text_url',array(
      'label' => __('Button URL','birthday-blast'),
      'section' => 'birthday_blast_section_banner',
      'setting' => 'birthday_blast_banner_btn_text_url',
      'type'    => 'text'
    )
  );

  //---------------------------About Section-------------------------

    $wp_customize->add_section( 'birthday_blast_about', array(
        'title'    => __( 'About Section', 'birthday-blast' ),
        'priority' => 10,
        'panel'    => 'birthday_blast_panel',
    ) );

  //-----------------Enable Option Section about-------------

  $wp_customize->add_setting('birthday_blast_about_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'birthday_blast_sanitize_choices'
  ));
  $wp_customize->add_control('birthday_blast_about_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'birthday-blast'),
        'section' => 'birthday_blast_about',
        'choices' => array(
            'Enable' => __('Enable', 'birthday-blast'),
            'Disable' => __('Disable', 'birthday-blast')
  )));

    //--------------About Title-----------------------

    $wp_customize->add_setting('birthday_blast_about_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_title',array(
      'label' => __('Section Title','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_title',
      'type'    => 'text'
    )
  ); 

  //-----------------------------About Image-----------

  $wp_customize->add_setting('birthday_blast_aboutimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'birthday_blast_aboutimage1_section',array(
    'label' => __('About Side Image','birthday-blast'),
    'description' => __('Dimention 500 * 750','birthday-blast'),
    'section' => 'birthday_blast_about',
    'settings' => 'birthday_blast_aboutimage1_section'
  )));

    $wp_customize->add_setting('birthday_blast_about_name',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_name',array(
      'label' => __('Main Heading','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_name',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('birthday_blast_about_title_second',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_title_second',array(
      'label' => __('Paragraph 1','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_title_second',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('birthday_blast_about_para',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_para',array(
      'label' => __('Paragraph 2','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_para',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('birthday_blast_about_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_btn_text',array(
      'label' => __('Button Text','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('birthday_blast_about_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_about_btn_text_url',array(
      'label' => __('Button URL','birthday-blast'),
      'section' => 'birthday_blast_about',
      'setting' => 'birthday_blast_about_btn_text_url',
      'type'    => 'text'
    )
  );

  //------------Party Details---------------------

  $wp_customize->add_section( 'birthday_blast_features_amenities', array(
        'title'    => __( 'Party Details', 'birthday-blast' ),
        'priority' => 10,
        'panel'    => 'birthday_blast_panel',
    ) );

  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('birthday_blast_features_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'birthday_blast_sanitize_choices'
  ));
  $wp_customize->add_control('birthday_blast_features_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'birthday-blast'),
        'section' => 'birthday_blast_features_amenities',
        'choices' => array(
            'Enable' => __('Enable', 'birthday-blast'),
            'Disable' => __('Disable', 'birthday-blast')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('birthday_blast_features_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_features_title',array(
      'label' => __('Section Title','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_features_title',
      'type'    => 'text'
    )
  ); 

  //-----------------------------Party Details Image 1-----------

  $wp_customize->add_setting('birthday_blast_featureimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'birthday_blast_featureimage1_section',array(
    'label' => __('Party Details 1 Image','birthday-blast'),
    'description' => __('Dimention 600 * 450','birthday-blast'),
    'section' => 'birthday_blast_features_amenities',
    'settings' => 'birthday_blast_featureimage1_section'
  )));


    $wp_customize->add_setting('birthday_blast_feature1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature1_title',array(
      'label' => __('Party Details 1 Title','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature1_title',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('birthday_blast_feature1_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature1_text',array(
      'label' => __('Party Details 1 Text','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature1_text',
      'type'    => 'textarea'
    )
  ); 

  //-----------------------------Party Details Image 2-----------

  $wp_customize->add_setting('birthday_blast_featureimage2_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'birthday_blast_featureimage2_section',array(
    'label' => __('Party Details 2 Image','birthday-blast'),
    'description' => __('Dimention 600 * 450','birthday-blast'),
    'section' => 'birthday_blast_features_amenities',
    'settings' => 'birthday_blast_featureimage2_section'
  )));

    $wp_customize->add_setting('birthday_blast_feature2_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature2_title',array(
      'label' => __('Party Details 2 Title','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature2_title',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('birthday_blast_feature2_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature2_text',array(
      'label' => __('Party Details 2 Text','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature2_text',
      'type'    => 'textarea'
    )
  ); 

  //-----------------------------Party Details Image 3-----------

  $wp_customize->add_setting('birthday_blast_featureimage3_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'birthday_blast_featureimage3_section',array(
    'label' => __('Party Details 3 Image','birthday-blast'),
    'description' => __('Dimention 600 * 450','birthday-blast'),
    'section' => 'birthday_blast_features_amenities',
    'settings' => 'birthday_blast_featureimage3_section'
  )));

    $wp_customize->add_setting('birthday_blast_feature3_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature3_title',array(
      'label' => __('Party Details 3 Title','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature3_title',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('birthday_blast_feature3_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_feature3_text',array(
      'label' => __('Party Details 3 Text','birthday-blast'),
      'section' => 'birthday_blast_features_amenities',
      'setting' => 'birthday_blast_feature3_text',
      'type'    => 'textarea'
    )
  ); 

  //------------Section One (Featured Post)---------------------

  $wp_customize->add_section( 'birthday_blast_section1', array(
        'title'    => __( 'Article Section', 'birthday-blast' ),
        'priority' => 10,
        'panel'    => 'birthday_blast_panel',
    ) );

  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('birthday_blast_section1_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'birthday_blast_sanitize_choices'
  ));
  $wp_customize->add_control('birthday_blast_section1_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'birthday-blast'),
        'section' => 'birthday_blast_section1',
        'choices' => array(
            'Enable' => __('Enable', 'birthday-blast'),
            'Disable' => __('Disable', 'birthday-blast')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('birthday_blast_section1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('birthday_blast_section1_title',array(
      'label' => __('Section Title','birthday-blast'),
      'section' => 'birthday_blast_section1',
      'setting' => 'birthday_blast_section1_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('birthday_blast_section1_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('birthday_blast_section1_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','birthday-blast'),
    'section' => 'birthday_blast_section1',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('birthday_blast_section1_category_number_of_posts_setting',array(
    'default' => '8',
    'sanitize_callback' => 'sanitize_text_field'
  ));
    
  $wp_customize->add_control('birthday_blast_section1_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','birthday-blast'),
    'section' => 'birthday_blast_section1',
    'setting' => 'birthday_blast_section1_category_number_of_posts_setting',
    'type'    => 'number'
  )); 

  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'birthday_blast_footer', array(
        'title'    => __( 'Footer Settings', 'birthday-blast' ),
        'priority' => 10,
        'panel'    => 'birthday_blast_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'birthday_blast_footer_text', array(
    'default' => __('Birthday Blast WordPress Theme', 'birthday-blast'),
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'birthday_blast_footer_text', array(
    'label' => __( 'Footer Text', 'birthday-blast' ),
    'section' => 'birthday_blast_footer',
    'type' => 'text',
  ) );


//-------General Settings------------------------------------------

  $wp_customize->add_section( 'birthday_blast_general', array(
        'title'    => __( 'General Settings', 'birthday-blast' ),
        'panel'    => 'birthday_blast_panel',
    ) );

    $wp_customize->add_setting( 'birthday_blast_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'birthday_blast_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'birthday-blast' ),
        'section'  => 'birthday_blast_general',
        'settings' => 'birthday_blast_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'birthday_blast_post_readdmore_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'birthday_blast_post_readdmore_toggle_switch_control', array(
        'label'    => __( 'Display Read More Link', 'birthday-blast' ),
        'section'  => 'birthday_blast_general',
        'settings' => 'birthday_blast_post_readdmore_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );


}
add_action( 'customize_register', 'birthday_blast_customize_register' );



