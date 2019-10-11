$(function(){

function Slider( container , navigation){
	this.bac = $('img.bac');
	this.buttons = $('div.slider-button');
	this.container = container;
	this.pages = this.container.children('div');
	this.pagesLen = this.pages.length;
	this.pagesHeight = this.pages[0].clientHeight + 15;
	this.pagesWidth = this.pages[0].clientWidth;
	this.nav = navigation.show();
	this.current = 0;
	( this.container.is('.ul') ) ? this.container.parent('#pageslider').css('overflow','hidden') : this.container.css('overflow','hidden');
	var dcs = $('div.content').children('div'),
		dns = $('div.navbar').children('div');
	if ( dcs.length !== 0 && dns.length !== 0 ) {
		dcs.first().attr('active','active');
		dns.first().attr('active','active');
	}
	this.setCurrent_slider = function( direction , indicating_num ){
		var loc = this.current;
		loc += ~~( direction === 'next' ) || -1;
		this.current =  ( loc < 0 ) ? this.pagesLen - 1 : loc % this.pagesLen;
		var debug = indicating_num;
		( typeof debug === 'undefined' )? this.current = this.current : this.current = indicating_num ;
	}
	this.setCurrent_content = function(arg){
		this.current = arg;
	}
	this.rendering = function(){
		for (var i = this.container.siblings('div').children('div').length - 1; i >= 0; i--) {
			navbar.children('div').eq(i).attr('data-rank', i );
		}
	}
	this.transition = function(){	var shbr;
	( this.current === 0 ) ? shbr = 1 : shbr = 0;
	this.bac_Changer(this.current);
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
		}).appendTo('#pageslider').animate({opacity:0.75},500);
	}
	}
	this.bac_Changer = function(num){
		( num === 1 || num === 3  )? num = 2 : this.bac.attr('src','img/' + num +'.jpg');
	}
	this.nav_indic = function(){
		navbar.children('div').eq(this.current).attr('active','active').siblings('div').removeAttr('active');
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
	this.showing = function(){
	this.container.children('div').eq(this.current).siblings('div').removeAttr('active').fadeOut(200).end().delay(200).slideDown();
	this.nav_indic();
	}
}
function Page_Indicator(){
	this.box = $('div.pageindicator');
	this.pages = slider.pagesLen;
	this.dot_creator = function(){
		for (var i = this.pages - 1; i >= 0; i--) {
			$('<div></div>',{
			class: 'dots',
			'data-rank':i
			}).prependTo(this.box);
		}
		this.box.children('div').eq(0).attr('active','active');
	}
	this.dot_indicator = function(num){
		var dots = this.box.children('div');
		dots.eq(num).attr('active','active').siblings('div').removeAttr('active');
	}
}
var navbar = $('div.navbar');
var slider = new Slider( $('div.ul') , $('div.slider-button') );
var content = new Slider( $('div.content') , navbar );
var indicator = new Page_Indicator();
indicator.dot_creator();

