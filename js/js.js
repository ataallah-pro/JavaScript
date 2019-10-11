$(function(){

function Slider( container){
	this.buttons = $('div.slider-button');
	this.container = container;
	this.pages = this.container.children('div');
	this.pagesLen = this.pages.length;
	this.pagesHeight = this.pages[0].clientHeight;
	this.pagesWidth = this.pages[0].clientWidth;
	this.current = 0;
    
	

	this.setCurrent_slider = function( direction , indicating_num ){
		var loc = this.current;
		loc += ~~( direction === 'next' ) || -1;
		this.current =  ( loc < 0 ) ? this.pagesLen - 1 : loc % this.pagesLen;
		var debug = indicating_num;
		( typeof debug === 'undefined' )? this.current = this.current : this.current = indicating_num ;
	}
	
	this.transition = function(){	var shbr;
	( this.current === 0 ) ? shbr = 1 : shbr = 0;
	this.but_Text(this.current);
	this.container.animate({
		'margin-top': -( this.current * this.pagesHeight ) + 'px'
	});
	( shbr === 1 ) ? $('div.slider-button').last().fadeOut(500) : $('div.slider-button').last().fadeIn(500);
	if($('div.slider-button[data-dir=prev]').length){ return }
	else{
		$('<div></div>',{
			class: 'slider-button',
			'data-dir':'prev',
			text: "بازگشت"
		}).css({
			bottom:'none',
			top:0,
			display:'block',
			background: 'linear-gradient(180deg, #111 0%, transparent 100%)',
			opacity:0,
			'line-height': 3
		}).appendTo(slider.container).animate({opacity:0.75},500);
	}
	}
	this.but_Text = function(num){
		var text;
		var img = this.buttons.children('img').clone();
		switch(num){
			case 0 :
			text = "محصولات ";
			break;
			case 1 :
			text = "مطالب  ";
			break;
			case 2 :
			text = "ارتباط با ما ";
			break;
			case 3 :
			text = "خانه";
			break;
			default:
			text = "محصولات";
			break;
		}
		this.buttons.text('').append(text, img);
	}
}

var slider = new Slider( $('div.page_slider') , $('div.slider-button') );


$(document).on('click','div.slider-button' ,function(){
	slider.setCurrent_slider($(this).data('dir'));
	slider.transition();
});
    
    
    $('.page_slider>div:first-child').scroll(function(){
        var top = $(this).scrollTop();
        console.log(top);
        if(top>=100){
            $('#red_nav').fadeOut(500);
            $('.top_nav').fadeOut(500);
        }
    });
    
    $('div.slider_left').prev('div.col-md-4').css('marginRight','auto');
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});
