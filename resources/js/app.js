

require('./bootstrap');

$(function () {

    $(".dropdown-menu a").on('click', function () {

        $(".nobtn:first-child").text($(this).text());
        $(".nobtn:first-child").val($(this).text());

    });

});

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
    let dropdownList = document.querySelectorAll('.show')
    dropdowns.forEach(function (btn) {
        btn.addEventListener('click', () => {
            dropdowns.forEach(b => {
                b.classList.toggle('active');
                b.classList.add('active')
            });
        });
        document.body.addEventListener('click', () => {
            if dropdownList.classList.contains('')
            dropdowns.forEach(b => {
                if (b.classList.contains('active')) {
                    btn.classList.remove('active')
                }
            })
        })

    })
});
