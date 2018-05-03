$(document).ready(function(){
	$("#do-order").on('click',function(){
		var id = $(this).attr("data-id"),
				info = {theid: id}, el = $(this);
			$.post(window.location.href, info, function(data){
				el.hide();
				$(".good").show();
			});
	});
});