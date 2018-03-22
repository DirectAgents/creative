<?php include 'header2.php'; ?>

    <body class="page-template page-template-page-loyalty page-template-page-loyalty-php page page-id-21 page-child parent-pageid-17 optimizely-21">




        <header class="js-header header">
            <div class="wrapper">
                <nav class="nav--main">
                    <ul>

                        <li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46"><a href="<?php echo BASE_PATH; ?>/investors"/>For Investors</a></li>
                        
                        
                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>
                        <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51">
                        <a href="<?php echo BASE_PATH; ?>" data-toggle="modal" data-target="#signin">Dashboard</a></li>
                         
                        <?php }else{ ?>
                       <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51">
                       <a href="" data-toggle="modal" data-target="#signin">Login</a></li>
                         <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51">
                        <a href="" data-toggle="modal" data-target="#signin">Signup</a></li>

                        <?php } ?>
                    
                    </ul>      </nav>
                <button class="hamburger hamburger--squeeze js-hamburger u-hide--md-up" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <a href="<?php echo BASE_PATH; ?>" class="logo--header">
                    <svg width="160" height="30" viewBox="0 0 1242 237" xmlns="http://www.w3.org/2000/svg"><title>logo</title><g fill-rule="nonzero" fill="#FFF"><path d="M-.003 178.09h21.491v-49.3h61.709v-19.36H21.488V76.373h69.55V57.006H-.003zM111.514 57.014h21.492V178.09h-21.492zM211.497 150.04l-36.892-93.034H150.83l50.883 121.925h18.867l50.833-121.925H248.18zM309.522 126.556h61.358v-19.017h-61.358V76.022h69.25V57.006h-90.75v121.083h91.591v-19.017h-70.091zM446.222 110.956c-26.909-5.717-33.209-12.067-33.209-23.484v-.35c0-10.916 10.125-19.558 26.009-19.558 12.608 0 23.983 3.975 35.35 13.158l7.991-10.575c-12.358-9.833-25.166-14.841-42.991-14.841-23.234 0-40.159 13.991-40.159 33.008v.35c0 19.858 12.909 28.892 41.05 34.95 25.667 5.358 31.825 11.767 31.825 22.983v.35c0 11.917-10.825 20.6-27.258 20.6-16.975 0-29.183-5.708-41.942-17.125l-8.591 10.025c14.691 12.959 30.575 19.359 49.991 19.359 24.275 0 41.8-13.5 41.8-34.25v-.35c0-18.517-12.608-28.35-39.866-34.25M590.238 57.03H494.13v12.61h41.058v108.416h14V69.639h41.05zM606.463 133.79l28-61.71 27.8 61.71h-55.8zm21.7-77.643l-55.758 121.917h14.15l14.5-31.967h66.616l14.342 31.967h14.85l-55.75-121.917h-12.95zM726.03 118.764v-49.15h37.775c19.758 0 31.275 9.042 31.275 23.883v.342c0 15.592-13.1 24.925-31.467 24.925H726.03zm83-25.417v-.35c0-9.533-3.475-18.016-9.384-23.883-7.741-7.592-19.758-12.108-34.791-12.108H712.23v121.083h13.8v-47.067h34.95l35.491 47.067h16.975l-37.575-49.5c19.209-3.425 33.159-15.192 33.159-35.242zM878.121 110.956c-26.95-5.717-33.208-12.067-33.208-23.484v-.35c0-10.916 10.125-19.558 26.008-19.558 12.609 0 23.984 3.975 35.3 13.158l8.042-10.575c-12.408-9.833-25.167-14.841-42.992-14.841-23.233 0-40.208 13.991-40.208 33.008v.35c0 19.858 12.958 28.892 41.1 34.95 25.667 5.358 31.825 11.767 31.825 22.983v.35c0 11.917-10.875 20.6-27.3 20.6-16.933 0-29.142-5.708-41.95-17.125l-8.542 10.025c14.692 12.959 30.575 19.359 49.992 19.359 24.275 0 41.75-13.5 41.75-34.25v-.35c0-18.517-12.558-28.35-39.817-34.25M1122.58 144.097c-1.684-1.191-3.867-1.841-6.109-1.841-2.183 0-4.416.65-6.1 1.841l-32.65 23.459h-.025l12.575-38.267c1.292-3.925-.4-9.083-3.775-11.517l-32.108-23.116h39.633c4.117 0 8.592-3.275 9.825-7.242l12.484-38.55h.125l12.741 38.658c1.292 3.925 5.759 7.1 9.925 7.1h39.9v.05l-32.225 23.175c-3.375 2.434-5.066 7.6-3.825 11.517l12.575 38.192h-.308l-32.658-23.459zm115.108-9.616c3.375-2.434 5.067-7.592 3.783-11.517l-17.133-52.125c-.842-2.533-2.733-3.925-4.867-3.925-1.141 0-2.383.4-3.566 1.242l-18.05 12.975h-.034L1173.43 7.106c-1.292-3.925-5.767-7.108-9.934-7.108h-55.6c-4.166 0-6.5 3.183-5.208 7.108l6.683 20.267h-6.25v.025h-72.7c-4.166 0-8.583 3.225-9.875 7.191l-17.075 52.825c-1.291 3.967 1.042 7.242 5.217 7.242h22.483l-24.3 74.05c-1.291 3.916.4 9.083 3.767 11.516l44.783 32.167c1.184.842 2.384 1.242 3.525 1.242 2.175 0 4.067-1.392 4.909-3.917l6.95-21.158h.016l-.066.216 63.941 46.017c1.684 1.192 3.917 1.792 6.109 1.792 2.233 0 4.458-.6 6.15-1.792l44.775-32.217c3.383-2.425 3.383-6.35 0-8.783l-18.267-13.125v-.025l64.225-46.158z"/></g></svg>
                </a>
            </div>
        </header>
        <nav class="nav--mobile js-mobile-nav">
            <ul><li id="menu-item-64" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-64"><a href="https://www.fivestars.com/businesses/">For Businesses</a></li>

                <li id="menu-item-66" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-66"><a href="https://www.fivestars.com/businesses/how-it-works/">How It Works</a></li>
                <li id="menu-item-558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-558"><a href="https://www.fivestars.com/businesses/pricing/">Pricing</a></li>
                <li id="menu-item-557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-557"><a href="https://www.fivestars.com/">For Members</a></li>
                <li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68"><a target="_blank" href="https://fivestars.app.link/H5xo4xAVWB">Find Locations</a></li>
                <li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69"><a target="_blank" href="https://www.fivestars.com/accounts/login/">Sign In</a></li>
            </ul>  </nav>
        <main class="main">
            <!--  hero START -->
            <section class="hero">
                <div class="hero__bg lazyImg lazyImg--notloaded" style="background-image: url(<?php echo BASE_PATH; ?>/assets/AdobeStock_2836132-darker.jpg)" data-image="<?php echo BASE_PATH; ?>/assets/AdobeStock_2836132-darker.jpg"></div>
                <noscript><div class="hero__bg" style="background-image: url(https://www.fivestars.com/wp-content/uploads/2017/02/Highrez.jpg)"></div></noscript>
                <div class="wrapper">
                    <div class="hero__content">
                        <h1 class="heading--hero">About Us</h1>
                       
                    <div class="hero__cta--mobile u-hide--md-up">
                    </div>


                </div>
                <div class="hero__pattern"></div>
            </section>
         
            <!--  hero END -->
          

           
            <!--  section_image END -->
            <!-- section_image START -->
            <section class="section">
                <div class="wrapper">

                    <div class="grid grid--section grid--loyalty text-center--md-down has-image-right">
                        <!--  content START-->
                        <div class="grid__column u-size-1of2--md section__text--middle">
                            <div class="section__content u-text-center--md-down">
                                <h3 class="heading--section heading--normal ">FiveStars offers Fortune 500 technology to local businesses</h3>
                                <p class="section__text ">Set up a digital rewards program, automatically send messages, and customize offers for new and returning customers. On average, returning customers will visit two more times per year.</p>
                            </div>
                        </div>
                        <!-- content END -->

                        <!--  image START -->
                        <div class="grid__column u-size-1of2--md">
                            <figure class="section__illustration  section__illustration--icon">
                                <img src="<?php echo BASE_PATH; ?>/assets/chairs.svg" class="u-img-responsive u-border-radius" />
                            </figure>
                        </div>
                        <!--  image END -->
                    </div>


                </div>

                <div class="section__arrow pricing">
                    <div class="wrapper">
                        <div class="grid center">
                            <div class="grid__column u-size-1of2--md"></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>


            </section>



