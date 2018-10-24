<?php /* Template Post Type: post, page, Kuhinja */ ?>
<?php get_header() ?>
<div class="kuhinja">

  <div class="kuhinja--top">
      <?php
        $wp_my_query = new WP_Query();
        $all_wp_pages = $wp_my_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

        $kuhinje = get_page_by_title('Fijoke');
        $kuhinje_children = get_page_children($kuhinje->ID, $all_wp_pages);
        foreach ($kuhinje_children as $child) {
      ?>
      <div class="kuhinja--top-menu"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
      <?php
        }
      ?>
      <div class="kuhinja--top-menu--arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                <path d="M0.5 17.375L23.3188 17.375L12.8375 27.8563L15.5 30.5L30.5 15.5L15.5 0.5L12.8563 3.14375L23.3188 13.625L0.5 13.625L0.5 17.375Z" fill="#E0E1E2"/>
        </svg>
      </div>
  </div>
 <div class="kuhinja--midd">
    <?php
      // $termChoioce;
      $postIds = [];
    $idCurr = get_the_id();

      $postTypes = new WP_Query( array(
        'post_type' => 'kitchen',
        'kitchen' => $term->slug,
        'tax_query' => array(
          array (
            'taxonomy' => 'fijoke_categories',
            'field' => 'slug',
            'terms' => 'fijoke',
          ),
        ),
      ));

      while ($postTypes->have_posts() ) : $postTypes->the_post();
      // array_push($postIds, the_ID());
      // $termChoioce = $postIds[0];

      if($idCurr === get_the_id()){
    ?>

    <div class="kuhinja--midd-link kuhinja--midd-link--active" id="<?php the_ID() ?>"><a href="<?php the_permalink(); ?>" ><?php echo the_title() ?></a></div>

    <?php } else {?>

    <div class="kuhinja--midd-link" id="<?php the_ID() ?>"><a href="<?php the_permalink(); ?>" ><?php echo the_title() ?></a></div>

    <?php } ?>

    <?php
      endwhile;
    ?>

<?php
    $loopPosts = new WP_Query( array(
      'post_type' => 'kitchen',
      'posts_per_page' => -1,
      'post__in'=> array ($idCurr),
    ));

    while ($loopPosts->have_posts() ) : $loopPosts->the_post();
      // the_ID();
    endwhile;

    ?>
 </div>
 <div class="kuhinja--bottom">
    <?php
      $counter = 1;
      if(have_rows('kuhinjarow')):
      while(have_rows('kuhinjarow')): the_row();
    ?>
    <div class="kuhinja--bottom-single" id="<?php echo "single_elem".$counter ?>">
      <div class="kuhinja--bottom-single--left">
        <div class="opis">
          <div class="opis-title"><?php the_sub_field('title') ?></div>
          <div class="opis-text"><?php the_sub_field('description') ?></div>
        </div>
        <!-- Elementi jedne garniture -->
        <div class="elements-label">
          <p>Propratni elementi</p>
        </div>

        <?php
          $elementi = 1;
          if(have_rows('elementirow')):
          while(have_rows('elementirow')): the_row();
        ?>
        <div class="elements-description">
          <div>
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
              <div class="elements-description--material-link"><a href="#">Read more</a></div>
            </div>
          </div>
        </div>

        <?php $elementi++ ?>
        <?php endwhile ?>
        <?php endif ?>
        <!--  Elementi jedne garniture  -->
      </div>
      <div class="kuhinja--bottom-single--right" style="background-image: url(<?php the_sub_field('bigpicture'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    </div>
    <?php $counter++ ?>
    <?php endwhile ?>
    <?php endif ?>
  </div>
  <div class="kuhinja--more">
    <?php
    $countDivs = 0;
      $allPosts = new WP_Query( array(
        'post_type' => 'kitchen',
        'posts_per_page' => -1,
        'post__not_in'=> array ($idCurr),
      ));

      while ($allPosts->have_posts() ) : $allPosts->the_post();
      if(have_rows('kuhinjarow')):
      while(have_rows('kuhinjarow')): the_row();
    ?>
    <div class="kuhinja--more-posts" style="background-image: url(<?php the_sub_field('bigpicture'); ?>); background-size: cover; background-repeat: no-repeat;"></div>
    <?php

      $countDivs++;
      endwhile;
      endif;
      endwhile;
    ?>
  </div>

</div>
<!-- <script>
  function expand_decription(idelem){
    // var id = idelem;
    var noElem = document.getElementsByClassName('elements-description--element').length;
    for(var i = 1; i <= noElem; i++) {
      if(document.getElementById('material_' + i + '').classList.contains('elements-description--material--expanded')){
        document.getElementById('material_' + i + '').classList.remove('elements-description--material--expanded');
        document.getElementById('material_' + i + '').classList.add('elements-description--material--collapsed');
      }
    }
    setTimeout(() => {
      document.getElementById('material_' + idelem + '' ).classList.remove('elements-description--material--collapsed');
      document.getElementById('material_' + idelem + '' ).classList.add('elements-description--material--expanded');
    }, 800);

  }
</script> -->
<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?> -->
