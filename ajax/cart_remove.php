<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
unset($_SESSION['CART'][$_REQUEST['id']]);
unset($_SESSION['CART']['dostavka'][$_REQUEST['id']]);
if(empty($_SESSION['CART']['dostavka'])){
    unset($_SESSION['CART']['dostavka']);
}
?>