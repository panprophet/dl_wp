<?php /* Template Name: Sudopere */ ?>

<?php get_header(); ?>
<?php $element_slug = 'sudopere'; ?>
<div class="kuhinja">
  <div class="kuhinja--top">
      <div class="kuhinja--top--left">
        <div class="kuhinja--top--left--title">Kuhinje</div>
        <div class="kuhinja--top--left--menu">
        <?php
          $wp_my_query = new WP_Query();
          $all_wp_pages = $wp_my_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

          $kuhinje = get_page_by_title('Kuhinje');
          $kuhinje_children = get_page_children($kuhinje->ID, $all_wp_pages);
          foreach ($kuhinje_children as $child) {
            if(get_the_id() == $child->ID){
        ?>
          <div class="kuhinja--top--left--menu-item active"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
        <?php
        } else {
        ?>
          <div class="kuhinja--top--left--menu-item"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
        <?php
        }
        ?>

        <?php
          }
        ?>
        </div>
        <div class="kuhinja--top--left--back">
          <a href="#">
            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M16 7L3.83 7L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9L16 9L16 7Z" fill="white"/>
            </svg>
            </span>
            <span>Back</span>
          </a>
        </div>
      </div>
      <div class="kuhinja--top--right" style="background-image: url(<?php the_field('hero_image'); ?>); background-size: cover; background-repeat: no-repeat;">
      </div>

  </div>
</div>
<div class="bottom">
  <?php
    $counter = 1;
    if(have_rows('kuhinjarow')):
    while(have_rows('kuhinjarow')): the_row();
  ?>
  <div class="bottom-single" id="<?php echo "single_elem".$counter ?>">
    <div class="bottom-single--left">
      <div class="opis">
        <div class="opis-title"><?php the_sub_field('title') ?></div>
        <div class="opis-text"><?php the_sub_field('description') ?></div>
      </div>
      <!-- Elementi jedne garniture -->
    <div class="elements">

      <div class="elements-label">
        <p>Propratni elementi</p>
      </div>

      <?php
        $elementi = 1;
        if(have_rows('elementirow')):
        while(have_rows('elementirow')): the_row();
      ?>
      <div class="elements-description">
          <div class="elements-description--element">
            <div class="elements-description--element-info">
              <div class="elements-description--element-info--title"><?php the_sub_field('elementkuhinje'); ?></div>
              <div class="elements-description--element-info--price"><?php the_sub_field(''); ?></div>

              <div class="elements-description--element-info--harmonix" id="<?php echo "arrow_".$elementi ?>" onclick="expand_decription(<?php echo $elementi ?>)">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <g filter="url(#filter0_d)">
                <circle cx="16" cy="14" r="12" transform="rotate(180 16 14)" fill="#FAFBFC"/>
                </g>
                <path d="M19.06 15.2734L16 12.22L12.94 15.2734L12 14.3334L16 10.3334L20 14.3334L19.06 15.2734Z" fill="#840505"/>
                <defs>
                <filter id="filter0_d" x="0" y="0" width="32" height="32" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                <feOffset dy="2"/>
                <feGaussianBlur stdDeviation="2"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                </filter>
                </defs>
                </svg>
              </div>
            </div>
          </div>
          <?php if($elementi == 1) {?>
          <div class="elements-description--material elements-description--material--expanded" id="<?php echo "material_".$elementi ?>">
          <?php } else { ?>
          <div class="elements-description--material elements-description--material--collapsed" id="<?php echo "material_".$elementi ?>">
          <?php } ?>
            <div class="elements-description--material-title">
              <?php the_sub_field('materijalelementa'); ?>
            </div>
            <div class="elements-description--material-description">
              <div class="text"><?php the_sub_field('opiselementa'); ?></div><div class="thumb" style="background-image: url(<?php the_sub_field('slikaelementa'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
            </div>
            <div class="elements-description--material-link"><a href="#">Vidi više</a></div>
          </div>
      </div>

      <?php $elementi++ ?>
      <?php endwhile ?>
      <?php endif ?>
        </div>

      <!--  Elementi jedne garniture  -->
    </div>
    <div class="bottom-single--right" style="background-image: url(<?php the_sub_field('bigpicture'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
  </div>
  <?php $counter++ ?>
  <?php endwhile ?>
  <?php endif ?>
  </div>
</div>
<div class="more">
  <?php
  $parent_cat = get_term_by('slug', $element_slug, 'kuhinje_categories');
  $parent_id = $parent_cat->term_id;
  $children = get_terms('kuhinje_categories', array (
    'parent'=> $parent_id,
    'hide_empty' => false
  ));
  if($children) {
  $terms = get_terms([
    'taxonomy' => 'kuhinje_categories',
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
        'taxonomy' => 'kuhinje_categories',
        'field' => 'slug',
        'terms' => $term->slug,
      ),
    );
    } else {
    $query_args = array(
      array (
        'taxonomy' => 'kuhinje_categories',
        'field' => 'id',
        'terms' => $parent_id,
      ),
    );
    }
    $allPosts = new WP_Query(
      array(
        'post_type' => 'kuhinje',
        'posts_per_page' => -1,
        'tax_query' => $query_args,
      )
    );

  ?>
  <div class="more-term"><?php if($children) { echo $term->name; } else { echo the_title(); } ?></div>
    <!-- <div class="more-wrapper"> -->
    <?php
    $countDivs = 1;

      while ($allPosts->have_posts() ) : $allPosts->the_post();
        if(have_rows('fijoka_element')):
          while(have_rows('fijoka_element')): the_row();
    ?>
    <?php if($countDivs == 1) { ?>
    <div class="more-wrapper-<?php echo $countDivs ?>">
    <?php }
    if($countDivs == 4) { ?>
    </div>
    <div class="more-wrapper-<?php echo $countDivs/2 ?>">
      <?php }
      if($countDivs == 7) { ?>
    </div>
    <div class="more-wrapper-<?php echo intval($countDivs/2) ?>">
      <?php
      }
    ?>
      <div class="pic pic-<?php echo $countDivs ?>" style="background-image: url(<?php the_sub_field('main_image'); ?>); background-size: cover; background-repeat: no-repeat;">
        <div class="pic--inner">
          <div class="pic--inner-top">
            <p class="pic--inner-top--cena"><?php the_sub_field('cena'); ?></p>
          </div>
          <div class="pic--inner-midd">
            <p class="pic--inner-midd--naslov1"><?php the_title(); ?></p>
            <p class="pic--inner-midd--naslov2"><?php the_sub_field('naziv'); ?></p>
            <p class="pic--inner-midd--opis"><?php the_sub_field('opis'); ?></p>
          </div>
          <div class="pic--inner-bottom">
            <div class="pic--inner-bottom--redline"></div><div class="pic--inner-bottom--more"><a href="<?php the_permalink() ?>">Vidi više</a></div>
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
<?php get_footer(); ?>
