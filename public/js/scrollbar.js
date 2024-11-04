


const scrollBar = document.createElement("div")
scrollBar.id = "scrollbar"
const body = document.querySelector("body")
body.appendChild(scrollBar)

document.addEventListener("scroll", () => {

let heightPourcentage = document.documentElement.scrollTop / (document.body.scrollHeight - window.innerHeight) * 100
scrollBar.style.width = heightPourcentage + '%'
})