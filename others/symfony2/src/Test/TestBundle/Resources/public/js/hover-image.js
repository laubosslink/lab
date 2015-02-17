$(function(){
/*		   
// menu hover	
	$('.sf-menu li').not('.current').hover(function(){
		$(this).find('strong.x1').stop().animate({top:'76px'},700)   
		$(this).find('strong.x2').stop().animate({top:'50px'},900)   
		$(this).find('strong.x3').stop().animate({top:'20px'},1100)   
		$(this).find('strong.x4').stop().animate({top:'-10px'},1300)   
		$(this).find('strong.x5').stop().animate({top:'-40px'},1500)   
		}, function(){
			$(this).not('.current').find('strong.x5').stop().animate({top:'-190px'},500)  
			$(this).not('.current').find('strong.x4').stop().animate({top:'-190px'},800)  
			$(this).not('.current').find('strong.x3').stop().animate({top:'-190px'},1100)  
			$(this).not('.current').find('strong.x2').stop().animate({top:'-190px'},1400)  
			$(this).not('.current').find('strong.x1').stop().animate({top:'-190px'},1900)  
		})
	
// list-1 hover
	$('.list-1 li').hover(function(){
	  $(this).stop().animate({backgroundPosition:'5px 7px'},200)       
	 }, function(){
	  $(this).stop().animate({backgroundPosition:'0px 7px'},200)       
	 })

// box-hover

			$('.box-1 .bgr').css({opacity:'0'});
			$(".box-1").hover(function(){
				$(this).addClass("alt").find('.bgr').stop().animate({opacity:1}, "low");
			}, function(){
				$(this).removeClass("alt").find('.bgr').stop().animate({opacity:0}, "low");
			});

// list hover
	$('.list-2 li').hover(function(){
			th=$(this).find('a');					 
			th.stop().animate({left:'15px'}, 300);
		}, function(){
			th.stop().animate({left:'0px'}, 300);			
	});	

// list hover
	$('.block').hover(function(){
			var th=$(this);					 
			th.find('img').stop().animate({top:'10px'}, 600,'easeOutBounce');
			th.find('div').stop().animate({color:'#ff2102'}, 600);
		}, function(){
			var th=$(this);
			th.find('img').stop().animate({top:'0px'}, 600,'easeOutBounce');
			th.find('div').stop().animate({color:'#787878'}, 600);
	});	
*/	
// lightbox image
	$(".lightbox-image").append("<span></span>");
	
	$(".lightbox-image").hover(function(){
		$(this).find("img").stop().animate({opacity:0.5}, "normal")
	}, function(){
		$(this).find("img").stop().animate({opacity:1}, "normal")
	});

});