<?php
/**
 * Home Section Location Template
 *
 * @package Birthday Blast
 */

// Check if the section is enabled
$birthday_blast_section_one = get_theme_mod('birthday_blast_features_enable');
if ('Disable' == $birthday_blast_section_one) {
    return;
}
?>

<section id="party-details" class="party-posts">
  <div class="container-fluid">
    <div class="section-heading-main">
      <?php 
      // Display the section title if it's set
      if (get_theme_mod('birthday_blast_features_title', true) != '') { ?>
        <h3><?php echo esc_html(get_theme_mod('birthday_blast_features_title')); ?></h3>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row box-content">
          <!-- Feature 1 -->
          <div class="col-lg-4 col-12">
            <?php 
            // Display the first feature image if it's set
            if (get_theme_mod('birthday_blast_featureimage1_section') != '') { ?>
              <img src="<?php echo esc_url(get_theme_mod('birthday_blast_featureimage1_section')); ?>">
            <?php } ?>
          </div>
          <div class="col-lg-4 col-12">
            <div class="feature-content-box">
              <?php 
              // Display the first feature title and text if they are set
              if (get_theme_mod('birthday_blast_feature1_title') != '') { ?>
                <h3><?php echo esc_html(get_theme_mod('birthday_blast_feature1_title')); ?></h3>
              <?php } ?>
              
              <?php if (get_theme_mod('birthday_blast_feature1_text') != '') { ?>
                <p><?php echo esc_html(get_theme_mod('birthday_blast_feature1_text')); ?></p>
              <?php } ?>
            </div>
          </div>

          <!-- Feature 2 -->
          <div class="col-lg-4 col-12">
            <?php 
            // Display the second feature image if it's set
            if (get_theme_mod('birthday_blast_featureimage2_section') != '') { ?>
              <img src="<?php echo esc_url(get_theme_mod('birthday_blast_featureimage2_section')); ?>">
            <?php } ?>
          </div>
          <div class="col-lg-4 col-12">
            <div class="feature-content-box">
              <?php 
              // Display the second feature title and text if they are set
              if (get_theme_mod('birthday_blast_feature2_title') != '') { ?>
                <h3><?php echo esc_html(get_theme_mod('birthday_blast_feature2_title')); ?></h3>
              <?php } ?>

              <?php if (get_theme_mod('birthday_blast_feature2_text') != '') { ?>
                <p><?php echo esc_html(get_theme_mod('birthday_blast_feature2_text')); ?></p>
              <?php } ?>
            </div>
          </div>

          <!-- Feature 3 -->
          <div class="col-lg-4 col-12">
            <?php 
            // Display the third feature image if it's set
            if (get_theme_mod('birthday_blast_featureimage3_section') != '') { ?>
              <img src="<?php echo esc_url(get_theme_mod('birthday_blast_featureimage3_section')); ?>">
            <?php } ?>
          </div>
          <div class="col-lg-4 col-12">
            <div class="feature-content-box">
              <?php 
              // Display the third feature title and text if they are set
              if (get_theme_mod('birthday_blast_feature3_title') != '') { ?>
                <h3><?php echo esc_html(get_theme_mod('birthday_blast_feature3_title')); ?></h3>
              <?php } ?>

              <?php if (get_theme_mod('birthday_blast_feature3_text') != '') { ?>
                <p><?php echo esc_html(get_theme_mod('birthday_blast_feature3_text')); ?></p>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
