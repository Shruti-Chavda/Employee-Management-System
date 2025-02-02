function myFunction() {
    var x = document.getElementById("old_pwd");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

    var y = document.getElementById("np");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }

    var z = document.getElementById("cp");
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }
}