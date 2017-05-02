<?
global $APPLICATION; 
$phone = $APPLICATION->get_cookie("USER_PHONE");
$replace = array("+", " ", "-", ")", "(");
$phone_href = str_replace($replace, "", $phone);
?>




<div class="main-top-phone"><img src="/images/phone.png" alt=""><span><?if( isset($phone) && $phone != "" ):?><a href="tel:+<?=$phone_href ?>"><?=$phone?></a><?else:?><a href="tel:+78342317311">+7(8342)317-311</a><?endif;?></span></div>