const editServiceBtn = document.querySelectorAll(".editServiceBtn")

editServiceBtn.forEach(serviceBtn => {
    serviceBtn.addEventListener("click", () => {
        const editServiceForm = document.querySelector(".editServiceForm")
        editServiceForm.classList.toggle("active")
            }
        )
    }
)