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
    <link rel="stylesheet" href="./src/css/dashboard.css">
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
        <div class="orders-container">
            <h2>Orders</h2>
            <div class="show-inactive">
                <button id="inactive-btn">Inactive Orders</button>
            </div>
            <div class="table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Size</th>
                            <th>Crust</th>
                            <th>Toppings</th>
                            <th>Status</th>
                            <th class="last-columns">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last-columns">   
                                    <div class="action-buttons">
                                        <form method="POST">
                                            <button type="submit" class="prepare-btn">
                                                <ion-icon name="pizza"></ion-icon>
                                            </button>
                                        </form>
                                        <form method="POST">
                                            <button type="submit" class="complete-btn">
                                                <ion-icon name="checkmark-circle"></ion-icon>
                                            </button>
                                        </form>
                                        <form method="POST">
                                            <button type="submit" class="cancel-btn">
                                                <ion-icon name="close-circle"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </main>
    <footer>
        <p>Marvin's Pizzeria &copy; 2023</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>