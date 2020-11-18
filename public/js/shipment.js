const formPostShipment = document.querySelector(".formPostShipment");
const showErrorShipPage = document.querySelector(".showErrorShipPage");

formPostShipment.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    await fetch('Ajax.php', {
        method: 'POST',
        body: formData
    }).then(function (response) {
        return response.text();
    }).then(function (res) {
        if (res !== "success") {
            showErrorShipPage.innerHTML = res;
        } else {
            showErrorShipPage.innerHTML = "";
            location.href = "./success.php"
        }
    });
})