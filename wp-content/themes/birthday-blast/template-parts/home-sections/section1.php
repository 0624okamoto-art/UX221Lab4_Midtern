<?php
/**
 * Home Section 1 Template
 *
 * @package Birthday Blast
 */

// Check if the section is enabled
$birthday_blast_section_one = get_theme_mod('birthday_blast_section1_enable');
if ('Disable' == $birthday_blast_section_one) {
    return;
}
?>

<section id="section1" class="featured-posts">
  <div class="container">
    <div class="section-heading-main">
      <?php 
      // Display the section title if it's set
      if (get_theme_mod('birthday_blast_section1_title', true) != '') { ?>
        <h3><?php echo esc_html(get_theme_mod('birthday_blast_section1_title')); ?></h3>
      <?php } ?>
    </div>
    <div class="row">
      <?php
      // Define the query to get the latest posts from the selected category
      $args = array(
        'category_name'    => get_theme_mod('birthday_blast_section1_category'),
        'posts_per_page'   => get_theme_mod('birthday_blast_section1_category_number_of_posts_setting'),
        'order'            => 'DESC',
      );
      
      $query = new WP_Query($args);

      // Loop through the posts
      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
      ?>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="post-section-box">
          <div class="post">
            <?php 
            // Display the post thumbnail if it exists
            if (has_post_thumbnail()) : ?>
              <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
            <?php endif; ?>

            <!-- Display post title -->
            <h2 class="post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <!-- Display post content -->
            <div class="latest-content">
              <?php the_content(); ?>
            </div>

            <!-- Display 'Read More' button if the toggle switch is ON -->
            <?php if (get_theme_mod('birthday_blast_post_readdmore_toggle_switch_control', true)) : ?>
              <div class="readmore-latest">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'birthday-blast'); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
