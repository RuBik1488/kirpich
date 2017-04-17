<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
	global $APPLICATION;
	$city = $APPLICATION->get_cookie("USER_CITY");
	$text = $APPLICATION->get_cookie("USER_TEXT");
	$pathArr = explode('/', $APPLICATION->GetCurPage());
	$firstVisit = $APPLICATION->get_cookie("USER_FIRST_VISIT");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta http-equiv="Content-Language" content="ru" />

    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<?$APPLICATION->ShowHead()?>
<?
	include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/canonical.php");
?>
	<link rel="icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="shortcut icon" href="/favicon.ico"></link> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="/js/cart.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-45603651-28', 'auto');
	  ga('send', 'pageview');
	
	</script>
</head>
<?
$q=substr_count($_SERVER['HTTP_USER_AGENT'], "bot");
$w=substr_count($_SERVER['HTTP_USER_AGENT'], "google");
$e=substr_count($_SERVER['HTTP_USER_AGENT'], "Yandex");
$r=substr_count($_SERVER['HTTP_USER_AGENT'], "Bond");
?>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div id="panel"></div>
  <nav id="mobileMenu"></nav>
  <main id="page">
	<header>
        <div id="top_header">
            <div class="container-fluid">
                <div class="row">
                	<div style="display:none;">
						<div id="bought">
							<span class="h2_span">
								Товар успешно добавлен!
							</span><br>
							<a href="/cart/index.php" class="cart-buttons">
								Перейти в корзину
							</a>
							<a class="cart-buttons close-f" href="#">
								Продолжить покупки
							</a>
							<a class="not-show" href="#">продолжить и больше не показывать</a>
						</div>
					</div>
<!--                    <div class="col-md-2 col-sm-12 col-xs-12">-->
<!--                        <a href="/" title="На главную" class="logo-top">-->
<!--                             <span id="top-logo-text"></span>-->
<!--                        </a>-->
<!--                    </div>-->
                    <div class="col-md-3 col-sm-12 col-xs-12"></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<?
						if ( CModule::IncludeModule("iblock") ):
							$arFilter = Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y");
							$res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, Array("ID", "NAME", "IBLOCK_ID", "PROPERTY_TEXT", "PROPERTY_PHONE"));
							if ( intval($res->SelectedRowsCount()) > 0 ):
								$select = "";
								$dr_c = "";
								$cc = 0;
							?>   
								<div class="city-area">
									<span>Ваш город: </span>
									<?if( $city == "" && $firstVisit == "" ):?>
											<script>
												$.getJSON("http://api.sypexgeo.net/json/<?echo $_SERVER['REMOTE_ADDR'];?>", function(data){
													var city_name = data.city.name_ru;
													if ( city_name && city_name != "" ) {
														$('.cityQuestionPanel #city').text(city_name);
														$('.cityQuestionPanel').css('display', 'block');
													}	
												});
											</script>
											<div class="cityQuestionPanel">
												<div class="cityQuestion">
													<nobr>Ваш город - <span id="city"></span></nobr><br>
														Угадали?<br>
													<div style="padding: 20px 0px 10px 0px">
														<p><span id="yes_geo" class="geo_cl">Да</span><span class="geo_cl" id="no_geo">Нет</span></p>
													</div>
												</div>
											</div>
									<?endif;?>
									<select>
										<?while( $obj = $res->GetNext() ):?>
											<?
												++$cc;
												if ( $cc == 1 ) {
													$select .= "<ul>";
												} else if ( $cc == 6 ) {
													$select .= "</ul><ul>";
												}
											?>
											<?if ( $obj['ID'] != 351 ){$select .= '<li>'.$obj['NAME'].'</li>';} else { $dr_c .= '<li>'.$obj["NAME"].'</li></ul>'; }?>
											<option <?if( $obj['NAME'] == $city ):?>selected=""<?endif;?> value="<?=$obj['PROPERTY_PHONE_VALUE']?>"><?=$obj['NAME']?></option>
										<?endwhile?>
									</select>
								</div>
								<div id="city-select">
									<span class="h1_span">Выберите город из списка</span>
									<div class="borderline"></div>
									<ul class="select-city-user">
										<?=$select.$dr_c?>
									</ul>
								</div>
							<?endif;?>
						<?endif;?>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <a id="callback" href="javascript:void(0)">Заказать звонок</a>
                        <!-------------КОРЗИНА------------>
