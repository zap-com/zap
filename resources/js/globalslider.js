var smg = document.querySelectorAll('.small-gallery');
smg.forEach(gallery => {
    var id = gallery.getAttribute('data-id')
    var smallGallery = new Swiper(`.small-gallery-${id}`, {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        // Optional parameters
        loop: false,
        speed: 600,
        slidesPerView: 'auto',
        // Navigation arrows
        navigation: {
            nextEl: `.swiper-button-next-${id}`,
            prevEl: `.swiper-button-prev-${id}`,
        }
    })

})