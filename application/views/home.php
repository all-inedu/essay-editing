<style>
section {
    height: 100%;
}

#trapezoid {
    border-bottom: 50px solid red;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    transform: rotate(45deg);
    width: 50%;
    margin-right: -43px;
    margin-top: -1px;
}

#best {
    position: absolute;
    margin-top: 14px;
    margin-left: -13px;
    width: 100px;
}

@media only screen and (max-width: 400px) {
    #trapezoid {
        border-bottom: 50px solid red;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        transform: rotate(45deg);
        width: 50%;
        margin-right: -42px;
        margin-top: -5px;
    }
}
</style>

<!-- Home Page -->
<section class="akame-service-area pt-4 pb-5" style="background: #9CECFB;
background: -webkit-linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
background: linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);">
    <div class="container">
        <div class="row">
            <div class="row align-items-center">
                <div class="col-md-5 d-none d-xl-block wow fadeInUp" data-wow-delay="200ms">
                    <img data-animation="fadeIn" src="<?=base_url('assets/img/students.png');?>" width="98%">
                </div>
                <!-- Welcome Text -->
                <div class="col-md-6 mt-4">
                    <div class="container welcome-text wow fadeInUp" data-wow-delay="200ms">
                        <div class="section-heading mb-80">
                            <h2 class="text-dark">Editing your essay better</h2>
                            <h5 class="text-white mt-3 mb-4">
                                Manage your essay. Engage essay editors. Download your completed essays. Safe. Simple.
                            </h5>
                            <p class="text-muted font-weight-bold mt-4">Get started as a...</p>
                        </div>
                        <div class="row mb-4" style="margin-top:-35px;">
                            <div class="col">
                                <a href="<?=base_url('login/auth/students');?>"
                                    class="btn btn-primary shadow font-weight-bold btn-block"><i class="far fa-user pr-2 pl-2"></i> Student</a>
                            </div>
                            <div class="col">
                                <a href="<?=base_url('login/auth/editors');?>"
                                    class="btn bg-light text-primary shadow btn-block"><i class="fas fa-user pr-2 pl-2"></i> Editor</a>
                            </div>
                            <div class="col">
                                <a href="<?=base_url('login/auth/mentors');?>"
                                    class="btn bg-light text-primary shadow btn-block"><i class="fas fa-user pr-2 pl-2"></i> Mentor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- About Area Start -->
<!-- <section class="akame-about-area section-padding-80-0" id="about">
    <div class="container">
        <div class="row align-items-center"> -->
<!-- Section Heading -->
<!-- <div class="col-12 col-md-6 col-lg-4">
                <div class="section-heading mb-80 wow fadeInUp" data-wow-delay="200ms"">
                    <h2>Lorem Ipsum</h2>
                    <p>Lorem Ipsum is simply dummy text</p>
                    <span>About Us</span>
                </div>
            </div> -->

<!-- About Us Thumbnail -->
<!-- <div class=" col-12 col-md-6 col-lg-4">
                    <div class="mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <img src="<?=base_url('assets/img/essay-home.png');?>" alt="">
                    </div>
                </div> -->

<!-- About Us Content -->
<!-- <div class="col-12 col-lg-4">
                    <div class="about-us-content mb-80 pl-4 wow fadeInUp" data-wow-delay="200ms">
                        <h3>Lorem Ipsum</h3>
                        <p>“Lorem Ipsum is simply dummy text of
                            the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only
                            five centuries”</p>
                        <a href="#" class="btn btn-primary rounded-pill pl-4 pr-4">Read More</a>
                    </div>
                </div>
            </div>
        </div>
</section> -->
<!-- About Area End -->


<!-- Our Service Area Start -->
<!-- <section class="akame-service-area section-padding-80-0 bg-light" id="our-service">
    <div class="container">

    </div>
</section> -->
<!-- Our Service Area End -->