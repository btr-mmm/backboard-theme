<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php $row = 1;

while (have_rows('courses')):
  the_row(); ?>
  <section class="training-course">
    <div class="wrapper">

      <section class="intro">
        <h2><?php the_sub_field('title') ?></h2>
        <?php the_sub_field('intro') ?>
      </section>

      <label class="toggle-details" for="toggle<?php echo $row ?>">
        More info
      </label>
      <input class="toggle-open" type="checkbox" name="toggle<?php echo $row ?>" id="toggle<?php echo $row ?>">

      <div class="toggle">
        <?php while (have_rows('selling_points')):
          the_row();
          $img = get_sub_field('image') ?>
          <section class="course-details">
            <h3><?php the_sub_field('title') ?></h3>
            <img
              src='<?php echo esc_url($img['url']) ?>'
              alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
            <div class="content">
              <?php the_sub_field('content'); ?>
            </div>
          </section>
        <?php endwhile; ?>
        <section class="course-options">
          <?php the_sub_field('details'); ?>
        </section>
        <?php if (have_rows('videos')): ?>
          <section class="videos">
            <?php while (have_rows('videos')):
              the_row(); ?>
              <div class="embed-container">
                <?php the_sub_field('embed'); ?>
              </div>
            <?php endwhile; ?>
          </section>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php $row++;
endwhile; ?>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>