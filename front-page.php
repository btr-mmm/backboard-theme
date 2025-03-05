<?php get_header(); ?>

<h1 class="sr-only">Hello from front-page</h1>

<?php $sectionCount = 1;
while (have_rows('homepage_sections')):
  the_row();
  $button = get_sub_field('button');
  $img = get_sub_field('image');
  $bg = get_sub_field('background') ?>
  <section
    id="section<?php echo $sectionCount ?>"
    class="homepage-section"
    data-nav-title="<?php echo esc_attr($button['title']) ?>"
    style="background-image: url(<?php echo esc_url($bg['url']) ?>);">
    <h2><?php the_sub_field('title') ?></h2>
    <div class="hover-content">
      <img
        src='<?php echo esc_url($img['url']) ?>'
        alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
      <div class="content">
        <?php the_sub_field('body'); ?>
        <a href="<?php echo esc_url($button['url']) ?>" class="button base" target="<?php echo $link['target'] ?>">
          <?php echo esc_attr($button['title']) ?>
        </a>
      </div>
    </div>
  </section>
<?php $sectionCount++;
endwhile; ?>

<?php get_footer(); ?>