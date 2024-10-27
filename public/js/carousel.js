function initCarousel(carouselId) {
    const carousel = document.querySelector(`#${carouselId}`);
    const images = [...carousel.querySelectorAll(".carousel-image")];
    const before = carousel.querySelector(".before");
    const after = carousel.querySelector(".after");
    const infoImgCarousel = carousel.querySelector(".title-img");

    let index = 0;
    let intervalID;

    // Function to update the displayed image and title
    function setInfo() {
        const active = carousel.querySelector(".carousel-image.active");
        const title = active.getAttribute("data-title");
        infoImgCarousel.textContent = title;
        infoImgCarousel.classList.add("active");
    }

    // Function to start the automatic carousel
    function startInterval() {
        intervalID = setInterval(() => {
            images.forEach(image => image.classList.remove("active"));
            index = (index + 1) % images.length;
            images[index].classList.add("active");
        }, 3000);
    }

    // Event Listeners
    after.addEventListener("click", () => {
        images.forEach(image => image.classList.remove("active"));
        index = (index + 1) % images.length;
        images[index].classList.add("active");
        setInfo();
    });

    before.addEventListener("click", () => {
        images.forEach(image => image.classList.remove("active"));
        index = (index - 1 + images.length) % images.length;
        images[index].classList.add("active");
        setInfo();
    });

    carousel.addEventListener("mouseover", () => {
        clearInterval(intervalID);
        setInfo();
    });

    carousel.addEventListener("mouseout", () => {
        startInterval();
        infoImgCarousel.classList.remove("active");
    });

    // Initialize
    startInterval();
}

// Initialize both carousels
initCarousel("carousel1");
initCarousel("carousel2");

