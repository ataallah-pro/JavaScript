$(function(){
    $('#product_change').on('click',function(){
         $('div.rects').fadeOut(300,function(){
         	$('div.pro_content').slideDown(200).css('display','flex');
         });  
    });
    $("button[data-type*='changing']").on('click',function(){
    	$(this).slideUp(300);
    	$(this).parent('div').children('div:last-child').slideDown(300);
    });
    
    function Forms(){
    	this.forms = $('div.pro_content form').parent('div').addClass('hide').first().removeClass('hide').css('height','100%');
    	this.buttons = $('#sidemenu').find('a');
    	this.first_but = $('#sidemenu').find('a').first().addClass('active');
    	this.indicating = function(num){
    		$("div.form_container[data-rank*='"+num+"']").removeClass('hide').stop().animate({height:'100%'}).siblings('div').stop().animate({height:0}).addClass('hide');
    	}
    }
    var form = new Forms();
    form.buttons.on('click',function(){
    	form.indicating($(this).data('rank'));
    	$(this).parents('ul').find('a').not(this).removeClass('active')
    	$(this).addClass('active');
    });
    $('#back').click(function(){
    	$('div.pro_content').slideUp(200,function(){
    		$(this)	.css('display','none');
    		$('div.rects').fadeIn(300);
    	});
    });
    function page_indicator(){
        var pi = $('body').attr('data-page'),
            lis = $('#menubar>ul>li');
        switch(pi){
            case 'index':
            lis.eq(0).addClass('active');
            break;
            case 'posts':
            lis.eq(1).addClass('active').siblings('li').removeClass('active');
            break;
            case 'porto':
            lis.eq(2).addClass('active').siblings('li').removeClass('active');
            break;
            case 'contact':
            lis.eq(3).addClass('active').siblings('li').removeClass('active');
            break;
        }
    }    
    page_indicator();
    function post_indicate(){
        var con = $('div#remove_divs');
        ( con.length )? $('div.container-fluid #con').children('div').remove() : con = con ;
    }
    post_indicate();
    $('input').click(function(){
        $(this).removeAttr('checked');
    });

















});