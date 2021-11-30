<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
    die();
?>

<div class="PRVUniversalFeedback">
    <?foreach ($arResult as $error):?>    
       <div class="error_text"><?=GetMessage("PRV_UF_ERROR_" . $error);?></div>
    <?endforeach;?>
</div>