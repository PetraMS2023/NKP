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
    <title>NKP Contact</title>
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
                            <li>
                                <a href="../pages/category.php">products</a>
                            </li>
                            <li class="active">
                                <a class="active" href="../pages/contact.php">contact</a>
                            </li>
                        </ul>
                        <div class="mLinks">
                            <div class="drop">
                                <a href="##">
                                    <img class="lang" src="../media/icons/lang.png" alt="" />EN<img class="drop-icon"
                                        src="../media/icons/arrow-lang.png" alt="" /></a>
                                <span class="dropMenu">
                                    <a class="dropbottom" href="../pages-ar/contact.php"><img class="lang"
                                            src="../media/icons/lang-white.png" alt="" /> AR
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
                            <a class="dropbottom" href="../pages-ar/contact.php"><img class="lang"
                                    src="../media/icons/lang-white.png" alt="" /> AR
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing Contact -->
    <div class="landing-contact">
        <div class="container">
            <div class="title btmAni2500">Contact US</div>
        </div>
    </div>
    <!-- End Landing Contact -->
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
    <!-- Start Contact Content -->
    <div class="contact-content">
        <div class="container js-scroll fade-btm">
            <div class="contact-section">
                <div class="left">

                    <?php
                    include '../backend/db_connection.php';


                    $sql = "SELECT email, phone, location_ar, location_en FROM company_contact WHERE 1";
                    $result = $conn->query($sql);

                    $company_contact = [];
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $company_contact = $row;
                        }
                    }

                    $conn->close();
                    ?>

                    <div class="cont">
                        <div class="info">
                            <img src="../media/icons/email-contact.svg" alt="Email Icon">
                            <a
                                href="mailto:<?php echo htmlspecialchars($company_contact['email']); ?>"><?php echo htmlspecialchars($company_contact['email']); ?></a>
                        </div>
                        <div class="info">
                            <img src="../media/icons/phone-contact.svg" alt="Phone Icon">
                            <a
                                href="tel:<?php echo htmlspecialchars($company_contact['phone']); ?>"><?php echo htmlspecialchars($company_contact['phone']); ?></a>
                        </div>
                        <div class="info">
                            <img src="../media/icons/location-contact.svg" alt="Location Icon">
                            <a
                                href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw"><?php echo htmlspecialchars($company_contact['location_en']); ?></a>
                        </div>
                    </div>

                    <div class="text">
                        <p>
                            We're always eager to hear from you! Whether you
                            have a question about our services, need assistance,
                            or simply want to give us feedback, feel free to reach out
                        </p>
                    </div>
                </div>
                <div class="right">
                    <form action="../backend/forms/insert_message.php" method="POST">
                        <label for="full_name">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>

                        <label for="message">Message:</label>
                        <textarea name="message" id="message" required></textarea>

                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
            <div class="location-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.316109100137!2d36.0016083!3d31.979445199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b619f3d77decb%3A0x3d01c2dec6e886b4!2z2YXYpNiz2LPYqSDZhtin2LXYsSDYp9mE2YPZitin2YTZiiDYp9mE2KrYrNin2LHZitipINin2YTYtdmG2KfYudmK2Kk!5e0!3m2!1sen!2sjo!4v1715260935485!5m2!1sen!2sjo"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- End Contact Content -->
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
                                <a href="https://maps.app.goo.gl/3bH47JZtEmXNneqU6?g_st=iw">North Marka, Street Fuheis,
                                    Amman</a>
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