<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
								<a href="/cart/">
                                    <img src="/images/basket.png" alt="">
								</a>
								
								<span>Корзина (<?=count($_SESSION['CART']);?>)</span>
								<?CModule::IncludeModule('iblock');?>
								<?$price=0;?>
									<?foreach($_SESSION['CART'] as $key=>$arItem):?>
										<?

											$arSelect = Array("ID", "IBLOCK_ID", "NAME","PREVIEW_PICTURE","PROPERTY_*");
											$arFilter = Array("IBLOCK_ID"=>3,"ID"=>$key);
											$res = CIBlockElement::GetList(Array(), $arFilter, false, $arSelect);
											while($ob = $res->GetNextElement()){
												$arFields = $ob->GetFields();  
												$arProps = $ob->GetProperties();
                                                $retail_price = (float)str_replace(",", ".", $arProps['RETAIL_PRICE']['VALUE']);
												?>
												<?$price += $retail_price*$arItem;?>
										<?
											}
										?>
									<?endforeach;?>
								<br>
                            <span class="price"><?=number_format($price, 2, '.', ' ')?> <i class="fa fa-rub" aria-hidden="true"></i></span>