<section class="section">
  <div class="wrapper">
    <div class="grid grid--section grid--leadership">
      <div class="grid__column">
                <h2 class="heading--internal u-text-center">Our Team</h2>
              </div>

      <div class="grid__column">
                          <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/VictorHo-1-400x447.png" alt="Victor Ho">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Victor Ho</h4>
            <h5 class="leadership__position">Co-Founder and CEO</h5>
            <p class="leadership__bio">Victor co-founded Fivestars following his work at McKinsey &amp; Company, 
where he helped build out cutting edge loyalty and customer engagement 
strategies for premiere Fortune 500 brands. He started his career as an 
investment banker at Goldman Sachs, and holds three degrees from the 
University of California, Berkeley, where he triple majored in 
Industrial Engineering, Rhetoric, and Business Administration. Victor has an 
insatiable love for sour candy, and can’t resist those tasty green apple things. </p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/MattDoka-400x447.png" alt="Matt Doka">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Matt Doka</h4>
            <h5 class="leadership__position">Co-Founder and CTO</h5>
            <p class="leadership__bio">Matt has led technology at Fivestars since its founding. Before Fivestars, 
he was a consultant at TechnoServe in Uganda, a strategy consultant at McKinsey, 
and an analyst at AVM, a 32-year old global macro hedge fund. Matt graduated 
from UPenn's Management and Technology program as a Ben Franklin and 
Joseph Wharton scholar, where he earned dual degrees in Engineering 
and Finance. He loves skiing and backpacking, and he grills a killer steak. </p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/Chris_lesssmily-400x447.png" alt="Chris Luo">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Chris Luo</h4>
            <h5 class="leadership__position">Marketing</h5>
            <p class="leadership__bio">Chris has more than 15 years of experience in marketing, inside sales, and strategy.
