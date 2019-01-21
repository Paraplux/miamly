$(document).ready(function () {
        /****************************/
        /******CHAMP DYNAMIQUE*******/
        /****************************/
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

        /****************************/
        /****DIFFICULTE DYNAMIQUE****/
        /****************************/
    $(document).on('change', 'input[name="difficulte"]', function(){
        $('#difficulteValue').html($(this).val())
    })

        /****************************/
        /****INGREDIENT DYNAMIQUE****/
        /****************************/
    function addTag() {
        var tag = $('#taginput').val()
        $('.validated-tags').append('<span>' + tag + '<i class="fas fa-times removetag"></i></span>')
        $('#taginput').val('')
    }
    $(document).on('click', '#addtag', function(e){
        addTag()
        e.preventDefault();
    })
    $(document).on('keypress', '#taginput', function(e){
        if(e.which == 13) {
            addTag()
            e.preventDefault()
        }
    })
    $(document).on('click', '.removetag', function(){
        $(this).parent().remove()
    })
    
/* END of JS code*/
})

