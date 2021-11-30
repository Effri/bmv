<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
    die();
?>
<section id="main_life" class="white_section">
    <div class="container">
        <h2 class="main_header"><?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => str_replace("//", "/", SITE_DIR . "/inc/main_life.php")
            )
        );?></h2>
        <div class="PRVWidget life_main_container" style="width: <?=$arParams['width'];?>;">
            <?if ($arParams['head'] == true): ?>
                <a href="http://instagram.com/<?=$arResult['profile']['username'];?>" target="_blank" class="title">
                    <div class="text"><?=$arResult['profile']['username'];?></div>
                </a>
            <?endif;?>
            <?if ($arParams['toolbar'] == true):?>
                <div class="profile">
                    <div class="avatar">
                        <a href="http://instagram.com/<?=$arResult['profile']['username'];?>" target="_blank">
                            <img src="<?=$arResult['profile']['avatar'];?>">
                        </a>
                    </div>
                    <div class="profile_right_block">
                        <div class="values_container">
                            <div class="value">
                                <?=$arResult['profile']['posts'];?>
                                <span><?=GetMessage("PRV_INSTAFEED_POSTS");?></span>
                            </div>
                            <div class="value">
                                <?=$arResult['profile']['followers'];?>
                                <span><?=GetMessage("PRV_INSTAFEED_FOLLOWERS");?></span>
                            </div>
                            <div class="value">
                                <?=$arResult['profile']['following'];?>
                                <span><?=GetMessage("PRV_INSTAFEED_FOLLOWING");?></span>
                            </div>
                        </div>
                        <div class="follow_container">
                            <a href="http://instagram.com/<?=$arResult['profile']['username'];?>" class="follow" target="_blank"><?=GetMessage("PRV_INSTAFEED_SHOW");?></a>
                        </div>
                    </div>
                </div>
            <?endif;?>
            <?if (!empty($arResult['items'])):
                $i=0;
                $inlineClass = '';
                $containerClass = 'slider_list';
                $containerStyle = '';
                if ($arParams['type'] == 'classic') {
                    $inlineClass = ' PRVgrid PRVgrid-' . $arParams['inline'];
                    $containerClass = '';
                    $containerStyle = 'margin: 0px -' . $arParams['padding-side'] . 'px;';
                }?>

                <div class="content" style="height: <?=$arParams['height'];?>;">
                    <div class="images_list <?=$containerClass;?>" style="<?=$containerStyle;?>">
                        <?foreach ($arResult['items'] as $key=>$arItem):
                            $i++;
                        ?>    

                            <div class="image_block<?=$inlineClass;?>" style="padding: 0px <?=$arParams['padding-side'];?>px <?=$arParams['padding-bottom'];?>px <?=$arParams['padding-side'];?>px;">

                                <div class="image_border_block">
                                    <a href="<?=$arItem['link'];?>" class="image" target="_blank">
                                        <?if ($arParams['resize'] == 'square'):?>
                                            <div class="image-box" style="background-image: url(<?=$arItem['image'];?>);"></div>
                                        <?else:?>
                                            <img src="<?=$arItem['image'];?>" />
                                        <?endif;?>
                                    </a>

                                    <?if (!empty($arItem['caption'])):?>
                                        <div class="caption">
                                            <span class="user"><?=$arResult['profile']['username'];?>&nbsp;</span>
                                            <span class="caption_container"><?=$arItem['caption'];?></span>
                                        </div>
                                    <?endif;?>
                                </div>

                            </div>

                            <?if ($arResult->config['type'] == 'classic' && $i-$arResult->config['inline'] == 0): 
                                $i=0;
                            ?>
                                <div class="clear"></div>
                            <?endif;?>

                        <?endforeach;?>
                    </div>
                    <div class="clear"></div>
                </div>
            <?endif;?>
            <div class="subscribe_container">
                <a href="http://instagram.com/<?=$arResult['profile']['username'];?>" target="_blank" class="btn instagram_btn">
                    <img src="<?= $templateFolder . '/img/inst_btn_icon.png'?>"><?=$arResult['profile']['username'];?></a>
            </div>
        </div>
    </div>
</section>
