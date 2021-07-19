<?php

/*//////////////////// GET IMG WIDTH & HEIGHT /////////////////////*/

function width_height($imgurl){

  $data   = getimagesize( $imgurl );
  $width  = $data[0];
  $height = $data[1];

  echo 'width="'.$width.'" height="'.$height.'"';
}


/* planta images */

function planta_img($plantas, $folder)
{

  $i = 0;

  foreach ($plantas as $key => $value) {

    if ($i == 0) {
      $plano_status = 'active trans';
    } else {
      $plano_status = ' trans';
    }
?>

    <img data-plano="<?= $key ?>" class="<?= @$plano_status ?>" src="plantas/<?= $folder ?>/<?= $key ?>.svg" loading="lazy" decoding="async" alt="<?= $key ?>"  >

<?php $i++;
  }
}

/* WEBP ALT */
function webp_alt($ext)
{

  $iPod        = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
  $iPhone      = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
  $iPad        = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
  $webOS       = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");
  $macintosh     = stripos($_SERVER['HTTP_USER_AGENT'], "macintosh");

  if ($iPod || $iPhone || $iPad || $webOS  || $macintosh) {
    $img_ext = $ext;
  } else {
    $img_ext = 'webp';
  }

  return $img_ext;
}

/* RENDER INCLUDE */
function require_to_var($file)
{
  ob_start();
  require($file);
  return ob_get_clean();
}

/* CHECK PAGE */
function checkPage($fileName,  $target)
{
  if ($fileName == $target) {
    echo 'active';
  }
}

/* ANCHOR */
function anchor($hash, $curr_page)
{
  if ($curr_page == 'home' && $GLOBALS['page'] == 'home') {
    echo '#' . $hash;
  } else {
    echo $GLOBALS['home_url'] . '#' . $hash;
  }
}

/* SMOOTH LINK  */
function smoothBonus($fileName)
{

  if ($fileName == 'home') {
    $class = 'smooth';

    if ($GLOBALS['detect']->isMobile()) {
      $class .= ' togg';
    }
  }

  echo @$class;
}

/* CROP TXT */
function crop_txt($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
    array_pop($words);
  return implode(' ', $words);
}


/* MULTIPLO */
function multiplo($i, $num)
{

  if ($i % $num == 0) {
    return true;
  } else {
    return false;
  }
}

/* LOG GENERATOR */
function log_gen($data)
{
  file_put_contents('log_gen.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);
}

/* DEBUG */
function debug($arr, $die = false)
{
  echo "<pre class='debug'>";
  $out = print_r($arr, true);
  echo htmlentities($out);
  echo "</pre>";

  if ($die) {
    die();
  }
}
