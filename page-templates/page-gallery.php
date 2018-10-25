<?php /* Template Name: Gallery Page */ ?>

<?php get_header(); ?>

<div class="gallery">
  <div class="gallery--top">
    <?php
      if(have_rows('partnerstop')):
        while(have_rows('partnerstop')): the_row();
    ?>
      <div class="gallery--top-partners"><img src="<?php the_sub_field('partner') ?>"></div>
    <?php
        endwhile;
      endif;
    ?>
  </div>
  <div class="gallery--body gallery--body-less" id="gallerybody">
    <?php
    $photocount = 1;
    $photoclass = 1;
    if(have_rows('gallery')):
        while(have_rows('gallery')): the_row();
    ?>
    <?php
      if($photocount === 1) {
    ?>
      <div class="gallery--body-wrap gallery--body-wrap-1">
    <?php
      } else if($photocount === 4) {
    ?>
      </div>
      <div class="gallery--body-wrap gallery--body-wrap-2">
    <?php
      } else if($photocount === 9) {
    ?>
      </div>
      <div class="gallery--body-wrap gallery--body-wrap-3">
    <?php
      }
    ?>
        <div class="img img-<?php echo $photocount ?>" style="background-image: url(<?php the_sub_field('image'); ?>); background-size: cover; background-repeat: no-repeat;">
          <div class="img--inner">
            <div class="img--inner-title"><?php the_sub_field('naziv') ?></div>
            <div class="img--inner-sub">
              <span class="img--inner-sub--title"><?php the_sub_field('naslov_2') ?></span>
              <span class="img--inner-sub--dash"></span>
              <span class="img--inner-sub--more" onclick="go_to_slide( 0 , <?php echo $photoclass ?>)">Read more</span></div>
            <div class=""></div>
          </div>
        </div>
    <?php
      $photocount++;
      $photoclass++;
      if($photocount === 14) {
    ?>
      </div>
    <?php
      $photocount = 1;
      }
        endwhile;
      endif;
    ?>
    </div>
  </div>
  <div class="gallery--loadmore">
    <div class="gallery--loadmore-text">
      <p onclick="gallery_expand()">Učitaj još</p>
    </div>
  </div>
</div>
<div class="slideshows slideshows--hidden" id="megaslider">
  <!-- <div class="slideshow--slides" id="slide"> -->
  <?php
    $slidecounter = 1;
    if(have_rows('gallery')):
      while(have_rows('gallery')): the_row();
  ?>
    <div class="slideshows-inner" id="slide_<?php echo $slidecounter ?>">
      <div class="slideshows-inner--left">
        <div class="slideshows-inner--left-inside" style="background-image: url(<?php the_sub_field('image') ?>); background-size: cover; background-repeat: no-repeat;">
          <div class="slideshows-inner--left-inside--icons">
            <span class="slideshows-inner--left-inside--icons-social"></span><span class="slideshows-inner--left-inside--icons-back" onclick="go_to_slide(0, 0)">Nazad</span>
          </div>
        </div>

      </div>
      <div class="slideshows-inner--right">
        <div class="slideshows-inner--right-top">
          <div class="slideshows-inner--right-top--title"><?php the_sub_field('naziv') ?></div>
          <div class="slideshows-inner--right-top--sub"><?php the_sub_field('naslov_2') ?></div>
        </div>
        <div class="slideshows-inner--right-bottom">
          <div class="slideshows-inner--right-bottom--left" onclick="go_to_slide(<?php echo $slidecounter ?>, <?php echo $slidecounter - 1 ?>)"><img src="../wp-content/uploads/2018/10/arrow_small.png"></div>
          <div class="slideshows-inner--right-bottom--right" onclick="go_to_slide(<?php echo $slidecounter ?>, <?php echo $slidecounter + 1 ?>)"><img src="../wp-content/uploads/2018/10/arrow_small.png"></div>
        </div>
      </div>
    </div>
  <?php
        $slidecounter++;
      endwhile;
    endif;
  ?>
  <!-- </div> -->

</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
