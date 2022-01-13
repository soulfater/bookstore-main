<?php

include 'config.php';

session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="icons/bookfavicon.svg" type="image/x-icon">
        <link rel="stylesheet" href="./styles/style.css">
        <script src="js/shoppingCart.js" async></script>
        <script src="js/shoppingCartModal.js" async></script>
    <title>Bookstore-Home</title>
</head>
<body>
    <header>
        <div class="logo-name">
                <a href="index.php"><img class="logo" src="icons/book.svg" alt="Logo"></a>
                <a href="index.php"><h1 class="name">Bookstore</h1></a>
        </div>
        <nav>
            <div class="nav-element">
                <h1 class="link-text">
                    <?php echo "We're glad to see you". $_SESSION['username']." ❤️";?>
                </h1>
            </div>
        </nav>
        <div class="header-icons">
            <a href="register.php">
                <svg id="account" aria-hidden="true" focusable="false" data-prefix="far" data-icon="user-circle" class="svg-inline--fa fa-user-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path fill="#fff" d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43
                    96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48
                    48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7
                    0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2
                    1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26
                    9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3
                    89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z">
                </path>
            </svg>
        </a>
        <button id="ModalBtn">
            <svg id="cart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path fill="#fff" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 
                24h69.883l70.248 343.435C147.325 417.1 136 
                435.222 136 456c0 30.928 25.072 56 56 56s56-25.072
                56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 
                426.165 424 440.326 424 456c0 30.928 25.072 56 56 
                56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206
                0 20.92-7.754 23.403-18.681z">
                </path>
            </svg>
        </button>
        <a href="logout.php">
            <svg id="signin" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#fff" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 
                32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 
                96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 
                32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z">
                </path>
            </svg>
        </a>
            <div id="Modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2 class="cart-name">Your cart:</h2>
                    </div>
                    <div class="modal-body">
                        <div class="cart-items">
                        </div>
                        <div class="cart-total">
                            <strong class="cart-total-title">Total</strong>
                            <span class="cart-total-price">$0</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form class="shipping">
                            <label class=shipping-name>City:</label><br>
                            <input class=shipping-data type="text"><br>
                            <label class=shipping-name>Postal code:</label><br>
                            <input class=shipping-data type="text"><br>
                            <label class=shipping-name>Street:</label><br>
                            <input class=shipping-data type="text"><br>
                            <label class=shipping-name>House no.:</label><br>
                            <input class=shipping-data type="text"><br>
                            <label class=shipping-name>Phone:</label><br>
                            <input class=shipping-data type="text"><br>
                            <input class="submit-shipping" type=submit value="Purchase">
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </header>
        <main>
            <div class="container">
                <div class="main-header">
                    <div class="trending">
                        <div class="trending-card-outer">
                            <div class="trending-card-inner">
                                <h2 class="trending-heading">🔥 Trending<br> this month <br> 
                                    on <br> <span style="font-size:40px">Bookstore</span></h2>
                            </div>
                        </div>
                        <div class="trending-card-list">
                        <?php
                        // PHP for ciklusssal genralunk 6 elemetes dinamikusan feltoltjuk
                        $sql = "SELECT * FROM book";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        for ($i = 0; $i < count($row); $i++) {
                                echo ' 
                                    <div class="trending-list-element">
                                        <div class="trending-list-element-inner">
                                            <div class="book-details">
                                                <img class="book-image trending-book-image" src="./icons/book.svg">
                                                <h1 class="trending-title book-title">'.$row['title'].'</h1>
                                                <h2 class="trending-author">'.$row['authors'].'</h2>
                                                <div class="price-icon">
                                                price:
                                                <p class="book-price">$'.$row['price'].'</p>
                                                <input type="image" class="shopping-cart" src="icons/shopping-cart-solid.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <?php

                $sql = "SELECT * FROM book";
                $result = mysqli_query($conn, $sql);
                // While ciklussal generaljuk az elemeket dinamikusan.
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="product-card">
                        <div class="book-details">
                                <img class="book-image" src="./icons/book.svg">
                            <h1 class="book-title">'.$row['title']. '</h1>
                            <h2 class="book-author">'.$row['authors'].'</h2>
                            <div class="price-icon">
                                price: 
                                <p class="book-price">$'.$row['price'].'</p>
                                <input type="image" class="shopping-cart" src="icons/shopping-cart-solid.svg">
                            </div>
                        </div>
                    </div>';
                    }
                ?>
            </div>
        </main>
    <footer>
        <hr class="footer-logo-line">
        <img class="logo-bottom" src="icons/book.svg" alt="Logo">
        <hr class="footer-logo-line">
    </footer>
</body>
</html>