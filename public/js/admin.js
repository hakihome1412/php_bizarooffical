const btnEditFood = document.getElementsByClassName("btnEditFood");
const btnDeleteFood = document.getElementsByClassName("btnDeleteFood");
const formFoodAdmin = document.getElementsByClassName("formFoodAdmin");
const modalEditFood = document.getElementById("editModalFood");
const modalEditTitle = document.querySelector(".modalEditTitle");
const inputEditModalName = document.querySelector(".editModalName");
const inputEditModalPrice = document.querySelector(".editModalPrice");
const formEditFood = document.querySelector(".formEditFood");
const showError_EditFood = document.querySelector(".showError_EditFood");
const inputIdFoodUpdate = document.querySelector(".inputIdFoodUpdate");
const formCreateFood = document.querySelector(".formCreateFood");
const selectTypeFood = document.querySelector(".selectTypeFood");
const showError_CreateFood = document.querySelector(".showError_CreateFood");
const checkSizeS = document.getElementById("checkSizeS");
const checkSizeM = document.getElementById("checkSizeM");
const checkSizeL = document.getElementById("checkSizeL");

var DeleteOrEdit = 1;

checkSizeS.addEventListener("change", function () {
    if (parseInt(this.value) === 0) {
        this.value = 1;
    } else {
        this.value = 0;
    }
})

checkSizeM.addEventListener("change", function () {
    if (parseInt(this.value) === 0) {
        this.value = 1;
    } else {
        this.value = 0;
    }
})

checkSizeL.addEventListener("change", function () {
    if (parseInt(this.value) === 0) {
        this.value = 1;
    } else {
        this.value = 0;
    }
})

Array.prototype.forEach.call(btnEditFood, function (element) {
    element.addEventListener("click", function () {
        DeleteOrEdit = 1;
        showError_EditFood.innerHTML = "";
    });
});

Array.prototype.forEach.call(btnDeleteFood, function (element) {
    element.addEventListener("click", function () {
        DeleteOrEdit = 2;
    });
});

Array.prototype.forEach.call(formFoodAdmin, function (element) {
    element.addEventListener("submit", async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        if (DeleteOrEdit === 1) {
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
            if (res === "delete success") {
                location.reload();
            } else {
                const info = res.split("^^^");
                const name = info[1];
                const price = info[2];
                const img = info[3];
                const idFood = info[0];
                modalEditTitle.innerHTML = "Edit " + name;
                inputEditModalName.value = name;
                inputEditModalPrice.value = price;
                inputIdFoodUpdate.value = idFood;
            }
        });
    });
});

formEditFood.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    await fetch('Ajax.php', {
        method: 'POST',
        body: formData
    }).then(function (response) {
        return response.text();
    }).then(function (res) {
        if (res === "update success") {
            location.reload();
        } else {
            showError_EditFood.innerHTML = res;
        }
    });
});


formCreateFood.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    formData.append("sizeSCreate",checkSizeS.value);
    formData.append("sizeMCreate",checkSizeM.value);
    formData.append("sizeLCreate",checkSizeL.value);

    await fetch('Ajax.php', {
        method: 'POST',
        body: formData
    }).then(function (response) {
        return response.text();
    }).then(function (res) {
        console.log(res);
        if (res === "success") {
            location.reload();
        } else {
            showError_CreateFood.innerHTML = res;
        }
    });

    console.log(checkSizeS.value);
    console.log(checkSizeM.value);
    console.log(checkSizeL.value);
});