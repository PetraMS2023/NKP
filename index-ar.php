<!-- حساب عدد زوار الموقع -->

<?php
include './backend/db_connection.php';

$today = date('Y-m-d');


$sql = "SELECT * FROM site_visits WHERE visit_date = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    $sql = "UPDATE site_visits SET visit_count = visit_count + 1 WHERE visit_date = '$today'";
} else {
 
    $sql = "INSERT INTO site_visits (visit_date, visit_count) VALUES ('$today', 1)";
}

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Logo In Browser -->
    <link rel="sortcut icon" type="image/jpg" href="./media/logos/bowz-logo.svg" />
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="./CSS/all.min.css" />
    <!-- Render All Element Normally -->
    <link rel="stylesheet" href="./CSS/normalize.css" />
    <!-- Main Template CSS -->
    <link rel="stylesheet" href="./CSS/design.css" />
    <!-- Slider File CSS -->
    <link rel="stylesheet" href="./js/swiper-bundle.min.css" />
    <!-- SCSS File -->
    <link rel="stylesheet" href="./CSS/style.css" />
    <!-- Main Template CSS AR -->
    <link rel="stylesheet" href="./AR-CSS/design-ar.css" />
    <title>NKP</title>
</head>

<body>
    <!-- Start Header -->
    <div class="header">
        <div class="container">
            <div class="left">
                <div class="container">
                    <div class="logo">
                        <img src="./media/logos/logo.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top">
                    <div class="container">
                        <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">
                            <img src="./media/icons/location-hedaer.png" alt="" />
                            ماركا الشمالية، شارع الفحيص، عمان
                        </a>
                        <a href="#">
                            <img src="./media/icons/time.png" alt="" />
                            السبت-الخميس: من 8 صباحًا إلى 5 مساءً
                        </a>
                        <div class="social">
                            <a href="https://www.facebook.com/NKP.Factory">
                                <img src="./media/icons/facebook-header.png" alt="" />
                            </a>
                            <a href="https://www.instagram.com/nkp_products/">
                                <img src="./media/icons/insta-hedaer.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="container">
                        <ul>
                            <li class="active">
                                <a class="active" href="./index.php">الرئيسية</a>
                            </li>
                            <li>
                                <a href="./pages-ar/about.php">معلومات عنا</a>
                            </li>
                            <li>
                                <a href="./pages-ar/category.php">المنتجات</a>
                            </li>
                            <li>
                                <a href="./pages-ar/contact.php">تواصل معنا</a>
                            </li>
                        </ul>
                        <div class="mLinks">
                            <div class="drop">
                                <a href="##">
                                    <img class="lang" src="./media/icons/lang.png" alt="" />AR<img class="drop-icon"
                                        src="./media/icons/arrow-lang.png" alt="" /></a>
                                <span class="dropMenu">
                                    <a class="dropbottom" href="./index.php"><img class="lang"
                                            src="./media/icons/lang-white.png" alt="" /> EN
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="hbtn-table">
                            <a href="./pages/table.php">Product Table</a>
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
                        <a href="./index-ar.php">الرئيسية</a>
                    </li>
                    <li>
                        <a href="./pages-ar/about.php">معلومات عنا</a>
                    </li>
                    <li>
                        <a href="./pages-ar/category.php">المنتجات</a>
                    </li>
                    <li>
                        <a href="./pages-ar/contact.php">تواصل معنا</a>
                    </li>
                </ul>
                <div class="icons" onclick="toggleMenu()">
                    <i id="closeicon" class="fas fa-times close-icon"></i>
                </div>
                <div class="mLinks">
                    <div class="drop">
                        <a href="##">
                            <img class="lang" src="./media/icons/lang-white.png" alt="" />AR</a>
                        <span class="dropMenu">
                            <a class="dropbottom" href="./index.php"><img class="lang"
                                    src="./media/icons/lang-white.png" alt="" /> EN
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <?php
    include './backend/db_connection.php';

    
    $sql = "SELECT image_path FROM slider_images";
    $result = $conn->query($sql);

    $slider_images = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_path = str_replace('../../', './', $row['image_path']);
            $slider_images[] = $image_path;
        }
    }
    $conn->close();
    ?>

     <!-- Start Slider -->
     <div class="home">
        <div class="swInner">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <?php if (!empty($slider_images)): ?>
                        <?php foreach ($slider_images as $image): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo htmlspecialchars($image); ?>" alt="" />
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="swiper-slide">
                            <img src="./media/slider-image/placeholder.png" alt="No images available" />
                        </div>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
                <img src="./media/icons/double-arrow.png" alt="" />
            </div>
            <div class="next">
                <span>
                    <svg viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M-1.53775e-07 1.75899C-8.59591e-08 0.983257 0.844905 0.502919 1.51148 0.899692L19.5564 11.6407C20.2077 12.0284 20.2077 12.9716 19.5564 13.3593L1.51148 24.1003C0.844904 24.4971 -2.09961e-06 24.0167 -2.03179e-06 23.241L-1.53775e-07 1.75899Z"
                            fill="#2A2665" />
                    </svg>
                </span>
            </div>
            <div class="prev">
                <span>
                    <svg viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Arrow 1 (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 23.241C21 24.0167 20.1551 24.4971 19.4885 24.1003L1.44361 13.3593C0.792258 12.9716 0.792257 12.0284 1.44361 11.6407L19.4885 0.899694C20.1551 0.502922 21 0.983259 21 1.75899L21 23.241Z"
                            fill="#2A2665" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <!-- End Slider -->
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
    <!-- Start About -->
    <div class="about">
        <div class="main-title js-scroll fade-btm">
            <p>معلومات عنا</p>
            <div class="br">
                <span></span>
            </div>
        </div>
        <div class="container">
            <div class="image js-scroll fade-left">
                <img src="./media/about.png" alt="" />
            </div>
            <div class="text js-scroll fade-right">
                <p>
                    اليوم، تقوم NKP بتشغيل 12 ماكينة للأفلام البلاستيكية بإنتاج سنوي
                    تصل إلى 2000 طن من المستلزمات المنزلية المختلفة والتغليف
                    الحلول والأفلام المطبوعة . كما شكلت Nkp فريقًا متخصصًا و
                    فريق من ذوي الخبرة لديه القدرة على تشغيل الآلات المتقدمة
                    وإيصال المنتج النهائي للمستهلك بأعلى مستوى
                    الجودة والشكل المثالي
                </p>
                <a class="btn" href="./pages-ar/about.php">قراءة المزيد</a>
            </div>
        </div>
    </div>
    <!-- End About -->
    <!-- Start Services -->
    <div class="services">
        <div class="main-title js-scroll fade-btm">
            <p>عرض خدماتنا</p>
            <div class="br">
                <span></span>
            </div>
        </div>
        <div class="container">
            <div class="serv">
                <div class="video js-scroll fade-right">
                    <video
                        src="./media/An-Ut3DxJB2mq2C78W6o3JgvsH7jWcNSlpnvwX2Zmo2kvTqwtfuUvw2NBsPs87Xh092S88oHPcRl0ZtjlMAyP0Jl.mp4"
                        controls autoplay></video>
                </div>
                <div class="text js-scroll fade-left">
                    <p>
                        استمتع بتجربة فريدة مع NKP، حيث نجمع بين الابتكار
                        وجودة عالية تلبي تطلعاتكم في مجال البلاستيك
                        والتعبئة والتغليف. نحن نفخر بتقديم خدمات متكاملة
                        الحلول التي تشمل استخدام أحدث التقنيات و
                        مواد خام فائقة الجودة، بما في ذلك أصباغ بلاستيكية عالية الجودة.
                        كوننا شركة ملتزمة بتحقيق رضا العملاء، فإننا
                        تقديم الدعم الفني المتميز في جميع الأوقات لضمان
                        أن يتم تحقيق أهدافك بكفاءة ومهنية.
                        اختر NKP للحصول على تجربة متميزة تلبي وتتجاوز كل شيء
                        توقعاتك
                    </p>
                </div>
            </div>
            <a class="btn js-scroll fade-top" href="./pages-ar/services.php">عرض المزيد</a>
        </div>
    </div>
    <!-- End Services -->
    <!-- Start Product -->
    <div class="product">
        <div class="main-title js-scroll fade-btm">
            <p>حول منتجاتنا</p>
            <div class="br">
                <span></span>
            </div>
        </div>
        <div class="container">
            <div class="image js-scroll fade-left">
                <img src="./media/product.png" alt="" />
                <div class="det">
                    <div class="title">NKP</div>
                    <div class="sub-tit">مفارش السفرة</div>
                    <p>
                        اجعل تجربة تناول الطعام الخاصة بك أكثر أناقة وراحة مع منتجاتنا
                        أغطية طاولات الطعام. تضيف تصميماتنا الأنيقة والمتينة لمسة
                        الفخامة في أي مناسبة، سواء كانت عائلية أو اجتماعية، مع الحفاظ عليها
                        الطاولة نظيفة ومحمية.
                    </p>
                    <a class="btn" href="./pages-ar/category.php">عرض المزيد</a>
                </div>
            </div>
            <div class="text js-scroll fade-right">
                <p>
                    تفتخر شركتنا بتقديم مجموعة رائعة من المنتجات التي
                    الجمع بين الأسلوب والوظيفة. من أغطية الطاولات الفاخرة إلى المتخصصة
                    الحقائب الطبية، منتجاتنا تتميز بجمالها
                    تصميمات وجودة عالية تضيف لمسة من الأناقة والفخامة
                    كل استخدام.
                </p>
                <a class="btn" href="./pages-ar/category.php">عرض المزيد</a>
            </div>
        </div>
    </div>
    <!-- End Product -->
    <!-- Start Choosing -->
    <div class="choosing">
        <div class="spiecal-title js-scroll fade-btm">
            لماذا تختار؟
            <span>NKP</span>
        </div>
        <div class="container js-scroll fade-top">
            <p>
                نحن نبرز كشركة ذات تاريخ طويل من النجاح و
                الابتكار في مجال طباعة الشعارات والعلامات التجارية على البلاستيك
                منتجات التعبئة والتغليف. نحن نتميز بالجودة العالية و
                خدمة عملاء ممتازة، حيث نسعى دائمًا لتحقيق الأعلى
                مستويات الرضا لعملائنا. باختيارك لنا، أنت كذلك
                مضمونة للاستفادة من تقنيات الطباعة المتقدمة و
                مواد عالية الجودة، مما يضمن أفضل النتائج التي تبرز شخصيتك
                الهوية التجارية بأفضل طريقة ممكنة.
            </p>
        </div>
    </div>
    <!-- End Choosing -->
    <!-- Start Map -->
    <div class="map">
        <div class="spiecal-title js-scroll fade-btm">الدول التي نصدر إليها</div>
        <div class="container">
            <div class="text">
                <p class="js-scroll fade-btm">
                    نحن نصدر إبداعنا وتقنياتنا المبتكرة للأفراد
                    والشركات في جميع أنحاء العالم، مما يجعل الابتكار يتحول إلى
                    الواقع الذي يغير حياة الناس
                </p>
            </div>
            <div class="video">
                <iframe src="./myVisitedPlaces.php" frameborder="0"></iframe>
            </div>
            <div class="countries js-scroll fade-btm">
                <div class="count">العراق</div>
                <div class="count">الكويت</div>
                <div class="count">فلسطين</div>
                <div class="count">اميركا</div>
            </div>
        </div>
    </div>
    <!-- End Map -->
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">
            <div class="top">
                <div class="left">
                    <div class="logo">
                        <img src="./media/logos/footer-logo.png" alt="">
                    </div>
                </div>
                <div class="right">
                    <div class="helpful-link">
                        <div class="title">روابط مفيدة</div>
                        <ul>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./index-ar.php">الرئيسية</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages-ar/about.php">معلومات عنا</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages-ar/category.php">المنتجات</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages-ar/contact.php">تواصل معنا</a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-us">
                        <div class="title">تواصل معنا</div>
                        <ul>
                            <li>
                                <img src="./media/icons/location-footer.png" alt="">
                                <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">ماركا الشمالية، شارع الفحيص،
                                    عمان</a>
                            </li>
                            <li>
                                <img src="./media/icons/phone.png" alt="">
                                <a href="tel:+962 7 7668 8110">+962 7 7668 8110</a>
                            </li>
                            <li>
                                <img src="./media/icons/email.png" alt="">
                                <a href="mailto:info@nkp-products.com">info@nkp-products.com</a>
                            </li>
                        </ul>
                        <div class="so">
                            <a href="https://www.facebook.com/NKP.Factory">
                                <img src="./media/icons/facebook-footer.png" alt="">
                            </a>
                            <a href="https://www.instagram.com/nkp_products/">
                                <img src="./media/icons/insta-footer.png" alt="">
                            </a>
                            <a
                                href="https://api.whatsapp.com/send/?phone=%2B962776688110&text&type=phone_number&app_absent=0">
                                <img src="./media/icons/whatsapp.png" alt="">
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
    <script src="./js/counter.js"></script>
    <script src="./js/scroll.js"></script>
    <script src="./js/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/sc.js"></script>
    <!-- End JS Files -->
</body>

</html>