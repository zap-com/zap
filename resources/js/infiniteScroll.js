function truncateString(str, num) {
    // If the length of str is less than or equal to num
    // just return str--don't truncate it.
    if (str.length <= num) {
        return str
    }
    // Return str truncated with '...' concatenated to the end of str.
    return str.slice(0, num) + '...'
}

const updateDom = data => {
    const wrapper = document.getElementById('listCol');
    data.forEach(ad => {
        if (localStorage.getItem('locale') == 'it-IT') { var catName = ad.category.name_it }
        else { var catName = ad.category.name }

        if (!document.querySelector(`.s${ad.id}`)) {
            const card = document.createElement("div");
            let adDescription = truncateString(ad.description, 200);
            card.classList.add("d-flex", "flex-column", "flex-md-row", "card", "listings-card", "w-100", "my-3", "p-1");
            card.setAttribute("data-id", ad.id);
            if (ad.images.length > 1) {
                card.innerHTML = `
            <div class="small-gallery smjs smjs-${ad.id} swiper-container card-img-top">
                <div class="swiper-wrapper ${'s' + ad.id}">
                </div>
                <div class="swiper-button-prev swiper-button-prev-${ad.id}"></div>
                <div class="swiper-button-next swiper-button-next-${ad.id}"></div>
            </div>
            <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
            <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold"> 
                <a href="/announcement/${ad.slug}"> ${ad.title} </a>
            </h5>
            ${ad.place ? '<p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">' + ad.place.name + '</p>' : ''}
            
 
            <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">${adDescription}</p>
            <div class="info ">
                <a class="mr-auto " href="/category/${ad.category.slug}">${catName}</a>
                <p class="product-price text-right mb-auto p-2" >${ad.price} €</p>
            </div>
        </div>`;
            } else {
                card.innerHTML = `
                <div class="small-gallery smjs smjs-${ad.id} swiper-container card-img-top">
                    <div class="swiper-wrapper ${'s' + ad.id}">
                    </div>
                </div>
                <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
                <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold"> 
                    <a href="/announcement/${ad.slug}"> ${ad.title} </a>
                </h5>
                ${ad.place ? '<p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">' + ad.place.name + '</p>' : ''}
                
     
                <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">${adDescription}</p>
                <div class="info ">
                    <a class="mr-auto " href="/category/${ad.category.slug}">${catName}</a>
                    <p class="product-price text-right mb-auto p-2" >${ad.price} €</p>
                </div>
            </div>`;

            }
            wrapper.appendChild(card);
            if (ad.images.length > 1) {
                ad.images.forEach(image => {
                    let gWrapper = document.querySelector(`.s${ad.id}`);
                    let galleryImg = document.createElement('img');
                    let prodEl = image.file;
                    let prodArr = prodEl.split("/");
                    var prodImage = "/storage/" + prodArr[0] + "/" + prodArr[1] + "/crop200x150_" + prodArr[2];
                    galleryImg.src = prodImage;
                    galleryImg.alt = ad.title;
                    galleryImg.classList.add('swiper-slide')
                    gWrapper.appendChild(galleryImg)
                })
            } else if (ad.images.length == 1) {
                ad.images.forEach(image => {
                    let gWrapper = document.querySelector(`.s${ad.id}`);
                    let galleryImg = document.createElement('img');
                    let prodEl = image.file;
                    let prodArr = prodEl.split("/");
                    var prodImage = "/storage/" + prodArr[0] + "/" + prodArr[1] + "/crop200x150_" + prodArr[2];
                    galleryImg.src = prodImage;
                    galleryImg.alt = ad.title;
                    galleryImg.classList.add('swiper-slide')
                    gWrapper.appendChild(galleryImg)
                })
            } else {
                let gWrapper = document.querySelector(`.s${ad.id}`);
                let galleryImg = document.createElement('img');
                var prodImage = '/images/placeholder_small.jpg'
                galleryImg.src = prodImage;
                galleryImg.classList.add('swiper-slide')
                galleryImg.alt = ad.title;

                gWrapper.appendChild(galleryImg)
            }
        }

        var smallGallery = new Swiper(`.smjs-${ad.id}`, {
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
                nextEl: `.swiper-button-next-${ad.id}`,
                prevEl: `.swiper-button-prev-${ad.id}`,
            }
        })
    })
}

const getTotalPages = async () => {
    let response = await fetch(`/announcement?page=1`, {
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json"
        }
    });
    let data = await response.json();
    let limit = [data.to, Math.ceil(data.total / data["per_page"])];
    return data['last_page'];
};

let currentPage = 2;

const fetchData = async () => {

    let lastPage = await getTotalPages();

    if (currentPage <= lastPage) {
        let res = await fetch(
            `/announcement?page=${currentPage}`,
            {
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            }
        );
        let data = await res.json();
        updateDom(data.data);
        currentPage++;
    }


};

window.addEventListener("scroll", async () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        await fetchData();
    }
});
