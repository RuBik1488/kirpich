<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="navbar" class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
		<?if (!empty($arResult)):?>
			<?
			foreach($arResult as $arItem):
				if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
					continue;
			?>
			
				<?if($arItem["SELECTED"]):?>
					<li class="active"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>
	
			<?endforeach?>
		
		<?endif?>
	</ul>
</div>