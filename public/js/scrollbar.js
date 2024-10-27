const scrollBar = document.querySelector(".scrollbar");

document.addEventListener("scroll", () => {

    let heightPourcentage = document.documentElement.scrollTop / (document.body.scrollHeight - window.innerHeight) * 100

    console.log(heightPourcentage)
    scrollBar.style.width = heightPourcentage + '%'
})