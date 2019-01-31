$(document).ready(function () {
        /****************************/
        /******STEPS DYNAMIQUE*******/
        /****************************/
    /*RESET THE CONTAINER WITH THE GOOD NUMBER*/
    function resetStep() {
        i = 1
        $('.step-container').each(function () {
            $(this).children().first().attr('step', i)
            $(this).children().first().html(i)
            $(this).children().last().attr('step', i)
            i++
        })
    }
    /*ADD MORE STEPS*/
    $(document).on('click', '.step-more', function () {
        var nextStep = $(this).attr('step')
        var thisContainer = $(this).parent()
        nextStep ++

        $('<div class="step-container"><div removable class="step-number" step=' + nextStep + '>' + nextStep + '</div><textarea name="step[]" class="step"></textarea><div class="step-more" step=' + nextStep + '><i class="fas fa-plus"></i></div></div>').insertAfter(thisContainer)
        resetStep()
    })
    /*TOGGLE THE MINUS SIGN ON HOVER*/
    $(document).on('mouseenter', '.step-number[removable]', function () {
        $(this).html('<i class="fas fa-minus"></i>')
    })
    $(document).on('mouseleave', '.step-number', function () {
        var number = $(this).attr('step')
        $(this).html(number)
    })

    /*REMOVE STEPS*/
    $(document).on('click', '.step-number[removable]', function () {
            $(this).parent().remove()
            resetStep()
    })

    /****************************/
    /******INGREDIENTS DYNAMIQUE*******/
    /****************************/
    /*RESET THE CONTAINER WITH THE GOOD NUMBER*/
    function resetIng() {
        i = 1
        $('.ing-container').each(function () {
            $(this).children().first().attr('ing', i)
            $(this).children().first().html(i)
            $(this).children().last().attr('ing', i)
            i++
        })
    }
    /*ADD MORE INGS*/
    $(document).on('click', '.ing-more', function () {
        var nextIng = $(this).attr('ing')
        var thisContainer = $(this).parent()
        nextIng++

        $('<div class="ing-container"><div removable class="ing-number" ing=' + nextIng + '>' + nextIng + '</div><input name="ing[]" class="ing"><div class="ing-more" ing=' + nextIng + '><i class="fas fa-plus"></i></div></div>').insertAfter(thisContainer)
        resetIng()
    })
    /*TOGGLE THE MINUS SIGN ON HOVER*/
    $(document).on('mouseenter', '.ing-number[removable]', function () {
        $(this).html('<i class="fas fa-minus"></i>')
    })
    $(document).on('mouseleave', '.ing-number', function () {
        var number = $(this).attr('ing')
        $(this).html(number)
    })

    /*REMOVE INGS*/
    $(document).on('click', '.ing-number[removable]', function () {
        $(this).parent().remove()
        resetIng()
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
        if(tag != '') {
            $('.validated-tags').append('<span>' + tag + '<i class="fas fa-times removetag"></i></span>')
            $('<input name="tags[]" type="hidden" value="' + tag + '" multiple>').insertAfter('.validated-tags')
            $('#taginput').val('')
        }
    }
    $(document).on('click', '#addtag', function(e){
        addTag()
        e.preventDefault();
    })
    $(document).on('keypress', '#taginput', function(e){
        if (e.which == 13 || e.which == 44) {
            addTag()
            e.preventDefault()
        }
    })
    $(document).on('click', '.removetag', function(){
        var tag = $(this).parent().text()
        $(this).parent().remove()
        $('input[value="' + tag + '"]').remove()
    })
    
/* END of JS code*/
})

