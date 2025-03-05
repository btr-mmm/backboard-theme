<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php $leaguesQuery = new WP_Query(array(
  'post_type' => 'league',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'meta_value',
  'meta_key' => 'start_date',
  'meta_type' => 'DATETIME',
)) ?>

<?php if ($leaguesQuery->have_posts()):
  while ($leaguesQuery->have_posts()):
    $leaguesQuery->the_post();
?>
    <section class="league">
      <div class="wrapper">
        <h2><?php the_title(); ?></h2>
      </div>
    </section>
  <?php endwhile; ?>
<?php else: ?>
  <section class="main-content">
    <div class="wrapper">
      <h2>More leagues coming soon!</h2>
      <p>We're working on setting up our next set of leagues. Check back later to see what we have in store!</p>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>