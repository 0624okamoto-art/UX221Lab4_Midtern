<?php
//about theme info
add_action( 'admin_menu', 'birthday_blast_gettingstarted_page' );
function birthday_blast_gettingstarted_page() {      
    add_theme_page( esc_html__('Birthday Blast', 'birthday-blast'), esc_html__('All About Birthday Blast', 'birthday-blast'), 'edit_theme_options', 'birthday_blast_getstartedcall', 'birthday_blast_maincontent_call');   
}

// Add a Custom CSS file to WP Admin Area
function birthday_blast_admin_page_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
}
add_action('admin_enqueue_scripts', 'birthday_blast_admin_page_theme_style');


function birthday_blast_discount_notice() {
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) { ?>
        <div class="notice getting_started">
            <div class="notice-content">
                <p><?php esc_html_e( '🎉 Thank You For Choosing CA WP Themes!', 'birthday-blast' ); ?></p>
                
                <h2><?php esc_html_e( '🚀 Get Started with Your Free Theme!', 'birthday-blast' ); ?></h2>
                
                <p><?php esc_html_e( "Here are some useful links to help you set up your theme quickly:", 'birthday-blast' ); ?></p>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( 'https://cawpthemes.com/birthday-blast-free-wordpress-theme/' ); ?>" target="_blank">
                        <?php esc_html_e( '🎨 View Free Theme Details', 'birthday-blast' ); ?>
                    </a>
                </div>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( 'https://cawpthemes.com/docs/birthday-blast-free-theme-documentation/' ); ?>" target="_blank">
                        <?php esc_html_e( '📖 Read Theme Documentation', 'birthday-blast' ); ?>
                    </a>
                </div>

                <h2><?php esc_html_e( '🔥 Upgrade to Pro for More Amazing Features!', 'birthday-blast' ); ?></h2>
                
                <p><?php esc_html_e( "Unlock the full potential of your website with our premium version! 🚀", 'birthday-blast' ); ?></p>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_DOCUMENTATION ); ?>" target="_blank">
                        <?php esc_html_e( '📖 Pro Documentation', 'birthday-blast' ); ?>
                    </a>
                </div>

                <div class="info-link">
                    <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_URL ); ?>" target="_blank">
                        <?php esc_html_e( '🚀 Upgrade to Pro', 'birthday-blast' ); ?>
                    </a>
                </div>

                <div class="info-link">
                    <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_DEMO ); ?>" target="_blank">
                        <?php esc_html_e( '✨ Premium Demo', 'birthday-blast' ); ?>
                    </a>
                </div>

                <h2><?php esc_html_e( '🔥 Limited Time Offer – Flat 15% OFF on Pro Themes!', 'birthday-blast' ); ?></h2>
                
                <p><?php esc_html_e( "Upgrade today and get 15% off! Don't miss this exclusive deal! 💰", 'birthday-blast' ); ?></p>
                
                <ul class="discount-benefits">
                    <li>✅ <?php esc_html_e('SEO Optimized & Speed Fast 🚀', 'birthday-blast'); ?></li>
                    <li>✅ <?php esc_html_e('Fully Responsive & Mobile-Friendly 📱', 'birthday-blast'); ?></li>
                    <li>✅ <?php esc_html_e('Customizer Support for Easy Customization 🎨', 'birthday-blast'); ?></li>
                    <li>✅ <?php esc_html_e('Premium Features & Regular Updates 🔥', 'birthday-blast'); ?></li>
                </ul>
                
                <p class="discount-code">
                    <?php esc_html_e('👉 Use Code:', 'birthday-blast'); ?> 
                    <span>SAVE15</span> 
                    <?php esc_html_e(' at Checkout', 'birthday-blast'); ?>
                </p>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_URL ); ?>" target="_blank">
                        <?php esc_html_e( '🛒 Shop Now', 'birthday-blast' ); ?>
                    </a>
                </div>

                <p class="offer-expiry"><?php esc_html_e('📅 Hurry! Offer ends soon.', 'birthday-blast' ); ?></p>
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'birthday_blast_discount_notice' );

//------------------Function for the main content on the admin page--------- 


function birthday_blast_maincontent_call() { 
    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'birthday-blast' );
?>

