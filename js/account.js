$(document).ready(function () {

    $('.account-title').on('click', function () {

        var accountPosition = $('.account-nav').css('bottom')
        console.log(accountPosition)

        if (accountPosition == '-160px') {
            $('.account-nav').addClass('account-nav-toggled')
        }
        else if (accountPosition == '0px') {
            $('.account-nav').removeClass('account-nav-toggled')
        }

    })

})
