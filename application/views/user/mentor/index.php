<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-7">
            <h3>Welcome</h3>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('mentor/essay-list');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header4 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/list-dash.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Ongoing</p>
                                <h3 class="card-title"><?=$ongoing;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fa fa-check-square fa-fw text-primary"></i> <small class="text-danger">See
                                        the
                                        list of
                                        ongoing
                                        essays.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('mentor/essay-list#completed');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header4 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/list-dash2.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Completed</p>
                                <h3 class="card-title"><?=$completed;?>
                                    <small>Essay</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fa fa-check-square fa-fw text-success"></i> <small class="text-danger">See
                                        the
                                        list of
                                        completed
                                        essays.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('mentor/students');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header3 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/users.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">Students</p>
                                <h3 class="card-title"><?=$students;?>
                                    <small>Student</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fa fa-users fa-fw text-info"></i> <small class="text-danger">See
                                        your student list.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?=base_url('mentor/program/essay');?>" class="text-decoration-none">
                        <div class="card-db card-stats">
                            <div class="card-header2 card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"><img src="<?=base_url('assets/img/add.png');?>"
                                            width="50"></i>
                                </div>
                                <p class="card-category">New Request</p>
                                <h3 class="card-title">
                                    <small>Essay Editing</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-cloud-upload-alt fa-fw text-warning"></i> <small
                                        class="text-danger">Upload
                                        your
                                        essay.</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    YOUR ESSAYS
                </div>
                <div class="card-body">
                    <canvas id="myChart1" height="170"></canvas>
                    <div class="text-center mt-3 font-weight-bold"><?=date('D, d-m-Y');?> | Total :
                        <?=$ongoing+$completed;?> Essays</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script>
var ctx = document.getElementById('myChart1');
var myChart1 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Ongoing', 'Completed'],
        datasets: [{
            label: '',
            data: ['<?=$ongoing;?>', '<?=$completed;?>'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.9)',
                'rgba(54, 162, 235, 0.9)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ]
        }]
    },
    options: {
        legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)',
                boxWidth: 10,
            }
        }
    }
});
</script>