<div class="theme-discount-banner">
    <h2><?php esc_html_e('🚀 Limited Time Offer – Flat 15% OFF on All Premium WordPress Themes! 🎉', 'birthday-blast'); ?></h2>
    <p><?php esc_html_e('Upgrade your website with our stunning, high-performance WordPress themes at an exclusive 15% discount! 💰✨', 'birthday-blast'); ?></p>
    
    <ul class="discount-benefits">
        <li>✅ <?php esc_html_e('SEO Optimized & Speed Fast 🚀', 'birthday-blast'); ?></li>
        <li>✅ <?php esc_html_e('Fully Responsive & Mobile-Friendly 📱', 'birthday-blast'); ?></li>
        <li>✅ <?php esc_html_e('Customizer Support for Easy Customization 🎨', 'birthday-blast'); ?></li>
        <li>✅ <?php esc_html_e('Premium Features & Regular Updates 🔥', 'birthday-blast'); ?></li>
    </ul>
    
    <p class="discount-code"><?php esc_html_e('👉 Use Code: ', 'birthday-blast'); ?> <span>SAVE15</span> <?php esc_html_e(' at Checkout', 'birthday-blast'); ?></p>
    
    <a href="https://cawpthemes.com/birthday-blast-premium-wordpress-theme/" class="cta-button"><?php esc_html_e('Shop Now 🚀', 'birthday-blast'); ?></a>
    
    <p class="offer-expiry"><?php esc_html_e('📅 Hurry! Offer ends soon.', 'birthday-blast'); ?></p>
</div>


<div class="admin-main-box">
    <div class="admin-left-box">
        <h2><?php esc_html_e( 'Welcome to Birthday Blast Theme', 'birthday-blast' ); ?> <span class="version"><?php $theme_info = wp_get_theme();
echo $theme_info->get( 'Version' );?></span></h2>
    <p><?php esc_html_e( 'Welcome to Birthday Blast, the ultimate WordPress theme designed to make your birthday celebrations extra special! Whether you are planning a party for yourself, a loved one, or a client, Birthday Blast offers a vibrant and dynamic platform to showcase your event in style.With its sleek and modern design, Birthday Blast is fully responsive, ensuring your website looks stunning on any device, from desktops to smartphones. Its intuitive customization options allow you to personalize every aspect of your site effortlessly, from colors and fonts to layout and content.Featuring built-in event management tools, you can easily create and manage event schedules, RSVP forms, and guest lists, making it easier than ever to coordinate your birthday bash. Plus, with seamless integration with popular plugins like WooCommerce, you can effortlessly sell tickets or merchandise directly from your website.Whether you are throwing a small gathering or a large-scale extravaganza, Birthday Blast has everything you need to make your birthday celebration a memorable one. Download Birthday Blast today and let the festivities begin!', 'birthday-blast' ); ?></p>
    <hr>

    <div class="admin-content-btn">
        <p><?php esc_html_e( 'We are here to assist you! If you have any questions or need support regarding our theme, we are just a message away. Please feel free to reach out to our dedicated support team, and we will be delighted to help you.', 'birthday-blast' ); ?></p>
        <p><?php esc_html_e( 'Email: cawpthemes@gmail.com', 'birthday-blast' ); ?></p>
        <p><a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'birthday-blast' ); ?></a></p>
    </div>
    <hr>
    <div class="admin-content-btn">
        <p><?php esc_html_e( 'We have got you covered! Our comprehensive documentation is designed to guide you through every aspect of using our theme. Whether you are a beginner or an experienced user, you will find detailed instructions, tutorials, and helpful resources to make the most of our themes features.', 'birthday-blast' ); ?></p>
        <p><a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'birthday-blast' ); ?></a></p>
    </div>
    <hr>
    <div class="admin-content-btn">
        <p><?php esc_html_e( 'Looking for expert WordPress services? Look no further! Our team of skilled professionals is ready to help you with all your WordPress needs. Whether you require website development, plugin customization, theme design, or any other WordPress-related service, we have the expertise to deliver outstanding results.', 'birthday-blast' ); ?></p>
        <p><a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Hire Us', 'birthday-blast' ); ?></a></p>
    </div>
    
    <hr>
</div>
    <div class="admin-right-box">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Birthday Blast Premium Theme','birthday-blast'); ?></h4>
            <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'birthday-blast'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'birthday-blast' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','birthday-blast'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url(BIRTHDAY_BLAST_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'birthday-blast' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','birthday-blast'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'birthday-blast' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','birthday-blast'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( BIRTHDAY_BLAST_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'birthday-blast' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Free Theme','birthday-blast'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( BIRTHDAY_BLAST_FREE_URL ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'birthday-blast' ); ?></a>
            </div>
        </div>

    </div>
</div>


<?php } ?>