Previously, he was the Global Head of SMB Marketing at Facebook, where he
drove small business adoption for Facebook Ads and Pages and built a team of
over 20 marketers and 200 inside sales reps. Chris’ tech career began at
Vonage, where he grew an inside sales team to over 500 reps by IPO. He went
on to lead Acquisition Marketing for Google in Asia-Paciﬁc. In his spare time,
you’ll ﬁnd him training for marathons, exploring the city with his wife, Lynn, and
serving as a Community Group leader at Reality San Francisco.</p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/SamOdio-400x447.png" alt="Sam Odio">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Sam Odio</h4>
            <h5 class="leadership__position">Product</h5>
            <p class="leadership__bio">Sam has 10 years of experience creating and scaling products. 
Early in his career, he built one of the first photo sharing mobile applications, 
sold it to Facebook, and became the product manager of Facebook Photos. 
He scaled Facebook photos to 100 billion photos uploaded by re-launching 
the photo viewer, photo upload interface, album interface, and launching 
facial recognition. After Facebook Photos, Sam left to start a 
machine learning startup, Freshplum, which was purchased by TellApart, 
and later Twitter. In his spare time, you’ll find Sam studying wine.
</p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/ZachSh-400x447.png" alt="Zach Shubert">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Zach Shubert</h4>
            <h5 class="leadership__position">Engineering</h5>
            <p class="leadership__bio">Zach Shubert is an experienced engineering leader and serial entrepreneur 
