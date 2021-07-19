<?php //global $detect;
$whatsapp = '59895910150';
$whatsapp_msg = 'Hola...';

 if($detect->isMobile() ){
    $whatsapp_link = 'https://api.whatsapp.com/send?phone='.$whatsapp.'&amp;text='.$whatsapp_msg;
 }else{
    $whatsapp_link = 'https://web.whatsapp.com/send?phone='.$whatsapp.'&amp;text='.$whatsapp_msg;
 }
?>
<a id="whatsapp" href="<?=$whatsapp_link?>" class="white" target="_blank" data-wow-duration="1s" >
 <i class="icon-whatsapp"></i>
</a>