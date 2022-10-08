<?php global $assets_path; ?>

<div class="post-share">
  <span class="post-share__caption">Share:</span>
  <ul class="socials">
    <li class="socials__item">
      <a class="socials__link" onclick="Share.facebook('URL','TITLE','IMG_PATH','DESC')">
        <svg aria-hidden><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#facebook"></use></svg>
      </a>
    </li>
    <li class="socials__item">
      <a class="socials__link" onclick="Share.twitter('URL','TITLE')">
        <svg aria-hidden><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#twitter"></use></svg>
      </a>
    </li>
  </ul>
</div>