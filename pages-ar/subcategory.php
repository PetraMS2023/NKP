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
    <!-- Main Template CSS AR -->
    <link rel="stylesheet" href="../AR-CSS/design-ar.css" />
    <title>NKP Items</title>
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
                            ماركا الشمالية، شارع الفحيص، عمان
                        </a>
                        <a href="#">
                            <img src="../media/icons/time.png" alt="" />
                            السبت-الخميس: من 8 صباحًا إلى 5 مساءً
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
                                <a href="../index-ar.php">الرئيسية</a>
                            </li>
                            <li>
                                <a href="../pages-ar/about.php">معلومات عنا</a>
                            </li>
                            <li class="active">
                                <a class="active" href="../pages-ar/category.php">المنتجات</a>
                            </li>
                            <li>
                                <a href="../pages-ar/contact.php">تواصل معنا</a>
                            </li>
                        </ul>
                        <div class="mLinks">
                            <div class="drop">
                                <a href="##">
                                    <img class="lang" src="../media/icons/lang.png" alt="" />AR<img class="drop-icon"
                                        src="../media/icons/arrow-lang.png" alt="" /></a>
                                <span class="dropMenu">
                                    <a class="dropbottom" href="../pages/subcategory.php"><img class="lang" src="../media/icons/lang-white.png" alt="" /> EN
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
                <i class="fa-solid fa-bars menu-icon"></i>
            </div>
            <div class="menu-items" id="menuItems">
                <ul>
                    <li>
                        <a href="../index-ar.php">الرئيسية</a>
                    </li>
                    <li>
                        <a href="../pages-ar/about.php">معلومات عنا</a>
                    </li>
                    <li>
                        <a href="../pages-ar/category.php">المنتجات</a>
                    </li>
                    <li>
                        <a href="../pages-ar/contact.php">تواصل معنا</a>
                    </li>
                </ul>
                <div class="icons" onclick="toggleMenu()">
                    <i id="closeicon" class="fas fa-times close-icon"></i>
                </div>
                <div class="mLinks">
                    <div class="drop">
                        <a href="##">
                            <img class="lang" src="../media/icons/lang-white.png" alt="" />AR<img class="drop-icon"
                                src="../media/icons/arrow-lang.png" alt="" /></a>
                        <span class="dropMenu">
                            <a href="../pages/subcategory.php"><img class="lang"
                                    src="../media/icons/lang-white.png" alt="" />
                                EN
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing Items -->
    <div class="landing-items">
        <div class="container">
            <div class="title btmAni2500">العناصر</div>
        </div>
    </div>
    <!-- End Landing Items -->
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

    $main_category_id = intval($_GET['id']);

    $sql = "SELECT category_name_ar FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $main_category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $main_category_name = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $main_category_name = $row['category_name_ar'];
    }

    $sql = "SELECT id, subcategory_name_ar, subcategory_name_en, subcategory_image FROM subcategories WHERE main_category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $main_category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $subcategories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subcategory_image = str_replace('../../', '../', $row['subcategory_image']);
            $row['subcategory_image'] = $subcategory_image;
            $subcategories[] = $row;
        }
    }
    $conn->close();
    ?>
    
    <!-- Start subcategory Content -->
    <div class="items-content">
        <div class="container">
            <div class="info">
                <div class="title"><?php echo htmlspecialchars($main_category_name); ?></div>
            </div>
            <div class="items">
                <?php if (!empty($subcategories)): ?>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <div class="item">
                            <img src="<?php echo htmlspecialchars($subcategory['subcategory_image']); ?>" alt="<?php echo htmlspecialchars($subcategory['subcategory_name_en']); ?>" />
                            <div class="description">
                                <div class="name"><?php echo htmlspecialchars($subcategory['subcategory_name_ar']); ?></div>
                                <a class="btn" href="products.php?id=<?php echo $subcategory['id']; ?>">عرض المنتجات</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>لا توجد تصنيفات فرعية للعرض.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End subcategory Content -->

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
                        <div class="title">روابط مفيدة</div>
                        <ul>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../index-ar.php">الرئيسية</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages-ar/about.php">معلومات عنا</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages-ar/category.php">المنتجات</a>
                            </li>
                            <li>
                                <img src="../media/icons/arrow-footer.png" alt="">
                                <a href="../pages-ar/contact.php">تواصل معنا</a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-us">
                        <div class="title">اواصل معنا</div>
                        <ul>
                            <li>
                                <img src="../media/icons/location-footer.png" alt="">
                                <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">ماركا الشمالية، شارع الفحيص،
                                    عمان</a>
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
                            <a
                                href="https://api.whatsapp.com/send/?phone=%2B962776688110&text&type=phone_number&app_absent=0">
                                <img src="../media/icons/whatsapp.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>
                تصميم حقوق الطبع والنشر © منتجات NKP. جميع الحقوق محفوظة
                تم التطوير بواسطة <a href="https://petra-ms.com/"> Petra MS</a>
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