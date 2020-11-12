function truncateString(str, num) {
    // If the length of str is less than or equal to num
    // just return str--don't truncate it.
    if (str.length <= num) {
        return str
    }
    // Return str truncated with '...' concatenated to the end of str.
    return str.slice(0, num) + '...'
}

fetch('/announcement/json')
    .then(response => response.json())
    .then(data => {
        data.forEach(product => {
            let trendingWrapper = document.querySelector('#trending-wrapper')
            let prodTitle = truncateString(product.title, 24);
            if (localStorage.getItem('locale') == 'it-IT') {
                var catName = product.category.name_it;
                var inplace = " a "
            }
            else {
                var catName = product.category.name;
                var inplace = " in "
            }
            let prodDescription = truncateString(product.description, 120);
            let trendCard = document.createElement('a')
            trendCard.href = "/announcement/" + product.slug;

            if (product.images.length > 0) {
                let prodEl = product.images[0].file;
                let prodArr = prodEl.split("/");
                var prodImage = "/storage/" + prodArr[0] + "/" + prodArr[1] + "/crop200x150_" + prodArr[2]
            } else {
                var prodImage = '/images/placeholder_small.jpg'
            }

            if (product.price <= 0) {
                var prodPrice = "Gratis";
            } else {
                var prodPrice = product.price + " €";
            };
            trendCard.classList.add('d-flex', 'card', 'product-card', 'swiper-slide', 'mb-0', 'h-100')
            trendCard.innerHTML =
                `
                <img src="${prodImage}" class="card-img-top px-1 pt-1 pb-0" alt="${prodTitle}">
        <div class="card-body pt-1 px-2">
          <h5 class="p font-weight-bold card-title slide-title pt-1 pb-0 mb-0">${prodTitle}</h5>
          <button type="button"
                    onClick="location.href='/category/${product.category.slug}'; event.preventDefault(); event.stopPropagation()"
                    class="btn nobtn">${catName}</button>
                    ${product.place ? `<span>${inplace}</span>` + '<p class="btn nobtn">' + product.place.name + '</p>' : ''}
          <!--<div class="d-flex d-row align-items-center py-0 location-row mb-2">
            <i class="icon-location-pin pr-1"></i>
            <p class="my-0 location-text">{product.location}</p>
          </div>-->
          <p class="card-text text-muted pt-0 slide-description">${prodDescription}
          </p >
        </div >
            <p class="product-price align-self-end text-right mb-0 p-2">${prodPrice}</p>
        `
            trendingWrapper.appendChild(trendCard)
        })
        var trendingSwiper = new Swiper('#trending-slider', {
            // Optional parameters
            loop: false,
            speed: 600,
            slidesPerView: 4,
            spaceBetween: 30,
            slidesPerGroup: 2,
            hideOnClick: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 10,
                    scrollbar: {
                        el: '.swiper-scrollbar',
                        draggable: true,
                    },
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },
                990: {
                    slidesPerView: 4,
                    slidesPerGroup: 2,
                    spaceBetween: 20,
                    hideOnClick: true
                }
            },
            // Navigation arrows
            navigation: {
                nextEl: '.trend-next',
                prevEl: '.trend-prev',
                hideOnClick: true,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },


        })
    })