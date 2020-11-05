require('./bootstrap');

$('#searchbar-wrapper').click(function () {
    $('#searchbar').focus();
});

$('#account-modal').on('shown.bs.modal', function () {
    $('#account-modal-input').trigger('focus')
})

$(function () {
    $('[data-toggle="popover"]').popover()
})

$('.myBtn').on('click', function () {
    if ($(this).hasClass("is-active")) {
        $(this).siblings().removeClass("showtext");
        $(this).html("Read More")
        $(this).removeClass("is-active")
        $(this).parent().siblings("small-gallery").removeClass("")
    } else {
        $(this).siblings().addClass("showtext");
        $(this).html("Read Less")
        $(this).addClass("is-active")
    }
})

document.addEventListener('DOMContentLoaded', () => {

    let dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(function (btn) {
        btn.addEventListener('click', () => {
            dropdowns.forEach(b => b.classList.toggle('active'));
            dropdownList.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
            });

            body.addEventListener('click', () => {
                if (dropdowns.classList.contains('is_active')) {
                    dropdowns.classList.remove('is_active');
                }
            })
        });
        let dropdownList = document.querySelectorAll('.show')
    });
})
