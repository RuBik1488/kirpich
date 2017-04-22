<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
$APPLICATION->SetPageProperty("description", "Компания МиксТрейд осуществляет доставку строго в указанное место. Доставка может осуществляться как малотоннажным, так и большегрузным грузовым транспортом. Способ доставки зависит от количества груза и маршрута перевозки. Поэтому в каждом отдельном случае стоимость доставки будет рассчитываться индивидуально.");
$APPLICATION->SetPageProperty("keywords", "доставка");
$APPLICATION->SetPageProperty("title", "Условия доставки стройматериалов");

$APPLICATION->SetAdditionalCSS("/iteamo/plugins/deliveryCalc/css/main.css");
//$APPLICATION->AddHeadScript("/iteamo/plugins/deliveryCalc/js/calc.js");

?><p class="MsoNormal">
	 Наша компания осуществляет доставку строго в указанное место. Доставка может осуществляться как малотоннажным, так и большегрузным грузовым транспортом. Предварительный расчет стоимости доставки можно произвести ниже.&nbsp;
</p>
<p class="MsoNormal">
	Цена в калькуляторе является предварительной. Для точного расчета стоимости перевозки оставьте запрос менеджеру
</p>

<?/*
<p class="MsoNormal"><b><font size="4">Расчет цен доставки по республике Мордовия по газосиликатным блокам</font></b></p>
<div class="table-responsive">
<table class="MsoNormalTable table delivery-table" border="0" cellspacing="0" cellpadding="0" width="596" style="width: 470.3pt;">
<tbody>
  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border: 1pt solid windowtext;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>Производитель<o:p></o:p></b></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>ГРАС/Саратов<o:p></o:p></b></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>Поритеп/Новомичуринск<o:p></o:p></b></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>РОСБК/Пенза<o:p></o:p></b></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>Теплон/Ульяновск<o:p></o:p></b></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><b>Ковылкино<o:p></o:p></b></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Базовая цена без доставки, руб.<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">3 531<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">3 245<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">3 190<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">3 190<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">3 080<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="596" nowrap="" colspan="6" valign="bottom" style="width: 447.3pt; padding: 0cm 1.4pt; height: 15pt;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><i>Цена доставки за 1 куб при доставке не менее 30 куб. м, возможно отклонение в меньшую сторону<o:p></o:p></i></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border: 1pt solid windowtext;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Саранск<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">334<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">500<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">300<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">355<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: solid solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: 1pt;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">300<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Ардатовский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">511<o:p></o:p></span></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">796<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">447<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">268<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">434<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Атюрьевский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">478<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">456<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">459<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">499<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Атяшевский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">465<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">554<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">383<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">238<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">400<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Большеберезниковский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">462<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">722<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">299<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">278<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">400<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Большеигнатовский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">502<o:p></o:p></span></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">775<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">492<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">322<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">400<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Дубёнский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">497<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">563<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">399<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">200<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">434<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Ельниковский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">517<o:p></o:p></span></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">538<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">513<o:p></o:p></span></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">492<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Зубово-Полянский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">462<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">358<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">437<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">611<o:p></o:p></span></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Инсарский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">364<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">544<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">302<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">419<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">234<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Ичалковский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">452<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">714<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">423<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">350<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">400<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Кадошкинский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">397<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">606<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">347<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">412<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">234<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Ковылкинский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">420<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">494<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">378<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">448<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">167<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Кочкуровский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">387<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">679<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">284<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">344<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">367<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Краснослободский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">471<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">518<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">449<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">435<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Лямбирский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">367<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">482<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">344<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">308<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Ромодановский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">417<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">500<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">375<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">306<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">367<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Рузаевский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">334<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">500<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">288<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">355<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">267<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Старошайговский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">429<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">574<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">392<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">390<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">234<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Темниковский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">540<o:p></o:p></span></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">488<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">545<o:p></o:p></span></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">522<o:p></o:p></span></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">367<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Теньгушевский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">540<o:p></o:p></span></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">446<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">543<o:p></o:p></span></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">583<o:p></o:p></span></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">367<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Торбеевский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">446<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">416<o:p></o:p></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">414<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">586<o:p></o:p></span></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">200<o:p></o:p></p>
     </td> </tr>

  <tr style="height: 15pt;"> <td width="229" nowrap="" valign="bottom" style="width: 172pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid; border-bottom-width: 1pt; border-left-width: 1pt; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" style="margin-bottom: 0.0001pt;">Чамзинский район<o:p></o:p></p>
     </td> <td width="87" nowrap="" valign="bottom" style="width: 65pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">432<o:p></o:p></p>
     </td> <td width="97" nowrap="" valign="bottom" style="width: 73pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial; background: rgb(255, 199, 206);">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;"><span style="color: rgb(156, 0, 6);">523<o:p></o:p></span></p>
     </td> <td width="60" nowrap="" valign="bottom" style="width: 45.15pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">339<o:p></o:p></p>
     </td> <td width="61" nowrap="" valign="bottom" style="width: 45.4pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">275<o:p></o:p></p>
     </td> <td width="62" nowrap="" valign="bottom" style="width: 46.75pt; padding: 0cm 5.4pt; height: 15pt; border-style: none solid solid none; border-bottom-width: 1pt; border-left-width: initial; border-right-width: 1pt; border-top-width: initial;">
      <p class="MsoNormal" align="right" style="margin-bottom: 0.0001pt; text-align: right;">400<o:p></o:p></p>
     </td> </tr>
 </tbody>
</table>
</div>
*/?>
<?/*
<iframe name="calc" width="100%" height="460px" src="/iteamo/plugins/deliveryCalc/" frameborder="no" allowtransparency=""></iframe>
*/?>

    <section class="cost">
        <div class="container-fluid">
            <div class="row">

                <div class="block col-md-8 col-sm-6 col-xs-12">
                    <div class="form-one">
                        <div class="form-one-top">
                            <div class="cal">
                                <h3>Калькулятор доставки</h3>
                                <div class="bg_cal">
                                    <form action="#" class="сal-form">
                                        <div class="wh_wh">
                                            <div>
                                                <p><label for="form">Откуда</label></p>
                                                <input id="from" name="Whence" type="text" placeholder="">
                                            </div>
                                            <span><img src="/images/wh.png" alt=""></span>
                                            <div>
                                                <p><label for="where">Куда</label></p>
                                                <input id="where" name="where" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="delivery">
                                            <div class="trans">
                                                <p><label for="delivery">Вид транспорта</label></p>
                                                <div class="select_main">
                                                    <select id="kind" name="freight_type">
                                                        <option disabled selected>Выберите транспорт</option>
                                                        <option value="1">Тентованный</option>
                                                        <option value="2">Изотермический</option>
                                                        <option value="3">Контейнеровоз</option>
                                                        <option value="4">Бортовой</option>
                                                        <option value="5">Негабаритная площадка</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wr_tonn">
                                                <p><label for="tonn">Объем</label></p>
                                                <div class="tonn">
                                                    <div class="kuby">
                                                        <input data-val="до 5 тонн (30м)" checked id="for-radio1" name="dimension" type="radio" value="1"/>
                                                        <label for="for-radio1" class="for-radio1">
                                                            <span>до 30 м<sup><small>3</small></sup></span>
                                                        </label>
                                                    </div>
                                                    <div class="kuby">
                                                        <input data-val="до 10 тонн (50м)" id="for-radio2" name="dimension" type="radio" value="2"/>
                                                        <label for="for-radio2" class="for-radio2">
                                                            <span>до 50 м<sup><small>3</small></sup></span>
                                                        </label>
                                                    </div>
                                                    <div class="kuby">
                                                        <input data-val="до 20 тонн (120м)" id="for-radio3" name="dimension" type="radio" value="3">
                                                        <label for="for-radio3" class="for-radio3">
                                                            <span>до 120 м<sup><small>3</small></sup></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cal_sub">
                                            <input type="submit" class="submit-deli" value="Стоимость доставки"/>
                                            <img src="/images/wh.png" alt="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block col-md-4 col-sm-6 col-xs-12" style="top: -25px; left: -45px;">
                    <div class="col3">
                        <div class="wr_raschet">
                            <span class="title">Расчет доставки</span>
                            <div class="wr_in">
                                <span class=lab>Откуда</span>
                                <span id="get-in" class="in"></span>
                            </div>
                            <div class="wr_in">
                                <span class=lab>Куда</span>
                                <span id="get-out" class="in"></span>
                            </div>
                            <div class="wr_in">
                                <span class=lab>Объем</span>
                                <span id="get-weight" class="in"></span>
                            </div>
                            <div class="summ">
                                <div class="ras">
                                    <span>Дистанция:</span>
                                    <span class="itog">
                                        <strong id="distance">0 км</strong>
                                    </span>
                                </div>
                                <div class="ras">
                                    <span>Цена:</span>
                                    <span class="itog">
                                        <strong id="price">0 <i class="fa fa-rub" aria-hidden="true"></i></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBUYNH6x8bzJvNzXNFQs_AwIkpq1OABZPE&libraries=places" type="text/javascript"></script>
    <script src="/iteamo/plugins/deliveryCalc/params.js" type="text/javascript"></script>
    <script src="/iteamo/plugins/deliveryCalc/js/calc.js" type="text/javascript"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>