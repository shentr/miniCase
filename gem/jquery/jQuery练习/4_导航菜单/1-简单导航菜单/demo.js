$(document).ready(function(){
	$(".hmain").hover(function(){//hover函数与toggle类似，唯一的区别是一是点击事件，一个是鼠标滑过事件	
		$(this).children("ul").slideDown("slow");
		$(this).children("a").css("background-image","url('images/up.gif')");
	},function(){
		$(this).children("ul").slideUp("slow");
		$(this).children("a").css("background-image","url('images/down.gif')");
	});
});


