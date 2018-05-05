$(document).ready(function(){
	$("#do-order").on('click',function(){
		var id = $(this).attr("data-id"),
				info = {theid: id}, el = $(this);
			$.post(window.location.href, info, function(){
				el.hide();
				$(".good").show();
			});
	});
	
	$("#do-like").on('click', function(){
		var id = $(this).attr("data-id"),
				linfo = {liked: id}, el = $(this);
		$.post(window.location.href, linfo, function(){
				$("#do-like i").toggleClass('far');
				$("#do-like i").toggleClass('fas');
			});
	});
	
	$("#delete-item").click(function(){
		var id = $(this).attr("data-id");
		var deleteId = {theid: id},
			el = $(this).parent();
		
		$.post("/basket/", deleteId, function(){location.reload()});
	});
	
	$("#do-progress").click(function(){
		var doProgress = {progress: 'ok'};
		
		$.post("/basket/", doProgress, function(){location.reload()});
	});
});