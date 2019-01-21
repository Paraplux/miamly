$(document).ready(function () {
    /*RESET THE CONTAINER WITH THE GOOD NUMBER*/
    function resetContainer() {
        i = 1
        $('.step-container').each(function () {
            $(this).children().first().attr('step', i)
            $(this).children().first().html(i)
            $(this).children().last().attr('step', i)
            i++
        })
    }
    /*ADD MORE STEPS*/
    $(document).on('click', '.more', function(){
        var nextStep = $(this).attr('step')
        var thisContainer = $(this).parent()
        nextStep ++

        $('<div class="step-container"><div removable class="number" step=' + nextStep + '>' + nextStep + '</div><textarea name="step[]" class="step"></textarea><div class="more" step=' + nextStep + '><i class="fas fa-plus"></i></div></div>').insertAfter(thisContainer)
        resetContainer()
    })
    /*TOGGLE THE MINUS SIGN ON HOVER*/
    $(document).on('mouseenter', '.number[removable]', function(){
        $(this).html('<i class="fas fa-minus"></i>')
    })
    $(document).on('mouseleave', '.number', function () {
        var number = $(this).attr('step')
        $(this).html(number)
    })

    /*REMOVE STEPS*/
    $(document).on('click', '.number[removable]', function () {
            $(this).parent().remove()
            resetContainer()
    })

    
/* END of JS code*/
})

