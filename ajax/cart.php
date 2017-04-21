<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ( $_REQUEST['poddon'] != "" ) {
	$_SESSION['PODDON'][$_REQUEST['id']] = $_REQUEST['poddon'];
}
$count=$_REQUEST['quantity'];

if($count==''):
$_SESSION['CART'][$_REQUEST['id']]+=1;
else:
$_SESSION['CART'][$_REQUEST['id']]=$count;
endif;

if ( $_REQUEST['dost_pr'] != "" ) {
    $_SESSION['CART']['dostavka'] = array();
    $_SESSION['CART']['dostavka'][$_REQUEST['id']]['dost_price'] = $_REQUEST['dost_pr'];
    $_SESSION['CART']['dostavka'][$_REQUEST['id']]['dost_name'] = $_REQUEST['dost_fw'];
    $_SESSION['CART']['dostavka'][$_REQUEST['id']]['dost_product'] = $_REQUEST['dost_pd'];
}

?>