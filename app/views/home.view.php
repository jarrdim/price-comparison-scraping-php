<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?php echo NAME?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="<?php echo  ROOT?>/assets/vendor/aos/aos.css"
      rel="stylesheet"
    />
    <link
      href="<?php echo  ROOT?>/assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="<?php echo  ROOT?>/assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="<?php echo  ROOT?>/assets/vendor/boxicons/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="<?php echo  ROOT?>/assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link
      href="<?php echo  ROOT?>/assets/vendor/swiper/swiper-bundle.min.css"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="<?php echo  ROOT?>/assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
      <nav id="navbar" class="navbar nav-menu">
        <ul>
          <?php if(Auth::logged_in()):?>
        <li>
            <a href="<?php echo ROOT?>/logout" class="nav-link scrollto"
              ><i class='bx bxs-like bx-fade-right-hover'></i><span>Logout(<?php echo Auth::getusername()?>)</span></a
            >
          </li>
          <?php else:?>
            <li>
            <a href="<?php echo ROOT?>/login" class="nav-link scrollto"
              ><i class='bx bxs-like bx-fade-right-hover'></i><span>Login</span></a
            >
          </li>
          <?php endif?>
          <li>
            <a href="#hero" class="nav-link scrollto active"
              ><i class="bx bx-home"></i> <span>Home</span></a
            >
          </li>
          <li>
            <a href="#about" class="nav-link scrollto"
              ><i class="bx bx-user"></i> <span>About</span></a
            >
          </li>

          <li>
            <a href="#services" class="nav-link scrollto"
              ><i class="bx bx-server"></i> <span>Services</span></a
            >
          </li>
          <li>
            <a href="#contact" class="nav-link scrollto"
              ><i class="bx bx-envelope"></i> <span>Contact</span></a
            >
          </li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
      <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <h1 class="mb-5">Price Comparison Website Using Web Scraping</h1>

        <div class="row">
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-body text-start">
                <div class="card-title text-primary fw-bold">
                  SEARCH PRODUCT NAME
                </div>
                <form method="POST">
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      name="keyword"
                      class="form-control"
                      placeholder="Enter product to search"
                    />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        Search
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </section>
    <!-- End Hero -->

    <main id="main">
      <section class="container mt-1">

        <div class="row" >

        <h2>SEARCH PRODUCT WITH <?php echo " '".$keyword."'"?></h2>

          <?php if(!empty($jiji)):?>
            <?php foreach($jiji as $product):?>
          <div class="col-md-3  g-5">
            <div class="card p-2">
              <div class="mb-2">
             <img  style="max-height:2rem; " src="<?php echo ROOT?>/assets/img/jiji-logo.png" class="img-fluid"  alt="">
             
              </div>
              <div style="min-height:10rem;">
              <strong class="text-primary" style="font-size:14px;"> <?php echo limitWords($product['title'] ?? "")?> </strong>
              <strong>Price Ksh <?php echo " ".$product['price'] ?? ""?></strong>
            </div>
              <div>
                <img
                  src="<?php echo $product['image'] ?>"
                  class="img-fluid"  style="max-height:14rem; width:100%;"
                  alt=""
                />
              </div>

            
              <a href="<?php echo "https://jiji.co.ke".$product['product_link']?>" class="btn btn-primary mt-3" target="_blank">Buy Now</a>
            </div>
          </div>
          <?php endforeach;?>
          <?php endif;?>


          <?php if(!empty($jumia)):?>
          <div class="col-md-3  g-5">
            <div class="card p-2">
              <div class="mb-2">
             <img  style="max-height:2rem; " src="<?php echo ROOT?>/assets/img/jumia-logo.jpeg" class="img-fluid"  alt="">
             
              </div>
              <div style="min-height:10rem;">
              <strong class="text-primary" style="font-size:14px;"> <?php echo $jumia['name'] ?? ""?> </strong>
              <strong>Price Ksh <?php echo " ".$jumia['price'] ?? ""?></strong>
              </div>

              <div>
                <img
                  src="<?php echo $jumia['image'] ?>"
                  class="img-fluid"  style="max-height:14rem; width:100%;"
                  alt=""
                />
              </div>

            
              <a href="<?php echo "https://www.jumia.co.ke".$jumia['url']?>" class="btn btn-primary mt-3" target="_blank">Buy Now</a>
            </div>
          </div>
          <?php endif;?>


          <?php if(!empty($ebay)):?>
            <?php foreach($ebay as $product):?>
          <div class="col-md-3  g-5">
            <div class="card p-2">
              <div class="mb-2">
             <img  style="max-height:2rem;  " src="<?php echo ROOT?>/assets/img/ebay-logo.jpeg" class="img-fluid"  alt="">
             
              </div>
              <div style="min-height:10rem;">
              <strong class="text-primary" style="font-size:14px;"> <?php echo $product['name'] ?? ""?> </strong>
              <strong>Price Ksh <?php echo " ".$product['price'] ?? ""?></strong>
            </div>
              <div>
                <img
                  src="<?php echo $product['image'] ?>"
                  class="img-fluid"  style="max-height:14rem; width:100%; object-fit:cover;"
                  alt=""
                />
              </div>

            
              <a href="<?php echo $product['url']?>" class="btn btn-primary mt-3" target="_blank">Buy Now</a>
            </div>
          </div>
          <?php endforeach;?>
          <?php endif;?>
          <!-- <div class="col-md-3 card g-5">Lorem ipsum dolor sit amet.</div>
          <div class="col-md-3 card g-5">Lorem ipsum dolor sit amet.</div>
          <div class="col-md-3 card g-5">Lorem ipsum dolor sit amet.</div>
          <div class="col-md-3 card g-5">Lorem ipsum dolor sit amet.</div>
          <div class="col-md-3 card g-5">Lorem ipsum dolor sit amet.</div> -->
        </div>
  
      </section>
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>About</h2>
            <p>
            Our company is a leading provider of innovative price comparison 
            solutions powered by cutting-edge web scraping technology.
             We specialize in gathering real-time pricing data from a wide
              range of online retailers, allowing users to compare prices effortlessly 
              and find the best deals on their desired products. With a user-friendly
               interface, advanced search functionalities, and comprehensive product listings, 
               we empower consumers to make informed purchasing decisions and save both time and money.
                Our commitment to data accuracy, security, and user satisfaction sets us apart as a trusted partner in the e-commerce landscape,
                 delivering value and convenience to shoppers worldwide.
            </p>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <img
                src="<?php echo  ROOT?>/assets/img/profile-img.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Feedback and Improvement</h3>
              <p class="fst-italic">
              Collect user feedback through surveys, reviews, and ratings to continuously improve your website's usability and functionality.
              Regularly update your web scraping algorithms to maintain accuracy and reliability in price comparisons.
              </p>
        
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->

      <!-- ======= Facts Section ======= -->
      <section id="facts" class="facts">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Facts</h2>
            <p>
              Magnam dolores commodi suscipit. Necessitatibus eius consequatur
              ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam
              quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
              Quia fugiat sit in iste officiis commodi quidem hic quas.
            </p>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="232"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Happy Clients</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="bi bi-journal-richtext"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="521"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Projects</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-headset"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="1463"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Hours Of Support</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-award"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="25"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Awards</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Facts Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Services</h2>
            <p>
            Utilize our advanced web scraping technology to
             gather real-time pricing data from multiple online
              retailers across various product categories.
            </p>
          </div>

          <div class="row">
            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-box iconbox-blue">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"
                    ></path>
                  </svg>
                  <i class="bx bxl-dribbble"></i>
                </div>
                <h4><a href="">Customized Search and Filtering</a></h4>
                <p>
                Enjoy a user-friendly search experience with customized
                 search filters such as price range, brand, availability, 
                 ratings, and more, tailored to your specific preferences.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="icon-box iconbox-orange">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"
                    ></path>
                  </svg>
                  <i class="bx bx-file"></i>
                </div>
                <h4><a href="">Side-by-Side Price Comparison</a></h4>
                <p>
                Compare prices for the same product from different retailers side by side, ensuring you find the best deal and save money on your purchases.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="icon-box iconbox-pink">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"
                    ></path>
                  </svg>
                  <i class="bx bx-tachometer"></i>
                </div>
                <h4><a href="">Mobile-Friendly Interface</a></h4>
                <p>
                Access our services seamlessly on mobile devices, 
                ensuring convenience and usability whether you're at home or on the go.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-box iconbox-yellow">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"
                    ></path>
                  </svg>
                  <i class="bx bx-layer"></i>
                </div>
                <h4><a href="">Monetization Opportunities</a></h4>
                <p>
                Explore monetization opportunities through affiliate marketing, sponsored listings, and premium features, providing additional value and revenue streams for businesses and partners.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="icon-box iconbox-red">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"
                    ></path>
                  </svg>
                  <i class="bx bx-slideshow"></i>
                </div>
                <h4><a href="">Customer Support and Assistance</a></h4>
                <p>
                Benefit from dedicated customer support and assistance channels, including FAQs, email support, live chat, and helpdesk services, ensuring a smooth and satisfactory user experience.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="icon-box iconbox-teal">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"
                    ></path>
                  </svg>
                  <i class="bx bx-arch"></i>
                </div>
                <h4><a href="">Legal Compliance</a></h4>
                <p>
                Rest assured that our services comply with all relevant laws and regulations, including data privacy and consumer rights, maintaining trust and transparency in our operations.

                Continuous 
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Services Section -->

      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Testimonials</h2>
          </div>

          <div
            class="testimonials-slider swiper"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="<?php echo  ROOT?>/assets/img/testimonials/testimonials-1.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    I love using this price comparison website! It has helped me save so much time and money. The search function is very user-friendly, and I always find the best deals on my favorite products. Highly recommended
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="<?php echo  ROOT?>/assets/img/testimonials/testimonials-2.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    was skeptical at first, but this website exceeded my expectations. The comprehensive product listings and side-by-side price comparison feature make it easy to compare prices and make informed decisions. I've recommended it to all my friends!
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="<?php echo  ROOT?>/assets/img/testimonials/testimonials-3.png"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    As a frequent online shopper, I rely on this website to 
                    find the best prices before making a purchase. The personalized
                     recommendations are spot on, and the customer support team is always helpful.
                      A must-have tool for savvy shoppers!
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="<?php echo  ROOT?>/assets/img/testimonials/testimonials-4.avif"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    This website has become my go-to resource for shopping online.
                     I love how it aggregates prices from multiple retailers, 
                     making it effortless to find the best deals. 
                    The data accuracy and timely updates ensure a smooth shopping experience every time.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="<?php echo  ROOT?>/assets/img/testimonials/testimonials-5.jpeg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    I've tried several price comparison websites,
                     but none compare to this one. The interface is clean, the search results are comprehensive, 
                     and the product information is detailed.
                     It's like having a personal shopping assistant right at your fingertips!
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- End Testimonials Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Contact</h2>
          </div>

          <div class="row mt-1">
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required
                  />
                </div>
                <div class="form-group mt-3">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    placeholder="Message"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <h3>Price Comparison</h3>
        <p>
        I love using this price comparison website! It has helped me save so much time and money. The search function is very user-friendly.
        </p>
        <div class="social-links">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        <div class="copyright">
          &copy; Copyright <strong><span>Price Comparison</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">

          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo  ROOT?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo  ROOT?>/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo  ROOT?>/assets/js/main.js"></script>
  </body>
</html>
