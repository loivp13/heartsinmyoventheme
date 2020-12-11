
( function( $ ) {
    let body = $('html');
    let logo = $('.header-logo');
    console.log(body)
    console.log(logo)
    console.log('hi')
    logo.addClass('scrolled')
    body.scroll( (params) => {
        console.log('scroll')
        logo.addClass('hidden')
    }
    )
	
} )( jQuery );
