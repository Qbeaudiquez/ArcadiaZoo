document.getElementById("seachReportInput").addEventListener("change", function () {
    const filterValue = this.value; 
    const reports = Array.from(document.querySelectorAll(".allReports")); 

    if (filterValue === "name") {
        reports.sort((a, b) => a.dataset.name.localeCompare(b.dataset.name));

    } else if (filterValue === "date") {
        reports.sort((a, b) => new Date(a.dataset.date) - new Date(b.dataset.date));

    }

    const container = document.querySelector(".reportContainer");
    container.innerHTML = "";
    reports.forEach(report => container.appendChild(report));
});
