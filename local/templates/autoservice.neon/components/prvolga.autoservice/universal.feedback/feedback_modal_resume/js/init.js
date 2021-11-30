validationInitArray = {};
function validationInit(formId, rulesObject, submitFunction){
    var validateForm = $('#'+formId);
    validateForm.validate({
        rules: rulesObject,
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        submitHandler: submitFunction
    });
}

$(function(){
    for(var key in validationInitArray) {
        validationInit(key, validationInitArray[key].rulesObject, validationInitArray[key].submitFunction);
    }
    $(".mask_phone_number").mask("+7 (999) 999-99-99");
});