<?php
    include_once("conn.php");

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {
        $sizesQuery = $conn->query("SELECT * FROM sizes;");
        $sizes = $sizesQuery->fetchAll();

        $crustsQuery = $conn->query("SELECT * FROM crusts;");
        $crusts = $crustsQuery->fetchAll();

        $toppingsQuery = $conn->query("SELECT * FROM toppings;");
        $toppings = $toppingsQuery->fetchAll();
    } 
    else if ($method === "POST") {
        $data = $_POST;

        $size = $data["size"];
        $crust = $data["crust"];
        $toppings = $data["toppings"];

        if ($size === "" || $crust === "") {
            $_SESSION["msg"] = "Size and crust must be selected";
            $_SESSION["status"] = "warning";
        }
        else if (count($toppings) > 1 && $size === "1") {
            $_SESSION["msg"] = "For small pizzas, maximum of 1 topping";
            $_SESSION["status"] = "warning";
        }
        else if (count($toppings) > 2 && $size !== "1") {
            $_SESSION["msg"] = "For medium and large pizzas, maximum of 2 toppings";
            $_SESSION["status"] = "warning";
        }
        else {
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

            $stmt = $conn->prepare("INSERT INTO orders (pizza_id, status_id) VALUES (:pizza, :status)");

            $statusPendingId = 1;

            $stmt->bindParam(":pizza", $pizzaId, PDO::PARAM_INT);
            $stmt->bindParam(":status", $statusPendingId, PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION["msg"] = "Order registered";
            $_SESSION["status"] = "success";            
        }
        header("Location: ../..");
    }
?>