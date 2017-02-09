$('.hide-if-no-js').removeClass('hide-if-no-js');
$('.show-if-no-js').removeClass('show-if-no-js');


$(window).on('scroll', function(){
	if(window.scrollY > 0){
		$('#scroll').removeClass('scroll-out');
	}else{
		$('#scroll').addClass('scroll-out');
	}
});

$('#btnFixe').click(function(){
	$('#lightbox').css('display', 'block');
});

$('#btnScroll').click(function(){
	$('#lightbox').show();//.css('display', 'block');
})

$(document).ready(function() {
	$('select').material_select();
});

$('select').material_select('destroy');

$('#annule').click(function(){
	$('#lightbox').hide();//.css('display', 'none');
});


$(document).ready(function() {
    $('textarea#message').characterCounter();
  });

var q=document.getElementById('q'),
	s=window.screen,
	w=q.width=s.width,
	h=q.height=s.height,
	p=Array(256).join(1).split(''),
	c=q.getContext("2d"),
	m=Math;

setInterval(function(){
	c.fillStyle="rgba(0,0,0,0.05)";
	c.fillRect(0,0,w,h);
	c.fillStyle="rgba(0,255,0,1)";
	p=p.map(function(v,i){
		r=m.random();
		var str = String.fromCharCode(m.floor(2720+r*33));
		c.fillText(str,i*10,v);
		v+=10;
		var ret = v>768+r*1e4?0:v
		return ret;
	});
},33);



/*
$('#form').submit(function(e){
	var html;
	e.preventDefault();
	$('#anim').css('display','block');//on lance l'animation
	$.post($(this).attr('action'), // On récupere l'action dans l'attribut action du formulaire
		   $(this).serialize(), // On recupère les données 
		   function(data){
		alert(data);// on affiche le message reçu
		html = data;
		$('#anim').css('display','none');//on arrete l'animation
	}
		  );
});
*/