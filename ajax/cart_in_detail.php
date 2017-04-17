<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!empty($_REQUEST['quantity']) && !empty($_REQUEST['id']) && CModule::IncludeModule('iblock')) {
    $res = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_ID" => 3, "ID" => $_REQUEST['id']),
        false,
        false,
        array("ID", "NAME", "PROPERTY_RETAIL_PRICE")
    );
    if ($ob = $res->GetNext()) {
        $retail_price = (float)str_replace(",", ".", $ob['PROPERTY_RETAIL_PRICE_VALUE']);
        $total_price = rtrim(rtrim(number_format($retail_price * (float)$_REQUEST['quantity'], 2, '.', ' '),"0"),".");
        $order = array(
            // Состав заказа
            'items' => array(
                array(
                    'title' => $ob["NAME"],
                    'qty' => round($_REQUEST['quantity']),
                    'price' => $retail_price,
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
        $arResult = array(
            "base64" => $base64,
            "sign" => $sign,
            "total_price" => $total_price
        );
        echo json_encode($arResult);
    }
}