const updateDom = data => {
    const wrapper = document.getElementById('listCol');
   
    data.forEach(ad => {
        const card = document.createElement("div");
        card.classList.add("d-flex");
        card.classList.add("flex-column");
        card.classList.add("flex-md-row");
        card.classList.add("card");
        card.classList.add("listings-card");
        card.classList.add("w-100");
        card.classList.add("my-3");
        card.classList.add("p-1");
    
    
        card.innerHTML = `
        <div class="small-gallery swiper-container card-img-top">
        <div class="swiper-wrapper s0">
            <img src="https://placehold.it/200x150/999/CCC" alt="${ad.title}" style="width: 100%;}">
        </div>
    </div>
    <div class="card-body d-flex flex-column pt-1 pb-1 px-2">
        <h5 class="card-title p slide-title pt-1 pb-0 mb-0 font-weight-bold"> <a href="http://localhost:8000/announcement/${ad.slug}"> ${ad.title} </a></h5>
        
        <p class="card-text text-muted mt-2 pt-0 slide-description flex-grow-1">${ad.description}[...] 
        </p>
        <div class="info ">
            <a class="mr-auto " href="http://localhost:8000/category/${ad.category.name}">${ad.category.name}</a>
            <p class="product-price text-right mb-auto p-2" >${ad.price} €</p>
        </div>
        
    </div>`;
    wrapper.appendChild(card);
    })
}



const getTotalPages = async () => {
    let response = await fetch(`http://localhost:8000/announcement?page=1`, {
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
                `http://localhost:8000/announcement?page=${currentPage}`,
                {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json"
                    }
                }
            );
            let data = await res.json();
            updateDom(data.data);

        
        }
        currentPage++;
   
};

window.addEventListener("scroll", async () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    await fetchData();
    }
});
