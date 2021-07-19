<?php //global $detect;
$whatsapp = '59899919535';
$whatsapp_msg = 'Hola...';

 if($detect->isMobile() ){
    $whatsapp_link = 'https://api.whatsapp.com/send?phone='.$whatsapp.'&amp;text='.$whatsapp_msg;
 }else{
    $whatsapp_link = 'https://web.whatsapp.com/send?phone='.$whatsapp.'&amp;text='.$whatsapp_msg;
 }
?>
<a id="whatsapp" href="<?=$whatsapp_link?>" target="_blank" data-wow-duration="1s" >
 <i class="icon-whatsapp"></i>
 <span class="span-whatsapp" >whatsapp</span>
</a>