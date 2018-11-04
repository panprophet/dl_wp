<?php /* Template Name: Usluge Page */ ?>

<div class="onama">
  <div class="onama--top" style="background-image: url(<?php the_field('velilka_slika'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
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
    $photoclass = 1;
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
      <div class="renderi--bottom-wrapper--pic renderi--bottom-wrapper--pic-<?php echo $counter; ?>" id="render_<?php echo $counter; ?>" style="background-image: url(<?php the_sub_field('render_image'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center;" onclick="go_to_slide( 0 , <?php echo $photoclass; ?>)"></div>
    <?php
    if(get_row_index() == $totalFields) {
    ?>
      </div>
    <?php
    }
    $counter++;
    $photoclass++;
      endwhile;
    endif;
    ?>
  </div>
</div>
<div class="slideshows slideshows--hidden" id="megaslider">
  <!-- <div class="slideshow--slides" id="slide"> -->
  <?php
    $slidecounter = 1;
    if(have_rows('renderi_images')):
      while(have_rows('renderi_images')): the_row();
  ?>
    <div class="slideshows-inner" id="slide_<?php echo $slidecounter ?>">
      <div class="slideshows-inner--left">
        <div class="slideshows-inner--left-inside" style="background-image: url(<?php the_sub_field('render_image') ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
          <div class="slideshows-inner--left-inside--icons">
            <span class="slideshows-inner--left-inside--icons-social">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" background-color="white" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="white" d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
            </span>
            <span class="slideshows-inner--left-inside--icons-back" onclick="go_to_slide(0, 0)">Nazad</span>
          </div>
        </div>

      </div>
      <div class="slideshows-inner--right">
        <div class="slideshows-inner--right-top">
          <div class="slideshows-inner--right-top--title"><?php the_sub_field('naziv') ?></div>
          <div class="slideshows-inner--right-top--sub"></div>
        </div>
        <div class="slideshows-inner--right-bottom">
          <div class="slideshows-inner--right-bottom--left" onclick="go_to_slide(<?php echo $slidecounter ?>, <?php echo $slidecounter - 1 ?>)">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
          </div>
          <div class="slideshows-inner--right-bottom--right" onclick="go_to_slide(<?php echo $slidecounter ?>, <?php echo $slidecounter + 1 ?>)">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
          </div>
        </div>
      </div>
    </div>
  <?php
        $slidecounter++;
      endwhile;
    endif;
  ?>
</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
