<?php include '../../header2.php'; ?>

    <body class="page-template page-template-page-loyalty page-template-page-loyalty-php page page-id-21 page-child parent-pageid-17 optimizely-21">




        <header class="js-header header">
            <div class="wrapper">
                <nav class="nav--main">
                    <ul>

                        <li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46"><a href="<?php echo BASE_PATH; ?>/for/startups"/>For Startups</a></li>
                        
                        
                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>
                        <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51">
                        <a href="<?php echo BASE_PATH; ?>">Dashboard</a></li>
                         
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
                        <h1 class="heading--hero">Get Investment</h1>
                        <h2 class="hero__text">A customer loyalty program can double customer return visits</h2>

                        <div class="hero__cta--desktop">

                            <button type="button" class="btn findoutmoreButton">FIND OUT MORE</button>



                            <div class="hero__cta--desktop u-hide--md-down">
                                <div class="hero__text--cta"><p style="font-size:16px;">
                                    Have a question? Call (855) 769-8136</div></p>
                        </div>
                    </div>

                    <div class="hero__cta--mobile u-hide--md-up">
                    </div>


                </div>
                <div class="hero__pattern"></div>
            </section>
            <div class="find-out-more"></div>
            <!--  hero END -->
            <nav id="nav-internal" class="nav--internal"><ul>
                <li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199">
                    <a href="#/" id="what-we-offer">What we offer!</a></li>
                <li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199">
                    <a href="#/" id="pricing">Pricing</a></li>
                <li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198">
                    <a href="#/" id="book-a-session">Book a Session</a></li>
                </ul></nav>


            <section class="section">
                <div class="wrapper">
                    <h2 class="heading--internal u-text-center u-mb2">Did you know?</h2>
                    <figure class="illustration--60">
                        <figcaption>Only 0.91 percent of startups are funded by angel investors, while a measly 0.05 percent are funded by VCs</figcaption>
                        <img src="<?php echo BASE_PATH; ?>/images/money-bag.svg" alt="icon"/>
                    </figure>

                </div>



                <div class="section__arrow what-we-offer">
                    <div class="wrapper">
                        <div class="grid center">
                            <div class="grid__column u-size-1of2--md"></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>

            </section>









            <!--  section_image END -->
            <!-- section_image START -->
            <section class="section">
                <div class="wrapper">

                    <span class="space"></span>
                    <span class="space"></span>

                    <h2 class="heading--internal u-text-center u-mb4">What we offer!</h2>

                    <div class="grid grid--section grid--loyalty u-text-center--md-down has-image-left">

                        <!--  image START -->
                        <div class="grid__column u-size-1of2--md">
                            <figure class="section__illustration  section__illustration--icon">
                                <img src="<?php echo BASE_PATH; ?>/assets/camera.svg" class="u-img-responsive u-border-radius" />
                            </figure>
                        </div>
                        <!--  image END -->

                        <!--  content START-->
                        <div class="grid__column u-size-1of2--md section__text--middle">
                            <div class="section__content u-text-center--md-down">
                                <h3 class="heading--section heading--normal ">Fortune 500 companies use rewards programs to keep customers</h3>
                                <p class="section__text ">Starbucks, Walgreens and many other successful companies keep customers coming back by investing in a powerful rewards program</p>
                            </div>
                        </div>
                        <!-- content END -->
                    </div>



                </div>
                <div class="section__arrow">
                    <div class="wrapper">
                        <div class="grid">
                            <div class="grid__column u-size-1of2--md "></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>
            </section>
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

               


            </section>



            







            




            <!--  section_image END -->
        </main>
        <span class="space"></span>

        <?php include '../../footer2.php'; ?>

        




    </body>
</html>