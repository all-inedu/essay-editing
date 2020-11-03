<div class="container-fluid">
    <div class="row">

        <?php if($this->session->userdata('position')=='3'){?>
        <!-- ALL ESSAYS -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header  text-center font-weight-bold">
                    <h5>ALL ESSAYS</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="allEssay" height="100px"></canvas>
                            <hr>
                            <a href="<?=base_url('editor/all-essay/lists/1-days');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 col-sm-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning1.png');?>" width="50%">
                                        </div>
                                        <div class="col-8 col-md-8 bg-danger p-3">
                                            <div class="text-right text-white">
                                                <h4 class="font-weight-bold">DO TOMORROW</h4>
                                                <h3><?=$allessay1;?> ESSAYS</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url('editor/all-essay/lists/3-days');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning2.png');?>" width="50%"
                                                class="mt-3">
                                        </div>
                                        <div class="col-8 col-md-8 bg-warning p-3">
                                            <div class="text-right text-white">
                                                <h6 class="font-weight-bold">DUE WITHIN 3 DAYS</h6>
                                                <h5><?=$allessay2;?> ESSAYS</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url('editor/all-essay/lists/5-days');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning3.png');?>" width="50%"
                                                class="mt-3">
                                        </div>
                                        <div class="col-8 col-md-8 bg-info p-3">
                                            <div class="text-right text-white">
                                                <h6 class="font-weight-bold">DUE WITHIN 5 DAYS</h6>
                                                <h5><?=$allessay3;?> ESSAYS</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart1" height="100px"></canvas>
                                    <div class="text-center mt-1 font-weight-bold"><?=date('D, d-m-Y');?> | Total :
                                        <?=$allProcess+$allCompleted;?> Essays</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- YOUR ESSAYS -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h5>YOUR ESSAYS</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="yourEssay" height="100px"></canvas>
                            <hr>
                            <a href="<?=base_url('editor/essay-list');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning1.png');?>" width="50%">
                                        </div>
                                        <div class="col-8 col-md-8 bg-danger p-3">
                                            <div class="text-right text-white">
                                                <h4 class="font-weight-bold">DO TOMORROW</h4>
                                                <h3><?=$youressay1;?> ESSAYS</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url('editor/essay-list');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning2.png');?>" width="50%"
                                                class="mt-3">
                                        </div>
                                        <div class="col-8 col-md-8 bg-warning p-3">
                                            <div class="text-right text-white">
                                                <h6 class="font-weight-bold">DUE WITHIN 3 DAYS</h6>
                                                <h5><?=$youressay2;?> ESSAYS</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url('editor/essay-list');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class=" col-4 col-md-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning3.png');?>" width="50%"
                                                class="mt-3">
                                        </div>
                                        <div class="col-8 col-md-8 bg-info p-3">
                                            <div class="text-right text-white">
                                                <h6 class="font-weight-bold">DUE WITHIN 5 DAYS</h6>
                                                <h5><?=$youressay3;?> ESSAYS</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 mb-2 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart2" height="100%"></canvas>
                                    <div class="text-center mt-1 font-weight-bold"><?=date('D, d-m-Y');?> | Total :
                                        <?=$process+$completed;?> Essays</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } else {?>
        <!-- YOUR ESSAYS -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h5>YOUR ESSAYS</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="yourEssay" height="100px"></canvas>
                            <hr>
                            <a href="<?=base_url('editor/essay-list');?>" class="text-decoration-none">
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-4 col-md-4 col-sm-4 bg-light text-center p-3 border">
                                            <img src="<?=base_url('assets/img/warning1.png');?>" width="50%">
                                        </div>
                                        <div class="col-8 col-md-8 bg-danger p-3">
                                            <div class="text-right text-white">
                                                <h4 class="font-weight-bold">DO TOMORROW</h4>
                                                <h3><?=$youressay1;?> ESSAYS</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?=base_url('editor/essay-list');?>"
                                        class="text-decoration-none">
                                        <div class="p-2">
                                            <div class="row">
                                                <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                                    <img src="<?=base_url('assets/img/warning2.png');?>" width="50%"
                                                        class="mt-3">
                                                </div>
                                                <div class="col-8 col-md-8 bg-warning p-3">
                                                    <div class="text-right text-white">
                                                        <h6 class="font-weight-bold">DUE WITHIN 3 DAYS</h6>
                                                        <h5><?=$youressay2;?> ESSAYS</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?=base_url('editor/essay-list');?>"
                                        class="text-decoration-none">
                                        <div class="p-2">
                                            <div class="row">
                                                <div class="col-4 col-md-4 bg-light text-center p-3 border">
                                                    <img src="<?=base_url('assets/img/warning3.png');?>" width="50%"
                                                        class="mt-3">
                                                </div>
                                                <div class="col-8 col-md-8 bg-info p-3">
                                                    <div class="text-right text-white">
                                                        <h6 class="font-weight-bold">DUE WITHIN 5 DAYS</h6>
                                                        <h5><?=$youressay3;?> ESSAYS</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-2" style=";">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart2" height="150%"></canvas>
                                        <div class="text-center mt-3 font-weight-bold">
                                            <h6><?=date('D, d/m/Y');?> | Total :
                                                <?=$process+$completed;?> Essays </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<!-- /.container-fluid -->
<?php 
    $today = date('Y-m-d');
    $dueDate = date('Y-m-d', strtotime('+5 days', strtotime($today)));
?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script>
var ctx = document.getElementById('myChart1');
var myChart1 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Ongoing', 'Completed'],
        datasets: [{
            label: '',
            data: ['<?=$allProcess;?>', '<?=$allCompleted;?>'],
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
<script>
var ct = document.getElementById('myChart2');
var myChart2 = new Chart(ct, {
    type: 'doughnut',
    data: {
        labels: ['Ongoing', 'Completed'],
        datasets: [{
            label: '',
            data: ['<?=$process;?>', '<?=$completed;?>'],
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
<script>
Chart.scaleService.updateScaleDefaults('linear', {
    ticks: {
        min: 0,
        stepSize: 1
    }
});

var ct = document.getElementById('allEssay');
var myChart3 = new Chart(ct, {
    type: 'horizontalBar',
    data: {
        labels: ['Do Tomorrow', 'Due Within 3 Days', 'Due Within 5 Days'],
        datasets: [{
            label: 'ALL ESSAYS',
            data: ['<?=$allessay1;?>', '<?=$allessay2;?>', '<?=$allessay3;?>'],
            backgroundColor: [
                'rgba(231, 74, 59, 0.9)',
                'rgba(246, 194, 62, 0.9)',
                'rgba(54, 185, 204, 0.9)',
            ],
            borderColor: [
                'rgba(231, 74, 59, 1)',
                'rgba(246, 194, 62, 1)',
                'rgba(54, 185, 204, 1)',
            ]
        }]
    }
});
</script>
<script>
var ct = document.getElementById('yourEssay');
var myChart4 = new Chart(ct, {
    type: 'horizontalBar',
    data: {
        labels: ['Do Tomorrow', 'Due Within 3 Days', 'Due Within 5 Days'],
        datasets: [{
            label: 'YOUR ESSAYS',
            data: ['<?=$youressay1;?>', '<?=$youressay2;?>', '<?=$youressay3;?>'],
            backgroundColor: [
                'rgba(231, 74, 59, 0.9)',
                'rgba(246, 194, 62, 0.9)',
                'rgba(54, 185, 204, 0.9)',
            ],
            borderColor: [
                'rgba(231, 74, 59, 1)',
                'rgba(246, 194, 62, 1)',
                'rgba(54, 185, 204, 1)',
            ]
        }]
    }
});
</script>