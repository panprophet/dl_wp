<?php /* Template Name: Fijoke sredina Page */ ?>

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
