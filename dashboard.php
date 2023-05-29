<?php 
    include_once("./src/template/header.php");
    include_once("./src/process/orders.php");
?>
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
                        <?php foreach($pizzas as $pizza): ?>
                            <tr class="status-<?= strtolower($pizza["status"]) ?>">
                                <td>#<?= $pizza["id"] ?></td>
                                <td><?= $pizza["size"] ?></td>
                                <td><?= $pizza["crust"] ?></td>
                                <td>
                                    <ul>
                                        <?php foreach($pizza["toppings"] as $topping): ?>
                                            <li><?= $topping ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td>
                                    <p><?= $pizza["status"] ?></p>
                                </td>
                                <td class="last-columns">   
                                    <div class="action-buttons">
                                        <form action="./src/process/orders.php" method="POST">
                                            <input type="hidden" name="type" value="prepare">
                                            <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                            <button type="submit" class="prepare-btn">
                                                <ion-icon name="pizza"></ion-icon>
                                            </button>
                                        </form>
                                        <form action="./src/process/orders.php" method="POST">
                                            <input type="hidden" name="type" value="complete">
                                            <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                            <button type="submit" class="complete-btn">
                                                <ion-icon name="checkmark-circle"></ion-icon>
                                            </button>
                                        </form>
                                        <form action="./src/process/orders.php" method="POST">
                                            <input type="hidden" name="type" value="cancel">
                                            <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                            <button type="submit" class="cancel-btn">
                                                <ion-icon name="close-circle"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </main>
    <?php 
    include_once("./src/template/footer.php")
?> 