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
	
	$("#delete-item").on('click', function(){
		var id = $(this).attr("data-id"),
			deleteId = {theid: id},
			el = $(this).parent();
		
		$.post(window.location.href, deleteId, function(){
			el.hide();
		});
	});
	
	$("#do-progress").on('click', function(){
		var doProgress = {progress: true};
		
		$.post(window.location.href, doProgress);
	});
});