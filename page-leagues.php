<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php
$today = date('Ymd');

$leagueQuery = new WP_Query(array(
  'post_type' => 'league',
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'end_date',
      'value' => $today,
      'compare' => '>=',
      'type' => 'DATE',
    ],
  ],
  'meta_key' => 'start_date',
  'orderby' => 'meta_value',
  'order' => 'ASC',
)); ?>

<section class="program-listings">
  <div class="wrapper">
    <h2>Upcoming Leagues</h2>
    <?php if ($leagueQuery->have_posts()):
      while ($leagueQuery->have_posts()):
        $leagueQuery->the_post();
        $img = get_field('image');
    ?>
        <article class="program-listing">
          <img
            src='<?php echo esc_url($img['url']) ?>'
            alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
          <div class="content">
            <h3><?php the_title(); ?></h3>
            <?php get_template_part('template-parts/program-vitals') ?>
            <a href="<?php the_permalink(); ?>" class="button primary">
              More details
            </a>
          </div>
        </article>
      <?php endwhile;

    else: ?>
      <p>We're still working on our upcoming leagues. Check back soon!</p>
    <?php endif;
    wp_reset_postdata(); ?>

  </div>
</section>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>