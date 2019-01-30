$(document).ready(function(){

    $('.hidden-nav').on('click', function(e){
        e.stopPropagation()
    })

    $('.toggle-search-bar').on('click', function (e) {
        $('.nav-items').css('display', 'none')
        $('.nav-search-icon').css('display', 'none')
        $('.nav-search-bar').fadeIn(800)
        $('.nav-search-bar').css('display', 'flex')
        e.stopPropagation()
    })

    $('.toggle-mobile-search-bar').on('click', function (e) {
        $('.mobile-button').css('display', 'none')
        $('.mobile-search').fadeIn(800)
        $('.mobile-search').css('display', 'flex')
        e.stopPropagation()
    }) 


    $('.close-search').on('click', function(e){
        $('.nav-items').css('display', 'flex')
        $('.nav-search-icon').css('display', 'flex')
        $('.nav-search-bar').css('display', 'none')

        $('.mobile-button').css('display', 'block')
        $('.mobile-search-form').css('display', 'none')
        e.stopPropagation()
    })

    $('.mobile-search-close').on('click', function (e) {
        $('.mobile-button').css('display', 'block')
        $('.mobile-search').css('display', 'none')
        e.stopPropagation()
    })
    
    $('.toggle-header').on('click',function(){
        
        var headerPosition = $('header').css('transform')
        console.log(headerPosition)
        
        if (headerPosition == 'matrix(1, 0, 0, 1, 0, 0)') {
            $('header').css({
                'transform': 'translateY(-200px)'
            });

        } else if (headerPosition == 'matrix(1, 0, 0, 1, 0, -200)') {
            $('header').css({
                'transform': 'translateY(0px)'
            });
        }
        
    })

    

    $(document).on('click',function(){
        var popupState = $('.popup').css('display')
        var headerPosition = $('header').css('transform')
        if (headerPosition == 'matrix(1, 0, 0, 1, 0, 0)') {
            $('header').css({
                'transform': 'translateY(-200px)'
            });
        } 

        if(popupState == 'flex') {
            $('.popup').fadeOut()
            $('.popup::before').fadeOut()
        }
        
    })

    /*POPUP*/
    function popupFade(e) {
        var popupState = $('.popup').css('display')
        if (popupState == 'none') {
            $('.popup').fadeIn()
            $('.popup::before').fadeIn()
            $('.popup').css('display', 'flex')
            e.stopPropagation()
        } else if (popupState == 'flex') {
            $('.popup').fadeOut()
            $('.popup::before').fadeOut()
            e.stopPropagation()
        }
        
    }

    $(document).on('click', '.toggle-popup', function(e){
        var headerPosition = $('header').css('transform')
        if (headerPosition == 'matrix(1, 0, 0, 1, 0, 0)') {
            setTimeout(popupFade, 500)
            $('header').css({'transform': 'translateY(-200px)'});
        } else {
            popupFade(e)
        }
    })

})