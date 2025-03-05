<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php $programsQuery = new WP_Query(array(
  'post_type' => 'program',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'meta_value',
  'meta_key' => 'start_date',
  'meta_type' => 'DATETIME',
)) ?>

<?php if ($programsQuery->have_posts()):
  while ($programsQuery->have_posts()):
    $programsQuery->the_post();
?>
    <section class="program">
      <div class="wrapper">
        <h2><?php the_title(); ?></h2>
      </div>
    </section>
  <?php endwhile; ?>
<?php else: ?>
  <section class="main-content">
    <div class="wrapper">
      <h2>Camps & clinics coming soon!</h2>
      <p>We're working on setting up our next round of sports programs. Check back later to see what we have in store!</p>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>