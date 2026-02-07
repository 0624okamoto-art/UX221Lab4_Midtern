<?php
/**
 * Home Section 1 Template
 *
 * @package Birthday Blast
 */

// Check if the section is enabled
$birthday_blast_section_one = get_theme_mod('birthday_blast_section_banner');
if ('Disable' == $birthday_blast_section_one) {
    return;
}
?>

<section id="banner-section-first">
    <div class="main-banner-main">
        <?php 
        // Display the banner image if it's set
        if (get_theme_mod('birthday_blast_section_bannerimage_section') != '') { ?>
            <img src="<?php echo esc_url(get_theme_mod('birthday_blast_section_bannerimage_section')); ?>" alt="Banner Image">
            
            <div class="text-box">
                <?php 
                // Display the title if it's set
                if (get_theme_mod('birthday_blast_section_bannerimage_section_title') != '') { ?>
                    <h2><?php echo esc_html(get_theme_mod('birthday_blast_section_bannerimage_section_title')); ?></h2>
                <?php } ?>

                <?php 
                // Display the text if it's set
                if (get_theme_mod('birthday_blast_section_bannerimage_section_text') != '') { ?>
                    <p><?php echo esc_html(get_theme_mod('birthday_blast_section_bannerimage_section_text')); ?></p>
                <?php } ?>

                <?php 
                // Display the button if both text and URL are set
                if (get_theme_mod('birthday_blast_banner_btn_text') != '' && get_theme_mod('birthday_blast_banner_btn_text_url') != '') { ?>
                    <div class="theme-btn">
                        <a href="<?php echo esc_url(get_theme_mod('birthday_blast_banner_btn_text_url')); ?>">
                            <?php echo esc_html(get_theme_mod('birthday_blast_banner_btn_text')); ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
