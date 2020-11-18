const btnQtyUp = document.getElementsByClassName("qty-up");
const btnQtyDown = document.getElementsByClassName("qty-down");
const input = document.getElementsByClassName("qty-input");
const form = document.getElementsByClassName("formCartPost");
const dealPrice = document.getElementById("deal-price");
const dealPriceText = document.getElementsByClassName("product-price-text");
const countCart = document.getElementById("countCart");


var UpOrDown = 1;

Array.prototype.forEach.call(btnQtyUp, function (element) {
    element.addEventListener("click", function () {
        UpOrDown = 1;
        const id = element.dataset.id;
        Array.prototype.forEach.call(input, function (element2) {
            if (element2.dataset.id === id) {
                element2.value++;
            }
        });

        countCart.innerHTML = parseInt(countCart.innerText) + 1;
    });
});


Array.prototype.forEach.call(btnQtyDown, function (element) {
    element.addEventListener("click", function () {
        UpOrDown = 2;
        const id = element.dataset.id;
        Array.prototype.forEach.call(input, function (element2) {
            if (element2.dataset.id === id) {
                if (element2.value > 1) {
                    element2.value--;
                }
            }
        })
        countCart.innerHTML = parseInt(countCart.innerText) - 1;
    });
});

Array.prototype.forEach.call(form, function (element) {
    element.addEventListener("submit", async function (e) {
        e.preventDefault();
        const id = element.dataset.id;

        var formData = new FormData(this);
        if (UpOrDown === 1) {
            formData.append("status", 1);
        } else {
            formData.append("status", 2);
        }

        await fetch('Ajax.php', {
            method: 'POST',
            body: formData
        }).then(function (response) {
            return response.text();
        }).then(function (res) {
            const info = res.split("-");
            const dealPriceValue = info[0];
            const dealPriceItemValue = info[1];
            Array.prototype.forEach.call(dealPriceText, function (element3) {
                if (element3.dataset.id === id) {
                    element3.innerHTML = dealPriceItemValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                }
            });
            dealPrice.innerHTML = dealPriceValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
        });
    })
});