<?php
  global $assets_path;
  $links = get_field( 'links' );
  if ( $links ):
?>
<div class="podcast__platforms">
  <div class="listen-on">
    <span class="listen-on__caption">Слушайте также на:</span>
    <ul class="listen-on__list">
      <?php
        foreach ( $links as $label => $link ):
      ?>
      <?php if ( $link !== "" ): ?>
      <li class="listen-on__item">
        <a class="listen-on__link" href="<?php echo $link; ?>" target="_blank">
        
          <?php 
          
            switch ($label) {
              case 'spotify': $sprite = 'spotify'; break;
              case 'soundcloud': $sprite = 'soundcloud'; break;
              case 'applemusic': $sprite = 'apple'; break;
              }
              
              echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . $sprite . '"></use></svg>';
          ?>

        </a>
      </li>
      <?php endif; endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>