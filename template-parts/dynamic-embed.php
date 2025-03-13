<?php $type = get_sub_field('media_type');
if ($type == 'image'):
  $img = get_sub_field('image'); ?>
  <img
    src='<?php echo esc_url($img['url']) ?>'
    alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
<?php elseif ($type == 'embed'): ?>
  <div class="embed-container">
    <?php the_sub_field('embed') ?>
  </div>
<?php endif; ?>