<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'programs') ?>


<?php while (have_rows('program_details')):
  the_row();
  $img = get_sub_field('featured_image'); ?>
  <section class="program-details">
    <div class="wrapper">
      <?php the_sub_field('content'); ?>
      <img
        src='<?php echo esc_url($img['url']) ?>'
        alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
    </div>
  </section>
<?php endwhile; ?>

<?php if (get_field('schedule')): ?>
  <section class="sample-schedule">
    <div class="wrapper">

    </div>
  </section>
<?php endif; ?>

<?php if (have_rows('coaches')): ?>
  <section class="coaches">
    <div class="wrapper">
      <?php while (have_rows('coaches')):
        the_row(); ?>
        <article class="coach">
          <h2><?php the_sub_field('name') ?></h2>
        </article>
      <?php endwhile; ?>
      <?php while (have_rows('contact_info')):
        the_row(); ?>
        <div class="contact">
          <h2>Questions?</h2>
          <p>Contact <?php the_sub_field('name') ?> at
            <a href="mailto:<?php the_sub_field('email') ?>" target="_blank">
              <?php the_sub_field('email') ?>.
            </a>
          </p>
        </div>
      <?php endwhile; ?>
      <a href="<?php the_field('registration') ?>" class="button primary" target="_blank">
        Register Now
      </a>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>