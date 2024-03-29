
window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;

require('./announcementImages');
require('./bootstrap');

$(function () {

    $(".dropdown-menu label").on('click', function () {

        $("#catsearch").text($(this).text());
        $("#catsearch").val($(this).text());
        $("#catsearchmobile").text($(this).text());

    });

});

$(function () {

    $(".modal-body label").on('click', function () {

        $("#catsearch").text($(this).text());
        $("#catsearch").val($(this).text());
        $("#catsearchmobile").text($(this).text());

    });

});

$('.regione').on('click', function () {
    window.location.href = $(this).data('nome-regione');
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
if (localStorage.getItem('locale') == 'it-IT') {
    $('.myBtn').on('click', function () {
        if ($(this).hasClass("is-active")) {
            $(this).siblings().removeClass("showtext");
            $(this).html("Espandi")
            $(this).removeClass("is-active")
            $(this).parent().siblings("small-gallery").removeClass("")
        } else {
            $(this).siblings().addClass("showtext");
            $(this).html("Restringi")
            $(this).addClass("is-active")
        }
    })
}
else {
    $('.myBtn').on('click', function () {
        if ($(this).hasClass("is-active")) {
            $(this).siblings().removeClass("showtext");
            $(this).html("Read More")
            $(this).removeClass("is-active")
            $(this).parent().siblings("small-gallery").removeClass("")
        } else {
            $(this).siblings().addClass("showtext");
            $(this).html("Read less")
            $(this).addClass("is-active")
        }
    })
}


$(function () {

    $(".dropdown-toggle").on("click", function () {
        $(this).toggleClass("active");
    });
    $(document).on("click", function (e) {
        if ($(e.target).is(".dropdown-toggle") === false && $(".dropdown-toggle").hasClass("active")) {
            $(".dropdown-toggle").removeClass("active");
        }
    });
});


/**document.addEventListener('DOMContentLoaded', () => {

    let dropdowns = document.querySelectorAll('.dropdown-toggle');
    let dropdownList = document.querySelectorAll('.dropdown-menu');

    dropdowns.forEach(function (btn) {
        btn.addEventListener('click', () => {
            dropdowns.forEach(b => {
                b.classList.toggle('active');
            });
        });

        document.body.addEventListener('click', () => {
            if (dropdownList.classList.contains('.show')) {
                dropdowns.forEach(b => {
                    b.classList.remove('active')
                })
            }
        })
    })
});*/
