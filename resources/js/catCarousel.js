fetch('/announcement/catjson')
    .then(response => response.json())
    .then(data => {
        let categoryWrapper = document.querySelector('#category-wrapper')
        let catCard1 = document.createElement('a')
        if (localStorage.getItem('locale') == 'it-IT') { var allPro = 'Tutto' }
        else { var allPro = 'All categories' }
        catCard1.classList.add('d-flex', 'card', 'swiper-slide', 'card-category', 'align-items-center', 'pt-3', 'h-100')
        catCard1.href = "/announcement/";
        catCard1.innerHTML =
            `
            <img class="card-img-top mx-auto" src="./icons/all.svg"></img>
            <div class="card-body pb-0">
              <h5 class="card-title text-center mb-0">${allPro}</h5>
            </div>
            `
        categoryWrapper.appendChild(catCard1)

        data.forEach(category => {
            let categoryWrapper = document.querySelector('#category-wrapper')
            if (localStorage.getItem('locale') == 'it-IT') { var catName = category.name_it }
            else { var catName = category.name }
            let catCard = document.createElement('a')
            catCard.classList.add('d-flex', 'card', 'swiper-slide', 'card-category', 'align-items-center', 'pt-3', 'h-100')
            catCard.href = "/category/" + category.slug;
            catCard.innerHTML =
                `
            <img class="card-img-top mx-auto" src="${category.icon}"></img>
            <div class="card-body pb-0">
              <h5 class="card-title text-center mb-0">${catName}</h5>
            </div>
            `
            categoryWrapper.appendChild(catCard)
        })
        var mySwiper = new Swiper('#category-slider', {
            // Optional parameters
            loop: false,
            speed: 600,
            slidesPerView: 8,
            spaceBetween: 10,
            slidesPerGroup: 3,
            hideOnClick: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                // when window width is >= 640px
                990: {
                    slidesPerView: 6,
                    spaceBetween: 20
                },
                1220: {
                    slidesPerView: 8,
                    hideOnClick: true
                }
            },
            // Navigation arrows
            navigation: {
                nextEl: '.cat-next',
                prevEl: '.cat-prev',
                hideOnClick: true
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },

        })
    })