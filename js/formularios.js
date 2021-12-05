$(function(){
	//AJAX JS, WORK IN PROGRESS
	/* $('body').on('submit','form',function(){
		var form = $(this);
		$.ajax({
			beforeSend:function(){
				$('.overlay-loading').fadeIn();
			},
			url:INCLUDE_PATH+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				$('.overlay-loading').fadeOut();
				$('.sucesso').fadeIn();
				setTimeout(function () {
					$('.sucesso').fadeOut();
				},3000)
			}else{
				$('.overlay-loading').fadeOut();
				alert('falha');
			}
		});
		return false;
	}) */
	
})