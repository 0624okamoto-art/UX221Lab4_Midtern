<?php
/**
 * Theme Functions and Definitions
 *
 * @package Chemical Industry Lite
 */

// Theme Setup
add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'quote', 'video', 'audio', 'link', 'status', 'chat' ) );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'custom-background' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'birthday-blast' ),
    ) );
});

// Enqueue Styles & Scripts
function birthday_blast_enqueue_scripts() {
    // Bootstrap
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '', true );

    // Menu Styles and JS
    wp_enqueue_style( 'birthday-blast-menu', get_template_directory_uri() . '/menu/menu.css', array(), '1.0' );
    wp_enqueue_script( 'birthday-blast-menu', get_template_directory_uri() . '/menu/menu.js', array( 'jquery' ), '1.0', true );

    // Back to Top JS
    wp_enqueue_script( 'birthday-blast-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true );

    // Customizer Button CSS
    wp_enqueue_style( 'birthday-blast-customizer-css', get_stylesheet_directory_uri() . '/inc/customizer-button/customizer-custom.css' );

    // Main Stylesheet
    wp_enqueue_style( 'birthday-blast-style', get_stylesheet_uri() );

    // Fonts via Local Loader
    require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
    wp_add_inline_style(
        'birthday-blast-style',
        wptt_get_webfont_styles( 'https://fonts.googleapis.com/css2?family=Literata&display=swap' )
    );

    // Inline color selector (make sure $custom_css is set correctly inside the included file)
    require get_parent_theme_file_path( '/inc/color-selector.php' );
    if ( isset( $custom_css ) ) {
        wp_add_inline_style( 'birthday-blast-style', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'birthday_blast_enqueue_scripts' );

// Skip Link Focus Fix for IE11
function birthday_blast_skip_link_focus_fix() {
    ?>
    <script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'birthday_blast_skip_link_focus_fix' );

// Navigation Menu Output
if ( ! function_exists( 'birthday_blast_primary_nagivation' ) ) :
function birthday_blast_primary_nagivation() {
    ?>
    <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
            <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'birthday-blast' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu main-menu-modal',
                    'fallback_cb'    => 'birthday_blast_primary_menu_fallback',
                ) );
                ?>
            </div>
        </div>
        <button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
        </button>
    </nav>
    <?php
}
endif;

// Menu Fallback
if ( ! function_exists( 'birthday_blast_primary_menu_fallback' ) ) :
function birthday_blast_primary_menu_fallback() {
    if ( current_user_can( 'manage_options' ) ) {
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'birthday-blast' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

// Sidebar
function birthday_blast_theme_register_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'birthday-blast' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the sidebar.', 'birthday-blast' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'birthday_blast_theme_register_sidebars' );

// Register Footer Widget Area
function birthday_blast_register_footer_widget_area() {
    register_sidebar( array(
        'name'          => __( 'Footer 1 Widget Area', 'birthday-blast' ),
        'id'            => 'footer_widget_area1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'birthday-blast' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2 Widget Area', 'birthday-blast' ),
        'id'            => 'footer_widget_area2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'birthday-blast' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3 Widget Area', 'birthday-blast' ),
        'id'            => 'footer_widget_area3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'birthday-blast' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'birthday_blast_register_footer_widget_area' );


// Customizer and Helpers
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-customizer.php';
require get_template_directory() . '/inc/getstarted/getstart.php';

// Radio button sanitizer
function birthday_blast_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    return ( isset( $control->choices[ $input ] ) ) ? $input : $setting->default;
}

// Credit Link
define( 'birthday_blast_URL', 'https://cawpthemes.com/' );
function birthday_blast_credit_link() {
    echo esc_html__( 'Powered by WordPress | By ', 'birthday-blast' ) . '<a href="' . esc_url( birthday_blast_URL ) . '" target="_blank">' . esc_html__( 'CA WP Themes', 'birthday-blast' ) . '</a>';
}


function birthday_blast_mytheme_register_block_styles() {
    // Register a block style for the heading block
    wp_register_style(
        'heading-style-birthday-blast',
        get_template_directory_uri() . '/css/blocks.css',
        array( 'wp-blocks' ),
        '1.0',
        'all'
    );
    register_block_style(
        'core/heading',
        array(
            'name'         => 'birthday-blast-heading',
            'label' => __( 'My Theme Heading', 'birthday-blast' ),
            'style_handle' => 'heading-style-birthday-blast-',
        )
    );
}
add_action( 'init', 'birthday_blast_mytheme_register_block_styles' );


//------Custom Block---------

function birthday_blast_mytheme_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        register_block_pattern(
            'birthday-blast/custom-pattern',
            array(
                'title'       => __( 'My Custom Pattern', 'birthday-blast' ),
                'description' => __( 'A custom block pattern for my theme', 'birthday-blast' ),
                'categories'  => array( 'text' ),
                'content'     => '<!-- wp:paragraph --><p>This is my custom block pattern</p><!-- /wp:paragraph -->',
            )
        );
    }
}
add_action( 'init', 'birthday_blast_mytheme_register_block_patterns' );


function birthday_blast_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'birthday_blast_add_editor_styles' );

//------------------------Comments-------------


function birthday_blast_enable_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'birthday_blast_enable_threaded_comments');

// ----------------------------Menu navigation keyboard--------------


function birthday_blast_add_tabindex_to_menu_items( $atts, $item, $args, $depth ) {
    // Add tabindex="0" to the menu item
    $atts['tabindex'] = '0';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'birthday_blast_add_tabindex_to_menu_items', 10, 4 );



//--------------------Define--------------------


define('BIRTHDAY_BLAST_PRO_URL', 'https://cawpthemes.com/birthday-blast-premium-wordpress-theme/');
define('BIRTHDAY_BLAST_PRO_SUPPORT', 'https://cawpthemes.com/support/');
define('BIRTHDAY_BLAST_PRO_DEMO', 'https://demo.cawpthemes.com/birthday-blast-pro');
define('BIRTHDAY_BLAST_PRO_DOCUMENTATION', 'https://cawpthemes.com/docs/birthday-blast-free-theme-documentation/');
define('BIRTHDAY_BLAST_FREE_URL', 'https://demo.cawpthemes.com/birthday-blast');


