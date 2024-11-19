<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png" />
  <title>Crypto Signals</title>
  <link rel="stylesheet" href="{{landingTheme('assets/css/plugins/fontawesome-6.css')}}" />
  <link rel="stylesheet" href="{{landingTheme('assets/css/plugins/swiper.min.css')}}" />
  <link rel="stylesheet" href="{{landingTheme('assets/css/vendor/metismenu.css')}}" />
  <link rel="stylesheet" href="{{landingTheme('assets/css/plugins/animate.min.css')}}" />
  <link rel="stylesheet" href="{{landingTheme('assets/css/vendor/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{landingTheme('assets/css/style.css')}}" />
  <style>
    #pricingPlans {
      scroll-margin-top: 80px !important;
    }

    #ourServices {
      scroll-margin-top: 110px !important;
    }
  </style>
</head>

<body class="index-one">
  <!-- header area start -->
  <header class="header-area header-one header--sticky">
    <div class="header-container-one">
      <div class="header-wrapper">
        <a href="index.html" class="logo">
          <img src="{{landingTheme('assets/images/logo/logo.png')}}" alt="logo" />
        </a>
        <div class="header-right">
          <nav class="nav-area drop-down-rts">
            <ul class="navbar-nav-1">
              <li class="menu-item main-nav-on">
                <a href="#home"><span class="rolling-text">Home</span></a>
              </li>
              <li class="menu-item main-nav-on">
                <a href="#ourServices"><span class="rolling-text">Our Services</span></a>
              </li>
              <li class="menu-item main-nav-on">
                <a href="#pricingPlans"><span class="rolling-text">Pricing Plans</span></a>
              </li>
              <li class="menu-item main-nav-on">
                <a href="#contactUs"><span class="rolling-text">Contact us</span></a>
              </li>
              <li class="menu-item main-nav-on">
                <a href="{{route('login')}}"><span class="rolling-text">Log In</span></a>
              </li>
            </ul>
          </nav>

          <div class="action-area">
            <div class="search-icon-header">
              <div class="icon search-click">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M19.5547 17.8516C20.1113 18.4453 20.1113 19.373 19.5547 19.9668C18.9609 20.5234 18.0332 20.5234 17.4395 19.9668L13.0234 15.5137C11.502 16.5156 9.64648 17.0352 7.64258 16.7754C4.22852 16.293 1.48242 13.5098 1.03711 10.1328C0.40625 5.08594 4.67383 0.818359 9.7207 1.44922C13.0977 1.89453 15.8809 4.64062 16.3633 8.05469C16.623 10.0586 16.1035 11.9141 15.1016 13.3984L19.5547 17.8516ZM3.93164 9.09375C3.93164 11.7285 6.04688 13.8438 8.68164 13.8438C11.2793 13.8438 13.4316 11.7285 13.4316 9.09375C13.4316 6.49609 11.2793 4.34375 8.68164 4.34375C6.04688 4.34375 3.93164 6.49609 3.93164 9.09375Z"
                    fill="white" />
                </svg>
              </div>
              <div class="search-offcanvas-wrapper">
                <div class="inner">
                  <div class="close-icon-search">
                    <i class="far fa-times"></i>
                  </div>
                  <form action="#">
                    <h4 class="text-center">Search on this Page</h4>
                    <input type="text" placeholder="Search Your Result" required />
                    <button>
                      <i class="fa-light fa-magnifying-glass"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="menu-btn">
              <div class="rts-offcanvas-wrapper">
                <div class="container-menu">
                  <div class="action-menu">
                    <div class="close-event"></div>
                    <div class="open-event">
                      <!-- <div class="text">
                        <span>Menu</span>
                        <span>Close</span>
                    </div> -->
                      <div class="burger">
                        <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-close"
                          data-v-649bbaab="">
                          <line x1="13.788" y1="1.28816" x2="1.06011" y2="14.0161" stroke="currentColor"
                            stroke-width="1.2"></line>
                          <line x1="1.06049" y1="1.43963" x2="13.7884" y2="14.1675" stroke="currentColor"
                            stroke-width="1.2"></line>
                        </svg>
                        <svg viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-burger"
                          data-v-649bbaab="">
                          <line x1="18" y1="0.6" y2="0.6" stroke="currentColor" stroke-width="1.2" data-v-649bbaab="">
                          </line>
                          <line x1="18" y1="5.7167" y2="5.7167" stroke="currentColor" stroke-width="1.2"
                            data-v-649bbaab=""></line>
                          <line x1="18" y1="10.8334" y2="10.8334" stroke="currentColor" stroke-width="1.2"
                            data-v-649bbaab=""></line>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="rts-fs-menu">
                  <div class="rts-fs-container row">
                    <div class="rts-fs--nav col-12 col-md-6">
                      <ul id="primary-menu" class="navbar-nav-button">
                        <li id="menu-item-76" class="menu-item">
                          <a href="#">Home</a>
                        </li>
                        <li id="menu-item-767" class="menu-item">
                          <a href="#">About Us</a>
                        </li>
                        <li id="menu-item-768" class="menu-item">
                          <a href="#">Pricing Plans<span></a>
                        </li>
                        <li class="menu-item">
                          <a href="#">Contact us<span></a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('login')}}">Log In<span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="rts-fs--contacts col-12 col-md-6">
                      <div class="contact-inner">
                        <div class="contact-information">
                          <h2 class="heading-title">Our Office</h2>
                          <div class="address">
                            <ul>
                              <li>
                                <p>University Town Peshawar,pakistan</p>
                              </li>
                              <li>
                                <p>Islamabad , pakistan</p>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="contact-information">
                          <h2 class="heading-title">Get In Touch</h2>
                          <div class="contact">
                            <ul>
                              <li>
                                <a href="mailto:info@cryptosignals.com" class="mail">info@cryptosignals.com</a>
                              </li>
                              <li>
                                <a href="tel:28586235932159" class="number">+92000000000</a>
                              </li>
                            </ul>
                          </div>
                          <div class="rts-social-area-one">
                            <ul>
                              <li>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              </li>
                              <li>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              </li>
                              <li>
                                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                              </li>
                              <li>
                                <a href="#"><i class="fa-brands fa-skype"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header area end -->

  <div id="smooth-wrapper">
    <div id="smooth-content">

      @yield('content')

      <!-- rts-footer-area one -->
      <div class="rts-footer-area-one rts-section-gapTop">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="grid-lines-wrapper">
                <div class="grid-lines">
                  <div class="grid-line"></div>
                  <div class="grid-line"></div>
                  <div class="grid-line"></div>
                  <div class="grid-line"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row rts-section-gapBottom">
            <div class="col-lg-12">
              <div class="footer-main-wrapper-one">
                <!-- footer left area start -->
                <div class="footer-left-area">
                  <a href="#" class="logo-footer">
                    <img class="logo-1" src="{{landingTheme('assets/images/logo/logo.png')}}" alt="lolo-area"
                      style="width: 150px;" />
                    <img class="logo-2" src="{{landingTheme('assets/images/logo/logo.png')}}" alt="lolo-area"
                      style="width: 150px;" />
                  </a>
                  <p class="disc">
                    Get expert crypto signals and real-time<br>
                    alerts—profits at your fingertips.
                  </p>
                  <div class="rts-social-area-one">
                    <ul>
                      <li>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-brands fa-skype"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- footer left area end -->
                <!-- footer single wized start -->
                <div class="footer-single-wized-start">
                  <h5 class="title">Useful Links</h5>
                  <ul class="footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Pricing plan</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <!-- footer single wized end -->
                <!-- footer single wized start -->
                <div class="footer-single-wized-start">
                  <h5 class="title">Contact Info</h5>
                  <div class="mail-contact-area">
                    <div class="single-con-info mb--40">
                      <a href="#">
                        University town <br />
                        Peshawar
                      </a>
                    </div>
                    <div class="single-con-info mail">
                      <a href="#"> info@cryptosignals.com </a>
                    </div>
                    <div class="single-con-info">
                      <a href="#"> +92000000 </a>
                    </div>
                  </div>
                </div>
                <!-- footer single wized end -->
                <!-- footer single wized start -->
                <div class="footer-single-wized-start">
                  <h5 class="title">Subscribe Us</h5>
                  <div class="subscribtion-area">
                    <p class="disc">
                      Subscribe our newsletter for future updates. <br />
                      don’t worry we don’t spam your email address
                    </p>
                    <form action="#" class="subscribtion-input">
                      <input id="email" type="email" placeholder="Enter your email..." required />
                      <label for="email"><i class="fa-regular fa-envelope"></i></label>
                      <button type="submit" class="rts-btn btn-dark">
                        subscribe
                      </button>
                    </form>
                  </div>
                </div>
                <!-- footer single wized end -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="copyright-area text-center">
                <div class="left">
                  <p>2024 © <a href="#">Crypto Signals</a>. All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- rts-footer-area one end -->


    </div>
  </div>
  <!-- Scripts style two -->
  <div class="loading-screen" id="loading-screen">
    <span class="bar top-bar"></span>
    <span class="bar down-bar"></span>
    <span class="progress-line"></span>
    <span class="loading-counter"> </span>
  </div>

  <div class="bg-noise"></div>

  <!-- back to top start -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
  </div>
  <!-- back to top end -->

  <!-- pre loader start -->
  <div class="rts-cursor cursor-outer" data-default="yes" data-link="yes" data-slider="no">
    <span class="fn-cursor"></span>
  </div>
  <div class="rts-cursor cursor-inner" data-default="yes" data-link="yes" data-slider="no">
    <span class="fn-cursor">
      <span class="fn-left"></span>
      <span class="fn-right"></span>
    </span>
  </div>
  <!-- pre loader end -->

  <!-- dark light switcher start-->
  <div class="modal-sidebar-scroll rts-dark-light">
    <ul>
      <li class="go-dark-w">
        <span>Dark</span><i class="rts-go-dark fal fa-moon"></i>
      </li>
      <li class="go-light-w">
        <span>Light</span><i class="rts-go-light fa-light fa-brightness"></i>
      </li>
    </ul>
  </div>
  <!-- dark light switcher end -->

  <script defer src="{{landingTheme('assets/js/vendor/jquery.min.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/bootstrap.min.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/contact.form.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/vendor/waypoint.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/swiper.js')}}"></script>

  <!-- for side bar sticky -->
  <script defer src="{{landingTheme('assets/js/plugins/resizer-sensor.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/sticky-sidebar.js')}}"></script>
  <!-- for side bar sticky end-->

  <script defer src="{{landingTheme('assets/js/plugins/isotop.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>

  <script defer src="{{landingTheme('assets/js/plugins/smoothscroll-varticle.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/vendor/gsap.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/scrolltiger.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/scrolltoplugin.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/splittext.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/smoothscroll.js')}}"></script>

  <!-- title opacity scroll magix -->
  <script defer src="{{landingTheme('assets/js/plugins/scrollmagic.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/animate-scrollmagic.js')}}"></script>
  <!-- title opacity scroll magic end -->

  <script defer src="{{landingTheme('assets/js/plugins/tilt.js')}}"></script>
  <script defer src="{{landingTheme('assets/js/plugins/counterup.js')}}"></script>

  <script defer src="{{landingTheme('assets/js/vendor/waw.js')}}"></script>
  <!-- custom javascripts -->
  <script defer src="{{landingTheme('assets/js/main.js')}}"></script>
  <!-- Scripts style two End -->
</body>

</html>