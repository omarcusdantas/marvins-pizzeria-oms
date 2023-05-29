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

// Find the inactive orders button when the window is loaded
window.onload = () => {
    const inactiveOrdersBtn = document.querySelector("#inactive-btn");

    if (inactiveOrdersBtn != null) {
        inactiveOrdersBtn.addEventListener("click", () => {
            toggleInactiveOrders(inactiveOrdersBtn);
        });
    }
};
