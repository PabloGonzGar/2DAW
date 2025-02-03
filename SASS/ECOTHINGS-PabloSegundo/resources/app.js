const dayNightSwitch = document.getElementById("dayNightSwitch");

dayNightSwitch.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
});