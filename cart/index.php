<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
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
	$('.get-cart textarea').on('blur', function(){
		$(this).html($(this).val());
		quantity=$(this).val();
		id=$(this).data('id');
			$.ajax({
				type: "POST",
				url: "/ajax/cart.php",
				data: "quantity="+quantity+"&id="+id,
				success: function(msg){
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
				}
			});
	});

	$('input[name="BUY"]').on('click',function(){
		var name=$('input[name="NAME_CM"]').val();
		var phone=$('input[name="PHONE_CM"]').val();
		var adres=$('input[name="ADDRES_CM"]').val();
		var type=$("select[name='TYPE_CART_CM'] option:selected").text();
		var delivery=$("select[name='DELIVERY_CART_CM'] option:selected").text();
		var product=$('textarea[name="PRODUCT_CM"]').val();
		var email=$('input[name="EMAIL_CM"]').val();
		var cart=$('.get-cart table').html();
		if(name!='' && phone!=''){
			$.ajax({
				type: "POST",
				url: "/ajax/buy.php",
				data: "NAME_CM="+name+"&PHONE_CM="+phone+"&ADDRES_CM="+adres+"&TYPE_CM="+type+"&DELIVERY_CM="+delivery+"&PRODUCT_CM="+product+"&EMAIL_CM="+email+"&HTML="+cart,
				success: function(msg){
					if(msg!=''){
						location="/cart/?buy=ok";
					}
					else{
						alert('Ошибка, пожалуйста проверьте все поля и повторите заказ');
					}
				}
			});
		}	
		if(name!='' && phone!=''){
			return false;
		}
	});
});
</script>
<?// print_r($_SESSION['CART']); ?>
<?if($_SESSION['CART']!=''):?>
<div class="get-cart">
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
					<th style="width: 200px;">Количество <span class="q_count">?</span></th>
					<th>Ед. измерения</th>
					<th>Розничная цена</th>
					<th>Склад</th>
					<th colspan="2">Стоимость</th>
				</tr>
				<?CModule::IncludeModule('iblock');?>
				
				<?//foreach($_SESSION['CART'] as $key=>$arItem):?>

					<?$price=0;
						$arSort = array();
						$arSelect = Array("ID", "IBLOCK_ID", "NAME","PREVIEW_PICTURE","PROPERTY_*", "DETAIL_PAGE_URL", "LIST_PAGE_URL", "SECTION_PAGE_URL", "LANG_ID","CODE");
						$arFilter = Array("IBLOCK_ID"=>3,"ID"=>array_keys($_SESSION['CART']));
						$res = CIBlockElement::GetList(array($_REQUEST['sort']=>$_REQUEST['by']), $arFilter, false, false, $arSelect);
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
								<td><span class="h3_span"><span class="see-mobile"><b>Стоимость: </b></span><?$price+=$arItem*$retail_price; echo number_format($arItem*$retail_price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i> </span></td>
								<td><a href="javascript:void(0)" title="Удалить" class="remove_product" data-id_prod="<?=$arFields['ID']?>">X</a></td>
							</tr>
					<?
                            $items_for_kredit[] = array(
                                'title' => $arFields["NAME"],
                                'qty' => round($arItem),
                                'price' =>  $retail_price,
                            );
						}
					?>
					
				<?//endforeach;?>
				<tr class="all-cost-cart">
					<td style="text-align:right;" colspan="7" class="hidden-mobile"><span class="h3_span">Общая стоимость:</span></td>
					<td colspan="3" class="hidden-mobile"><span class="h3_span"><?=number_format($price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i></span></td>
					<td class="see-mobile"><span class="h3_span"><b>Общая стоимость:</b> <?= number_format($price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i></span></td>
				</tr>



                <tr class="all-cost-cart">
                    <td style="text-align:left;" colspan="9" class="hidden-mobile">
                        <span class="h3_span"><b>Доставка</b></span>
                    </td>
                </tr>
                <?foreach($_SESSION['CART']['dostavka'] as $key=>$arItem):?>
                    <tr class="all-cost-cart">
                        <td style="text-align:left;" colspan="4" class="hidden-mobile">
                            <span class="h3_span">Доставка товара: <?=$arItem['dost_product']?></span>
                        </td>
                        <td style="text-align:left;" colspan="3" class="hidden-mobile">
                            <span class="h3_span">Откуда\куда: <?=$arItem['dost_name']?></span>
                        </td>
                        <td colspan="3" class="hidden-mobile">
                        <span class="h3_span">
                            <?=rtrim(rtrim(number_format($arItem['dost_price'], 2, '.', ' '),'0'),'.')?>
                            <i class="fa fa-rub" aria-hidden="true"></i>
                        </span>
                        </td>
                    </tr>
                <?endforeach;?>

                <?foreach($_SESSION['CART']['dostavka'] as $key=>$arItem):?>
                <tr class="all-cost-cart">
                    <td class="see-mobile bekon">
                        <span class="h3_span">
                            <b>Доставка:</b>
                        </span>
                    </td>
                    <td class="see-mobile bekon">
                        <span class="h3_span">
                            Доставка товара:  <?=$arItem['dost_product']?>
                        </span>
                    </td>
                    <td class="see-mobile bekon">
                        <span class="h3_span">
                            Откуда\куда: <?=$arItem['dost_name']?>
                        </span>
                    </td>
                    <td class="see-mobile bekon">
                        <span class="h3_span">
                            <?=rtrim(rtrim(number_format($arItem['dost_price'], 2, '.', ' '),'0'),'.')?>
                            <i class="fa fa-rub" aria-hidden="true"></i>
                        </span>
                    </td>
                </tr>
                <?endforeach;?>


			</table>
			</div>
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
<div id="get_kp_modal" class="hide-acepted" style="margin-bottom: 30px; width: auto">
				<span class="h1_span">Информация о покупателе</span>

				<form id="get_kp_form" name="cart_form" action="/ajax/buy.php" method="post">
					<div class="row">
						<div class="col-md-6 col-xs-12 col-sm-12">
							<div class="borderline"></div>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_usertype">Вы являетесь</label><br>
									<select name="TYPE_CART_CM">
										<option value="Физическое лицо">Физическим лицом</option>
										<option value="Юридическое лицо">Юридическим лицом</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_delivery_type">Доставка</label><br>
									<select name="DELIVERY_CART_CM">
										<option value="C доставкой">C доставкой</option>
										<option value="Самовывоз со склада">Самовывоз со склада</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_name">Как к Вам обращаться?</label><br>
									<input type="input" id="cm_name_cart" name="NAME_CM" required="required" class="txt">
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_delivery">Адрес доставки</label>
									<input type="input" id="cm_delivery_cart" name="ADDRES_CM" class="txt">
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_phone">Номер телефона</label>
									<input type="input" id="cm_phone_cart" name="PHONE_CM" required="required" class="txt">
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<label for="cm_mail">E-mail</label><br>
									<input type="input" id="cm_mail_cart" name="EMAIL_CM" class="txt">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="borderline"></div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									Примечания к заказу:<br>
									<textarea id="cm_prod" name="PRODUCT_CM" placeholder="Используйте это поле для особых указаний или вопросов по поводу вашего заказа."></textarea>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input type="hidden" name="SITENAME" value="www.tutkirpich.ru">
									<input type="submit" value="Заказать" name="BUY" maxlength="34" id="send" class="mf"><br>
                                    <div class="kupivkredit-button" id="get_kredit_form" data-order="<?=$base64?>" data-sign="<?=$sign?>"><div class="kupivkredit-button-content"><i class="kupivkredit-icon"></i>КупиВкредит</div></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

		<?elseif($_REQUEST['buy']=='ok'):?>
			<span class="h1_span accepted" style="color:green;">Ваша заказ был принят, спасибо что выбрали нас, мы свяжемся с Вами в ближайшее время для уточнения деталей.</span>
		<?else:?>
<p><b>ВАША КОРЗИНА ПУСТА.</b></p></div>
		<?endif;?>
<?else:?>
	<p><b>ВАША КОРЗИНА ПУСТА.</b></p>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>