<!--                        <div class="cart-container">-->
<!--                            <a href="/cart/" style="float:left;">-->
<!--                                <img src="/images/cart.png" height="45">-->
<!--                            </a>-->
<!--                            <span>Корзина (--><?//=count($_SESSION['CART']);?><!--)</span>-->
<!--                            --><?//CModule::IncludeModule('iblock');?>
<!--							--><?//$price=0;?>
<!--								--><?//foreach($_SESSION['CART'] as $key=>$arItem):?>
<!--									--><?//
//										$arSelect = Array("ID", "IBLOCK_ID", "NAME","PREVIEW_PICTURE","PROPERTY_*");
//										$arFilter = Array("IBLOCK_ID"=>3,"ID"=>$key);
//										$res = CIBlockElement::GetList(Array(), $arFilter, false, $arSelect);
//										while($ob = $res->GetNextElement()){
//											$arFields = $ob->GetFields();
//											$arProps = $ob->GetProperties();
//                                            $retail_price = (float)str_replace(",", ".", $arProps['RETAIL_PRICE']['VALUE']);
//											?>
<!--											--><?//$price+=$retail_price*$arItem;?>
<!--											-->
<!--									--><?//
//										}
//									?>
<!--								--><?//endforeach;?>
<!--                            <br>-->
<!--                            <span class="price">--><?//=number_format($price, 2, '.', ' ')?><!-- <i class="fa fa-rub" aria-hidden="true"></i></span>-->
<!--                        </div>-->
                        <!-------------END КОРЗИНА------------>

                    </div>
<!--					<div class="top-info-phone">-->
<!--                        --><?//$APPLICATION->IncludeComponent(
//							"bitrix:main.include",
//							"",
//							Array(
//								"AREA_FILE_SHOW" => "file",
//								"PATH" => "/inc/phone-pict.php",
//								"EDIT_TEMPLATE" => ""
//							),
//						false
//						);?>
<!--                    </div>-->
                </div>
            </div>
        </div>
        <div id="bottom_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12 hidden-xs">
                        <div id="logo">
                            <a href="/" title="кирпич в Саранске">
                                <img src="/images/logo.png" border="0" width="" height="" alt="ООО Микстрейд">
                            </a>
                        </div>
                    </div>
                	<div class="col-md-6 col-xs-12 col-sm-12">
                	 	<div class="row">
		                    <div class="col-md-12 col-sm-12 col-xs-12">
		                        <!--Меню-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/0.1.11/slideout.min.js"></script>
<script>
jQuery(document).ready(function(){
  var slideout = new Slideout({
    'panel': document.getElementById('page'),
    'menu': document.getElementById('mobileMenu'),
    'padding': 256,
    'tolerance': 70
  });
  slideout.on('open', function() {
    jQuery('#mobileMenu').append('<div class="inner">'
        + jQuery('header #navbar').html()
        + jQuery('.content #left_sidebar').html()
        +'</div>');
  });
  slideout.on('close', function() {
    jQuery('#mobileMenu .inner').remove();
  });
  jQuery('.openMobileMenu').click(function(){
    slideout.toggle();
  });
  window.addEventListener('resize', function(event){
    if (window.innerWidth > 768) {
      slideout.close();
    }
  });
});
</script>
		                        <div class="center-header-block">
		                           <nav class="navbar navbar-default" role="navigation">
		                                <div class="navbar-header">
		                                    <button type="button" class="navbar-toggle openMobileMenu"
                                          <?/*?>
                                          data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"
                                          <?// */?>
                                        >
		                                        <span class="icon-bar"></span>
		                                        <span class="icon-bar"></span>
		                                        <span class="icon-bar"></span>
		                                    </button>
		                                </div>
		                                
		                                <?$APPLICATION->IncludeComponent(
												"bitrix:menu",
												"main-menu",
												Array(
													"ROOT_MENU_TYPE" => "top",
													"MAX_LEVEL" => "1",
													"CHILD_MENU_TYPE" => "left",
													"USE_EXT" => "N",
													"DELAY" => "N",
													"ALLOW_MULTI_SELECT" => "N",
													"MENU_CACHE_TYPE" => "N",
													"MENU_CACHE_TIME" => "3600",
													"MENU_CACHE_USE_GROUPS" => "Y",
													"MENU_CACHE_GET_VARS" => ""
												),
											false
											);?>
		                            </nav>
		                            <div id="search_box_container" style="margin-left: 0px;">
		                                <form action="/catalog/">
		                                    <div class="input">
		                                        <input id="title-search-input" name="q" value="" autocomplete="off" placeholder="Введите запрос для поиска" type="text">&nbsp;<input name="s" value="" type="submit">
		                                    </div>
		                                </form>
		                            </div> 
		                        </div>
		                    </div>
                            <!-- <div class="col-md-2 col-sm-12 col-xs-12">
                                 <div id="header_banners">
                                     <a id="get_kp_button2" class="mf btn btn-kirpich" href="javascript:void(0)">
                                         ОНЛАЙН ЗАПРОС
                                     </a>
                                 </div>
                             </div>

                		     </div>-->

                	    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="wr_phone">
                            <img src="/images/phone.png" alt="">
                            <span><a href="tel:+78342317311">+7 (8342) 317-311</a></span>
                        </div>
                        <div class="basket">
                            <img src="/images/basket.png" alt="">
                            <span>Корзина (33) 115455</span>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <div class="wrapper">
        <div class="content">
             <div class="container-fluid">
             	<div class="row">
             		 <div class="col-md-3 col-sm-3 col-xs-12" id="left_sidebar">

                         <div class="wr_left_menu">
						 <a href="/catalog/" class="catalog-sidbar-link"><span class="h2_span <?if( $city != "" && CSite::InDir('/index.php') ):?>mobile_scroll<?endif;?>">Каталог продукции</span></a>
<?///*?>
							<button type="button" class="navbar-toggle  left-menu-toogle" data-target="#left-menu">
		                                        <span class="icon-bar"></span>
		                                        <span class="icon-bar"></span>
		                                        <span class="icon-bar"></span>
		                                    </button>
<?// */?>
                            <?$APPLICATION->IncludeComponent(
								"bitrix:catalog.section.list",
								"left_menu",
								Array(
									"IBLOCK_TYPE" => "tcatalog",
									"IBLOCK_ID" => "3",
									"SECTION_ID" => $_REQUEST["SECTION_ID"],
									"SECTION_CODE" => "",
									"SECTION_URL" => "",
									"COUNT_ELEMENTS" => "N",
									"TOP_DEPTH" => "2",
									"SECTION_FIELDS" => array(),
									"SECTION_USER_FIELDS" => array(),
									"ADD_SECTIONS_CHAIN" => "N",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "36000000",
									"CACHE_GROUPS" => "Y"
								),
							false
							);?>
                           <div class="cart-open <?if($_SESSION['NO_SHOW']==1) echo 'closed';?>"></div>
                         </div>
                        </div>
                        <div class="col-md-6 col-sm-9 col-xs-12 <?if( !CSite::InDir('/index.php') ):?>mobile_scroll<?endif;?>">
							<span class="h1_span <?if( $pathArr[1] == "catalog" && $pathArr[3] != "" ):?>detail_page_title<?endif;?>"><?=$APPLICATION->ShowTitle(false)?></span>
                            <?if ( $APPLICATION->GetCurPage() != "/" ):?>
	                            <?$APPLICATION->IncludeComponent(
									"bitrix:breadcrumb", 
									".default", 
									array(
										"START_FROM" => "0",
										"PATH" => "",
										"SITE_ID" => "s1",
										"COMPONENT_TEMPLATE" => ".default",
										"COMPOSITE_FRAME_MODE" => "A",
										"COMPOSITE_FRAME_TYPE" => "AUTO"
									),
									false
								);?>
							<?endif?>
                            <hr class="bottom-hr">