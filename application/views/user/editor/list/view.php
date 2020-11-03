<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?=form_open_multipart('admin/editors/update');?>
            <?=form_hidden('id_editors',$editors['id_editors']);?>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="main-img-preview text-center">
                        <img class="thumbnail img-preview"
                            src="<?=base_url('upload_files/user/editors/'.$editors['image']);?>" title="Preview Logo"
                            width="200px" height="auto">
                    </div>
                </div>
            </div>
            <div class="card mb-2">

                <div class="card-body text-center">
                    <h1 id="complete" class="font-weight-bold"></h1>
                    <h6>Completed Essays</h6>
                </div>

            </div>
            <div class="card mb-2">
                <div class="card-body text-center">
                    <input type="text" id="number" hidden>
                    <input type="text" id="sum" hidden>
                    <div class="text-center">
                        <h1 id="avg"></h1>
                    </div>
                    <hr>
                    <fieldset class="rate">
                        <input id="rate2-star5" type="radio" name="rate2" disabled value="5" />
                        <label for="rate2-star5" title="Awesome">5</label>

                        <input id="rate2-star4-half" type="radio" name="rate2" disabled value="4.5" />
                        <label class="star-half" for="rate2-star4-half" title="Excellent">4.5</label>

                        <input id="rate2-star4" type="radio" name="rate2" disabled value="4" />
                        <label for="rate2-star4" title="Very good">4</label>

                        <input id="rate2-star3-half" type="radio" name="rate2" disabled value="3.5" />
                        <label class="star-half" for="rate2-star3-half" title="Good">3.5</label>

                        <input id="rate2-star3" type="radio" name="rate2" disabled value="3" />
                        <label for="rate2-star3" title="Satisfactory">3</label>

                        <input id="rate2-star2-half" type="radio" name="rate2" disabled value="2.5" />
                        <label class="star-half" for="rate2-star2-half" title="Unsatisfactory">2.5</label>

                        <input id="rate2-star2" type="radio" name="rate2" disabled value="2" />
                        <label for="rate2-star2" title="Bad">2</label>

                        <input id="rate2-star1-half" type="radio" name="rate2" disabled value="1.5" />
                        <label class="star-half" for="rate2-star1-half" title="Very bad">1.5</label>

                        <input id="rate2-star1" type="radio" name="rate2" disabled value="1" />
                        <label for="rate2-star1" title="Awful">1</label>

                        <input id="rate2-star0-half" type="radio" name="rate2" disabled value="0.5" />
                        <label class="star-half" for="rate2-star0-half" title="Horrific">0.5</label>
                    </fieldset>
                    <hr>
                    <div id="title-star"></div>
                </div>
            </div>


        </div>
        <div class="col-md-9">
            <div class="card mb-3 animated--grow-in">
                <div class="card-header">
                    <div class="float-left pt-2"><i class="fas fa-file-upload"></i>&nbsp;
                        View Profile
                    </div>
                    <a href="<?=base_url('editor/lists');?>"
                        class="btn btn-sm btn-outline-primary float-right text-white"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">First Name </label>
                            <input type="text" name="first_name" class="form-control form-control-sm"
                                value="<?=$editors['first_name'];?>" readonly>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-sm"
                                value="<?=$editors['last_name'];?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">Email </label>
                            <input type="text" name="email" class="form-control form-control-sm"
                                value="<?=$editors['email'];?>" readonly>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">Phone </label>
                            <input type="text" name="phone" class="form-control form-control-sm"
                                value="<?=$editors['phone'];?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">Graduated From </label>
                            <input type="text" name="graduated_from" class="form-control form-control-sm"
                                value="<?=$editors['graduated_from'];?>" readonly>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="text-dark">Major </label>
                            <input type="text" name="major" class="form-control form-control-sm"
                                value="<?=$editors['major'];?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="text-dark">Address </label>
                            <textarea rows=4 name="addres" class="form-control form-control-sm" readonly><?=$editors['address'];?>
                                 </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="text-dark">Position </label>
                            <input type="text" value="<?=$editors['position_name'];?>"
                                class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="process-tab" data-toggle="tab" href="#process"
                                role="tab">Processed &nbsp;
                                <small class="badge badge-info"><?=count($process);?>
                                </small>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab"
                                aria-controls="profile" aria-selected="false">Completed&nbsp;
                                <small class="badge badge-success"><?=count($completed);?>
                                </small>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="process" role="tabpanel">

                            <table class="table table-bordered table-hover" id="dataTable1" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Student Name</th>
                                        <th>Program Name</th>
                                        <th>Essay Title</th>
                                        <th>Essay Deadline</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;foreach ($process as $e): ?>
                                    <tr>
                                        <td class=" text-center align-middle"><?=$no;?></td>
                                        <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                                        <td class="align-middle"><?=$e['category_name'];?> Editing
                                            (<?=$e['minimum_word'].' - '.$e['maximum_word'].' Words)';?></td>
                                        <td class="align-middle"><?=$e['essay_title'];?></td>
                                        <td class="align-middle"><?=date('d/m/Y', strtotime($e['essay_deadline']));?>
                                        </td>
                                        <td class="align-middle"><?=$e['status_title'];?>
                                        </td>
                                    </tr>
                                    <?php $no++;endforeach;?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                            <table class="table table-bordered table-hover" id="dataTable2" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Student Name</th>
                                        <th>Program Name</th>
                                        <th>Essay Title</th>
                                        <th>Essay Deadline</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;foreach ($completed as $e): ?>
                                    <tr>
                                        <td class=" text-center align-middle"><?=$no;?></td>
                                        <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                                        <td class="align-middle"><?=$e['category_name'];?> Editing
                                            (<?=$e['minimum_word'].' - '.$e['maximum_word'].' Words)';?></td>
                                        <td class="align-middle"><?=$e['essay_title'];?></td>
                                        <td class="align-middle"><?=date('d/m/Y', strtotime($e['essay_deadline']));?>
                                        </td>
                                        <td class="align-middle"><?=$e['essay_rating'];?>/<small>5</small>
                                        </td>
                                    </tr>
                                    <?php $no++;endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $id = $editors['id_editors']; ?>
<script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script>
function completeEssay() {
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '<?=base_url();?>admin/admin-json/completeEssayByEditors/<?=$id;?>',
        dataType: 'json',
        success: function(data) {
            $('#complete').html(data.length);
        }
    });
}
setInterval(completeEssay, 5000);
completeEssay();

