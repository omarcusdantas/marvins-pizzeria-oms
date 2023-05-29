function toggleInactiveOrders(button) {
    const lastColumns = document.querySelectorAll(".last-columns");
    lastColumns.forEach(item => {
        item.classList.toggle("hide");
    });

    const inactiveOrders = document.querySelectorAll(".status-cancelled, .status-completed");
    inactiveOrders.forEach(item => {
        item.classList.toggle("show");
    });

    const activeOrders = document.querySelectorAll(".status-pending, .status-preparing");
    activeOrders.forEach(item => {
        item.classList.toggle("hide");
    });

    if (button.textContent === "Inactive Orders") {
        button.textContent === "Active Orders";
        return;
    };
    button.textContent === "Inactive Orders";
}

window.onload = () => {
    inactiveOrdersBtn = document.querySelector("#inactive-btn");
    if(inactiveOrdersBtn != null) {
        inactiveOrdersBtn.addEventListener("click", () => {
            toggleInactiveOrders(inactiveOrdersBtn);
        })
    }
}