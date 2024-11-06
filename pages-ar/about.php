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
    <title>NKP About</title>
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
                            <li class="active">
                                <a class="active" href="../pages-ar/about.php">معلومات عنا</a>
                            </li>
                            <li>
                                <a href="../pages-ar/category.php">المنتجات</a>
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
                                    <a class="dropbottom" href="../pages/about.php"><img class="lang"
                                            src="../media/icons/lang-white.png" alt="" /> EN
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
                            <a href="../pages/about.php"><img class="lang"
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
    <!-- Start Landing About -->
    <div class="landing-about">
        <div class="container">
            <div class="title btmAni2500">معلومات عنا</div>
        </div>
    </div>
    <!-- End Landing About -->
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

   
    $sql = "SELECT about_text_ar, about_text_en FROM about_us WHERE id = 1"; 
    $result = $conn->query($sql);

    $about_text_ar = "";
    $about_text_en = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $about_text_ar = $row['about_text_ar'];
        $about_text_en = $row['about_text_en'];
    }
    $conn->close();
    ?>
    <!-- Start About Content -->
    <div class="about-content">
        <div class="container">
            <div class="content">
                <div class="info js-scroll fade-btm">
                    <div class="title">عن NKP</div>
                    <p><?php echo htmlspecialchars($about_text_ar); ?></p>
                </div>
                <div class="info js-scroll fade-btm">
                    <div class="title">رؤيتنا</div>
                    <p>
                        رؤيتنا هي أن نكون واحدة من الشركات الرائدة في تصنيع
                        المنتجات المنزلية وحلول التعبئة والتغليف، وتكون قادرة على تلبية
                        كافة متطلبات السوق المحلي من هذه المنتجات والخارج
                        المستقبل. وكذلك إضافة منتجات جديدة وتطوير حجم العمل
                    </p>
                </div>
                <div class="info js-scroll fade-btm">
                    <div class="title">مهمتنا</div>
                    <p>
                        مهمتنا هي إنتاج أفضل جودة من الحياة المنزلية
                        أسهل وبسيطة. نحن نسعى دائمًا لمساعدة عملائنا من خلال التجاوز
                        الجودة ووقت التسليم والتكلفة من خلال عملية التحسين
                        في عمليات الإنتاج لدينا وتوظيف فريق من ذوي الخبرة.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Content -->
    <!-- Start Company Profile -->
    <!-- <div class="company-profile js-scroll fade-btm">
        <div class="container">
            <div class="title">ملف الشركة </div>
            <p>
                مؤسسة ناصر الكيالي التجارية والصناعية
                تأسست في أواخر عام 2015 باستخدام ثلاث آلات بلاستيكية صغيرة
                إنتاج أكياس القمامة من المواد المعاد تدويرها
                مع إنتاج سنوي يصل إلى 400 طن
            </p>
            <a class="cont" href="../pages-ar/contact.php">تواصل معنا</a>
            <div class="social">
                <div class="so">
                    <a href="https://www.facebook.com/NKP.Factory">
                        <img src="../media/icons/facebook-about.png" alt="">
                    </a>
                    <a href="https://www.instagram.com/nkp_products/">
                        <img src="../media/icons/insta-about.png" alt="">
                    </a>
                </div>
                <span>2024 © NKB.<br>مؤسسة ناصر الكيالي التجارية والصناعية</span>
            </div>
        </div>
    </div> -->
    <!-- End Company Profile -->
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