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
                            North Marka, Street Fuheis, Amman
                        </a>
                        <a href="#">
                            <img src="./media/icons/time.png" alt="" />
                            SAT-THU: 8am to 5pm
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
                                <a class="active" href="./index.php">Home</a>
                            </li>
                            <li>
                                <a href="./pages/about.php">about us</a>
                            </li>
                            <li>
                                <a href="./pages/category.php">products</a>
                            </li>
                            <li>
                                <a href="./pages/contact.php">contact us</a>
                            </li>
                        </ul>
                        <div class="mLinks">
                            <div class="drop">
                                <a href="##">
                                    <img class="lang" src="./media/icons/lang.png" alt="" />EN<img class="drop-icon"
                                        src="./media/icons/arrow-lang.png" alt="" /></a>
                                <span class="dropMenu">
                                    <a class="dropbottom" href="./index-ar.php"><img class="lang"
                                            src="./media/icons/lang-white.png" alt="" /> AR
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
                        <a href="./index.php">Home</a>
                    </li>
                    <li>
                        <a href="./pages/about.php">about us</a>
                    </li>
                    <li>
                        <a href="./pages/category.php">products</a>
                    </li>
                    <li>
                        <a href="./pages/contact.php">contact us</a>
                    </li>
                </ul>
                <div class="icons" onclick="toggleMenu()">
                    <i id="closeicon" class="fas fa-times close-icon"></i>
                </div>
                <div class="mLinks">
                    <div class="drop">
                        <a href="##">
                            <img class="lang" src="./media/icons/lang-white.png" alt="" />EN</a>
                        <span class="dropMenu">
                            <a class="dropbottom" href="./home-ar.php"><img class="lang"
                                    src="./media/icons/lang-white.png" alt="" /> AR
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
            <p>About US</p>
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
                    Today,NKP operates 12 plastic film machines with annual production
                    reach to 2000 tons from different household supplies , packaging
                    solutions and printed films . Also, Nkp formed a specialized and
                    experienced team that has the ability to operate advanced machines
                    and to deliver the final product to the consumer with the highest
                    quality and perfect form
                </p>
                <a class="btn js-scroll fade-top" href="./pages/about.php">Read more</a>
            </div>
        </div>
    </div>
    <!-- End About -->
    <!-- Start Services -->
    <div class="services">
        <div class="main-title js-scroll fade-btm">
            <p>our services</p>
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
                        Enjoy a unique experience with NKP, where we combine innovation
                        and high quality to meet your aspirations in the field of plastics
                        and packaging. We pride ourselves on providing integrated
                        solutions that include the use of the latest technologies and
                        superior raw materials, including high-quality plastic pigments.
                        Being a company committed to achieving customer satisfaction, we
                        provide distinguished technical support at all times, to ensure
                        that your goals are achieved efficiently and professionally.
                        Choose NKP for a premium experience that meets and exceeds all
                        your expectations
                    </p>
                </div>
            </div>
            <a class="btn js-scroll fade-top" href="./pages/services.php">show more</a>
        </div>
    </div>
    <!-- End Services -->
    <!-- Start Product -->
    <div class="product">
        <div class="main-title js-scroll fade-btm">
            <p>our product</p>
            <div class="br">
                <span></span>
            </div>
        </div>
        <div class="container">
            <div class="image js-scroll fade-left">
                <img src="./media/product.png" alt="" />
                <div class="det">
                    <div class="title">NKP</div>
                    <div class="sub-tit">Dining tablecloths</div>
                    <p>
                        Make your dining experience more elegant and comfortable with our
                        dining table covers. Our elegant and durable designs add a touch
                        of luxury to any occasion, whether family or social, while keeping
                        the table clean and protected.
                    </p>
                    <a class="btn" href="./pages/NKP dining tablecloths.php">show more</a>
                </div>
            </div>
            <div class="text js-scroll fade-right">
                <p>
                    Our company is proud to offer an exquisite range of products that
                    combine style and function. From luxury table covers to specialty
                    medical bags, our products are distinguished by their beautiful
                    designs and high quality that add a touch of elegance and luxury to
                    every use.
                </p>
                <a class="btn js-scroll fade-top" href="./pages/category.php">show more</a>
            </div>
        </div>
    </div>
    <!-- End Product -->
    <!-- Start Choosing -->
    <div class="choosing">
        <div class="spiecal-title js-scroll fade-btm">
            WHY CHOOSING
            <span>NKP</span>
        </div>
        <div class="container js-scroll fade-top">
            <p>
                We stand out as a company with a long history of success and
                innovation in the field of printing logos and trademarks on plastic
                packaging products. We are distinguished by our high quality and
                excellent customer service, as we always strive to achieve the highest
                levels of satisfaction for our customers. By choosing us, you are
                guaranteed to benefit from advanced printing techniques and
                high-quality materials, ensuring the best results that highlight your
                business identity in the best possible way.
            </p>
        </div>
    </div>
    <!-- End Choosing -->
    <!-- Start Map -->
    <div class="map">
        <div class="spiecal-title js-scroll fade-btm">Countries to which we export</div>
        <div class="container">
            <div class="text">
                <p class="js-scroll fade-btm">
                    We export our creativity and innovative technologies to individuals
                    and companies around the world, making innovation turn into a
                    reality that changes people's lives
                </p>
            </div>
            <div class="video">
                <iframe src="./myVisitedPlaces.php" frameborder="0"></iframe>
            </div>
            <div class="countries js-scroll fade-btm">
                <div class="count btmAni25002">Iraq</div>
                <div class="count btmAni20002">Kuwait</div>
                <div class="count btmAni3000">Palestine</div>
                <div class="count btmAni2500">USA</div>
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
                        <div class="title">helpful link</div>
                        <ul>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./index.php">Home</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages/about.php">about us</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages/category.php">products</a>
                            </li>
                            <li>
                                <img src="./media/icons/arrow-footer.png" alt="">
                                <a href="./pages/contact.php">contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-us">
                        <div class="title">Contact US</div>
                        <ul>
                            <li>
                                <img src="./media/icons/location-footer.png" alt="">
                                <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">North Marka, Street Fuheis,
                                    Amman</a>
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
                Copyright Design © NKP Products. All right reserved
                Developed by <a href="https://petra-ms.com/"> Petra MS</a>
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