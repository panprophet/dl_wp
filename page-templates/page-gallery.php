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
              <span class="img--inner-sub--more" onclick="go_to_slide( 0 , <?php echo $photoclass; ?>)">Read more</span></div>
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
          <div class="slideshows-inner--right-top--sub"><?php the_sub_field('naslov_2') ?></div>
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
  <!-- </div> -->

</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
