// Function to change the text content of the button
function changeButtonText(button) {
    if (button.textContent === "Inactive Orders") {
        button.textContent = "Active Orders";
        return;
    }
    button.textContent = "Inactive Orders";
}

// Function to toggle inactive orders
function toggleInactiveOrders(button) {
    const lastColumns = document.querySelectorAll(".last-columns");
    const activeOrders = document.querySelectorAll(".status-pending, .status-preparing");
    const inactiveOrders = document.querySelectorAll(".status-cancelled, .status-completed");

    lastColumns.forEach((item) => {
        item.classList.toggle("hide");
    });

    activeOrders.forEach((item) => {
        item.classList.toggle("hide");
    });

    inactiveOrders.forEach((item) => {
        item.classList.toggle("show");
    });

    changeButtonText(button);
}

// Function to maintain option selected without the need of holding Ctrl
function selectWithoutCtrl() {
    const select = document.getElementById("toppings");

    select.addEventListener('mousedown', (event) => {
        event.preventDefault();
        const option = event.target;
        option.selected = !option.selected;
    });
}

// Find the inactive orders button and checks screen size
window.onload = () => {
    const inactiveOrdersBtn = document.querySelector("#inactive-btn");

    if (inactiveOrdersBtn != null) {
        inactiveOrdersBtn.addEventListener("click", () => {
            toggleInactiveOrders(inactiveOrdersBtn);
        });
        return;
    }
    
    const isBigScreen = window.matchMedia("(min-width: 1024px)").matches;
    if (isBigScreen) {
        selectWithoutCtrl();
    }
};