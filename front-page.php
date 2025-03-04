<?php get_header(); ?>

<h1>Hello from front-page</h1>

<?php $sectionCount = 1;
while (have_rows('homepage_content')):
  the_row(); ?>
  <section id="section<?php echo $sectionCount ?>" class="homepage-section">
    <h2><?php the_sub_field('title') ?></h2>
    <div class="content">
      <!-- TODO: Add content markup -->
    </div>
  </section>
<?php $sectionCount++;
endwhile; ?>

<?php get_footer(); ?>