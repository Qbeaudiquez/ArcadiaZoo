


const scrollBar = document.createElement("div")
scrollBar.id = "scrollbar"
const header = document.querySelector(".header")
console.log(header)
header.appendChild(scrollBar)

document.addEventListener("scroll", () => {

let heightPourcentage = document.documentElement.scrollTop / (document.body.scrollHeight - window.innerHeight) * 100
scrollBar.style.width = heightPourcentage + '%'
})

console.log('hello world')