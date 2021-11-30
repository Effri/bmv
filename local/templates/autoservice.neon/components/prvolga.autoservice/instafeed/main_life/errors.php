<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
    die();
?>

<div class="PRVWidget">
    <?foreach ($arResult as $error):?>    
       <div class="error_text"><?=GetMessage("PRV_INSTAFEED_ERROR_" . $error);?></div>
    <?endforeach;?>
</div>
