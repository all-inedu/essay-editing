<style>
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
<section class="akame-service-area pt-4 pr-4 pl-4" style="background: #9CECFB;
background: -webkit-linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
background: linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
">
    <div class="container">
        <div class="row">
            <div class="row align-items-center">
                <div class="col-md-5 d-none d-xl-block wow fadeInUp" data-wow-delay="200ms">
                    <img data-animation="fadeIn" src="<?=base_url('assets/img/students.png');?>" width="98%">
                </div>
                <!-- Welcome Text -->
                <div class="col-md-6 offset-md-1 pb-4">
                    <div class="welcome-text wow fadeInUp" data-wow-delay="200ms">
                        <div class="section-heading mb-80">
                            <h2 class="text-white">Lorem Ipsum</h2>
                            <p class="text-white">“Lorem Ipsum is
                                simply dummy text of
                                the printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has survived not only
                                five centuries, but also the leap into electronic typesetting, remaining
                                essentially unchanged.”</p>

                        </div>
                        <a href="#" class="btn btn-warning rounded-pill pl-4 pr-4">About
                            Us</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- About Area Start -->
<section class="akame-about-area section-padding-80-0" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Section Heading -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="section-heading mb-80 wow fadeInUp" data-wow-delay="200ms"">
                    <h2>Lorem Ipsum</h2>
                    <p>Lorem Ipsum is simply dummy text</p>
                    <span>About Us</span>
                </div>
            </div>

            <!-- About Us Thumbnail -->
            <div class=" col-12 col-md-6 col-lg-4">
                    <div class="mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <img src="<?=base_url('assets/img/essay-home.png');?>" alt="">
                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-lg-4">
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
</section>
<!-- About Area End -->


<!-- Our Service Area Start -->
<section class="akame-service-area section-padding-80-0 bg-light" id="our-service">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Our Services</h2>
                    <p>Lorem Ipsum is simply dummy text of
                        the printing and typesetting industry.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($program as $p): ?>

            <?php if ($p['id_category'] == '1') {?>
            <div class="col-12 col-sm-6 col-lg-4 mx-auto">
                <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="200ms">
                    <div class="float-right" id="trapezoid">
                        <div class="text-white" id="best"><b>BEST SELLER</b></div>
                    </div>
                    <h4><?=$p['program_name'];?></h4>
                    <div id="images">
                        <img src="<?=base_url('upload_files/programs/' . $p['images']);?>"
                            alt="<?=$p['program_name'];?>" width="100%" class="mt-2">
                    </div>
                    <div class="container" style="margin-top:-20px;">
                        <div class="row shadow">
                            <div class="col-md-7 bg-white pt-2 pb-2 text-dark" id="priceList">
                                Rp.
                            </div>
                            <div class="col-md-5 bg-warning pt-2 pb-2 text-white" id="discountList">
                                <del>Rp. </del>
                            </div>
                        </div>
                        <div class="mt-3">
                            <select name="" class="form-control form-control-sm" onChange="get_values()" id="programs">
                                <option value='3'>Chose your word</option>
                                <?php foreach ($essay as $e): ?>
                                <option value="<?=$e['id_program'];?>"><?=$e['minimum_word'];?> -
                                    <?=$e['maximum_word'];?>
                                    Word</option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <hr>
                        <br>
                        <?php
echo form_open(base_url('home/add'));
    ?>
                        <input type="hidden" name="id" id="id_program">
                        <input type="hidden" name="qty" id="qty">
                        <input type="hidden" name="name" id="name">
                        <input type="hidden" name="price" id="price" values="1">
                        <input type="hidden" name="discount" id="discount">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-dark btn-sm mb-1"><i
                                        class="fas fa-paper-plane"></i>&nbsp; Order Now</button>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-block btn-secondary btn-sm mb-1"><i
                                        class="fas fa-search-plus"></i>&nbsp; View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {?>

            <div class="col-12 col-sm-6 col-lg-4 mx-auto">
                <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="200ms">
                    <h4><?=$p['program_name'];?></h4>
                    <img src="<?=base_url('upload_files/programs/' . $p['images']);?>" alt="<?=$p['program_name'];?>"
                        width="100%" class="mt-2">
                    <div class="container" style="margin-top:-20px;">
                        <div class="row">
                            <div class="col-md-7 bg-white pt-2 pb-2 text-dark">
                                Rp. <?=number_format($p['price'], 0, '.', '.');?>
                            </div>
                            <div class="col-md-5 bg-warning pt-2 pb-2 text-white">
                                <del>Rp. <?=number_format($p['discount'] + $p['price'], 0, '.', '.');?></del>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="text-left mb-4">
                            <small class="text-muted float-left"><?=word_limiter($p['description'], 15);?></small>
                        </div>
                        <br><br>
                        <?php
echo form_open(base_url('home/add'));
    echo form_hidden('id', $p['id_program']);
    echo form_hidden('qty', 1);
    echo form_hidden('name', $p['program_name']);
    echo form_hidden('price', $p['price']);
    echo form_hidden('discount', $p['discount']);
    ?>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-dark btn-sm mb-1"><i
                                        class="fas fa-paper-plane"></i>&nbsp; Order Now</button>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-block btn-secondary btn-sm mb-1"><i
                                        class="fas fa-search-plus"></i>&nbsp; View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php echo form_close();endforeach; ?>
        </div>
    </div>
</section>
<!-- Our Service Area End -->

<script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script>
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

function get_values() {
    var program_id = $("#programs").val();
    $("#images").fadeOut('');
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('home/getProgramJson/') ?>' + program_id,
        success: function(data) {
            var json = data,
                obj = JSON.parse(json);
            $("#id_program").val(obj.id_program);
            $("#name").val(obj.program_name);
            $("#price").val(obj.price);
            $("#discount").val(obj.discount);
            $("#priceList").html('Rp. ' + formatNumber(obj.price));
            $("#discountList").html('<del>Rp. ' + formatNumber(obj.discount) + '</del>');
            $("#images").html('<img src="<?=base_url();?>upload_files/programs/' + obj.images +
                '" width = "100%" class = "mt-2">')

            $("#images").fadeIn('');
        }
    })
}
</script>