function get_average() {
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '<?=base_url();?>admin/admin-json/numberOfRating/<?=$id;?>',
        dataType: 'json',
        success: function(data) {
            $('#number').val(data.length);
        }
    });

    $.ajax({
        type: 'ajax',
        method:'get',
        url: '<?=base_url();?>admin/admin-json/sumOfRating/<?=$id;?>',
        dataType: 'json',
        success: function(data) {
            $('#sum').val(data.essay_rating)
        }
    });
}

setInterval(get_average, 5000);
get_average();

function averageRating() {
    var number = $('#number').val()
    var sum = $('#sum').val()
    var avg = sum / number;
    var fixed = avg.toFixed(1);

    if (avg) {
        $('#avg').html('<h1><b>' + fixed + '</b> <small>/ 5</small></h1>');
    } else {
        $('#avg').html('<h1><b>0</b> <small>/ 5</small></h1>');
    }


    if (fixed >= 0.5 & fixed <= 0.9) {
        document.getElementById("rate2-star0-half").checked = true;
        $('#title-star').html('<h3>Horrific</h3>');
    } else
    if (fixed >= 1 & fixed <= 1.4) {
        document.getElementById("rate2-star1").checked = true;
        $('#title-star').html('<h3>Awful</h3>');
    } else
    if (fixed >= 1.5 & fixed <= 1.9) {
        document.getElementById("rate2-star1-half").checked = true;
        $('#title-star').html('<h3>Very Bad</h3>');
    } else
    if (fixed >= 2 & fixed <= 2.4) {
        document.getElementById("rate2-star2").checked = true;
        $('#title-star').html('<h3>Bad</h3>');
    } else
    if (fixed >= 2.5 & fixed <= 2.9) {
        document.getElementById("rate2-star2-half").checked = true;
        $('#title-star').html('<h3>Unsatisfactory</h3>');
    } else
    if (fixed >= 3 & fixed <= 3.4) {
        document.getElementById("rate2-star3").checked = true;
        $('#title-star').html('<h3>Satisfactory</h3>');
    } else
    if (fixed >= 3.5 & fixed < 4) {
        document.getElementById("rate2-star3-half").checked = true;
        $('#title-star').html('<h3>Good</h3>');
    } else
    if (fixed >= 4 & fixed <= 4.4) {
        document.getElementById("rate2-star4").checked = true;
        $('#title-star').html('<h3>Very Good</h3>');
    } else
    if (fixed >= 4.5 & fixed <= 4.9) {
        document.getElementById("rate2-star4-half").checked = true;
        $('#title-star').html('<h3>Excellent</h3>');
    } else
    if (fixed == 5) {
        document.getElementById("rate2-star5").checked = true;
        $('#title-star').html('<h3>Awesome</h3>');
    }
}
setInterval(averageRating, 2000);
averageRating();
</script>