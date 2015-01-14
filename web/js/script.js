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
						$(this).toggleClass('hol-single');
						
						if( $(this).hasClass('hol-single') )
							$(this).css('background-color','#888');
						else
							$(this).css('background-color','#DDD');


						// update contiguous
						UpdateContiguous();
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