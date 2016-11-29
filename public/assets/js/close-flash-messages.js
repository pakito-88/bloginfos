$(document).ready(function(){

	$('button.close').click(function(e){
		e.preventDefault();
		//data raccourci pour attr('data-dismiss')
		var dataDismiss = $(this).data('dismiss');

		$(this).closest('.'+dataDismiss).remove();
	});
});
