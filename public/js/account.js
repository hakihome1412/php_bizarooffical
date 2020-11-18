const checkedChangePassword = document.querySelector('.checkedChangePassword');
const divChangePassword = document.querySelector('.divChangePassword');
const inputPasswordOld = document.querySelector(".inputPasswordOld");
const inputPasswordNew = document.querySelector(".inputPasswordNew");
const inputPasswordConfirm = document.querySelector(".inputPasswordConfirm");
const formAccountInfo = document.querySelector(".formAccountInfo");
const showError_AccountInfo = document.querySelector(".showError_AccountInfo");

checkedChangePassword.addEventListener("change", function () {
    divChangePassword.style.display = this.checked ? "block" : "none";
    inputPasswordOld.value = "";
    inputPasswordNew.value = "";
    inputPasswordConfirm.value = "";
});

formAccountInfo.addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    await fetch('Ajax.php', {
        method: 'POST',
        body: formData
    }).then(function (response) {
        return response.text();
    }).then(function (res) {
        if (res === "success") {
            showError_AccountInfo.style.color = "green";
            showError_AccountInfo.innerHTML = "Update successful";
        } else {
            showError_AccountInfo.innerHTML = res;
        }
    });
})

