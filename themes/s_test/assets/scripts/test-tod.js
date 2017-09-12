
// TEST

//var elem = document.querySelector('#isotope-list');
jQuery('#isotope-list').isotope({
  // options
  itemSelector: '.isotope-item',
  layoutMode: 'masonry',
  masonry: {
  columnWidth: 320,
  fitWidth: true
 
}  
});

jQuery('#filters li a').on( 'click', function() {

  var filterValue = jQuery( this ).data("filter");
  console.log(jQuery( this )+"cliccat"+filterValue);
  jQuery('#isotope-list').isotope({ filter: filterValue });
});

/*
// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});
*/

console.log ("test-tod.js");

    jQuery('input[name="your-name"]').attr('autocomplete', 'off');
    jQuery('input[name="your-email"]').attr('autocomplete', 'off');




function riportoMargine () {
	console.log( "ready!" );    
    
    var margineDestro;
    
    jQuery( ".fl-post-grid" ).each(function( index ) {
	
	  margineDestro=jQuery( this ).css( "margin-right" ) ;
	 

	});
     console.log(  margineDestro);
    jQuery( ".navbar-nav" ).css( "margin-right", margineDestro );
    jQuery( ".navbar-header" ).css( "margin-left", margineDestro );

    console.log( "index" + ": " + jQuery( ".navbar-nav" ).css( "margin-right"));
}

function showPortfolioGrid () {
	
	jQuery('.fl-post-grid.goliath.masonry').masonry('reloadItems');
}



 function check_if_in_view() {
  
      var window_height = jQuery(window).height();
      var window_top_position = jQuery(window).scrollTop();
      var window_bottom_position = (window_top_position + window_height);

      jQuery(".home .fl-html svg").each( function() {
        var element = jQuery(this);
        var element_height = element.outerHeight();
        var element_top_position = element.offset().top;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            jQuery(element).addClass('in-view');
            jQuery(element).addClass('showed');
        } else {
           //jQuery(element).removeClass('in-view');
        }
      });

        jQuery(".typeEffect").each( function() {
        var element = jQuery(this);
        var element_height = element.outerHeight();
        var element_top_position = element.offset().top;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            if(!flagType){
            typeHomeEfffect();
           }
  
        } else {
           //jQuery(element).removeClass('in-view');
        }
      });

       
}


