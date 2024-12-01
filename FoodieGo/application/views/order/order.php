<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/FoodieGo/application/views/food/menu.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/FoodieGo/system/database/DB_config.php'; ?>


<?php

$dbInstance = Database::getInstance();
$conn = $dbInstance->getConnection();


if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}

?>

<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php

                    if ($image_name == "") {
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>"
                            class="img-responsive img-curve">
                    <?php
                    }

                    ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <p class="food-price">Tk.<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Dhrubo, Homaira, Asif" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. ahmed.dhrubo@northsouth.edu" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required>
                </textarea>

                <a href="<?php echo $siteurl; ?>cancel?order_id" 
                           class="btn btn-primary">Order Now</a>

                
            </fieldset>
        </form>
 
                  
    </div>
</section>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/FoodieGo/application/views/templates/footer.php'; ?>
