<?php /* Template Name: Plakari Page */ ?>

<div class="ploce">
  <div class="ploce--top">
    <div class="ploce--top-hero" style="background-image: url(<?php the_field('hero_image'); ?>);">
      <div class="gradient">
          <div class="ploce--top-hero--title"><?php $title = the_title(); echo strtoupper($title); ?></div>
          <div class="ploce--top-hero--text">
            <?php the_field('unutrasnji_text') ?>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="materijali">
 <?php
    $allPosts = new WP_Query(
      array(
        'post_type' => 'plakari',
        'posts_per_page' => -1,
        'post_status' => 'publish',
      )
    );

  ?>
  <?php
    $countDivs = 1;

      while ($allPosts->have_posts() ) : $allPosts->the_post();
        if(have_rows('plakari_element')):
          while(have_rows('plakari_element')): the_row();
    ?>
    <?php if($countDivs == 1) { ?>
    <div class="materijali-wrapper-<?php echo $countDivs ?>">
    <?php }
    if($countDivs == 4) { ?>
    </div>
    <div class="materijali-wrapper-<?php echo $countDivs/2 ?>">
      <?php }
      if($countDivs == 7) { ?>
    </div>
    <div class="materijali-wrapper-<?php echo intval($countDivs/2) ?>">
      <?php
      }
    ?>
      <div class="pic pic-<?php echo $countDivs ?>">
        <div class="pic--inner">
        <?php
          $carNo = 1;
          if(have_rows('image_carousel')){
            while(have_rows('image_carousel')){
            the_row();
            if($carNo == 1){
          ?>
            <a href="<?php the_permalink() ?>" class="pic--inner-top" style="background-image: url(<?php the_sub_field('galerry_image'); ?>); background-size: cover; background-repeat: no-repeat;"></a>
            <?php
            $carNo++;
            }
            ?>

          <?php
            }
          }
        ?>
            <div class="pic--inner-midd">
              <div class="pic--inner-midd--naslov2"><?php the_sub_field('naziv'); ?></div>
              <div class="pic--inner-midd--more"><a href="<?php the_permalink() ?>">Vidi više</a></div>
            </div>

            <div class="pic--inner-bottom">
              <div class="pic--inner-bottom--left">
                <div class="pic--inner-bottom--left--opis"><?php the_sub_field('opis'); ?></div>
                <div class="pic--inner-bottom--left--redline"></div>
              </div>
              <div class="pic--inner-bottom--right">
                <div class="pic--inner-bottom--right--more"><a href="<?php the_permalink() ?>">Vidi više</a></div>
                <div class="pic--inner-bottom--right--cena"><?php the_sub_field('cena'); ?></div>
              </div>
            </div>
        </div>
      </div>
    <?php
        $countDivs++;

      if($countDivs == 10 || ($wp_query->current_post +1) == ($wp_query->post_count)) {
      ?>
      </div>
      <?php
        $countDivs = 1;
      }
        endwhile;
      endif;
    endwhile;
    wp_reset_postdata();
    ?>
    </div>
</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer() ?>
