<?php /* Template Name: Usluge Page */ ?>

<?php
  // if(have_rows('image_carousel')) :
  //   while(have_rows('image_carousel')) :
  //   the_row();
?>
<div class="service">
  <div class="service--left">
    <div class="service--left-top"></div>
    <div class="service--left-bottom"></div>
  </div>
  <div class="service--right">
    <div class="service--right-left">
      <div class="service--right-left--top">
        <div class="service--right-left--top-title"><?php the_field('hero_title'); ?></div>
        <div class="service--right-left--top-text"><?php the_field('hero_text'); ?></div>
      </div>
      <div class="service--right-left--bottom" id="serviceswrapper">
        <?php
        $imgCounter = 1;
          if(have_rows('hero_gallery')) :
            while(have_rows('hero_gallery')) :
            the_row();
        ?>
            <div class="service--right-left--bottom-pic" id="service_<?php echo $imgCounter; ?>" style="background-image: url(<?php the_sub_field('hero_image'); ?>); background-size: cover; background-repeat: no-repeat;">
            <div class="service--right-left--bottom-pic--inner"></div>
            </div>
        <?php
        $imgCounter++;
            endwhile;
          endif;
        ?>
      </div>
    </div>
    <div class="service--right-right">
      <div class="service--right-right--wrapper">
      <?php
        $imgCounter = 1;
          if(have_rows('hero_gallery')) :
            while(have_rows('hero_gallery')) :
            the_row();
        ?>
            <div class="service--right-right--wrapper-image" id="servicebig_<?php echo $imgCounter; ?>" style="background-image: url(<?php the_sub_field('hero_image'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
        <?php
        $imgCounter++;
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</div>
<div class="serviceintro">
  <div class="serviceintro--left">
    <div class="serviceintro--left-wrapper">
      <?php the_field('intro_text'); ?>
    </div>
  </div>
  <div class="serviceintro--right">
    <div class="serviceintro--right-top" style="background-image: url(<?php the_field('intro_pic_1'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    <div class="serviceintro--right-bottom" style="background-image: url(<?php the_field('intro_pic_2'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
  </div>
</div>
<div class="servicevideo">
  <div class="servicevideo--left"></div>
  <div class="servicevideo--right">
    <iframe width="" height="" src="<?php the_field('video') ?>">
    </iframe>
  </div>
</div>
<div class="servicegallery">
  <div class="servicegallery--left">
  </div>
  <div class="servicegallery--right">
    <div class="servicegallery--right-wrapper">
    <?php
    $galleryCount = 1;
      if (have_rows('gallery_renders')) :
        while(have_rows('gallery_renders')) :
        the_row();
    ?>
      <div class="servicegallery--right-wrapper" id="servicegallery_<?php echo $galleryCount; ?>" style="background-image: url(<?php the_sub_field('render_image'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    <?php
    $galleryCount++;
        if($galleryCountv == 4) {
          $galleryCount = 1;
        }
        endwhile;
      endif;
    ?>
    </div>
  </div>
</div>
<?php
  //   endwhile;
  // endif;
?>

<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
