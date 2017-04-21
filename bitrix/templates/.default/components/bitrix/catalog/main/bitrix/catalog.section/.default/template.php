<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
	$(document).ready(function(){
		if (!mobilecheck()) {
			$('#left-menu .ul-closed').removeClass("ul-closed");
		}
	});
</script>
<?
$arFilterSeo = Array('IBLOCK_ID'=>"3","ID"=>$arResult['ID']);
$db_listSeo = CIBlockSection::GetList(Array($by=>$order), $arFilterSeo, true, Array('UF_TITLE','UF_KEYWORDS','UF_DESCRIPTION'));
if($ar_resultSeo = $db_listSeo->GetNext())
{
	$APPLICATION->SetPageProperty("title", $ar_resultSeo["UF_TITLE"]);
	$APPLICATION->SetPageProperty("keywords", $ar_resultSeo["UF_KEYWORDS"]);
	$APPLICATION->SetPageProperty("description", $ar_resultSeo["UF_DESCRIPTION"]);
}
?>
<?if($arResult['DEPTH_LEVEL']==1):?>
<style>
.smartfilter {display: none !important;}
</style>
<?else:?>
<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<div id="section" >
<?// Кирпич ?>
	<?if ( $arResult['ID'] == 3 || $arResult['ID'] == 2 || $arResult['ID'] == 29 ) { ?>
		<form action="" method="GET" id="sorts_form" >
			<span class="sort-title">Сортировка:</span>
			<select name="sort" id="sort_products">
				<option value="name" <?if( $_REQUEST['sort'] == "name" || $_REQUEST['sort'] == "" ):?>selected<?endif?>>По наименованию</option>
				<option value="price" <?if( $_REQUEST['sort'] == "price" ):?>selected<?endif?>>По цене</option>
				<option value="brand" <?if( $_REQUEST['sort'] == "brand" ):?>selected<?endif?>>По марке</option>
				<option value="producer" <?if( $_REQUEST['sort'] == "producer" ):?>selected<?endif?>>По производителю</option>
				<option value="size" <?if( $_REQUEST['sort'] == "size" ):?>selected<?endif?>>По размеру</option>
				<option value="packing" <?if( $_REQUEST['sort'] == "packing" ):?>selected<?endif?>>По кол-ву в поддоне</option>
				<option value="storage" <?if( $_REQUEST['sort'] == "storage" ):?>selected<?endif?>>По складам</option>
			</select>
			<span class="order-type-sort" data-sort="<?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>desc<?else:?>asc<?endif;?>"><?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>&darr;<?else:?>&uarr;<?endif;?></span>
			<input type="hidden" id="sort_type_input" name="sort_type" value="<?if( $_REQUEST['sort_type'] != "" ):?><?=htmlspecialchars($_REQUEST['sort_type'])?><?else:?>desc<?endif;?>" >
		</form>
		<div class="clearfix"><br></div>
		<div class="row">
			<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>"200",'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$gr = 20000;
			if (CModule::IncludeModule("iblock")) {
				$res_gr = CIBlockElement::GetByID(357);
				if($ar_res_gr = $res_gr->GetNext()) {
					  $gr = $ar_res_gr['NAME'];
				}
			}
			$mass = str_replace(",", ".", $arElement['PROPERTIES']['MASS']['VALUE']);
			$val = str_replace(",", ".", $arElement['PROPERTIES']['PACKING']['VALUE']);
			if ( $mass != 0 && $val != 0 && $mass != "" && $val != "" ) {
				$poddon = floor($gr/($mass*$val));
				$sht = floor($poddon*$val);
			} else {
				$poddon = "";
				$sht = "";
			}
      //
      if (empty($arElement['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'])) {
        $arElement['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'] = $poddon . ' поддонов' . ' / ' . number_format($sht, 0, '.', ' ') . ' шт';
      }
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 product">
                <div class="product-wrapper" style="min-height: 450px;">
                    <p class="product-name">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']?>">
							<?=$arElement['NAME'];?>
						</a>
                    </p>
					<a href="<?=$arElement['DETAIL_PAGE_URL']?>"><img src="<?=$file['src'];?>" style="height: 120px;"></a>
                    <p class="char-prod">
                        <b>Марка: </b><?=$arElement['PROPERTIES']['MARK']['VALUE'];?> <br>
                        <b>Размер, мм: </b><?=$arElement['PROPERTIES']['SIZE']['VALUE'];?> <br>
                        <b>Производитель: </b><?=$arElement['PROPERTIES']['MANUFACTURER']['VALUE'];?> <br>
                        <b>Кол-во в поддоне, шт: </b><?= number_format($arElement['PROPERTIES']['PACKING']['VALUE'], 0, '.', ' ') ?> <br>
                        <b>Норма загрузки а/м: </b><?=$arElement['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE']?><br>
                        <b>Вес, кг: </b><?= number_format($arElement['PROPERTIES']['MASS']['VALUE'], 2, '.', ' ') ?> <br>
                        <b>Склад: </b><?=$arElement['PROPERTIES']['STORAGE']['VALUE'];?>
                        
                    </p>
					<p class="price-product"><b>Цена на самовывоз: <?=rtrim(rtrim(number_format((float)str_replace(',', '.', $arElement['PROPERTIES']['RETAIL_PRICE']['VALUE']), 2, '.', ' '),"0"),".");?> <i class="fa fa-rub" aria-hidden="true"></i>/шт</b><br><b><span class="cost-poddon">Цена за поддон: <?=rtrim(rtrim(number_format((float)str_replace(',', '.', $arElement['PROPERTIES']['RETAIL_PRICE']['VALUE'])*$arElement['PROPERTIES']['PACKING']['VALUE'], 2, '.', ' '),"0"),".") ?> <i class="fa fa-rub" aria-hidden="true"></i> (<?=number_format($arElement['PROPERTIES']['PACKING']['VALUE'], '0', '.', ' ');?> шт)</b></span></p>
					<a href="javascript:void(0);" class="addCartButton mf" data-id="<?=$arElement['ID'];?>" data-poddon="<?=$arElement['PROPERTIES']['PACKING']['VALUE']?>">В корзину</a>
                </div>
            </div>
			<?endforeach;?>
		</div>
<?// Песок / Щебень ?>
	<?} else if ( $arResult['ID'] == 28 || $arResult['ID'] == 27 ) {?>
		<form action="" method="GET" id="sorts_form" >
			<span class="sort-title">Сортировка:</span>
			<select name="sort" id="sort_products">
				<option value="name" <?if( $_REQUEST['sort'] == "name" || $_REQUEST['sort'] == "" ):?>selected<?endif?>>По наименованию</option>
				<option value="price" <?if( $_REQUEST['sort'] == "price" ):?>selected<?endif?>>По цене</option>
				<option value="producer" <?if( $_REQUEST['sort'] == "producer" ):?>selected<?endif?>>По производителю</option>
			</select>
			<span class="order-type-sort" data-sort="<?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>desc<?else:?>asc<?endif;?>"><?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>&darr;<?else:?>&uarr;<?endif;?></span>
			<input type="hidden" id="sort_type_input" name="sort_type" value="<?if( $_REQUEST['sort_type'] != "" ):?><?=htmlspecialchars($_REQUEST['sort_type'])?><?else:?>desc<?endif;?>" >
		</form>
		<div class="clearfix"><br></div>
		<div class="row">
			<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>200,'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 product">
                <div class="product-wrapper" style="min-height: 450px;">
                    <p class="product-name">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']?>">
							<?=$arElement['NAME'];?>
						</a>
                    </p>
                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><img src="<?=$file['src'];?>" style="height: 120px;"></a>
                    <p class="char-prod">
                        <b>Фракция, мм: </b><?=number_format($arElement['PROPERTIES']['FRAKCIA']['VALUE'], 2, '.', ' ');?> <br>
                        <b>Производитель: </b><?=$arElement['PROPERTIES']['MANUFACTURER']['VALUE'];?> <br>
                        <b>Регион доставки: </b><?=$arElement['PROPERTIES']['DELIVERY_REGION']['VALUE'];?> <br>
                        <b>Вид доставки: </b><?=$arElement['PROPERTIES']['DELIVERY_TYPE']['VALUE'];?> <br>
                        <b>Насыпной вес, м3/тонн: </b><?=number_format($arElement['PROPERTIES']['MASS']['VALUE'], 2, '.', ' ');?>
                    </p>
                    <p class="price-product"><b>Цена: </b><?=number_format((float)str_replace(',', '.', $arElement['PROPERTIES']['RETAIL_PRICE']['VALUE']), 2, '.', ' ');?> м3/<i class="fa fa-rub" aria-hidden="true"></i></p>
                    <a href="javascript:void(0);" class="addCartButton mf" data-id="<?=$arElement['ID'];?>">В корзину</a>
                </div>
            </div>
			<?endforeach;?>
		</div>
<?// Цемент навал / Цемент фасованный ?>
	<?} else if ( $arResult['ID'] == 26 || $arResult['ID'] == 25 ) {?>
		<form action="" method="GET" id="sorts_form" >
			<span class="sort-title">Сортировка:</span>
			<select name="sort" id="sort_products">
				<option value="name" <?if( $_REQUEST['sort'] == "name" || $_REQUEST['sort'] == "" ):?>selected<?endif?>>По наименованию</option>
				<option value="price" <?if( $_REQUEST['sort'] == "price" ):?>selected<?endif?>>По цене</option>
				<option value="brand" <?if( $_REQUEST['sort'] == "brand" ):?>selected<?endif?>>По марке</option>
				<option value="producer" <?if( $_REQUEST['sort'] == "producer" ):?>selected<?endif?>>По производителю</option>
			</select>
			<span class="order-type-sort" data-sort="<?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>desc<?else:?>asc<?endif;?>"><?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>&darr;<?else:?>&uarr;<?endif;?></span>
			<input type="hidden" id="sort_type_input" name="sort_type" value="<?if( $_REQUEST['sort_type'] != "" ):?><?=htmlspecialchars($_REQUEST['sort_type'])?><?else:?>desc<?endif;?>" >
		</form>
		<div class="clearfix"><br></div>
		<div class="row">
			<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>200,'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 product">
                <div class="product-wrapper" style="min-height: 365px;">
                    <p class="product-name">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']?>">
							<?=$arElement['NAME'];?>
						</a>
                    </p>
                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><img src="<?=$file['src'];?>" style="height: 120px;"></a>
                    <p class="char-prod">
                        <b>Марка: </b><?=$arElement['PROPERTIES']['MARK']['VALUE'];?> <br>
                        <b>Производитель: </b><?=$arElement['PROPERTIES']['MANUFACTURER']['VALUE'];?> <br>
                        <b>Регион доставки: </b><?=$arElement['PROPERTIES']['DELIVERY_REGION']['VALUE'];?> <br>
                        <b>Вид доставки: </b><?=$arElement['PROPERTIES']['DELIVERY_TYPE']['VALUE'];?> <br>
                        <?if( $arResult['ID'] == 26 ):?>
                        	<b>Вес 1 мешка, кг: </b><?=number_format($arElement['PROPERTIES']['MASS']['VALUE'], 2, '.', ' ');?> <br>
                        	<b>Количество мешков в 1 паллете, шт: </b><?=number_format($arElement['PROPERTIES']['PACKING']['VALUE'], 0, '.', ' ');?>
                        <?endif;?>
                    </p>
					<p class="price-product"><b><span class="cost-poddon">Цена: <?=number_format((float)str_replace(',', '.', $arElement['PROPERTIES']['RETAIL_PRICE']['VALUE']), 2, '.', ' ');?> тонна/<i class="fa fa-rub" aria-hidden="true"></i> (мин партия 20 тонн)</span></b></p>

					<a href="javascript:void(0);" class="addCartButton mf" data-id="<?=$arElement['ID'];?>">В корзину</a>
                </div>
            </div>
			<?endforeach;?>
		</div>
<?// Блоки ?>
	<?} else if ( $arResult['ID'] >= 6 && $arResult['ID'] <= 10 && $arResult['ID'] != 8 ) {?>
		<form action="" method="GET" id="sorts_form" >
			<span class="sort-title">Сортировка:</span>
			<select name="sort" id="sort_products">
				<option value="name" <?if( $_REQUEST['sort'] == "name" || $_REQUEST['sort'] == "" ):?>selected<?endif?>>По наименованию</option>
				<option value="price" <?if( $_REQUEST['sort'] == "price" ):?>selected<?endif?>>По цене</option>
				<option value="brand" <?if( $_REQUEST['sort'] == "brand" ):?>selected<?endif?>>По марке</option>
				<option value="producer" <?if( $_REQUEST['sort'] == "producer" ):?>selected<?endif?>>По производителю</option>
				<option value="size" <?if( $_REQUEST['sort'] == "size" ):?>selected<?endif?>>По размеру</option>
				<option value="packing" <?if( $_REQUEST['sort'] == "packing" ):?>selected<?endif?>>По кол-ву на поддоне</option>
				<option value="storage" <?if( $_REQUEST['sort'] == "storage" ):?>selected<?endif?>>По складам</option>
			</select>
			<span class="order-type-sort" data-sort="<?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>desc<?else:?>asc<?endif;?>"><?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>&darr;<?else:?>&uarr;<?endif;?></span>
			<input type="hidden" id="sort_type_input" name="sort_type" value="<?if( $_REQUEST['sort_type'] != "" ):?><?=htmlspecialchars($_REQUEST['sort_type'])?><?else:?>desc<?endif;?>" >
		</form>
		<div class="clearfix"><br></div>
		<div class="row">
			<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>200,'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 product">
                <div class="product-wrapper" style="min-height: 450px;">
                    <p class="product-name">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']?>">
							<?=$arElement['NAME'];?>
						</a>
                    </p>
                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><img src="<?=$file['src'];?>" style="height: 120px;"></a>
                    <p class="char-prod">
                        <b>Марка: </b><?=$arElement['PROPERTIES']['MARK']['VALUE'];?> <br>
                        <b>Размер, мм: </b><?=$arElement['PROPERTIES']['SIZE']['VALUE'];?> <br>
                        <b>Производитель: </b><?=$arElement['PROPERTIES']['MANUFACTURER']['VALUE'];?> <br>
                        <b>Вес, кг: </b><?=number_format($arElement['PROPERTIES']['MASS']['VALUE'], 2, '.', ' ')?> <br>
                        <b>Кол-во в поддоне, шт: </b><?=number_format($arElement['PROPERTIES']['PODDON_COUNT']['VALUE'], 0, '.', ' ');?> <br>
						            <b>Объем в поддоне, м3: </b><?=number_format($arElement['PROPERTIES']['PODDON_V']['VALUE'], 2, '.', ' ');?> м3 <br>
                        <?if (!empty($arElement['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE'])){?>
                          <b>Норма загрузки a/м: </b><?=$arElement['PROPERTIES']['NORMA_ZAGRUZKI']['VALUE']?> <br>
                        <?}?>
                        <b>Склад:</b> <?=$arElement['PROPERTIES']['STORAGE']['VALUE'];?>
                    </p>
					<p class="price-product">
            <?
              $arElement['arPrice'] = \iteamo\price::getForBlocks($arElement);
            ?>
            <?if (!empty($arElement['arPrice']['perUnit'])){?>
              <b>Цена за шт: <?=rtrim(rtrim(number_format($arElement['arPrice']['perUnit'], 2, '.', ' '),"0"),".")?> <i class="fa fa-rub" aria-hidden="true"></i></b><br>
            <?}?>
            <b>Цена на самовывоз: <?=rtrim(rtrim(number_format($arElement['arPrice']['perCube'], 2, '.', ' '),"0"),".")?> <i class="fa fa-rub" aria-hidden="true"></i>/<?=str_replace('.', '',\iteamo\price::getMeasure($arElement))?></b><br>
            <?if (!empty($arElement['arPrice']['perPoddon'])){?>
              <b><span class="cost-poddon">Цена за поддон: <?= rtrim(rtrim(number_format($arElement['arPrice']['perPoddon'], 2, '.', ' '),"0"),".")?> <i class="fa fa-rub" aria-hidden="true"></i> (<?=number_format($arElement['PROPERTIES']['PODDON_V']['VALUE'], 2, '.', ' ')?> м3)</span></b>
            <?}?>
          </p>
					<a href="javascript:void(0);" class="addCartButton mf" data-id="<?=$arElement['ID'];?>" data-poddon="<?=$arElement['PROPERTIES']['PODDON_V']['VALUE']?>">В корзину</a>
                </div>
            </div>
			<?endforeach;?>
		</div>
	<?} else {?>
		<form action="" method="GET" id="sorts_form" >
			<span class="sort-title">Сортировка:</span>
			<select name="sort" id="sort_products">
				<option value="name" <?if( $_REQUEST['sort'] == "name" || $_REQUEST['sort'] == "" ):?>selected<?endif?>>По наименованию</option>
				<option value="price" <?if( $_REQUEST['sort'] == "price" ):?>selected<?endif?>>По цене</option>
				<option value="brand" <?if( $_REQUEST['sort'] == "brand" ):?>selected<?endif?>>По марке</option>
				<option value="producer" <?if( $_REQUEST['sort'] == "producer" ):?>selected<?endif?>>По производителю</option>
				<option value="storage" <?if( $_REQUEST['sort'] == "storage" ):?>selected<?endif?>>По складам</option>
			</select>
			<span class="order-type-sort" data-sort="<?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>desc<?else:?>asc<?endif;?>"><?if( $_REQUEST['sort_type'] == "" || $_REQUEST['sort_type'] == "asc" ):?>&darr;<?else:?>&uarr;<?endif;?></span>
			<input type="hidden" id="sort_type_input" name="sort_type" value="<?if( $_REQUEST['sort_type'] != "" ):?><?=htmlspecialchars($_REQUEST['sort_type'])?><?else:?>desc<?endif;?>" >
		</form>
		<div class="clearfix"><br></div>
		<div class="row">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>200,'height' => 166), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			?>
			<div class="col-md-4 col-sm-6 col-xs-12 product">
                <div class="product-wrapper" style="min-height: 450px;">
                    <p class="product-name">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']?>">
							<?=$arElement['NAME'];?>
						</a>
                    </p>
                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><img src="<?=$file['src'];?>" style="height: 120px;"></a>
                    <p class="char-prod">
                        <b>Марка: </b><?=$arElement['PROPERTIES']['MARK']['VALUE'];?> <br>
                        <b>Производитель: </b><?=$arElement['PROPERTIES']['MANUFACTURER']['VALUE'];?> <br>
                        <b>Ед. измерений: </b><?=$arElement['PROPERTIES']['MEASURE']['VALUE'];?> <br>
                        <b>Склад: </b><?=$arElement['PROPERTIES']['STORAGE']['VALUE'];?>
                    </p>
					<p class="price-product"><b><span class="cost-poddon">Цена на самовывоз: <?=rtrim(rtrim(number_format((float)str_replace(',', '.', $arElement['PROPERTIES']['RETAIL_PRICE']['VALUE']), 2, '.', ' '),"0"),".");?> <i class="fa fa-rub" aria-hidden="true"></i></span></b></p>
                    <a href="javascript:void(0);" class="addCartButton mf" data-id="<?=$arElement['ID'];?>">В корзину</a>
                </div>
            </div>
			<?endforeach;?>
		</div>
	<?}?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
	
<p><?=$_SESSION['SECTION_DESC']?></p>
</div>
<?endif;?>
<?// ITEAMO.NET <<< ============================================================ ?>
<script>
jQuery(document).ready(function(){
  var minHeight = 400;
  var boolToSet = false;
  jQuery('.catalog-section .product-wrapper').each(function(index, objItem){
    objItem = jQuery(objItem);
    height = objItem.outerHeight();
    if (height > minHeight) {
      minHeight = height;
      boolToSet = true;
    }
  });
  if (boolToSet) {
    jQuery('.catalog-section .product-wrapper').css('min-height', minHeight + 'px');
  }
});
</script>
<?// ITEAMO.NET <<< ============================================================ ?>