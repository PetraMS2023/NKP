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
    <title>NKP Products</title>
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
                                    <a class="dropbottom" href="../pages-ar/category.php"><img class="lang" src="../media/icons/lang-white.png" alt="" /> AR
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
                            <a class="dropbottom" href="../pages-ar/category.php"><img class="lang"
                                    src="../media/icons/lang-white.png" alt="" /> AR
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing Product -->
    <div class="landing-product">
        <div class="container">
            <div class="title btmAni2500">Product</div>
        </div>
    </div>
    <!-- End Landing Product -->
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

    // استعلام لجلب التصنيفات الرئيسية
    $sql = "SELECT id, brand_name_ar, brand_name_en, category_name_ar, category_name_en, category_description_ar, category_description_en, category_image FROM categories";
    $result = $conn->query($sql);

    $categories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // تعديل المسار ليكون مناسبًا للعرض
            $category_image = str_replace('../../', '../', $row['category_image']);
            $row['category_image'] = $category_image;
            $categories[] = $row;
        }
    } else {
        echo "<p>لا توجد تصنيفات للعرض.</p>";
    }

    $conn->close();
    ?>

<!-- Start category Content -->
<div class="product-content">
    <div class="head-title">استمتع بتنوع المنتجات عالية الجودة التي تقدمها شركتنا، حيث نفخر بتقديم حلول عملية ومبتكرة لاحتياجاتك اليومية.</div>
    <div class="container">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div class="products">
                    <div class="prod js-scroll fade-left">
                        <img src="<?php echo htmlspecialchars($category['category_image']); ?>" alt="<?php echo htmlspecialchars($category['category_name_en']); ?>" />
                        <div class="det">
                            <div class="title"><?php echo htmlspecialchars($category['brand_name_en']); ?></div>
                            <div class="sub-tit"><?php echo htmlspecialchars($category['category_name_en']); ?></div>
                            <p><?php echo htmlspecialchars($category['category_description_en']); ?></p>
                            <a class="btn" href="../pages/subcategory.php?id=<?php echo $category['id']; ?>">show more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>لا توجد تصنيفات للعرض.</p>
        <?php endif; ?>
    </div>
</div>
<!-- End category Content -->

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