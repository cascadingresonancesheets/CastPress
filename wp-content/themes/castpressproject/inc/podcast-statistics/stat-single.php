<?php
  $podcast = new WP_Query([
    'post_type' => 'podcast',
    'post__in' => [$_GET['podcast']]
  ]);

  $podcast->the_post();
  $stat = get_post_meta( get_the_ID(), 'cast-stat', true );
?>

<h1>"<?php the_title(); ?>": Статистика</h1>

<a href="<?php echo admin_url( 'admin.php?page=cast_statistics' ); ?>">← Назад</a>

<div class="stat-single-wrap">

<?php
  if ( $stat != "" ) {
    $stats = $stat['stats'];
    $time = $stat['time'];
    $session = 1;
    $secs_counts = [];

    echo "<div class='stat-single-session'>";

    foreach ( $stats as $item ) {
      $played_seconds = explode( ',', $item );
      sort($played_seconds);
      $ranges = [];
      $randges_counter = 0;

      for ( $i = 0; $i < count($played_seconds); $i++ ) {

        $secs_counts[$played_seconds[$i]] = ( isset($secs_counts[$played_seconds[$i]]) ) ? $secs_counts[$played_seconds[$i]] + 1 : 1;

        if ( $i == 0 ) {
          $ranges[$randges_counter] = [
            'start' => $played_seconds[$i],
            'end' => $played_seconds[$i]
          ];
          continue;
        }

        if ( $played_seconds[$i - 1] + 1 == $played_seconds[$i] ) {
          $ranges[$randges_counter]['end'] = $played_seconds[$i];

        } else {
          $randges_counter++;
          $ranges[$randges_counter] = [
            'start' => $played_seconds[$i],
            'end' => $played_seconds[$i]
          ];
        }
      }
      echo "<div class='session'>";
      echo "<h4>Сессия #" . $session++ . "</h4>";

      echo "<div class='session-timeline'>";
      echo "<div class='session-empty-timeline'></div>";

      $session_count = count( $played_seconds );
      $step = intval( 1000 / $time );

      foreach ( $ranges as $range ) {  
        $x = $step * $range['start'];
        $w = $step * ($range['end'] - $range['start']) + $step;

        ?>
          <div class='session-range-timeline'
          data-range="<?php echo $range['start'] . " - " . $range['end']; ?>"
          style="
            left: <?php echo $x; ?>px;
            width: <?php echo $w; ?>px;
          "></div>
        <?php
      }
      echo "</div>";
      echo "</div>";
    }

    echo "</div>"; # sessions section end

    $empty_seconds = [];
    for ( $i = 0; $i < $time; $i++ ) {
      $empty_seconds[$i] = 0;
    }

    ksort($secs_counts);

    $frequency_seconds = [];

    for ( $i = 0; $i < count($empty_seconds); $i++ ) {
      if ( isset($secs_counts[$i]) ) {
        $frequency_seconds[$i] = $secs_counts[$i];
      } else {
        $frequency_seconds[$i] = 0;
      }
    }

    $frequency_ranges = [];
    $frequency_randges_counter = 0;

    for ( $i = 0; $i < count($frequency_seconds); $i++ ) {
      
      if ( $i == 0 ) {
        $frequency_ranges[$frequency_randges_counter] = [
          'quantity' => $frequency_seconds[$i],
          'start' => $i,
          'end' => $i
        ];
        continue;
      }

      if ( $frequency_seconds[$i - 1] == $frequency_seconds[$i] ) {
        $frequency_ranges[$frequency_randges_counter]['end'] = $i;

      } else {
        $frequency_randges_counter++;
        $frequency_ranges[$frequency_randges_counter] = [
          'quantity' => $frequency_seconds[$i],
          'start' => $i,
          'end' => $i
        ];
      }
    }
    echo "<div class='stat-single-frequency'>";
    ?>

    <div class='frequency-timeline-wrap'>

    <?php
      $max_frequency = max( $frequency_seconds );
      $height_step = intval( 124 / $max_frequency );
      
      foreach ( $frequency_ranges as $frequency_range ) {
        $x = $step * $frequency_range['start']; 
        $w = $step * ($frequency_range['end'] - $frequency_range['start']) + $step;
        $h = $height_step * $frequency_range['quantity']

        ?>
          <div class='frequency-range-timeline'
          data-range="<?php echo $frequency_range['start'] . " - " . $frequency_range['end']; ?>"
          style="
            left: <?php echo $x; ?>px;
            width: <?php echo $w; ?>px;
            height: <?php echo $h; ?>px;
          "></div>
        <?php
      }

      for ( $i = 0; $i <= $max_frequency; $i++ ) {
        $b = $height_step * $i;
        echo "<div class='frequency-range-timeline-scale' style='bottom: ${b}px'><span>$i</span></div>";
      }

      echo "</div>"; # timeline-wrap end
      echo "</div>"; # frequency section end
      echo "</div>"; # wrap end
    }
  ?>
<?php wp_reset_postdata(); ?>