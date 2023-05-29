<?php 
    include_once("conn.php");
    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {
        $ordersQuery = $conn->query("SELECT * from orders;");
        $orders = $ordersQuery->fetchAll();
        $ordersStatusQuery = $conn->query("SELECT * FROM orders_status;");
        $ordersStatus = $ordersStatusQuery->fetchAll();
        
        $pizzas = [];
        foreach ($orders as $order) {
            $pizza = [];
            $pizza["id"] = $order["pizza_id"];

            $pizzaQuery = $conn->prepare("SELECT * FROM pizzas WHERE id = :pizza_id");
            $pizzaQuery->bindParam(":pizza_id", $pizza["id"]);
            $pizzaQuery->execute();
            $pizzaData = $pizzaQuery->fetch(PDO::FETCH_ASSOC);

            $sizeQuery = $conn->prepare("SELECT * FROM sizes WHERE id = :size_id");
            $sizeQuery->bindParam(":size_id", $pizzaData["size_id"]);
            $sizeQuery->execute();
            $size = $sizeQuery->fetch(PDO::FETCH_ASSOC);
            $pizza["size"] = $size["size"];

            $crustQuery = $conn->prepare("SELECT * FROM crusts WHERE id = :crust_id");
            $crustQuery->bindParam(":crust_id", $pizzaData["crust_id"]);
            $crustQuery->execute();
            $crust = $crustQuery->fetch(PDO::FETCH_ASSOC);
            $pizza["crust"] = $crust["crust"];

            $toppingsQuery = $conn->prepare("SELECT * FROM pizzas_toppings WHERE pizza_id = :pizza_id");
            $toppingsQuery->bindParam(":pizza_id", $pizza["id"]);
            $toppingsQuery->execute();
            $toppings = $toppingsQuery->fetchAll(PDO::FETCH_ASSOC);

            $pizzaToppings = [];
            $toppingQuery = $conn->prepare("SELECT * FROM toppings WHERE id = :topping_id");

            foreach ($toppings as $topping) {
                $toppingQuery->bindParam(":topping_id", $topping["topping_id"]);
                $toppingQuery->execute();
                $pizzaTopping = $toppingQuery->fetch(PDO::FETCH_ASSOC);
                array_push($pizzaToppings, $pizzaTopping["topping"]);
            }

            $statusQuery = $conn->prepare("SELECT * FROM orders_status WHERE id = :status_id");
            $statusQuery->bindParam(":status_id", $order["status_id"]);
            $statusQuery->execute();
            $status = $statusQuery->fetch(PDO::FETCH_ASSOC);
            $pizza["status"] = $status["status"];

            $pizza["toppings"] = $pizzaToppings;
            array_push($pizzas, $pizza);
        }
    }
    else if ($method === "POST") {
        $type = $_POST["type"];

        if ($type === "cancel") {
            $pizzaId = $_POST["id"];
            $updateQuery = $conn->prepare("UPDATE orders SET status_id = 4 WHERE pizza_id = :pizza_id");

            $updateQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);

            $updateQuery->execute();
            $_SESSION["msg"] = "Order updated";
            $_SESSION["status"] = "success";
        }

        else if ($type === "complete") {
            $pizzaId = $_POST["id"];
            $updateQuery = $conn->prepare("UPDATE orders SET status_id = 3 WHERE pizza_id = :pizza_id");

            $updateQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);

            $updateQuery->execute();
            $_SESSION["msg"] = "Order updated";
            $_SESSION["status"] = "success";
        }

        else if ($type === "prepare") {
            $pizzaId = $_POST["id"];
            $updateQuery = $conn->prepare("UPDATE orders SET status_id = 2 WHERE pizza_id = :pizza_id");

            $updateQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);

            $updateQuery->execute();
            $_SESSION["msg"] = "Order updated";
            $_SESSION["status"] = "success";
        }

        header("Location: ../../dashboard.php");
    }
?>