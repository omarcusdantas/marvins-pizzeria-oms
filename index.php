<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/reset.css">
    <link rel="stylesheet" href="./src/css/template.css">
    <link rel="stylesheet" href="./src/css/index.css">
    <title>Marvin's Pizzeria OMS</title>
</head>
<body>
    <header>
        <a href="" class="logo">
            <img src="./src/img/marvins-logo.png" alt="Marvin's Pizzeria">
        </a>
        <nav>
            <a href="">Register Order</a>
            <div class="menu-space"></div>
            <a href="">Order Management</a>
        </nav>
    </header>
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
    <footer>
        <p>Marvin's Pizzeria &copy; 2023</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>