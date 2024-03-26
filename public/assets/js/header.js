$(document).ready(function() {
    $('.navbar-menu-icon').click(function() {
        $('.dropdown-menu').toggleClass('open');
        const isOpen = $('.dropdown-menu').hasClass('open');
        const menuBtnIcon = $('.navbar-menu-icon i');
        menuBtnIcon.attr('class', isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars');
    });
});