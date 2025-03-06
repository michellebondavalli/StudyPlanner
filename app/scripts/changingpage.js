$(document).ready(function() {
    $('.main-content-home').fadeIn(500);
    $('.main-content-impegni').hide();
    $('.main-content-grafici').hide();
    $('.main-content-impostazioni').hide();
    $('.main-content-account').hide();
    sidebarButtonPrecedente = $("#ul li.active");

    $('ul li').click(function() {
        
        if($(this).attr('id') != 'sidebar-logout') {
            $('li').removeClass('active');
            $(this).addClass('active');
        }

        if ($(this).attr('id') == 'sidebar-home') {
            $('.main-content-home').fadeIn(500);
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-impegni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').fadeIn(500);
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-grafici') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').fadeIn(500);
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-impostazioni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').fadeIn(500);
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-account') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').fadeIn(500);
        }
    });
});