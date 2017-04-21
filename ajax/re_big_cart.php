<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<script>
$(document).ready(function(){
	if ($('table.cart tr.see_info_poddons').length != 0) {
		$('span.q_count').css('display', 'inline-block');
	}
	$('span.q_count').hover(function() {
		$('div.count_info_block').css('display', 'block');
	}, function() {
		$('div.count_info_block').css('display', 'none');
	});
    addAttrKreditButton();
    function addAttrKreditButton()
    {
        var sign, order;
        sign = $("#sign_n").val();
        order = $("#order_n").val();
        $("#get_kredit_form").attr({"data-sign": sign, "data-order": order});
    }
	$('.get-cart textarea').on('blur', function(){
		$(this).html($(this).val());
		quantity=$(this).val();
		id=$(this).data('id');
			$.ajax({
				type: "POST",
				url: "/ajax/cart.php",
				data: "quantity="+quantity+"&id="+id,
				success: function(msg){
					$('.get-cart').load('/ajax/re_big_cart.php', id);
					$('.cart-container').load('/ajax/re_cart.php');
				}
			});
	});

	$('.remove_product').on('click',function(){
		var id=$(this).data('id_prod');
		$.ajax({
			type: "POST",
 			url: "/ajax/cart_remove.php",
 			data: {"id":id},
 			success: function(msg){
				$('.get-cart').load('/ajax/re_big_cart.php', id);
				$('.cart-container').load('/ajax/re_cart.php');
				if ($('table.cart tr.see_info_poddons').length != 0) {
					$('span.q_count').css('display', 'inline-block');
				}
				$('span.q_count').hover(function() {
					$('div.count_info_block').css('display', 'block');
				}, function() {
					$('div.count_info_block').css('display', 'none');
				});
            }
        });
	});

	$('span.count_plus, span.count_minus').on('click', function(){
		var parent = $(this).parent();
		var text_area = parent.find('textarea');
		var count_max = Math.floor10(parseFloat($(this).attr('data-count')), -1);
		var quantity = Math.floor10(parseFloat(text_area.val()), -1);
		if ( $(this).hasClass('count_plus') ) {
			quantity = quantity + count_max;
		} else {
			quantity = quantity - count_max;
			if ( quantity <= 0 ) {
				quantity = count_max;
			}
		}
		var id=text_area.data('id');
			$.ajax({
				type: "POST",
				url: "/ajax/cart.php",
				data: "quantity="+Math.floor10(quantity, -1)+"&id="+id,
				success: function(msg){
					text_area.val(Math.floor10(quantity, -1));
					$('.get-cart').load('/ajax/re_big_cart.php');
					$('.cart-container').load('/ajax/re_cart.php');
					if ($('table.cart tr.see_info_poddons').length != 0) {
						$('span.q_count').css('display', 'inline-block');
					}
					$('span.q_count').hover(function() {
						$('div.count_info_block').css('display', 'block');
					}, function() {
						$('div.count_info_block').css('display', 'none');
					});
				}
			});
	});

});
</script>
<div class="count_info_block" style="display: none;">
Количество кирпичей пропорционально количеству штук на поддоне, а объем блоков (в м3) пропорционален объему блоков на поддоне, так как продажа кирпичей и блоков осуществляется только поддонами, а не поштучно.
</div>
<?$IDs=array_keys($_SESSION['CART']);
	if(!empty($IDs)):
	?>
			<table class="cart table" align="center">
				<tr>
					<th class="photos-cart">Фото</th>
					<th style="width: 200px;">Наименование</th>
					<th>Марка</th>
					<th>Производитель</th>
					<th  style="width: 200px;">Количество <span class="q_count">?</span></th>
					<th>Ед. измерения</th>
					<th>Розничная цена</th>
					<th>Склад</th>
					<th colspan="2">Стоимость</th>
				</tr>
				<?CModule::IncludeModule('iblock');?>

				<?//foreach($_SESSION['CART'] as $key=>$arItem):?>

					<?

						$arSort = array();
						$arSelect = Array("ID", "IBLOCK_ID", "NAME","PREVIEW_PICTURE","PROPERTY_*","DETAIL_PAGE_URL", "SECTION_PAGE_URL", "CODE", "LIST_PAGE_URL", "LANG_ID");
						$arFilter = Array("IBLOCK_ID"=>3,"ID"=>array_keys($_SESSION['CART']));
						$res = CIBlockElement::GetList(array($_REQUEST['sort']=>$_REQUEST['by']), $arFilter, false, false,  $arSelect);
						while($ob = $res->GetNextElement()){?>
							<?
								$arFields = $ob->GetFields();
								$arProps = $ob->GetProperties();
                                $retail_price = (float)str_replace(",", ".", $arProps['RETAIL_PRICE']['VALUE']);
								$arItem=$_SESSION['CART'][$arFields['ID']];
								$count_manipulation = 1;
								if ( $_SESSION['PODDON'][$arFields['ID']] != "" ) {
									$count_manipulation = $_SESSION['PODDON'][$arFields['ID']];
								}
							?>
							<tr class=" item-in-cart <?if( $_SESSION['PODDON'][$arFields['ID']] != "" ):?>see_info_poddons<?endif;?>">
								<td class="photos-cart">
									<?$file = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>150,'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
									<a href="<?=$arFields['DETAIL_PAGE_URL'];?>"><img src="<?=$file['src'];?>"></a>
								</td>
								<td><span class="h3_span"><a href="<?=$arFields['DETAIL_PAGE_URL'];?>"><?=$arFields['NAME']?></a></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Марка: </b></span><?=$arProps['MARK']['VALUE']?></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Производитель: </b></span><?=$arProps['MANUFACTURER']['VALUE']?></span></td>
								<td><span class="h3_span"><span class="count_minus" data-count="<?=$count_manipulation?>">-</span><textarea style="vertical-align: top;width:60px; text-align:center; height:30px;overflow:hidden; resize: none;" name="quantity" data-id="<?=$arFields['ID']?>" min="1" readonly><?=$arItem?></textarea><span class="count_plus" data-count="<?=$count_manipulation?>">+</span></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Ед. измерения: </b></span><?=$arProps['MEASURE']['VALUE']?></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Розничная цена: </b></span><?= number_format($retail_price, 2, '.', ' ') ?></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Склад: </b></span><?=$arProps['STORAGE']['VALUE']?></span></td>
								<td><span class="h3_span"><span class="see-mobile"><b>Стоимость: </b></span><?$price+=$arItem*$retail_price; echo number_format($arItem*$retail_price, 2, '.', ' ') ?> <i class="fa fa-rub" aria-hidden="true"></i> </span></td>
								<td><a href="javascript:void(0)" title="Удалить" class="remove_product" data-id_prod="<?=$arFields['ID']?>">X</a></td>
							</tr>
					<?
                            $items_for_kredit[] = array(
                                'title' => $arFields["NAME"],
                                'qty' => round($arItem),
                                'price' => $retail_price,
                            );
						}
					?>

				<?//endforeach;?>
				<tr class="all-cost-cart">
					<td style="text-align:right;" colspan="7" class="hidden-mobile"><span class="h3_span">Общая стоимость:</span></td>
					<td colspan="3" class="hidden-mobile"><span class="h3_span"><?=number_format($price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i></span></td>
					<td class="see-mobile"><span class="h3_span"><b>Общая стоимость:</b> <?=number_format($price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i></span></td>
				</tr>

			</table>
            <?php
            // Заказ клиента
            $order = array(
                // Состав заказа
                'items' => $items_for_kredit,
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
        <input type="hidden" id="sign_n" value="<?=$sign?>">
        <input type="hidden" id="order_n" value="<?=$base64?>">
<?else:?>
<script>
	location.reload();
</script>
<?endif;?>