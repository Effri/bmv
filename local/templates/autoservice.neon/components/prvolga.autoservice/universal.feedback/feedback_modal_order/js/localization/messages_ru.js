(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: RU (Russian; ������� ����)
 */
$.extend( $.validator.messages, {
	required: "Обязательное поле",
	remote: "Пожалуйста, введите правильное значение.",
	email: "����������, ������� ���������� ����� ����������� �����.",
	url: "����������, ������� ���������� URL.",
	date: "����������, ������� ���������� ����.",
	dateISO: "����������, ������� ���������� ���� � ������� ISO.",
	number: "����������, ������� �����.",
	digits: "����������, ������� ������ �����.",
	creditcard: "����������, ������� ���������� ����� ��������� �����.",
	equalTo: "����������, ������� ����� �� �������� ��� ���.",
	extension: "����������, �������� ���� � ���������� �����������.",
	maxlength: $.validator.format( "����������, ������� �� ������ {0} ��������." ),
	minlength: $.validator.format( "����������, ������� �� ������ {0} ��������." ),
	rangelength: $.validator.format( "����������, ������� �������� ������ �� {0} �� {1} ��������." ),
	range: $.validator.format( "����������, ������� ����� �� {0} �� {1}." ),
	max: $.validator.format( "����������, ������� �����, ������� ��� ������{0}." ),
	min: $.validator.format( "����������, ������� �����, ������� ��� ������ {0}." )
} );
return $;
}));