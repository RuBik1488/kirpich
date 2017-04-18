<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
    ?>                  </div>
    				</div>
                </div>
            </div>
           <footer>
               <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => "/inc/copyright.php",
                                        "EDIT_TEMPLATE" => ""
                                    ),
                                false
                        );?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="pull-right footer-phone">
                                <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => "/inc/b_phone.php",
                                            "EDIT_TEMPLATE" => ""
                                        ),
                                    false
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
                <a style="display: none;" id="back-top" title="Вверх"><img src="/images/chev.png"></a>
                <a id="get_kp_button" class="mf" href="javascript:void(0)"><img src="/images/sum.png" alt=""></a>
           </footer>
        </div>
        <div class="title-search-result"></div>
<?if ($_REQUEST['send1'] == 'ok'):?>
    <script>
        $(document).ready(function(){
            $("#get_kp_button2").click();
        });
    </script>
<?elseif($_REQUEST['send2'] == 'ok'):?>
    <script>
        $(document).ready(function(){
            $("#callback").click();
        });
    </script>
<?endif;?>
<?if($_REQUEST['send_get_best_price']=='ok'):?>
                <script>
                $(document).ready(function(){
					$("a.highslide-form").click();
                });
                </script>
<?endif;?>
<?
            if (!empty($_REQUEST['GET_BEST_PRICE'])) {?>
                <script>
                $(document).ready(function(){
					$("a.highslide-form").click();
                });
                </script>
            <?
                $fields_get_price = Array(
                    'NAME_GET_RICE'  => 'Ф.И.О.',
                    'PHONE_GET_RICE' => 'Контактный номер',
                    'URL_GET_RICE'   => 'Ссылка на сайт',
                );
                foreach ($fields_get_price as $code=>$field_get_price) {
                    if (empty($_REQUEST[$code])) {
                        $errs_price[] = $field_get_price;
                    }
                }
                if (!isset($errs_price)) {
                    CModule::Includemodule('iblock');
                    $el = new CIBlockElement;
                        $PROP = Array(
                            'PHONE' => htmlspecialcharsEx($_REQUEST['PHONE_GET_RICE']),
							'COST' => htmlspecialcharsEx($_REQUEST['COST_GET_RICE']),
                        );
                    
                    $arLoadProductArray = Array(
                        "MODIFIED_BY"       => $USER->GetID(),
                        "IBLOCK_SECTION_ID" => false,
                        "IBLOCK_ID"         => 10,
                        "PROPERTY_VALUES"   => $PROP,
                        "NAME"              => htmlspecialcharsEx($_REQUEST['NAME_GET_RICE']),
                        "ACTIVE"            => "Y",
                        "DETAIL_TEXT"       => htmlspecialcharsEx($_REQUEST['MESSAGE_GET_RICE']),
                    );
                    if($ID = $el->Add($arLoadProductArray)){
                        function br2nl($string)
                        {
                            return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
                        }

						// $to      = 'info@tutkirpich.ru';
						$to      = 'pro100max22@gmail.com';
                        $subject = 'Запрос более низкой цены';
                        $message = br2nl("Поступила заявка на запрос более низкой цены.
                        ----------------------------------------------------------
                        \n Имя: ".htmlspecialcharsEx($_REQUEST['NAME_GET_RICE'])."
                        \n Телефон: ".htmlspecialcharsEx($_REQUEST['PHONE_GET_RICE'])."
						\n Ссылка на сайт: ".htmlspecialcharsEx($_REQUEST['URL_GET_RICE'])."
                        \n Цена у конкурента:".htmlspecialcharsEx($_REQUEST['COST_GET_RICE'])."
						\n Сообщение:".htmlspecialcharsEx($_REQUEST['MESSAGE_GET_RICE'])."
                        -----------------------------------------------------------
                         \n\nПисьмо сгенерированно автоматически..");
                        $headers = 'From: info@tutkirpich.ru' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                        LocalRedirect('?send_get_best_price=ok');
                    }
                    else{
                        $errs_price[] = $el->LAST_ERROR;}
                }
            }?>
		<div id="webform-best-price">
				<?if($_REQUEST['send_get_best_price']=='ok'):?>
					<h2 style="text-align:center;">Заявка отправлена! Мы свяжемся с Вами в ближайшее время.<br> Спасибо что выбрали нас!</h2>
				<?else:?>
					<span class="h1_span">Запрос более низкой цены</span>
					<div class="borderline"></div>
					<?foreach($errs_price as $error_price):?>
						<p style="color:red;"> Не зполнено поле: <?=$error_price;?></p>
					<?endforeach;?>
					<form method="post" action="#" name="best-price_form" id="best-price_form">
						<label for="best-price_form_name">Меня зовут</label><br>
						<input type="text" class="txt" name="NAME_GET_RICE" id="best-price_form_name">
						<br>
	
						<label for="best-price_form_phone">Мой номер телефона</label>
						<input type="text" class="txt" name="PHONE_GET_RICE" id="best-price_form_phone">
						<br>
	
						<label for="best-price_form_url">Ссылка на сайт</label>
						<input type="text" class="txt" name="URL_GET_RICE" id="best-price_form_url" >
						<br>
						<label for="best-price_form_price">Цена у конкурентов</label>
						<input type="text" class="txt" name="COST_GET_RICE" id="best-price_form_price" >
						<br>
						<label for="best-price_form_message">Сообщение</label>
						<input type="text" class="txt" name="MESSAGE_GET_RICE" id="best-price_form_message" >
						<br>
						<input type="submit" class="mf" maxlength="34" name="GET_BEST_PRICE" value="Отправить">
					</form>
				<?endif;?>
            </div>
<div style="display:none;">
    <?
            if ($_REQUEST['SEND'] == 'Получить предложение') {?>
                <script>
                $(document).ready(function(){
                    $("#get_kp_button2").click();
                });
                </script>
            <?
                $fields = Array(
                    'NAME' => 'Ф.И.О.',
                    'PHONE' => 'Контактный номер',
                    'ADDRES' => 'Адрес доставки',
                );
                foreach ($fields as $code=>$field) {
                    if (empty($_REQUEST[$code])) {
                        $errs[] = $field;
                    }
                }
                if (!isset($errs)) {
                    CModule::Includemodule('iblock');
                    $el = new CIBlockElement;
                        $PROP = Array(
                            'TYPE' => htmlspecialcharsEx($_REQUEST['TYPE']),
                            'DELIVERY' => htmlspecialcharsEx($_REQUEST['DELIVERY']),
                            'EMAIL' => htmlspecialcharsEx($_REQUEST['EMAIL']),
                            'PHONE' => htmlspecialcharsEx($_REQUEST['PHONE']),
                        );
                    
                    $arLoadProductArray = Array(
                        "MODIFIED_BY"       => $USER->GetID(),
                        "IBLOCK_SECTION_ID" => false,
                        "IBLOCK_ID"         => 4,
                        "PROPERTY_VALUES"   => $PROP,
                        "NAME"              => htmlspecialcharsEx($_REQUEST['NAME']),
                        "ACTIVE"            => "Y",
                        "PREVIEW_TEXT"      => htmlspecialcharsEx($_REQUEST['ADDRES']),
                        "DETAIL_TEXT"       => htmlspecialcharsEx($_REQUEST['PRODUCT']),
                    );
                    if($ID = $el->Add($arLoadProductArray)){
                        function br2nl($string)
                        {
                            return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
                        }

                        $to      = 'info@tutkirpich.ru';
                        $subject = 'Расчет доставки';
                        $message = br2nl("Поступила заявка на расчет стоимости.
                        ----------------------------------------------------------
                        \n Имя: ".htmlspecialcharsEx($_REQUEST['NAME'])."
                        \n Email: ".htmlspecialcharsEx($_REQUEST['EMAIL'])."
                        \n Телефон: ".htmlspecialcharsEx($_REQUEST['PHONE'])."
                        \n Являюсь: ".htmlspecialcharsEx($_REQUEST['TYPE'])."
                        \n Доставка: ".htmlspecialcharsEx($_REQUEST['DELIVERY'])."
                        \n Адрес доставки: ".htmlspecialcharsEx($_REQUEST['ADDRES'])."
                        \n Продукция:".htmlspecialcharsEx($_REQUEST['PRODUCT'])."
                        -----------------------------------------------------------
                         \n\nПисьмо сгенерированно автоматически..");
                        $headers = 'From: info@tutkirpich.ru' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                        LocalRedirect('?send1=ok');
                    }
                    else{
                        $errs[] = $el->LAST_ERROR;}
                }
            }?>
 <?if (($q==0)&&($w==0)&&($e==0)&&($r==0)) {?>  
    <div id="form-inner" >
        <?if($_REQUEST['send1']=='ok'):?>
            <h2 style="text-align:center;">Заявка отправлена! Мы свяжемся с Вами в ближайшее время.<br> Спасибо что выбрали нас!</h2>
        <?else:?>
            <div id="get_kp_modal">
                <span class="h1_span">Запрос расчета стоимости</span>
                <div class="borderline"></div>
                <form method="post" action="" name="get_kp_form" id="get_kp_form">
                <?foreach($errs as $error):?>
                    <p style="color:red;"> Не заполнено поле: <?=$error;?></p>
                <?endforeach;?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                        	<label for="cm_usertype">Вы являетесь</label><br>
                            <select name="TYPE">
                                <option value="Физическое лицо">Физическим лицом</option>
                                <option value="Юридическое лицо">Юридическим лицом</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="cm_delivery_type">Доставка</label><br>
                            <select name="DELIVERY">
                                <option value="C доставкой">C доставкой</option>
                                <option value="Самовывоз со склада">Самовывоз со склада</option>
                            </select>
                        </div>
                       	<div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="cm_name">ФИО</label><br>
                            <input type="input" class="txt" name="NAME" id="cm_name">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="cm_delivery">Адрес доставки</label>
                            <input type="input" class="txt" name="ADDRES" id="cm_delivery">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="cm_phone">Номер телефона</label>
                            <input type="input" class="txt" name="PHONE" id="cm_phone">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="cm_mail">E-mail</label><br>
                            <input type="input" class="txt" name="EMAIL" id="cm_mail">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="borderline"></div>
                            Интересующая Вас продукция и количество<br>
                            <textarea placeholder="Например: кирпич одинарный полнотелый м100 - 60000 шт." name="PRODUCT" id="cm_prod"></textarea>
                       	</div>
                        <div class="col-md-12 col-sm-12 col-xs-12 moreinfo">
                            <div class="borderline"></div>
                            Более подробную информацию Вы можете отправить нам на почту <a href="mailto:info@tutkirpich.ru">info@tutkirpich.ru</a>
                            <div class="borderline"></div>
                        </div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="hidden" value="www.tutkirpich.ru" name="SITENAME">
                    		<input type="submit" class="mf" id="send" maxlength="34" name="SEND" value="Получить предложение">
						</div>
                    </div>

                </form>
            </div>

        
        <?endif;?>
    </div>
<?}?>
        <?
            if ($_REQUEST['SEND'] == 'Позвоните мне!') {
        ?>
                <script>
                $(document).ready(function(){
                    $("#callback").click();
                });
                </script>
        <?
                $fields = Array(
                        'NAME' => 'Ф.И.О.',
                        'PHONE' => 'Контактный номер',
                        'PRODUCT' => 'Продукт',
                );
                foreach ($fields as $code=>$field) {
                    if (empty($_REQUEST[$code])) {
                        $errs1[] = $field;
                    }
                }
                if (!isset($errs1)) {
                    CModule::Includemodule('iblock');
                    $el = new CIBlockElement;
            
                    $arLoadProductArray = Array(
                        "MODIFIED_BY"       => $USER->GetID(),
                        "IBLOCK_SECTION_ID" => false,
                        "IBLOCK_ID"         => 6,
                        "PROPERTY_VALUES"   => $PROP,
                        "NAME"              => htmlspecialcharsEx($_REQUEST['NAME']),
                        "ACTIVE"            => "Y",
                        "CODE"              => htmlspecialcharsEx($_REQUEST['PHONE']),
                        "PREVIEW_TEXT"      => htmlspecialcharsEx($_REQUEST['PRODUCT']),
                    );
                    if($ID = $el->Add($arLoadProductArray)){
                        function br2nl($string)
                        {
                            return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
                        }

                        $to      = 'info@tutkirpich.ru';
                        $subject = 'Обратный звонок';
                        $message = br2nl("Поступила заявка на обратный звонок.
                        ----------------------------------------------------------
                        \n Имя: ".htmlspecialcharsEx($_REQUEST['NAME'])."
                        \n Телефон: ".htmlspecialcharsEx($_REQUEST['PHONE'])."
                        \n Продукция: ".htmlspecialcharsEx($_REQUEST['PRODUCT'])."
                        -----------------------------------------------------------
                         \n\nПисьмо сгенерированно автоматически..");
                        $headers = 'From: info@tutkirpich.ru' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                        LocalRedirect('?send2=ok');
                    }
                    else{
                        $errs1[] = $el->LAST_ERROR;}
                }
            }?>
    <div id="callback-inner">
        <?if($_REQUEST['send2']=='ok'):?>
            <h2 style="text-align:center;">Заявка отправлена! Мы свяжемся с Вами в ближайшее время.<br> Спасибо что выбрали нас!</h2>
        <?else:?>
            <div id="callback_modal">
                <span class="h1_span">Обратный звонок</span>
                <div class="borderline"></div>
                <?foreach($errs1 as $error):?>
                    <p style="color:red;"> Не зполнено поле: <?=$error;?></p>
                <?endforeach;?>
                <form method="post" action="#" name="callback" id="callback_form">
                    <label for="cm_name">Меня зовут</label><br>
                    <input type="input" class="txt" name="NAME" id="cm_name">
                    <br>

                    <label for="cm_phone">Мой номер телефона</label>
                    <input type="input" class="txt" name="PHONE" id="cm_phone">
                    <br>

                    <label for="cm_prod">Интересующая Вас продукция</label>
                    <input type="input" maxlength="34" placeholder="например: кирпич облицовочный" class="txt" name="PRODUCT" id="cm_prod">
                    <br>
                    <input type="submit" class="mf" id="send" maxlength="34" name="SEND" value="Позвоните мне!">
                </form>
            </div>
        <?endif;?>
    </div>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter29689665 = new Ya.Metrika({id:29689665,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<noscript><div><img src="//mc.yandex.ru/watch/29689665" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

		<div id="preloader_wrapper">
			<img src="/images/preloader.gif" alt="preloader">
		</div>
    </main>
    </body>
</html>
<?
//Добавим в куки флаг что пользователь не впервые на сайте
$APPLICATION->set_cookie("USER_FIRST_VISIT", "N", time()+60);
?>