with a diverse background in academia, digital music, gaming, and now 
SMB SaaS. An alum of Brown University, he was the first engineering hire 
at Songza, where he eventually became CTO. From Songza, he moved 
to Zynga, where he led the team responsible for scaling the API infrastructure 
to handle 20 billion calls a day. Zach's hobbies include skiing, hiking, and 
prognosticating changes in federal monetary policy. </p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/JimTransparent-400x400.png" alt="Jim Lipuma">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Jim Lipuma</h4>
            <h5 class="leadership__position">Sales &amp; Operations</h5>
            <p class="leadership__bio">Jim has been leading Sales and Operations teams for over 30 years. Jim has worked in Fortune 500, startup, scaling, and turnaround environments and owned his own small business. Prior to joining Fivestars, Jim co-founded Rewards21, a consumer rewards platform and led teams at Kapow, AOL/Patch, Restaurant.com, Monster.com, and R.H. Donnelley. Jim lives in Downers Grove, IL, married to his wife Diane, his two daughters Alyssa and Carly, and dog Winston. In his spare time, Jim likes to read and write, and has published two books on leadership: Lead From The Front and Pulling Levers.</p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/MattCurl-400x447.png" alt="Matt Curl">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Matt Curl</h4>
            <h5 class="leadership__position">Analytics</h5>
            <p class="leadership__bio">Prior to joining Fivestars, "Curl" spent six years advising Fortune 500 companies 
at KPMG and Crane Co. His specialties are strategy, risk, and program 
management, with a focus on building data infrastructure to drive business 
decisions. As a graduate from Texas A&amp;M University, he enjoys watching 
Fightin’ Texas Aggie football games, as well as spending time with his 
wonderful wife, Melissa Curl, and his crazy dog, Berkeley (the office terrorizer). 
</p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2018/01/ClaudiaFry-400x447.png" alt="Claudia Fulga">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Claudia Fulga</h4>
            <h5 class="leadership__position">People Operations</h5>
            <p class="leadership__bio">Claudia leads People Operations at Fivestars where she focuses on 
creating and fostering programs to give employees an enriching and 
memorable experience. She’s an SFSU adjunct instructor and 
co-founder of HR 2.0. Before Fivestars, she helped numerous startups 
with their employee experience and spent over ten years in HR for 
architecture and interior design firms. Claudia’s first loves are traveling, 
playing with dogs, and anything motorcycle-related, so you can imagine 
what happens when she’s able to do all three at once. Mind. Blown. </p>
          </div>
        </section>
                <section class="leadership">
          <div class="leadership__photo">
                                <img class="illustration--profile" src="https://www.fivestars.com/wp-content/uploads/2017/02/BernardKo-400x447.png" alt="Bernard Koh">
                    </div>
          <div class="leadership__content u-text-center--md-down">
            <h4 class="leadership__name">Bernard Koh</h4>
            <h5 class="leadership__position">Finance</h5>
            <p class="leadership__bio">Bernard has more than 20 years of finance and technology management 
experience. As an early employee at Blue Jeans Network, he helped 
grow the company to be the leader in cloud-based video collaboration, 
with market share in North America, EMEA, and APAC. He has an MBA 
from the J.L. Kellogg School of Management at Northwestern University, 
and in his spare time, Bernard enjoys searching for the perfect cheesesteak. 
He doesn’t think he’ll ever find that perfect mix of provolone and bell peppers, 
but he sure as hell is gonna try! </p>
          </div>
        </section>
                  </div>


    </div>
  </div>
</section>



           







           



            <!--  section_image END -->
        </main>
        <span class="space"></span>
        
        <?php include 'footer2.php'; ?>

        




    </body>
</html>