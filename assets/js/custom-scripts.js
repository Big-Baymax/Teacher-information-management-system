


    // Initializing ///

    $(document).ready(function () {
		
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#page-wrapper').animate({'margin-left' : '260px'});
				
			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#page-wrapper').animate({'margin-left' : '0px'}); 
			}
		});
		$('.nav-second-level').css('display','none');
		$('#System-setting').click(function(){
			$('.nav-second-level').fadeToggle('slow');
		})
		
       
    });

	
	

