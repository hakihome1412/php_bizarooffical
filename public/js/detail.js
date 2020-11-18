const btnQtyUp = document.querySelector(".btnQtyUp");
const btnQtyDown = document.querySelector(".btnQtyDown");
const inputQty = document.querySelector(".inputQty");
const inputQtyPost = document.querySelector(".inputQtyPost");
const btnSizeS = document.querySelector(".btnSizeS");
const btnSizeM = document.querySelector(".btnSizeM");
const btnSizeL = document.querySelector(".btnSizeL");
const inputSizePost = document.querySelector(".inputSizePost");
const divSizeS = document.querySelector(".divSizeS");
const divSizeM = document.querySelector(".divSizeM");
const divSizeL = document.querySelector(".divSizeL");
const inputIdUserPost = document.querySelector(".inputIdUserPost");
const formDetailPost = document.querySelector(".formDetailPost");
const showError = document.querySelector(".showError");

inputSizePost.value = "ABC";



btnQtyUp.addEventListener("click", function () {
    inputQty.value++;
    inputQtyPost.value++;

});

btnQtyDown.addEventListener("click", function () {
    if (inputQty.value > 1) {
        inputQty.value--;
        inputQtyPost.value--;
    }
});

if (btnSizeS !== null) {
    btnSizeS.addEventListener("click", function (e) {
        if (inputSizePost.value === "S") {
            inputSizePost.value = "ABC";
        } else {
            inputSizePost.value = "S";
        }


        if (divSizeS.classList.contains("active")) {
            divSizeS.classList.remove("active");
        } else {
            divSizeS.classList.add("active");

            if (divSizeM !== null) {
                divSizeM.classList.remove("active");
            }

            if (divSizeL !== null) {
                divSizeL.classList.remove("active");
            }
        }

    });
}

if (btnSizeM !== null) {
    btnSizeM.addEventListener("click", function (e) {
        if (inputSizePost.value === "M") {
            inputSizePost.value = "ABC";
        } else {
            inputSizePost.value = "M";
        }

        if (divSizeM.classList.contains("active")) {
            divSizeM.classList.remove("active");
        } else {
            divSizeM.classList.add("active");

            if (divSizeS !== null) {
                divSizeS.classList.remove("active");
            }

            if (divSizeL !== null) {
                divSizeL.classList.remove("active");
            }
        }

    });
}

if (btnSizeL !== null) {
    btnSizeL.addEventListener("click", function (e) {
        if (inputSizePost.value === "L") {
            inputSizePost.value = "ABC";
        } else {
            inputSizePost.value = "L";
        }


        if (divSizeL.classList.contains("active")) {
            divSizeL.classList.remove("active");
        } else {
            divSizeL.classList.add("active");

            if (divSizeS !== null) {
                divSizeS.classList.remove("active");
            }

            if (divSizeM !== null) {
                divSizeM.classList.remove("active");
            }
        }

    });
}




if (btnSizeL === null && btnSizeM === null && btnSizeS === null) {
    inputSizePost.value = "";
}


formDetailPost.addEventListener("submit", async function (e) {
    e.preventDefault();

    if (parseInt(inputIdUserPost.value) === 0) {
        location.href = './login.php';
    } else {
        if (inputSizePost.value === "ABC") {
            showError.innerHTML = "Choose size";
        } else {
            const formPost = new FormData(this);
            await fetch("Ajax.php", {
                method: "POST",
                body: formPost
            }).then(function (response) {
                return response.text();
            }).then(function (res) {
                countCart.innerHTML = res;
            });
        }
    }
});