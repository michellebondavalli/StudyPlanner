$(document).ready(function() {
    $('.main-content-home').show();
    $('.main-content-impegni').hide();
    $('.main-content-grafici').hide();
    $('.main-content-impostazioni').hide();
    $('.main-content-account').hide();

    $('ul li').on('click', function() {
        $('li').removeClass('active');
        $(this).addClass('active');
    
        if ($(this).attr('id') == 'sidebar-home') {
            $('.main-content-home').show();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-impegni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').show();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-grafici') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').show();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-impostazioni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').show();
            $('.main-content-account').hide();
        } else if ($(this).attr('id') == 'sidebar-account') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
            $('.main-content-account').show();
        }
    });
})