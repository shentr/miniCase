$(function(){
	$("tbody tr:even").css("background-color","#edf");//设置隔行变色
	var editTd = $('td.editable');
	editTd.on('click',function(){
		var $tdEditd = $(this);
		if($tdEditd.children('input[type="text"]').size() >0){
			return false;
		}

		var $input = $('<input type="text">');
		$input.css('border','none').width($(this).width()).css('background-color',$(this).css('background-color'))
			.val($(this).text());

		$(this).empty().append($input);
		$input.trigger('focus');
		$input.on('keyup', function (event) {
			if(event.keyCode == 13){
				$tdEditd.text($(this).val());
			}
		});
	});

})





