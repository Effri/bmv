<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 
    
<?if (!empty($arResult)):?>

    <nav class="navbar navbar-expand-lg justify-content-between">    
        <button class="menu_burger navbar-toggler" type="button" id="mobile_burger_menu">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </span>
        </button>

        <a class="nav-link top_search_btn search_open" href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>

        <div class="navbar-nav d-none d-lg-flex">
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>

                <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                    <?=str_repeat("</div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                <?endif?>

                <?if ($arItem["IS_PARENT"]):?>
                    <div class="prv_dropdown_parent">
                        <a href="<?=$arItem["LINK"]?>" class="nav-item nav-link <?if ($arItem["SELECTED"]):?>active<?endif?>">
                            <?=$arItem["TEXT"]?><i class="fa fa-angle-down"></i>
                        </a>
                        <div class="prv_dropdown_block">
                <?else:?>

                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <a class="nav-item nav-link <?if ($arItem["SELECTED"]):?>active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <?else:?>
                        <a class="nav-item nav-link <?if ($arItem["SELECTED"]):?>active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <?endif?>

                <?endif?>

                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

            <?endforeach?>

            <?if ($previousLevel > 1)://close last item tags?>
                <?=str_repeat("</div></div>", ($previousLevel-1) );?>
            <?endif?>
        </div>
    </nav>

    <div class="left_float_sidebar">
        <div class="swipe_container">
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>

                <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                    <?=str_repeat("</div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                <?endif?>

                <?if ($arItem["IS_PARENT"]):?>
                    <div>
                        <a href="javascript:void(0);" class="nav-item nav-link open_swipe <?if ($arItem["SELECTED"]):?>active<?endif?>">
                            <?=$arItem["TEXT"]?><i class="fa fa-angle-right"></i>
                        </a>
                        <div class="prv_swipe_block">
                            <a href="javascript:void(0);" class="nav-item nav-link close_swipe">&larr;&nbsp;&nbsp;<?=GetMessage("PRV_MENU_BACK")?></a>
                            <a href="<?=$arItem["LINK"]?>" class="nav-item nav-link swipe_parent_link"><?=$arItem["TEXT"]?></a>
                <?else:?>

                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <a class="nav-item nav-link <?if ($arItem["SELECTED"]):?>active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <?else:?>
                        <a class="nav-item nav-link <?if ($arItem["SELECTED"]):?>active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <?endif?>

                <?endif?>

                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

            <?endforeach?>

            <?if ($previousLevel > 1)://close last item tags?>
                <?=str_repeat("</div></div>", ($previousLevel-1) );?>
            <?endif?>
            <div class="float_menu_info">

                <p><a target="_blank" href="yandexnavi://build_route_on_map?lat_to=59.922989&lon_to=30.377886"><i class="fa fa-map-marker"></i>г. Москва,Пыжевский пер., 5</a></p>
                <p><i class="fa fa-phone"></i><a href="tel:+78002502188">+7 (800) 250-21-88</a></p>
                <p><i class="fa fa-envelope-o"></i><a href="mailto:sales@pr-volga.ru">sales@pr-volga.ru</a></p>
                <p><i class="fa fa-clock-o"></i>C 9:00 до 20:00,без выходных</p>
            </div>
        </div>
    </div>
    <div class="float_fade_background close_menu"></div>
<?endif?>