$(document).on('click','div.slider-button' ,function(){
	slider.setCurrent_slider($(this).data('dir'));
	slider.transition();
	indicator.dot_indicator(slider.current);
});
navbar.children('div').on('click',function(){
	content.rendering();
	content.setCurrent_content( parseInt($(this).attr('data-rank')));
	content.showing();
});
$('div.dots').on('click',function(){
	slider.setCurrent_slider('',parseInt($(this).attr('data-rank')));
	slider.transition();
	indicator.dot_indicator(parseInt($(this).attr('data-rank')));
});
$('div.pageindicator').on('dblclick',function(){
	this.ata = function(){
		slider.container.parent('div').css({'overflow':'auto','overflow-x':'hidden'});
		slider.nav.hide();
		$(this).hide();
	}
	var res = confirm('Do you really want to go into simple mode?');
	( res )? this.ata() : null ;
});
    
    
function Portofolio( container ){
	this.container = container;
	this.t_Height = this.container[0].clientHeight;
	this.t_Width = this.container[0].clientWidth;
    
    this.condition = function(){
        if((this.t_Height - this.t_Width)>1 ){
            return true;
        }
    }


	this.rand_Maker = function( min , max ){
		return Math.floor(Math.random() * ( max - min ) ) + min ;
	}
	this.ls_Maker = function(type){
			u_lim = ((( type === 1 )? this.t_Width : this.t_Height)/ (( type === 1 )? 4 : 3)),
			d_lim = u_lim / 2,
			sch_lim = ( u_lim / 4 ) * 3;
		this.f_Ma = function(){
			var a = this.rand_Maker( 0 , u_lim );
			return a;
		}
		this.sch_Ma = function(num){
			for (var i = num; i <= sch_lim;) {
				i = i +15;
				a = i ;
			}
			return a;
		}
		this.f_Ch = function(){
			var a = this.f_Ma();
			( a < d_lim )? a = this.sch_Ma(a) : a = a
			return a;
		}
		var ff_ws = [],
			ft_ws = [],
			t = type,
			margin = 5,
			gh,
			ty;

		( type === 1 )? ty = 1 : ty = 0 ;
		if (ty===1) {
			for (var i = 2; i >= 0; i--) {
				gh = this.f_Ch();
				ff_ws.push(gh);
			}
		}else if (ty===0) {
			for (var i = 1; i >= 0; i--) {
				ft_ws.push(this.f_Ch());
			}
		}
		

		

		this.last_Ma = function(type){
			var a = 0,
				c,
				f;
				( type === 1 )? c = this.t_Width : c = this.t_Height;
			for (var i = 0 ; i <= (( type === 1 )? 2 : 1); i++) {
				( type === 1 )? f = ff_ws[i] : f = ft_ws[i];
				a =  a + f ;
			}
			return c - a ;
		}
		var ls = ( type === 1 )? ff_ws : ft_ws;
		ls.push((this.last_Ma(t)-(( type === 1 )? 62.5 : 50) ));
		return ls;
	}
	this.elem_Ma = function(){
		var width = porto.ls_Maker(1);
		var height;
		if(porto.condition()){
            for (var anteg = 2; anteg >= 0;) {
                height = (porto.t_Height - 50)/3 ;
                $('<div></div>',{
                    'height': height,
                    'width': '100%'
                }).appendTo(this.container);
                $('<div></div>',{
                    'class': 'captions'
                }).appendTo(this.container.children('div:last-child'));
                
                anteg--
            }
            for (var i = 2 ; i >= 0; ) {
                var tex = $('div#porto_archive').children('div').eq(i).children('div').eq(0).text();
                var img = $('div#porto_archive').children('div').eq(i).children('div').eq(1).text();
                $(this.container.children('div').eq(i)).css({
                    'background-image':'url('+img+')',
                    'background-repeat':'round'
                }).children('div.captions').text(tex);
                --i
            }
        }else{
		for (var anteg = 3; anteg >= 0;) {
			height = porto.ls_Maker(0);
			for (var i = 2; i >= 0; ) {
				$('<div></div>',{
					'height': height[i],
					'width': width[anteg]
				}).appendTo(this.container);
				$('<div></div>',{
					'class': 'captions'
				}).appendTo(this.container.children('div:last-child'));
			i--
			}
			anteg--
		}
		for (var i = 11 ; i >= 0; ) {
            var tex = $('div#porto_archive').children('div').eq(i).children('div').eq(0).text();
            var img = $('div#porto_archive').children('div').eq(i).children('div').eq(1).text();
			$(this.container.children('div').eq(i)).css({
				'background-image':'url('+img+')',
				'background-repeat':'round'
			}).children('div.captions').text(tex);
			--i
		}
        }

	}


}
var porto = new Portofolio( $('div.porto'));
porto.elem_Ma();


$.fn.cap = function(speed,type){
	var th = $(this);
	( type === 0 )? th.stop().animate({'top':'100%'},{duration:speed,queue:false}) : th.stop().animate({'top':'0px'},{duration:speed,queue:false});
}

var captions = $('div.captions'),
	porto_con = $('div.porto');


porto_con.children('div').on('mouseenter',function(){
	$(this).children('div').cap(400,1);
	$(this).siblings('div').children('div.captions').cap(200,0);
});

porto_con.on('mouseleave',function(){
	$(this).find('div.captions').cap(200,0);
});







not = $('div.pi_notification'),
not_width = not.clientWidth;
$('div.pageindicator').on('mousemove',function(evt){
	function position(type){
		(type === 0)? null : not.stop().animate({top: (evt.clientY - 145),
			left: (evt.clientX - 195)},1).delay(1200).slideDown() && not.attr('data-dis','shown');
		not.css({
			top: (evt.clientY - 145),
			left: (evt.clientX - 195)
		});

	}
	( not.attr('clicked') === 'okay' )? null : (( not.attr('data-dis') === 'shown' )? position(0) : position(1));
	
});


function pi_not_hide(type){
	(type === 'click')? not.stop().hide().removeAttr('data-dis') && not.attr('clicked','okay') : not.stop().hide().removeAttr('data-dis');
}
indicator.box.on('mouseleave',function(){
	not.removeAttr('clicked');
	pi_not_hide();
});
indicator.box.children('div').on('click',function(){
	pi_not_hide('click');
});














});
