<?php while (have_rows('vitals')):
  the_row();

  if (get_sub_field('who')): ?>
    <p><strong>Who:</strong> <?php the_sub_field('who') ?></p>
  <?php endif;

  if (get_sub_field('when')): ?>
    <p><strong>When:</strong> <?php the_sub_field('when') ?></p>
  <?php endif;

  if (get_sub_field('where')): ?>
    <p><strong>Where:</strong> <?php the_sub_field('where') ?></p>
  <?php endif;

  if (get_sub_field('disclaimer')): ?>
    <p><em>*<?php the_sub_field('disclaimer') ?></em></p>
<?php endif;

endwhile; ?>