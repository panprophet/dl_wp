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
              <span class="img--inner-title-2--"><?php the_sub_field('naslov_2') ?></span>
              <span></span>
              <span>Read more</span></div>
            <div class=""></div>
          </div>
        </div>
    <?php
      $photocount++;
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

<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
