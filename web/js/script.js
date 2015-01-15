$(document).ready(
	function() {

		//
		$('li').each(
			function($this){

				//
				$(this).click(
					function(){
						//
						console.log($(this).html())
						if( $(this).html()=='' ){
							console.log('No day')
							return;	
						}	
						//$(this).toggleClass('day_hol');
						
						if( $(this).hasClass('day_hol') ){
							$(this).removeClass('day_hol');
							$(this).addClass('day');
						}
						else {
							$(this).removeClass('day');
							$(this).addClass('day_hol');
						}

						// update contiguous
						//UpdateContiguous();
					}

				);
			}	
		);	// 
	}
);

function UpdateContiguous()
{
	$('li').each(
			function($this){

				//
				if( $(this).hasClass('hol-single') && 
					$(this).prev().hasClass('hol-single') &&  $(this).next().hasClass('hol-single') ) {

					$(this).prev().css('background-color','#0f0');
					$(this).next().css('background-color','#0f0');
					$(this).css('background-color','#0f0');
				}
			}	
		);	// 
}