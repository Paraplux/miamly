$(document).ready(function(){

    $('.hidden-nav').on('click', function(e){
        e.stopPropagation()
    })

    $('.nav-search-icon').on('click', function(e){
        $('.nav-items').css('display', 'none')
        $('.nav-search-bar').fadeIn(800)
        $('.nav-search-bar').css('display', 'flex')
        e.stopPropagation()
    })


    $('.close-search').on('click', function(e){
        $('.nav-items').css('display', 'flex')
        $('.nav-search-bar').css('display', 'none')
        e.stopPropagation()
    })

    $('.nav-menu').on('click',function(){
        
        var headerPosition = $('header').css('top')
        console.log(headerPosition)
        
        if (headerPosition == '0px'){
            $('header').css('top','-196px')
        }else if (headerPosition == '-196px') {
            $('header').css('top','0')
        }
        
    })

    $(document).on('click',function(){
        var headerPosition = $('header').css('top')

      
        if (headerPosition == '0px'){
            $('header').css('top','-196px')
        }

    })

    
})


