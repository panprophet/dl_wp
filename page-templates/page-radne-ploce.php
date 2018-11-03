<?php /* Template Name: Radne ploce */ ?>

<?php get_header() ?>
<?php $element_slug = 'plocasti_materijali'; ?>

<div class="ploce">

  <div class="ploce--top">
    <div class="ploce--top-hero" style="background-image: url(<?php the_field('hero_image'); ?>);">
        <div class="ploce--top-hero--title"><?php $title = the_title(); echo strtoupper($title); ?></div>
        <div class="ploce--top-hero--text">
        <?php the_field('unutrasnji_text') ?>
        </div>
    </div>
  </div>
  <div class="ploce--midd">
    <div class="ploce--midd-title">
      <?php
      $wp_my_query = new WP_Query();
          $all_wp_pages = $wp_my_query->query(array('post_type' => 'page', 'posts_per_page' => '-1', 'order' => 'ASC'));

          $materijali = get_page_by_title('Materijali');
          $materijali_children = get_page_children($materijali->ID, $all_wp_pages);
          foreach ($materijali_children as $child) {
            $chil_child = get_pages(array('child_of' => $child->ID));
            if(count($chil_child) != 0) {
              if(get_the_id() == $child->ID){
      ?>
            <div class="ploce--midd-title--link active"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
      <?php
              }else {
      ?>
            <div class="ploce--midd-title--link"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
      <?php
              }
            }
          }
      ?>
    </div>
  </div>
  <!-- <div class="ploce--bottom">
    <div class="ploce--bottom-text">
        <?php the_field('unutrasnji_text') ?>
    </div>
  </div> -->
</div>
<div class="materijali">
 <?php
  $parent_cat = get_term_by('slug', $element_slug, 'materijali_categories');
  $parent_id = $parent_cat->term_id;
  $children = get_terms('materijali_categories', array (
    'parent' => $parent_id,
    'hide_empty' => false
  ));
  if($children) {
    $terms = get_terms([
      'taxonomy' => 'materijali_categories',
      'hide-empty' => true,
      'child_of' => $parent_id,
    ]);
  } else {
    $terms[] = $parent_id;
  }
  foreach($terms as $term) {
    if($children) {
    $query_args = array(
      array (
        'taxonomy' => 'materijali_categories',
        'field' => 'slug',
        'terms' => $term->slug,
      ),
    );
    } else {
    $query_args = array(
      array (
        'taxonomy' => 'materijali_categories',
        'field' => 'id',
        'terms' => $parent_id,
      ),
    );
    }
    $allPosts = new WP_Query(
      array(
        'post_type' => 'materijali',
        'posts_per_page' => -1,
        'tax_query' => $query_args,
      )
    );

  ?>
  <!-- <div class="materijali-term"><?php if($children) { echo $term->name; } else { echo the_title(); } ?></div> -->
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
            <div class="pic--inner-top" style="background-image: url(<?php the_sub_field('galerry_image'); ?>); background-size: cover; background-repeat: no-repeat;">
          <?php
              }
            $carNo++;
            }
          }
        ?>
          </div>
          <div class="pic--inner-midd">
            <!-- <p class="pic--inner-midd--naslov1"><?php the_title(); ?></p> -->
            <p class="pic--inner-midd--naslov2"><?php the_sub_field('opis'); ?></p>
          </div>
          <div class="pic--inner-bottom">
            <!-- nesto od ovoga ne treba da ide the tile , naziv ili opis.. raspitaj se sta je sta -->
            <div class="pic--inner-bottom--left">
              <div class="pic--inner-bottom--left--opis"><?php the_sub_field('naziv'); ?></div>
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

      // if($countDivs == 10 || ($wp_query->current_post +1) == ($wp_query->post_count)) {
        if($countDivs == 7 || ($countDivs-1) == ($wp_query->post_count)){
        $countDivs = 1;
      ?>
      <?php
      }
        endwhile;
      endif;
    endwhile;
    wp_reset_postdata();
    ?>
    </div>
            <div class="materijali-readmore">
          <div class="materijali-readmore--title">
          <?php if($children) { echo $term->name; } else { echo the_title(); } ?>
          </div>
          <div class="materijali-readmore--info">
            <div class="materijali-readmore--info-text">Sastavni deo svake kuhinje je radna površina,tj. radna ploča.
Kuhinjske radne ploče,u odnosu na oplemenjenu ivericu, imaju povećanu otpornost na udarce,ogrebotine,hemikalije i toplotu.
</div>
            <div class="materijali-readmore--info-link"><a href="<?php
              $page = new WP_Query(array(
                'post_type' => 'page',
                'name' => $term->slug,
              ));
            foreach($page as $p) {
              echo $p->guid;
            }
            ?>">Vidi više</a></div>
          </div>
        </div>
    <?php
  }
  ?>
</div>
</div>
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer() ?>
