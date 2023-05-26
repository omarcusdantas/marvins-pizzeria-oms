<?php 
    include_once("./src/template/header.php");
?>
    <main>
        <div class="main-banner">
            <h2>Register  Order</h2>
        </div>
        <div class="main-container">
            <h2>Pizza Details</h2>
            <form method="POST" class="pizza-form">
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <option value="">Choose size</option>
                </select>
                <label for="crust">Crust:</label>
                <select name="crust" id="crust">
                    <option value="">Choose crust</option>
                </select>
                <label for="toppings">Toppings: (Medium and large pizzas may have up to 2 toppings)</label>
                <select multiple name="toppings[]" id="toppings" required>
                </select>
                <input type="submit" value="Register">
            </form>
        </div>
    </main>
<?php 
    include_once("./src/template/footer.php")
?> 