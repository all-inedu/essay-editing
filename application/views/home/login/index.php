<style>
section {
    height: 500px;
}

.card-design {
    background: linear-gradient(to bottom, #fff 0%, #dedede 100%);
}

.card-menus {
    transition-duration: 0.5s;
}

.card-menus:hover {
    margin-right: -10px;
    margin-left: -10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

@media only screen and (max-width: 600px) {
    .card-menus {
        transition-duration: 0.5s;
        margin-top: 20px;
    }

    .card-menus:hover {
        margin-right: -10px;
        margin-left: -10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    section {
        height: auto;
    }
}
</style>
<section class="akame-service-area pt-4 pb-5" style="background: #9CECFB;
background: -webkit-linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);
background: linear-gradient(to left, #0052D4, #65C7F7, #9CECFB);">
    <div class=" container mt-5 mb-5">
        <h3 class="text-center  text-white">Login as </h3>
        <hr width="30%" class="mx-auto mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-3 mb-5 pl-4 pr-4" style="margin-top:50px;">
                <div class="card-menus">
                    <a href="<?=base_url('login/auth/students');?>" title="Login as Students">
                        <div class="card text-center">
                            <div class="card-body card-design">
                                <img src="<?=base_url('assets/img/users/students.jpg');?>" alt="" width="70%"
                                    class="mx-auto rounded-circle shadow bg-light p-3" style="margin-top:-40%">
                            </div>
                            <div class="card-footer">
                                <h6>Student</h6>
                                <hr width="30%" class="mt-1 mb-1 mx-auto">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 mb-5 pl-4 pr-4" style="margin-top:50px;">
                <div class="card-menus">
                    <a href=" <?=base_url('login/auth/editors');?>" title="Login as Editors">
                        <div class="card  text-center">
                            <div class="card-body card-design">
                                <img src="<?=base_url('assets/img/users/editors.jpg');?>" alt="" width="70%"
                                    class="mx-auto shadow rounded-circle bg-light p-3" style="margin-top:-40%">
                            </div>
                            <div class="card-footer">
                                <h6>Editor</h6>
                                <hr width="30%" class="mt-1 mb-1 mx-auto">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 mb-5 pl-4 pr-4" style="margin-top:50px;">
                <div class="card-menus">
                    <a href="<?=base_url('login/auth/mentors');?>" title="Login as Mentors">
                        <div class="card text-center">
                            <div class="card-body card-design">
                                <img src="<?=base_url('assets/img/users/mentors.png');?>" alt="" width="70%"
                                    class="mx-auto shadow rounded-circle bg-light p-3" style="margin-top:-40%">
                            </div>
                            <div class="card-footer">
                                <h6>Mentor</h6>
                                <hr width="30%" class="mt-1 mb-1 mx-auto">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>