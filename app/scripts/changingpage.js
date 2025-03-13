$(document).ready(function() {
    $('.main-content-home').hide();
    $('.main-content-impegni').hide();
    $('.main-content-grafici').hide();
    $('.main-content-impostazioni').hide();
    let activePage = $('li.active');

    if (activePage.attr('id') == 'sidebar-home') {
        $('.main-content-home').fadeIn(500);
    } else if (activePage.attr('id') == 'sidebar-impegni') {
        $('.main-content-impegni').fadeIn(500);
    } else if (activePage.attr('id') == 'sidebar-grafici') {
        $('.main-content-grafici').fadeIn(500);
    } else if (activePage.attr('id') == 'sidebar-impostazioni') {
        $('.main-content-impostazioni').fadeIn(500);
    }

    $('ul li').click(function() {
        if ($(this).attr('id') == 'sidebar-home') {
            $('.main-content-home').fadeIn(500);
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
        } else if ($(this).attr('id') == 'sidebar-impegni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').fadeIn(500);
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').hide();
        } else if ($(this).attr('id') == 'sidebar-grafici') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').fadeIn(500);
            $('.main-content-impostazioni').hide();
        } else if ($(this).attr('id') == 'sidebar-impostazioni') {
            $('.main-content-home').hide();
            $('.main-content-impegni').hide();
            $('.main-content-grafici').hide();
            $('.main-content-impostazioni').fadeIn(500);
        }
        
        if($(this).attr('id') != 'sidebar-logout') {
            $('li').removeClass('active');
            $(this).addClass('active');
            let changeSessionPage = new XMLHttpRequest();

            changeSessionPage.open("GET", "scripts/actualPage.php?page=" + $(this).attr('id'));
            changeSessionPage.send();
        }
    });
});