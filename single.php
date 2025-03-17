<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'programs') ?>

<?php while (have_rows('program_details')):
  the_row(); ?>
  <section class="program-details">
    <div class="wrapper">
      <div class="content">
        <?php the_sub_field('content'); ?>
      </div>
      <?php get_template_part('template-parts/dynamic-embed') ?>
    </div>
  </section>
<?php endwhile; ?>

<?php if ($schedule = get_field('schedule') && get_field('schedule')['enabled']):
  while (have_rows('schedule')):
    the_row(); ?>
    <section class="program-details">
      <div class="wrapper">
        <div class="content">
          <?php the_sub_field('content') ?>
        </div>
        <?php get_template_part('template-parts/dynamic-embed') ?>
      </div>
    </section>
<?php endwhile;
endif; ?>

<section class="other-info">
  <div class="wrapper">
    <?php if (have_rows('coaches')): ?>
      <section class="coaches">
        <h2>Coach<?php if (count(get_field('coaches')) > 1) echo 'es' ?></h2>
        <?php while (have_rows('coaches')):
          the_row(); ?>
          <article class="coach">
            <h3><?php the_sub_field('name') ?></h3>
            <p class="job-title"><?php the_sub_field('job_title') ?></p>
            <?php the_sub_field('bio'); ?>
          </article>
        <?php endwhile; ?>
      </section>
    <?php endif; ?>

    <?php if (get_field('price')): ?>

      <section class="price">
        <h2>Price</h2>
        <p>
          <?php the_field('price') ?>
        </p>
      </section>
    <?php endif;

    while (have_rows('contact_info')):
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

<?php get_footer(); ?>