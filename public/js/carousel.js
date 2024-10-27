// Select DOM items
const infoImgCarousel = document.querySelector(".title-img")
const carousel = document.querySelector(".carousel")
const images = [...document.querySelectorAll(".carousel-image")]
const before = document.querySelector(".before")
const after = document.querySelector(".after")

// start index
let index = 0

// Events listener

after.addEventListener("click", () => {
    images.forEach(image => {
        image.classList.remove("active")
    });
    index += 1
    if(index === images.length) index = 0
    images[index].classList.add("active")
    setInfo()
})

before.addEventListener("click", () => {
    images.forEach(image => {
        image.classList.remove("active")
    });
    if(index === 0) index = images.length
    index -= 1
    images[index].classList.add("active")
    setInfo()
})

// Auto carousel
let intervalID

function startInterval(){
    intervalID = setInterval(()=>{
        images.forEach(image => {
            image.classList.remove("active")
        });
        index += 1
        if(index === images.length) index = 0
        images[index].classList.add("active")
    }, 3000)
}

startInterval()

function setInfo(){
    const active = document.querySelector(".active")
    const title = active.getAttribute("data-title")
    infoImgCarousel.textContent = title
    infoImgCarousel.classList.add("active")
}

carousel.addEventListener("mouseover", () => {
    clearInterval(intervalID)
    setInfo()
    
})

carousel.addEventListener("mouseout", () => {
    startInterval()
    infoImgCarousel.classList.remove("active")
})


