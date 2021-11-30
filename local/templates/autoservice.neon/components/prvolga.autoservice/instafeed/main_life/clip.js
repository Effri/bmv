$(function(){
    $('.caption .caption_container').each(function(){
		var content = $(this).html();

		if(content.length > PRVCaptionLenght+5){
			var c = content.substr(0, PRVCaptionLenght);
			var h = content.substr(PRVCaptionLenght, content.length - PRVCaptionLenght);

			var html = c + "<span class='morecontent'><span>" + h + "</span><a href='' class='morelink'>" + PRVDots + "</a></span>";

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(PRVDots);
            } else {
                $(this).addClass("less");
                $(this).html(PRVDots);
            }
            $(this).prev().toggle();
            return false;
        });
});