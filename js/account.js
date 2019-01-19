$(document).ready(function () {
    /*ADD MORE STEPS*/
    $(document).on('click', '.more', function(){
        var nextStep = $(this).attr('step')
        nextStep ++

        $('<div class="step-container"><div removable class="number" step=' + nextStep + '>' + nextStep + '</div><textarea name="step[]" class="step"></textarea><div class="more" step=' + nextStep + '><i class="fas fa-plus"></i></div></div>').insertBefore('.button-submit')
        $(this).hide()
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
        if($(this).parent().next().attr('type') == 'submit') {
            $(this).parent().prev().children().last().show()
            $(this).parent().remove()
        } else {
            $(this).parent().remove()
            i = 1
            $('.step-container').each(function(){
                $(this).children().first().attr('step', i)
                $(this).children().first().html(i)
                $(this).children().last().attr('step', i)
                i++
            })
        }   
    })
/* END of JS code*/
})