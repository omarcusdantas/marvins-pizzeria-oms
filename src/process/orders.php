<?php 
    include_once("conn.php");

    // Function to retrieve the toppings for a specific pizza
    function getOrderToppings($conn, $pizzaId) {
        $toppingsQuery = $conn->prepare("SELECT * FROM pizzas_toppings WHERE pizza_id = :pizza_id");
        $toppingsQuery->bindParam(":pizza_id", $pizzaId);
        $toppingsQuery->execute();

        $pizzaToppings = [];
        $toppingQuery = $conn->prepare("SELECT * FROM toppings WHERE id = :topping_id");

        while ($topping = $toppingsQuery->fetch(PDO::FETCH_ASSOC)) {
            $toppingQuery->bindParam(":topping_id", $topping["topping_id"]);
            $toppingQuery->execute();
            $pizzaTopping = $toppingQuery->fetch(PDO::FETCH_ASSOC);
            array_push($pizzaToppings, $pizzaTopping["topping"]);
        }

        return $pizzaToppings;
    }

    // Function to retrieve data for a specific order
    function getOrderData($conn, $tableName, $id) {
        $query = $conn->prepare("SELECT * FROM $tableName WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Function to retrieve all orders and their details
    function getOrders($conn) {
        $ordersQuery = $conn->query("SELECT * from orders;");
        $orders = $ordersQuery->fetchAll();

        $pizzas = [];
        foreach ($orders as $order) {
            $pizza = [];
            $pizza["id"] = $order["pizza_id"];

            $pizzaData = getOrderData($conn, "pizzas", $pizza["id"]);
            $size = getOrderData($conn, "sizes", $pizzaData["size_id"]);
            $crust = getOrderData($conn, "crusts", $pizzaData["crust_id"]);
            $toppings = getOrderToppings($conn, $pizza["id"]);
            $status = getOrderData($conn, "orders_status", $order["status_id"]);

            $pizza["size"] = $size["size"];
            $pizza["crust"] = $crust["crust"];
            $pizza["toppings"] = $toppings;
            $pizza["status"] = $status["status"];

            array_push($pizzas, $pizza);
        }

        return $pizzas;
    }

    // Function to update the status of an order
    function updateOrderStatus($conn, $pizzaId, $statusId) {
        $updateQuery = $conn->prepare("UPDATE orders SET status_id = :status_id WHERE pizza_id = :pizza_id");
        $updateQuery->bindParam(":status_id", $statusId, PDO::PARAM_INT);
        $updateQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);
        $updateQuery->execute();
    }
    
    // Function to handle the POST request for updating order status
    function handlePostRequest($conn) {
        $type = $_POST["type"];
    
        if ($type === "cancel") {
            $pizzaId = $_POST["id"];
            updateOrderStatus($conn, $pizzaId, 4);
        } else if ($type === "complete") {
            $pizzaId = $_POST["id"];
            updateOrderStatus($conn, $pizzaId, 3);
        } else if ($type === "prepare") {
            $pizzaId = $_POST["id"];
            updateOrderStatus($conn, $pizzaId, 2);
        }
    
        $_SESSION["msg"] = "Order updated";
        $_SESSION["status"] = "success";
        header("Location: ../../dashboard.php");
    }

    // Main logic to handle the request method
    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {
        $pizzas = getOrders($conn);
    } else if ($method === "POST") {
        handlePostRequest($conn);
    }
?>