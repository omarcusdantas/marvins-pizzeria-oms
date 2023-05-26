<?php 
    include_once("./src/template/header.php");
    include_once("./src/process/pizza.php");
?>
    <main>
        <div class="main-banner">
            <h2>Register  Order</h2>
        </div>
        <div class="main-container">
            <h2>Order Details</h2>
            <form action="./src/process/pizza.php" method="POST" class="pizza-form">
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <option value="">Choose size</option>
                    <?php foreach($sizes as $size): ?>
                        <option value="<?= $size["id"] ?>"><?= $size["size"] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="crust">Crust:</label>
                <select name="crust" id="crust">
                    <option value="">Choose crust</option>
                    <?php foreach($crusts as $crust): ?>
                        <option value="<?= $crust["id"] ?>"><?= $crust["crust"] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="toppings">Toppings: (Medium and large pizzas may have up to 2 toppings)</label>
                <select multiple name="toppings[]" id="toppings" required>
                    <?php foreach($toppings as $topping): ?>
                        <option value="<?= $topping["id"] ?>"><?= $topping["id"] ?>. <?= $topping["topping"] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Register">
            </form>
        </div>
    </main>
<?php 
    include_once("./src/template/footer.php")
?> 