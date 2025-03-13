<?php if (have_rows('programs')):
  $row = 1;
  while (have_rows('programs')):
    the_row(); ?>
    <section class="program">
      <div class="wrapper">
        <h2><?php the_sub_field('title') ?></h2>
        <?php if (get_sub_field('sold_out')): ?>
          <div class="subtitle">(Sold out)</div>
        <?php endif; ?>
        <?php while (have_rows('info')):
          the_row(); ?>
          <?php if ($who = get_sub_field('who')): ?>
            <p class="who"><strong>Who:</strong> <?php echo esc_attr($who); ?></p>
          <?php endif; ?>
          <?php if ($when = get_sub_field('when')): ?>
            <p class="when"><strong>When:</strong> <?php echo esc_attr($when); ?></p>
          <?php endif; ?>
          <?php if ($where = get_sub_field('where')): ?>
            <p class="where"><strong>Where:</strong> <?php echo esc_attr($where); ?></p>
          <?php endif; ?>
          <?php if ($disclaimer = get_sub_field('disclaimer')): ?>
            <p class="disclaimer">*<?php echo esc_attr($disclaimer) ?></p>
          <?php endif; ?>
        <?php endwhile; ?>
        <label class="toggle-details" for="toggle<?php echo $row ?>">
          More info
        </label>
        <input class="toggle-open" type="checkbox" name="toggle<?php echo $row ?>" id="toggle<?php echo $row ?>">
        <div class="toggle">
          <?php while (have_rows('details')):
            the_row();
            $img = get_sub_field('image') ?>
            <section class="program-details">
              <img
                src='<?php echo esc_url($img['url']) ?>'
                alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
              <div class="content">
                <?php the_sub_field('content') ?>
              </div>
            </section>
            <?php endwhile;

          if (have_rows('coaches')):
            while (have_rows('coaches')):
              the_row(); ?>
              <article class="coach">
                <div class="name">
                  <?php the_sub_field('name') ?>
                </div>
                <div class="job-title">
                  <?php the_sub_field('job_title') ?>
                </div>
                <div class="bio">
                  <?php the_sub_field('bio') ?>
                </div>
              </article>
            <?php endwhile;
          endif;

          if ($registration = get_sub_field('link')): ?>
            <a href="<?php echo esc_url($registration['url']) ?>"
              class="button primary"
              target="<?php echo $registration['target'] ?>">
              <?php if (isset($registration['title']) && $registration['title']) {
                echo esc_attr($registration['title']);
              } else {
                echo "Register now";
              } ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php $row++;
  endwhile; ?>
<?php else: ?>
  <section class="main-content">
    <div class="wrapper">
      <h2>More leagues coming soon!</h2>
      <p>We're working on setting up our next set of leagues. Check back later to see what we have in store!</p>
    </div>
  </section>
<?php endif; ?>