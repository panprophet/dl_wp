<?php /* Template Name: Plocasti materijali grupa */ ?>

<?php
  global $post;
  $post_slug = $post->post_name;
  // echo $post_slug;
 ?>
<div class="ploce">
  <div class="ploce--top">
    <div class="ploce--top-hero" style="background-image: url(<?php the_field('hero_image'); ?>);">
    </div>
  </div>
  <div class="ploce--midd">
    <div class="ploce--midd-title">
      <div class="ploce--midd-title--link active"><?php the_title(); ?></div>
    </div>
  </div>
  <div class="ploce--bottom">
    <div class="ploce--bottom-text">
        <?php the_field('unutrasnji_text') ?>
    </div>
  </div>
</div>
<div class="materijali">
 <?php
  $parent_cat = get_term_by('slug', $post_slug, 'materijali_categories');
    $terms[] = $parent_id;
  foreach($terms as $term) {
    $query_args = array(
      array (
        'taxonomy' => 'materijali_categories',
        'field' => 'slug',
        'terms' => $parent_cat,
      ),
    );
    $allPosts = new WP_Query(
      array(
        'post_type' => 'materijali',
        'posts_per_page' => -1,
        'tax_query' => $query_args,
      )
    );

  ?>
  <div class="materijali-term"><?php if($children) { echo $term->slug; } else { echo the_title(); } ?></div>
    <!-- <div class="materijali-wrapper"> -->
    <?php
    $countDivs = 1;

      while ($allPosts->have_posts() ) : $allPosts->the_post();
        if(have_rows('materijali_element')):
          while(have_rows('materijali_element')): the_row();
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
            <div class="pic--inner-top" style="background-image: url(<?php the_sub_field('galerry_image'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
            <?php
            $carNo++;
            }
            ?>

          <?php
            }
          }
        ?>
            <div class="pic--inner-midd">
              <!-- <p class="pic--inner-midd--naslov1"><?php the_title(); ?></p> -->
              <p class="pic--inner-midd--naslov2"><?php the_sub_field('naziv'); ?></p>
            </div>

            <div class="pic--inner-bottom">
                <!-- nesto od ovoga ne treba da ide the tile , naziv ili opis.. raspitaj se sta je sta -->
              <div class="pic--inner-bottom--left">
                <div class="pic--inner-bottom--left--opis"><?php the_sub_field('opis'); ?></div>
                <div class="pic--inner-bottom--left--redline"></div>
              </div>
              <div class="pic--inner-bottom--right">
                <div class="pic--inner-bottom--right--more"><a href="<?php the_permalink() ?>">Read more</a></div>
                <div class="pic--inner-bottom--right--cena"><?php the_sub_field('cena'); ?></div>
              </div>
            </div>
        </div>
      </div>
    <?php
      // $countDivs = 1;
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
    <?php
  }
  ?>
  <!-- </div> -->
</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer() ?>
