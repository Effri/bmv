<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
    <div class="PRVUniversalFeedback">
        <form  enctype="multipart/form-data" action="<?=POST_FORM_ACTION_URI?>" method="POST" id="prv_feedback_form_<?=$arResult["PARAMS_HASH"];?>">
            <?=bitrix_sessid_post()?>
            <script>
                validationInitArray['prv_feedback_form_<?=$arResult["PARAMS_HASH"];?>'] = {
                    rulesObject: {
                        "licenses_inline": {
                            required: true
                        }
                    },
                    submitFunction: function(form) {
                        $("input[type='submit']").attr("disabled");
                        $("input[type='submit']").prop("disabled", true);

                        var formBlock = $('#prv_feedback_form_<?=$arResult["PARAMS_HASH"];?>'),
                        formData = new FormData();

                        formBlock.find('textarea, input[type="text"], input[type="submit"], input[type="hidden"], input[type="select"], input[type="checkbox"]:checked, input[type="radio"]:checked').each(function(index, element){
                            formData.append($(element).prop('name'), $(element).val());
                        });
                        formBlock.find('input[type="file"]').each(function(index, element){
                            var key = $(element).prop('name'), arr = $(element).prop('files');
                            $.each(arr, function(i, el){
                                formData.append(key+'[]', el);
                            });
                        });

                        $.ajax({
                            type: formBlock.attr('method'),
                            url: formBlock.attr('action'),
                            data: formData,
                            dataType: 'text',
                            contentType: false,
                            processData: false,
                            success: function(){
                                $("#orderModal").modal("hide");
                                $("#thanks").modal('show');
                                setTimeout(function(){$("#thanks").modal("hide")}, 2000);
                                $('input[type="text"]').val('');
                                $('.reviews_input_block textarea').html('');
                                $("input[type='submit']").removeAttr("disabled");
                                $("input[type='submit']").prop("disabled", false);
                                $(".mask_phone_number").mask("+7 (999) 999-99-99"), {placeholder: ''});
                            },
                            error: function() {
                                $("input[type='submit']").removeAttr("disabled");
                                $("input[type='submit']").prop("disabled", false);
                            }
                        });
                        return false; 
                    }
                };
                
                $(document).ready(function() {
                    $(".order_btn").on('click', function() {
                        $("#order_title").html($(this).data('header'));
                        $("#SERVICE_<?=$arResult["PARAMS_HASH"];?>").val($(this).data('name'));
                    });
                });
            </script>
            <div class="row justify-content-center">
                <?foreach ($arResult['FIELDS'] as $field):?>
                    <?switch ($field['PROPERTY_TYPE']) {
                        case 'L':
                            if ($field["LIST_TYPE"] == 'C'): ?>
                                <p><?=$field["HINT"];?></p>
                                <?if ($field["MULTIPLE"] == 'Y'):
                                    foreach ($field['VALUES'] as $value):?>
                                        <p>
                                            <input 
                                                type="checkbox" 
                                                id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"] . '_' . $value['ID'];?>" 
                                                name="<?=$field["CODE"];?>[]" 
                                                value="<?=$value['ID'];?>"
                                                <?=($value["DEF"] == 'Y') ? 'checked' : '';?>
                                                <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                            >
                                            <label for="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"] . '_' . $value['ID'];?>"><?=$value['VALUE'];?></label>
                                        </p>
                                    <?endforeach;
                                else:
                                    foreach ($field['VALUES'] as $value):?>
                                        <p>
                                            <input 
                                                type="radio" 
                                                id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"] . '_' . $value['ID'];?>" 
                                                name="<?=$field["CODE"];?>" 
                                                value="<?=$value['ID'];?>"
                                                <?=($value["DEF"] == 'Y') ? 'checked' : '';?>
                                                <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                            >
                                            <label for="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"] . '_' . $value['ID'];?>"><?=$value['VALUE'];?></label>
                                        </p>
                                    <?endforeach;
                                endif;?>
                            <?else:?>
                                <p><?=$field["HINT"];?></p>
                                <p>
                                    <select 
                                        size="<?=$field["ROW_COUNT"];?>" 
                                        <?=($field["MULTIPLE"] == 'Y') ? 'multiple name="' . $field["CODE"] . '[]"' : 'name="' . $field["CODE"] . '"';?>
                                        <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                    >
                                        <option disabled><?=$field["NAME"];?></option>
                                        <?foreach ($field['VALUES'] as $value):?>
                                            <option 
                                                value="<?=$value['ID'];?>"
                                                <?=($value["DEF"] == 'Y') ? 'selected' : '';?>
                                            >
                                                <?=$value['VALUE'];?>
                                            </option>
                                        <?endforeach;?>
                                    </select>
                                </p>
                            <?endif;
                            break;
                        case 'S':?>
                            <?if ($field["USER_TYPE"] == 'HTML'): ?>
                                <p>
                                    <textarea 
                                        id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"];?>"
                                        name="<?=$field["CODE"];?>"
                                        rows="<?=$field["ROW_COUNT"];?>"
                                        placeholder="<?=$field["HINT"];?>"
                                        <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                    ><?=$field["DEFAULT_VALUE"]['TEXT'];?></textarea>
                                </p>
                            <?else:?>
                                <div class="col-10 callback_input">
                                    <label for="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"];?>"><?=$field["NAME"];?></label>
                                    <input
                                        id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"];?>"
                                        name="<?=$field["CODE"];?>"
                                        type="<?=($field["CODE"] == 'SERVICE') ? 'hidden' : 'text';?>"
                                        value="<?=$field["DEFAULT_VALUE"];?>"
                                        placeholder="<?=($field["CODE"] == 'PHONE') ? '+7(___)___-__-__' : '';?>"
                                        class="<?=($field["CODE"] == 'PHONE') ? 'mask_phone_number' : '';?> inp_text"
                                        <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                    />
                                </div>
                            <?endif;
                            break;
                        case 'F':?>
                            <p><?=$field["HINT"];?></p> 
                            <p>
                                <input 
                                    id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"];?>"
                                    name="<?=$field["CODE"];?>" 
                                    type="file" 
                                    accept="image/*,image/jpeg"
                                    <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                    <?=($field["MULTIPLE"] == 'Y') ? 'multiple' : '';?>
                                />
                            </p>
                            <?
                            break;
                        default: //N?>
                            <p><?=$field["HINT"];?></p>
                            <p>
                                <input 
                                    id="<?=$field["CODE"] . '_' . $arResult["PARAMS_HASH"];?>"
                                    name="<?=$field["CODE"];?>" 
                                    type="text" 
                                    placeholder="<?=$field["NAME"];?>" 
                                    value="<?=$field["DEFAULT_VALUE"];?>"
                                    <?=($field["IS_REQUIRED"] == 'Y') ? 'required' : '';?>
                                />
                            </p>
                            <?break;
                    }
                    if ($field["IS_REQUIRED"] == 'Y'):?>
                        <script>
                            validationInitArray['prv_feedback_form_<?=$arResult["PARAMS_HASH"];?>'].rulesObject['<?=$field["CODE"];?>'] = {required: true};
                        </script>
                    <?endif;?>
                <?endforeach;?>
                <div class="col-10">
                    <?if($arParams["USE_PERSONAL"] == "Y"):?>
                        <div class="modal_header_text">
                            <label>
                                <input type="checkbox" name="licenses_inline" checked required> <?=GetMessage("PRV_UFEEDBACK_AGREEMENT")?> <a href="<?= $arParams["LINK_TO_PERSONAL"]?>" target="_blank"> <?=GetMessage("PRV_UFEEDBACK_AGREEMENT_LINK")?></a>
                            </label>
                        </div>
                    <?endif;?>
                    <input type="submit" class="btn main_default_btn callback_btn" name="submit" value="<?=GetMessage("PRV_UFEEDBACK_REVIEWS_SUBMIT");?>">
                    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"];?>">
                </div>
            </div>
        </form>
    </div>