function addHomeToggles(){
  console.log("test");
 
  var totalHeight=jQuery(".containerSpiegone div p").height();  
  jQuery(".containerSpiegone>div").height( totalHeight+40 ); 
   var area=1680*100;
   var area_2=1680*20;
  
   jQuery( window ).resize(function() {
    if( jQuery(".containerSpiegone div" )){
      totalHeight=jQuery(".containerSpiegone div p").height();  
      jQuery(".containerSpiegone>div").height( totalHeight+40 );
      console.log("totalHeight");
    }
    check_if_in_view();

   
   }) ;

}
function animate() {
  var width = document.documentElement.clientWidth;    
  if((jQuery('body').hasClass("home") && width>700) || (! jQuery('html').hasClass(".fl-builder-edit)") && jQuery('body').hasClass("home"))  ){
      console.log("play anim logo");
      
      
      // RESET OPACITY & POS LOGO CENTER
      jQuery('.studio-logo').velocity({ opacity: 0 }, {duration: 0, delay: 0});
      jQuery('.macchinette-logo').velocity({ opacity: 0 }, {duration: 0, delay: 0});
      jQuery('.barra_dx_logo').velocity({ opacity:0 }, {duration: 0, delay: 0});
      jQuery('.barra_sx_logo').velocity({ opacity: 0}, {duration: 0, delay: 0});
     
      jQuery('.barre').velocity({ opacity: 1}, {duration: 0, delay: 0});
      jQuery('.logo-center').velocity({ translateX: [-450,0]  }, { duration: 0, delay: 0 } );

      jQuery('.resistor').velocity({ 'stroke-dashoffset': 2400}, {duration: 0, delay: 0});
      jQuery('.resistor').velocity({ 'stroke-dasharray': 1400}, {duration: 0, delay: 0});
      jQuery('.pathLogo').velocity({ 'stroke-width': 0}, {duration: 0, delay: 0});
      
      //jQuery('.barre').velocity({ translateX: [-32,0]  }, { duration: 0, delay: 0 } );
      jQuery('.svg__wrapper.svg__home_logo').velocity({ opacity: 1 }, {duration: 0, delay: 900});
      //jQuery('.svg__wrapper.svg__home_logo').css('visibility', 'visible');

      // POS ELEMENTS
     jQuery('.barra_dx_logo').velocity({ opacity: 1, translateY:[0,0]}, {duration: 0, delay: 0});
     jQuery('.barra_sx_logo').velocity({ opacity: 1, translateY:[0,0]}, {duration: 0, delay: 0});
     jQuery('.studio-logo').velocity({ opacity: 1 }, {duration: 800, delay: 0});
     jQuery('.macchinette-logo').velocity({ opacity: 1 }, {duration: 800, delay: 0});


     // SHOW LOGO SHAPE CENTER
     jQuery('.resistor').velocity({ opacity: 1 }, {duration: 0, delay: 0});
     jQuery('.resistor').velocity({ 'stroke-dashoffset': 0 }, {duration: 2500, delay: 400,queue:false});
     jQuery('.pathLogo').velocity({ 'stroke-width': 0.28}, {duration: 450, delay: 1500});
     jQuery('.pathLogo').velocity({ 'stroke-dashoffset': 0  ,ease: [ 300, 8 ] }, { duration: 2000, delay: 800 } );
     

     jQuery('.resistor').velocity({ 'fill': "#000000" }, {duration: 500, delay: 2400 ,queue:false});
     jQuery('.pathLogo').velocity({ 'fill': "#000000" }, {duration: 500, delay: 2100 ,queue:false});
    

     // INGRESSO LOGO TYPE CENTER
     jQuery('.logo-center').velocity({ translateX: [1,-200]}, {easing: "spring", duration: 2000, delay: 1900 } );
     jQuery('.barra_dx_logo').velocity({ rotateZ: [0, 45]}, {easing: "spring", duration: 3500, delay: 1900});
     jQuery('.barra_sx_logo').velocity({ rotateZ: [0, -45]}, {easing: "spring", duration: 3500, delay: 1900});
  
     jQuery('.logo-center').velocity({ 'opacity': 0 }, { duration: 800, delay: 500 } );

    // ANIM LOGO TYPE HEADER
     jQuery('html:not(.fl-builder-edit) .home header.navbar').velocity({ 'opacity': 1 }, { duration: 1000, delay: 5500 } );
    
     jQuery('.barra_sx_logo_header').velocity({ rotateZ: [0,40] }, { duration: 1000, delay: 5750 , easing: [ 300, 8 ]} );
     jQuery('.barra_dx_logo_header').velocity({ rotateZ: [0,-40] }, { duration: 1000, delay: 5750 , easing: [ 300, 8 ]} );
     jQuery('.logoNav').velocity({ translateY: [-20,-50] }, { duration: 1000, delay: 5500 ,easing: [ 300, 8 ]} );
     
     // SHOW ARROW DONW 
     jQuery('#Capa_1').velocity({ opacity:1}, { duration: 500, delay: 5200 } );
     jQuery('#Capa_1').velocity({ translateY:[-40,-60],queue: true , ease:'easeOutQuad'}, {loop:true, duration: 500, delay: 0} );
   
   }else{
    jQuery('html:not(.fl-builder-edit) .home header.navbar').velocity({ 'opacity': 1 }, { duration: 0, delay: 0 } );
    jQuery('.pathLogo.animate').velocity({ 'stroke-dashoffset': 0 }, { duration: 0, delay: 0 , ease:'easeOutQuad'} );
    jQuery('.resistor').velocity({ opacity: 1 }, {duration: 0, delay: 0});
    jQuery('.logoNav').velocity({ translateY: -20 }, { duration: 0, delay: 0 , ease:'easeOutQuad'} );
    jQuery('.studio-logo').velocity({ opacity: 1 }, {duration: 0, delay: 0});
    jQuery('.macchinette-logo').velocity({ opacity: 1 }, {duration: 0, delay: 0});

    //jQuery('.studio-logo').velocity({ opacity: 1 }, { duration: 0, delay: 0 , ease:'easeOutQuad'} );
    //jQuery('.macchinette-logo').velocity({ opacity: 1 }, { duration: 0, delay: 0 , ease:'easeOutQuad'} );
    //jQuery('.barre').velocity({ opacity: 1}, {duration: 0, delay: 0});
  } 





}
 
 var flagType=false;

 function typeHomeEfffect(){
    flagType=true;
    var w_0 = "installazioni ed oggetti interattivi^500" ;
    var w_1 = "poster^100 che sono drum machine^500" ;
    var w_2 = "macchine sonore^500" ;
    var w_3 = "momenti^100 imbarazzanti^500" ;
    var w_4 = "muri disegnati^500" ;
    var w_5 = "lampade-fischio^500" ;
    var w_6 = "circuiti^500" ;
    var w_7 = "sorrisi sulle facce delle persone^500" ;
    var w_8 = "crostate^100 musicali^500" ;

    jQuery(".typeEffect").typed({
        strings: [w_0, w_1,w_2,w_3,w_4,w_5,w_6,w_7,w_8],
         loop: true,
        typeSpeed: 70,
         backDelay: 50,
          startDelay: 2000
    });
 }

 
jQuery(document).ready(function() {

  jQuery( "#Capa_1" ).click(function() {
   //console.log("cliccai");
   jQuery('body,html').scrollTo(jQuery(".innovationPlayground h3") , 800);

   if(!flagType){
    typeHomeEfffect();
   }

  });

  check_if_in_view();
  animate();
});






jQuery(document).ready(function () {
       var trigger = jQuery('.hamburger'),
      overlay = jQuery('.overlay'),
     isClosed = false;

     function hamburger_cross() {

      if (isClosed === true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }


    trigger.click(function () {
      hamburger_cross();      
    });

   
  
  jQuery('[data-toggle="offcanvas"]').click(function () {
        jQuery('#wrapper').toggleClass('toggled');
  });  

 jQuery(window).on('scroll', check_if_in_view);

  check_if_in_view();

});



// JS SLIDING PANEL - BOURBON|REFILL
jQuery(document).ready(function(){
  jQuery('.sliding-panel-button,.sliding-panel-fade-screen,.sliding-panel-close, .icon_scheda').on('click touchstart',function (e) {
    jQuery('.sliding-panel-content,.sliding-panel-fade-screen').toggleClass('is-visible');
    e.preventDefault();
    if (jQuery('.sliding-panel-content').hasClass('is-visible')){
      
      setTimeout(function(){
        jQuery('.sliding-panel-button').addClass("open");
      }, 400);

       jQuery( ".sliding-panel-button" ).animate({
          left: "+=208"
        }, 100, function() { });
    }else{
      
      jQuery('.sliding-panel-button').removeClass("open");

      jQuery( ".sliding-panel-button" ).animate({
          left: "-=208"
        }, 100, function() {
          // Animation complete.
        });
    }
  });
 
});