<?php
/**
 * Home Section About Template
 *
 * @package Birthday Blast
 */

// Check if the section is enabled
$birthday_blast_section_one = get_theme_mod('birthday_blast_about_enable');
if ('Disable' == $birthday_blast_section_one) {
  return;
}
?>

<section id="about" class="about-section">
  <div class="container">
    <div class="section-heading-main">
      <?php 
      // Display the section title if it exists
      if (get_theme_mod('birthday_blast_about_title', true) != '') { ?>
        <h3><?php echo esc_html(get_theme_mod('birthday_blast_about_title')); ?></h3>
      <?php } ?>
    </div>
    
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="about-left">
          <?php 
          // Display the name if set
          if (get_theme_mod('birthday_blast_about_name') != '') { ?>
            <h3><?php echo esc_html(get_theme_mod('birthday_blast_about_name')); ?></h3>
          <?php } ?>

          <?php 
          // Display the secondary title if set
          if (get_theme_mod('birthday_blast_about_title_second') != '') { ?>
            <p><?php echo esc_html(get_theme_mod('birthday_blast_about_title_second')); ?></p>
          <?php } ?>

          <?php 
          // Display the paragraph if set
          if (get_theme_mod('birthday_blast_about_para') != '') { ?>
            <p><?php echo esc_html(get_theme_mod('birthday_blast_about_para')); ?></p>
          <?php } ?>

          <?php 
          // Display the button if both text and URL are set
          if (get_theme_mod('birthday_blast_about_btn_text') != '' && get_theme_mod('birthday_blast_about_btn_text_url') != '') { ?>
            <div class="theme-btn">
              <a href="<?php echo esc_url(get_theme_mod('birthday_blast_about_btn_text_url')); ?>">
                <?php echo esc_html(get_theme_mod('birthday_blast_about_btn_text')); ?>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-lg-6 col-12">
        <div class="about-right">
          <div class="row">
            <div class="col-lg-12">
              <div class="about-box-img">
                <?php 
                // Display the image if set
                if (get_theme_mod('birthday_blast_aboutimage1_section') != '') { ?>
                  <img src="<?php echo esc_url(get_theme_mod('birthday_blast_aboutimage1_section')); ?>" alt="About Image">
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
