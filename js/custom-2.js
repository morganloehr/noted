function checkVisible( elm, eval ) {
    eval = eval || "visible";
    var vpH = jQuery(window).height(), // Viewport Height
        st = jQuery(window).scrollTop(), // Scroll Top
        y = jQuery(elm).offset().top,
        elementHeight = jQuery(elm).height();
    
    if (eval == "visible") return ((y < (vpH + st)) && (y > (st - elementHeight)));
    if (eval == "above") return ((y < (vpH + st)));
}

 jQuery(document).ready(function(){
    jQuery("#js-rotating").Morphext({
        // The [in] animation type. Refer to Animate.css for a list of available animations.
        animation: "slideInUp",
        // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
        separator: ",",
        // The delay between the changing of each phrase in milliseconds.
        speed: 2000,
        complete: function () {
            // Called after the entrance animation is executed.
        }
    });
    

    window.setTimeout(function(){
        jQuery('.scroll_header_top_area').addClass('ok');
    }, 3000); //<-- Delay in milliseconds

    var section_custom = [];

    jQuery('.full_width_inner .section').each(function(i){

        var attr = jQuery(this).attr('data-q_id');

        if( typeof attr !== typeof undefined && attr !== false ){
            section_custom[i] = jQuery(this).attr('data-q_id');
            
        }

    });

    console.log(section_custom);

 //     function change_menu(){
 //     jQuery('#menu-one_page_menu li:nth-child(2) a').click();
 //     //console(jQuery('#menu-one_page_menu li:nth-child(2)'));
 // }

    var currentLocation = window.location.hash;
    console.log(currentLocation);
    if(currentLocation == '#Contact'){
        jQuery('.change_menu').hide();
    }

});


 jQuery(document).on( 'click' , '.change_menu' , function(){

    if( jQuery('header').hasClass('scrolled') ){

        if(jQuery('#menu-one_page_menu li').hasClass('active')){
            console.log( jQuery('#menu-one_page_menu li.active').next('li') );
            jQuery('#menu-one_page_menu li.active').next('li').find('a')[0].click();

            if( jQuery('#menu-one_page_menu li.active a span').text() == 'Products' ){
                setTimeout(function(){
                    jQuery('.change_menu').hide();
                }, 500);

            }

        }

    } else {
        jQuery('#menu-one_page_menu li:nth-child(2) a')[0].click();
    }
     
     //console(jQuery('#menu-one_page_menu li:nth-child(2)'));

 });

 jQuery(document).on('click','#menu-one_page_menu li a', function(){

    if( jQuery(this).find('span').text() != 'Contact Us' ){
        jQuery('.change_menu').show();
    } else {
        jQuery('.change_menu').hide();
    }

 });

 jQuery(document).on('click', '#back_to_top', function(){ 
     jQuery('.change_menu').show();
})

jQuery(document).scroll(function() {
    var doc_height = jQuery(document).height();
    var contact_height = jQuery('#contactus').height();
    var scroll_height = jQuery(document).scrollTop();
    console.log(scroll_height);
    console.log(doc_height-contact_height > scroll_height);
    if(doc_height-contact_height > scroll_height  )
    {
         jQuery('.change_menu').show();
    }
    else
    {
         jQuery('.change_menu').hide();
    }
})

jQuery(window).scroll(function() {
    if (checkVisible(jQuery('#contactus'))) {
        jQuery('.change_menu').hide();
        
    } else {
        jQuery('.change_menu').show();
    }
});