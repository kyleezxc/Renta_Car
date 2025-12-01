function loginBtn() {
    const username = document.getElementById("user");
    const password = document.getElementById("pass");

    const usern = "admin";
    const passw = "admin123";

    if (username.value === usern && password.value === passw) {
        alert("Successfully logged in!");
        window.location.href = "dashboard.html";
    } else {
        alert("Wrong credentials!");
    }
}