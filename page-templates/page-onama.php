<?php /* Template Name: O nama Page */ ?>

<?php get_header(); ?>
<div class="onama">
  <div class="onama--top" style="background-image: url(<?php the_field('velilka_slika'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
  <div class="onama--bottom">
    <div class="onama--bottom-wrapper">
      <div class="onama--bottom-wrapper--title"><?php the_field('naslov'); ?></div>
      <div class="onama--bottom-wrapper--text"><?php the_field('text'); ?></div>
    </div>
  </div>
</div>
<div class="onamainfo">
  <div class="onamainfo--left">
    <div class="onamainfo--left-wrapper">
      <?php the_field('info_text'); ?>
    </div>
  </div>
  <div class="onamainfo--right">
    <div class="onamainfo--right-top" style="background-image: url(<?php the_field('info_slika_1'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    <div class="onamainfo--right-bottom" style="background-image: url(<?php the_field('info_slika_2'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
  </div>
</div>
<div class="video">
  <div class="video--top">
    <div class="video--top-wrapper">
      <div class="video--top-wrapper--title"><?php the_field('video_naslov'); ?></div>
      <div class="video--top-wrapper--text"><?php the_field('video_text'); ?></div>
    </div>
  </div>
  <div class="video--bottom">
    <div class="video--bottom-wrapper">
      <iframe width="100%" height="100%" src="<?php echo the_field('video_url')?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
      </iframe>
    </div>
  </div>
</div>
<div class="renderi">
  <div class="renderi--top">
    <div class="renderi--top-wrapper">
      <div class="renderi--top-wrapper--title"><?php the_field('renderovanje_naslov'); ?></div>
      <div class="renderi--top-wrapper--text"><?php the_field('renderovanje_text'); ?></div>
    </div>
  </div>
  <div class="renderi--bottom">
    <?php
    $counter = 1;
    $totalFields = count(the_sub_field('render_image'));
    if(have_rows('renderi_images')) :
      while(have_rows('renderi_images')) :
      the_row();
      if($counter == 4) {
    ?>
       </div>
    <?php
      $counter = 1;
      }

      if($counter == 1){
    ?>
      <div class="renderi--bottom-wrapper">
    <?php
      }
    ?>
      <div class="renderi--bottom-wrapper--pic renderi--bottom-wrapper--pic-<?php echo $counter; ?>" id="render_<?php echo $counter; ?>" style="background-image: url(<?php the_sub_field('render_image'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    <?php
    if(get_row_index() == $totalFields) {
    ?>
      </div>
    <?php
    }
    $counter++;
      endwhile;
    endif;
    ?>
  </div>
</div>

<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
