<?php
    include_once("conn.php");

    // Function to create a new order in the database
    function createOrder($conn, $pizzaId) {
        $stmt = $conn->prepare("INSERT INTO orders (pizza_id, status_id) VALUES (:pizza, :status)");
        $statusPendingId = 1;
        $stmt->bindParam(":pizza", $pizzaId, PDO::PARAM_INT);
        $stmt->bindParam(":status", $statusPendingId, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Function to create a new pizza in the database
    function createPizza($conn, $size, $crust, $toppings) {
        $stmt = $conn->prepare("INSERT INTO pizzas (size_id, crust_id) VALUES (:size, :crust)");
        $stmt->bindParam(":size", $size, PDO::PARAM_INT);
        $stmt->bindParam(":crust", $crust, PDO::PARAM_INT);
        $stmt->execute();
    
        $pizzaId = $conn->lastInsertId();
        $stmt = $conn->prepare("INSERT INTO pizzas_toppings (pizza_id, topping_id) VALUES (:pizza, :topping)");
    
        foreach($toppings as $topping) {
            $stmt->bindParam(":pizza", $pizzaId, PDO::PARAM_INT);
            $stmt->bindParam(":topping", $topping, PDO::PARAM_INT);
            $stmt->execute();
        }
    
        return $pizzaId;
    }

     // Function to validate the pizza order
    function validatePizzaOrder($size, $crust, $toppings) {
        if ($size === "" || $crust === "") {
            return "Size and crust must be selected";
        } else if (count($toppings) > 1 && $size === "1") {
            return "For small pizzas, maximum of 1 topping";
        } else if (count($toppings) > 2 && $size !== "1") {
            return "For medium and large pizzas, maximum of 2 toppings";
        }
    
        return "";
    }

    // Function to handle the POST request
    function handlePostRequest($conn) {
        $data = $_POST;

        $size = $data["size"];
        $crust = $data["crust"];
        $toppings = $data["toppings"];

        $errorMsg = validatePizzaOrder($size, $crust, $toppings);
        
        if ($errorMsg !== "") {
            $_SESSION["msg"] = $errorMsg;
            $_SESSION["status"] = "warning";
            header("Location: ../..");
            return;
        } 

        $pizzaId = createPizza($conn, $size, $crust, $toppings);
        createOrder($conn, $pizzaId);

        $_SESSION["msg"] = "Order registered";
        $_SESSION["status"] = "success";
        header("Location: ../..");
    }
    
    // Function to retrieve items from a table
    function getItems($conn, $tableName) {
        $query = $conn->query("SELECT * FROM $tableName;");
        return $query->fetchAll();
    }
    
    // Main logic to handle the request method
    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {
        $sizes = getItems($conn, "sizes");
        $crusts = getItems($conn, "crusts");
        $toppings = getItems($conn, "toppings");
    } else if ($method === "POST") {
        handlePostRequest($conn);
    }
?>