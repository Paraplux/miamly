$(document).ready(function(){

    $('.hidden-nav').on('click', function(e){
        e.stopPropagation()
    })

    $('.fa-search').on('click', function (e) {
        $('.nav-items').css('display', 'none')
        $('.nav-search-icon').css('display', 'none')
        $('.nav-search-bar').fadeIn(800)
        $('.nav-search-bar').css('display', 'flex')
        e.stopPropagation()
    })


    $('.close-search').on('click', function(e){
        $('.nav-items').css('display', 'flex')
        $('.nav-search-icon').css('display', 'flex')
        $('.nav-search-bar').css('display', 'none')
        e.stopPropagation()
    })

    $('.nav-menu').on('click',function(){
        
        var headerPosition = $('header').css('transform')
        console.log(headerPosition)
        
        if (headerPosition == 'matrix(1, 0, 0, 1, 0, 0)') {
            $('header, .container').css({
                'transform': 'translateY(-200px)'
            });

        } else if (headerPosition == 'matrix(1, 0, 0, 1, 0, -200)') {
            $('header, .container').css({
                'transform': 'translateY(0px)'
            });
        }
        
    })

    
    $(document).on('click',function(){
        var headerPosition = $('header').css('transform')
        
        
        if (headerPosition == 'matrix(1, 0, 0, 1, 0, 0)') {
            $('header, .container').css({
                'transform': 'translateY(-200px)'
            });
        } 
        
    })

    
})


