function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-toggle");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("bxs-low-vision");
        eyeIcon.classList.add("bx-show");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("bx-show");
        eyeIcon.classList.add("bxs-low-vision");
    }
}