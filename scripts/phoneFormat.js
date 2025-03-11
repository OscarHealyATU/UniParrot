
document.getElementById("phone").addEventListener("input", function (e) {
    let number = e.target.value.replace(/\D/g, "");

    if (number.length > 3 && number.length <= 6) {
        number = `${number.slice(0, 3)} ${number.slice(3)}`;
    } else if (number.length > 6) {
        number = `${number.slice(0, 3)} ${number.slice(3, 6)} ${number.slice(6, 10)}`;
    }
    e.target.value = number;
    console.log(number);
});