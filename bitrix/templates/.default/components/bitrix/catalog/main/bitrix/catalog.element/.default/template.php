<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
	$(document).ready(function(){
		if (!mobilecheck()) {
			$('#left-menu .ul-closed').removeClass("ul-closed");
		}
	});
</script>
<?
        $APPLICATION->SetPageProperty("title", $arResult["NAME"]);
	$APPLICATION->SetPageProperty("keywords", $arResult["NAME"]);
	$APPLICATION->SetPageProperty("description", $arResult["NAME"]." - купить в Саранске. Заказать с доставкой в Мордовии по телефону: +7(8342)317-311.");
?>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<script type="text/javascript">
		$(document).ready(function() {
					$('.fancybox').fancybox({
						loop: true,
						helpers : {
							thumbs : {
								width  : 50,
								height : 50
							}
						}
					});
		});
	</script>
    <script src="https://form.kupivkredit.ru/sdk/v1/sdk.js?onload=myOnLoadFunction" type="text/javascript" async></script>
    <script type="text/javascript">
        window.callbacks = [];
        window.onload = function() {
            for (var i = 0; i < this.callbacks.length; i++) {
                this.callbacks[i].call();
            }
        };
        window.myOnLoadFunction = function(KVK) {
            var button, form, order, sign;
            window.callbacks.push(function() {
                button = $("#get_kredit_form");
                button.removeAttr("disabled");
                button.click(function() {
                    order = $(this).attr("data-order");
                    sign = $(this).attr("data-sign");
                    form = KVK.ui("form", {
                        order: order,
                        sign: sign,
                        type: "full"
                    });
                    // Открытие формы по нажатию кнопки
                    form.open();
                });
            });
        }
    </script>
	    <div class="row">
            <div class="col-md-7 col-sm-8 col-xs-12 col-lg-9 col-md-lg-8">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 left-detail-block">
                        <div class="el_img">
                            <div class="el_img_cont">
                                <?$file = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width'=>320,'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                <a href="<?=$arResult['DETAIL_PICTURE']['SRC'];?>" rel="gallery" data-fancybox-group="gallery" class="fancybox">
                                    <img src="<?=$file['src'];?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="price-block-card">
                            <?
                            $measure = \iteamo\price::getMeasure($arResult);
                            $retail_price = (float)str_replace(",", ".", $arResult['PROPERTIES']['RETAIL_PRICE']['VALUE']);
                            ?>
                            <p>Цена: <span class="eip_price"><?= number_format($retail_price, 2, '.', ' ') ?></span> <i class="fa fa-rub" aria-hidden="true"></i> за 1 <?= $measure ?> </p>
                        </div>
                        <p><span class="eip_opt">Склад: <b><?=$arResult['PROPERTIES']['STORAGE']['VALUE'];?></b></span></p>
                        <div class="price-guarantee-text">
                            Планируете приобрести этот товар? Но у вас есть<br>
                            предложение с более низкой ценой? Позвоните или <br>
                            напишите нам, на многие товары мы сможем предложить<br>
                            более низкую цену.
                        </div>
                        <div class="price-guarantee">
                            <a class="highslide-form" href="#webform-best-price"><span class="glyphicon glyphicon-rub" aria-hidden="true"></span> Запрос более низкой цены</a>
                        </div>
                        <?if($arResult['PROPERTIES']['ARTICLE']['VALUE']!=''):?>
                            <p>
                                Артикул: <b><?=$arResult['PROPERTIES']['ARTICLE']['VALUE']?></b>
                            </p>
                        <?endif;?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 infoblock_detatil">
                        <br>
                        <ul class="tabs_button_detail">
                            <li class="active" data-id="#char_detail">Характеристики</li>
                            <? if (!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
                                <li data-id="#photos_detail">Фото (<?= count($arResult['PROPERTIES']['GALLERY']['VALUE']); ?> шт.)</li>
                            <? endif; ?>
                            <? if (!empty($arResult['DETAIL_TEXT'])): ?>
                                <li data-id="#descr_detail">Описание</li>
                            <? endif ?>
                        </ul>
                        <div style="clear: both;"></div>
                        <div class="borderline"></div>
                        <div class="characteristic_in_detail yes_display" id="char_detail">
                            <h3>ОСНОВНЫЕ ХАРАКТЕРИСТИКИ</h3>
                            <?if($arResult['PROPERTIES']['MANUFACTURER']['VALUE'] != ''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['MANUFACTURER']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['MANUFACTURER']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['MARK']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['MARK']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['MARK']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['SIZE']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['SIZE']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['SIZE']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['KIND_OF_SIZE']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['KIND_OF_SIZE']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['KIND_OF_SIZE']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['CONSIST']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['CONSIST']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['CONSIST']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['MASS']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['MASS']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['MASS']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>

                            <?// ITEAMO.NET <<< ========================================================= ?>
                            <?if($arResult['PROPERTIES']['PACKING']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6">Кол-во в поддоне (шт):</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['PACKING']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['PODDON_COUNT']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['PODDON_COUNT']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['PODDON_COUNT']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['PODDON_V']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['PODDON_V']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['PODDON_V']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['NORMA_ZAGRUZKI']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?// ITEAMO.NET <<< ========================================================= ?>

                            <?if($arResult['PROPERTIES']['HOLE']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['HOLE']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['HOLE']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['SURFACE']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['SURFACE']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['SURFACE']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['FROST_PROTECTED']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['FROST_PROTECTED']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['FROST_PROTECTED']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['WATER_ABSORB']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['WATER_ABSORB']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['WATER_ABSORB']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['HEAT']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['HEAT']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['HEAT']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['FORM']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['FORM']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['FORM']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['COLOR']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['COLOR']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['COLOR']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['SHADE']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['SHADE']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['SHADE']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                            <?if($arResult['PROPERTIES']['FORMAT']['VALUE']!=''):?>
                                <div class="prop-block-row row">
                                    <div class="col-md-4 col-sm-4 col-xs-6"><?=$arResult['PROPERTIES']['FORMAT']['NAME']?>:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-6 detail-char-value"><?=$arResult['PROPERTIES']['FORMAT']['VALUE']?></div>
                                </div>
                                <div class="dotted"></div>
                            <?endif;?>
                        </div>
                        <?if( !empty($arResult['PROPERTIES']['GALLERY']['VALUE']) ):?>
                            <div class="photos_gallery not_display" id="photos_detail">
                                <?foreach($arResult['PROPERTIES']['GALLERY']['VALUE'] as $arItem):?>
                                    <?$file=CFile::GetPath($arItem);?>
                                    <?$file1=CFile::ResizeImageGet($arItem, array('width'=>150,'height' => 105), BX_RESIZE_IMAGE_EXACT, true);?>
                                    <a href="<?=$file;?>" rel="gallery" data-fancybox-group="gallery" class="fancybox more_photo"><img src="<?=$file1['src'];?>"></a>
                                <?endforeach;?>
                            </div>
                        <?endif;?>
                        <?if( !empty($arResult['DETAIL_TEXT']) ):?>
                            <div id="descr_detail" class="not_display">
                                <p><?=$arResult['DETAIL_TEXT']?></p>
                            </div>
                        <?endif;?>

                    </div>
                    <?if( !empty($arResult['PROPERTIES']['CERTIFY']['VALUE']) ):?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <br>
                            <br>
                            <h3>Сертификаты</h3>
                            <div id="sertificates">
                                <table>
                                    <tbody>
                                    <tr>
                                        <?foreach($arResult['PROPERTIES']['CERTIFY']['VALUE'] as $arItem):?>
                                            <?$rsFile = CFile::GetFileArray($arItem);?>
                                            <td>
                                                <a download="<?=$rsFile['ORIGINAL_NAME'];?>" href="<?=$rsFile['SRC'];?>" class="srtf"><?=$rsFile['ORIGINAL_NAME'];?><br><span>(<?=round($rsFile['FILE_SIZE']/1000000,2);?> мб)</span></a>
                                            </td>
                                        <?endforeach;?>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?endif;?>
                </div>
            </div>
		    <div class="col-md-5 col-sm-12 col-xs-12 col-lg-3 col-md-lg-4">
                <div id="ordrbx" class="pd_10 lvl">
                    <div class="date">

                        <b>Цена за 1 <?= $measure ?></b>
                        <?
                        $arDate = explode('/', $arResult['TIMESTAMP_X']);
                        ?>
                        <?
                        $format = "DD.MM.YYYY";
                        $new_format = "DD.MM.YYYY";
                        $new_date = $DB->FormatDate($arDate[0], $format, $new_format);
                        ?>
                        <span>(<?= $new_date; ?>)</span>
                    </div>
                    <div id="itmprc" class="price  lvl-2">
                        <div class="cur lvl">
                            <b id="showPrice"><?= rtrim(rtrim(number_format($retail_price, 2, '.', ' '),"0"),".") ?></b><i class="equal"> <i class="fa fa-rub" aria-hidden="true"></i> / 1
                                <span><?=$measure?></span></i>
                        </div>
                    </div>
                    <? if ($arResult['IBLOCK_SECTION_ID'] == 2 || $arResult['IBLOCK_SECTION_ID'] == 3 || $arResult['IBLOCK_SECTION_ID'] == 29) {
                        $poddon = $arResult['PROPERTIES']['PACKING']['VALUE'];
                        $gr = 20000;
                        if (CModule::IncludeModule("iblock")) {
                            $res_gr = CIBlockElement::GetByID(357);
                            if($ar_res_gr = $res_gr->GetNext()) {
                                $gr = $ar_res_gr['NAME'];
                            }
                        }
                        $mass = str_replace(",", ".", $arResult['PROPERTIES']['MASS']['VALUE']);
                        $val = str_replace(",", ".", $arResult['PROPERTIES']['PACKING']['VALUE']);
                        if ($mass != 0 && $val != 0 && $mass != "" && $val != "") {
                            $poddon_val = floor($gr / ($mass * $val));
                            $sht = floor($poddon_val * $val);
                            if (empty($arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'])) {
                                $arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'] = number_format($poddon_val, 0, '.', ' ') . ' поддонов' . ' / ' . number_format($sht, 0, '.', ' ') . ' шт.';
                            }
                        }
                    } else if ($arResult['IBLOCK_SECTION_ID'] >= 6 && $arResult['IBLOCK_SECTION_ID'] <= 10 ) {
                        $poddon = $arResult['PROPERTIES']['PODDON_V']['VALUE'];
                        if ($arResult['IBLOCK_SECTION_ID'] == 8) {
                            $poddon = $arResult['PROPERTIES']['PODDON_COUNT']['VALUE'];
                        }
                    } else {
                        $poddon = 1;
                    }
                    ?>

                    <div id="calc" class="clr">
                        <div class="attributes" id="var_otgruzka">
                            <div class="form-item" id="edit-attributes-3-wrapper">
                                <label>Варианты отгрузки: </label>
                                <div id="dlvryvar"><?= rtrim(rtrim(number_format($poddon, 2, '.', ' '),"0"),".") ?> <?= $measure ?></div>
                                <div style="clear: both;"></div>
                                <?if (!empty($arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'])) {?>
                                    <label>Норма загрузки а/м: </label>
                                    <div id="normaZagr"><?= $arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'] ?></div>

                                    <div style="clear: both;"></div>
                                <?}?>
                                <?
                                preg_match("/шт. \/ (.*) м3/", $arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'], $norm);
                                preg_match("/\/ (.*) шт.$/", $arResult['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'], $norm2);
                                if(isset($norm[1])){
                                    $norma = str_replace(' ', '', $norm[1]);
                                } elseif(isset($norm2[1])){
                                    $norma = str_replace(' ', '', $norm2[1]);
                                } else {
                                    $norma = $poddon;
                                }
                                //
                                ?>
                            </div>
                        </div>
                        <?

                        //print_r($arResult['PROPERTIES']); ?>
                        <div class="form-item" id="edit-qty-wrapper">
                            <label for="edit-qty">Единиц товара:</label>
                            <input type="hidden" value="<?= $arResult["ID"] ?>" id="detail_id_item">
                            <span class="count_minus " data-count="<?= $poddon ?>">-</span>
                            <input id="edit-qty" data-qty="<?= $norma/*$poddon*/ ?>" data-step="<?= $poddon ?>" <?if (isset($sht)):?>data-sht="<?=$sht?>"<?endif;?> type="text" maxlength="6" name="quantity" size="5" value="<?= rtrim(rtrim(number_format($norma/*$poddon*/, 2, '.', ''),"0"),".") ?>" class="form-text required">
                            <span class="count_plus" data-count="<?= $poddon ?>">+</span>
                        </div>
                        <br>
                        <div class="lbl">Расчет стоимости заказа:</div>
                        <div id="outprc">
                            <?
                                $price = (float)str_replace(",", ".", $arResult['PROPERTIES']['RETAIL_PRICE']['VALUE']);
                                //$count = $poddon == 1 ? 1 : $poddon;
                                $count = $norma == 1 ? 1 : $norma;
                                $pre_total = $price*$count;
                            ?>
                            <b><?=  rtrim(rtrim(number_format($pre_total, 2, '.', ' '),"0"),".") ?></b>
                            <div class="equal lvl"> <i class="fa fa-rub" aria-hidden="true"></i> / <span><span class="poddon_count"><?= rtrim(rtrim(number_format($norma/*$poddon*/, 2, '.', ' '),"0"),".") ?></span> <?=$measure?></span></div>
                        </div>
                    </div>
                    <div id="crtbtns">
                        <a href="javascript:void(0);" class="addCartButton mf" data-poddon="<?= $norma/*$poddon*/ ?>" data-id="<?= $arResult['ID']; ?>">В корзину</a>
                        <a href="javascript:void(0);" class="fast_order">быстрый заказ</a>
                        <?php
                            $order = array(
                                // Состав заказа
                                'items' => array(
                                    array(
                                        'title' => $arResult["NAME"],
                                        'qty' => round($norma/*$poddon*/),
                                        'price' => (float)str_replace(",", ".", $arResult['PROPERTIES']['RETAIL_PRICE']['VALUE']),
                                    ),
                                ),
                                // Информация о покупателе
                                'details' => array(
                                    'firstname' => '',
                                    'lastname' => '',
                                    'middlename' => '',
                                    'email' => ''
                                ),
                                'partnerId' => PARTNER_ID, // ID Партнера в системе Банка (выдается Банком)
                                'partnerOrderId' => 'order_'.uniqid(), // Уникальный номер заказа в системе Партнера
                            );
                            // JSON-представление заказа
                            $json = json_encode($order);
                            // Base64-кодирование JSON-представления заказа
                            $base64 = base64_encode($json);
                            $sign = signMessage($base64);
                        ?>
                        <div class="kupivkredit-button" id="get_kredit_form" data-order="<?= $base64 ?>" data-sign="<?= $sign ?>"><div class="kupivkredit-button-content"><i class="kupivkredit-icon"></i>КупиВкредит</div></div>
                    </div>
                </div>
                <div class="delivery_block">
                    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBUYNH6x8bzJvNzXNFQs_AwIkpq1OABZPE&libraries=places" type="text/javascript"></script>
                    <script src="/js/params.js"></script>
                    <script src="/js/calc.js"></script>
                    <section class="cost">
                        <div class="form-one">
                            <p class="form-one-top">
                                <h3>Расчет доставки <span>*</span></h3>
                                <?
                                if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Тула") {
                                    $from = "Тула, Тульская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Саранск") {
                                    $from = "Саранск, Республика Мордовия, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Дубенки") {
                                    $from = "Дубенки, Республика Мордовия, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Калуга") {
                                    $from = "Калуга, Калужская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Кстово") {
                                    $from = "Кстово, Нижегородская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Арзамас") {
                                    $from = "Арзамас, Нижегородская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Саратов") {
                                    $from = "Саратов, Саратовская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Самара") {
                                    $from = "Самара, Самарская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Новомичуринск") {
                                    $from = "Новомичуринск, Рязанская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Ульяновск") {
                                    $from = "Ульяновск, Ульяновская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Чаадаевка") {
                                    $from = "Чаадаевка, Ульяновская область, Россия";
                                }  else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Кузнецк") {
                                    $from = "Кузнецк, Пензенская область, Россия";
                                } else if ($arResult['PROPERTIES']['STORAGE']['VALUE'] == "Богородск") {
                                    $from = "Богородск, Нижегородская область, Россия";
                                } else {
                                    $from = $arResult['PROPERTIES']['STORAGE']['VALUE'];
                                }
                                ?>
                                <input id="from" name="departure_city" type="text" placeholder="Откуда" autocomplete="off" value="<?=$from?>">
                                <input id="where" name="delivery_city" type="text" placeholder="Введите пункт доставки" autocomplete="off">
                                <div class="select_main">
                                    <select id="kind" name="freight_type">
                                        <option disabled >Выберите транспорт</option>
                                        <option value="1">Тентованный</option>
                                        <option value="2">Изотермический</option>
                                        <option value="3">Контейнеровоз</option>
                                        <option value="4" selected>Бортовой</option>
                                        <option value="5">Негабаритная площадка</option>
                                    </select>
                                </div>
                                <div class="select_main">
                                    <select id="volume" name="dimension">
                                        <option disabled>Выберите объем</option>
                                        <option value="1">до 5 тонн (до 30м3)</option>
                                        <option value="2">до 10 тонн (до 50м3)</option>
                                        <option value="3" selected>до 20 тонн (до 120м3)</option>
                                    </select>
                                </div>
                                <div class="form-one-field" class="distance">
                                    <div class="form-one-price">
                                        <label>Дистанция:</label> <strong id="distance">0 км</strong>
                                        <input id="distanceform" name="distanceform" type="hidden" value="">
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                                <div class="form-one-field" class="price">
                                    <div class="form-one-price">
                                        <label>Цена:</label> <strong id="price">0 <i class="fa fa-rub" aria-hidden="true"></i></strong>
                                        <input id="priceform" name="priceform" type="hidden" value="0">
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                                <div class="form-one-field" class="price">
                                    <div class="form-one-price">
                                        <label>Удорожание:</label> <strong id="plus_price"><span id="plus_price_val">0</span> <i class="fa fa-rub" aria-hidden="true"></i> / <?=$measure?></strong>
                                        <input id="plus_priceform" name="plus_priceform" type="hidden" value="0">
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                                <p style="display:none;" id="rz_dostavka">
                                    <input type="checkbox" id="ruz_dostavka" value="1">
                                    <label for="ruz_dostavka">Добавить цену доставки в корзину</label>
                                </p>
								<p class="inform" style="text-align: left;">* Расчет предварительный, подтверждается менеджером.</p>
                                <?if (isset($sht)):?>
                                    <p class="inform norma-inform" style="text-align: left;">Внимание! Сумма доставки в расчёте на 1 ед.
                                        завышена, т.к. машина будет загружена не полностью.<br>Увеличьте объем до нормы
                                        загрузки, чтобы уменьшить затраты на транспорт!</p>
                                <?endif;?>
                            </div>
                        </div>
                    </section>
                </div>
				<br><br>
            </div>
		</div>
        <div id="fast_order_form">
            <form action="/ajax/fast_order.php" method="post">
                <span class="h1_span">Быстрый заказ</span>
                <div class="borderline"></div>
                <p class="order-item"><span class="order-count"></span><b><?= $arResult['NAME']?> </b></p>
                <input type="hidden" name="ITEM_NAME" value="<?= $arResult['NAME']?>">
                <input type="hidden" name="ITEM_COUNT" id="item_count">
                <input type="hidden" name="CHECK_FORM" id="check_fast_order_form">
                <label>Ваше Ф.И.О</label>
                <input type="text" name="NAME" required>
                <br>
                <label>Ваш телефон</label>
                <input type="text" name="PHONE" required>
                <br>
                <label>Ваш электронный адрес</label>
                <input type="email" name="EMAIL">
                <br>
                <input type="submit" value="Отправить" onclick="document.getElementById('check_fast_order_form').value = 'secret_fast_order_form';">
            </form>
        </div>