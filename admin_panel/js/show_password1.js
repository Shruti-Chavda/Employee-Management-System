function myFunction() {
    var y = document.getElementById("ps1");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }

    var z = document.getElementById("cp1");
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }
}
