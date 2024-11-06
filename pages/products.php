<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Logo In Browser -->
    <link rel="sortcut icon" type="image/jpg" href="../media/logos/bowz-logo.svg" />
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="../CSS/all.min.css" />
    <!-- Render All Element Normally -->
    <link rel="stylesheet" href="../CSS/normalize.css" />
    <!-- Main Template CSS -->
    <link rel="stylesheet" href="../CSS/design.css" />
    <!-- Slider File CSS -->
    <link rel="stylesheet" href="../js/swiper-bundle.min.css" />
    <!-- SCSS File -->
    <link rel="stylesheet" href="../CSS/style.css" />
    <title>AL-Saad Dining Tablecloths</title>
</head>
<body>
    <!-- Start Header -->
    <div class="header">
        <div class="container">
            <div class="left">
                <div class="container">
                    <div class="logo">
                        <img src="../media/logos/logo.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top">
                    <div class="container">
                        <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">
                            <img src="../media/icons/location-hedaer.png" alt="" />
                            North Marka, Street Fuheis, Amman
                        </a>
                        <a href="#">
                            <img src="../media/icons/time.png" alt="" />
                            SAT-THU: 8am to 5pm
                        </a>
                        <div class="social">
                            <a href="https://www.facebook.com/NKP.Factory">
                                <img src="../media/icons/facebook-header.png" alt="" />
                            </a>
                            <a href="https://www.instagram.com/nkp_products/">
                                <img src="../media/icons/insta-hedaer.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../pages/about.php">about</a>
                            </li>
                            <li class="active">
                                <a class="active" href="../pages/category.php">products</a>
                            </li>
                            <li>
                                <a href="../pages/contact.php">contact</a>
                            </li>
                        </ul>
                        <div class="mLinks">
                            <div class="drop">
                                <a href="##">
                                    <img class="lang" src="../media/icons/lang.png" alt="" />EN<img class="drop-icon"
                                        src="../media/icons/arrow-lang.png" alt="" /></a>
                                <span class="dropMenu">
                                    <a class="dropbottom" href="../pages-ar/subcategory.php"><img class="lang" src="../media/icons/lang-white.png" alt="" /> AR
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="hbtn-table">
                            <a href="../pages/table.php">Product Table</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bar-icon" onclick="toggleMenu()">
                <i class="fas fa-bars menu-icon"></i>
            </div>
            <div class="menu-items" id="menuItems">
                <ul>
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="../pages/about.php">about us</a>
                    </li>
                    <li>
                        <a href="../pages/category.php">products</a>
                    </li>
                    <li>
                        <a href="../pages/contact.php">contact us</a>
                    </li>
                </ul>
                <div class="icons" onclick="toggleMenu()">
                    <i id="closeicon" class="fas fa-times close-icon"></i>
                </div>
                <div class="mLinks">
                    <div class="drop">
                        <a href="##">
                            <img class="lang" src="../media/icons/lang-white.png" alt="" />EN</a>
                        <span class="dropMenu">
                            <a class="dropbottom" href="../pages-ar/products.php"><img class="lang"
                                    src="../media/icons/lang-white.png" alt="" /> AR
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing Sub Items -->
    <div class="landing-subitems">
        <div class="container">
            <div class="title btmAni2500">AL-Saad Dining Tablecloths</div>
        </div>
    </div>
    <!-- End Landing Sub Items -->
    <!-- Start Bar -->
    <div class="bar"></div>
    <!-- End Bar -->
    <!-- Start Go UP -->
    <div class="goTop">
        <span>
            <i class="fa-solid fa-angle-up"></i>
        </span>
    </div>
    <!-- End Go Up -->

    <?php
    include '../backend/db_connection.php';

    if (isset($_GET['id'])) {
        $subcategory_id = intval($_GET['id']);
    } else {
        die("No subcategory ID provided.");
    }

    $sql_subcategory = "SELECT `subcategory_name_ar`, `subcategory_name_en`, `main_category_id`, `subcategory_image` FROM `subcategories` WHERE `id` = ?";
    $stmt_subcategory = $conn->prepare($sql_subcategory);
    $stmt_subcategory->bind_param("i", $subcategory_id);
    $stmt_subcategory->execute();
    $result_subcategory = $stmt_subcategory->get_result();
    $sub_category = $result_subcategory->fetch_assoc();

    if ($sub_category) {
        $sub_category_name = htmlspecialchars($sub_category['subcategory_name_en']);
    } else {
        die("Subcategory not found.");
    }

    $sql_products = "SELECT `product_name_en`, `product_image`, `product_specs` FROM `products` WHERE `subcategory_id` = ?";
    $stmt_products = $conn->prepare($sql_products);
    $stmt_products->bind_param("i", $subcategory_id);
    $stmt_products->execute();
    $result_products = $stmt_products->get_result();

    $products = [];
    while ($row = $result_products->fetch_assoc()) {
        $products[] = $row;
    }

    $stmt_subcategory->close();
    $stmt_products->close();
    $conn->close();
    ?>

    <!-- Start products Content -->
    <div class="subitems-content">
    <div class="container">
        <div class="info">
            <div class="title"><?php echo htmlspecialchars($sub_category_name); ?></div>
        </div>
        <div class="items">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="item">
                        <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name_en']); ?>" />
                        <div class="description">
                            <div class="name"><?php echo htmlspecialchars($product['product_name_en']); ?></div>
                            <p><?php echo nl2br(htmlspecialchars($product['product_specs'])); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
    <!-- End products Content --> 
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">
            <div class="top">
                <div class="left">
                    <div class="logo">
                        <img src="../media/logos/footer-logo.png" alt="">
                    </div>
                </div>
                <div class="right">
                    <div class="helpful-link">
                        <div class="title">helpful link</div>
                        <ul>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages/about.php">about us</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages/category.php">products</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages/contact.php">contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-us">
                        <div class="title">Contact US</div>
                        <ul>
                            <li>
                                <img src="../media/icons/location-footer.png" alt="">
                                <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">North Marka, Street Fuheis, Amman</a>
                            </li>
                            <li>
                                <img src="../media/icons/phone.png" alt="">
                                <a href="tel:+962 7 7668 8110">+962 7 7668 8110</a>
                            </li>
                            <li>
                                <img src="../media/icons/email.png" alt="">
                                <a href="mailto:info@nkp-products.com">info@nkp-products.com</a>
                            </li>
                        </ul>
                        <div class="so">
                            <a href="https://www.facebook.com/NKP.Factory">
                                <img src="../media/icons/facebook-footer.png" alt="">
                            </a>
                            <a href="https://www.instagram.com/nkp_products/">
                                <img src="../media/icons/insta-footer.png" alt="">
                            </a>
                            <a href="https://api.whatsapp.com/send/?phone=%2B962776688110&text&type=phone_number&app_absent=0">
                                <img src="../media/icons/whatsapp.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>
                Copyright Design © NKP Products. All right reserved
                Developed by <a href="https://petra-ms.com/"> Petra MS</a>
            </p>
        </div>
    </div>
    <!-- End Footer -->
    <!-- Start JS Files -->
    <script src="../js/counter.js"></script>
    <script src="../js/scroll.js"></script>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/swiper.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/sc.js"></script>
    <!-- End JS Files -->
</body>

</html>