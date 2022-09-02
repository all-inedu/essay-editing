<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header4">
                        <div class="float-left mt-1">
                            <i class="far fa-clock"></i>&nbsp; Status
                        </div>
                        <div class="float-right">
                            <div class="dropdown">
                                <button class="btn btn-sm m-0" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-info-circle text-white" data-toggle="tooltip" data-placement="left"
                                        title="Status Detail"></i>
                                </button>
                                <?php if($history){?>
                                <div class="dropdown-menu shadow dropdown-menu-right dropdown-menu-primary"
                                    aria-labelledby="dropdownMenuButton">
                                    <?php foreach($history as $h):?>
                                    <p class="dropdown-item text-center">
                                        <small><?=$h['status_desc'];?></small><br>
                                        <small><?=date('d M Y - H:i:s', strtotime($h['created_at']));?></small>
                                    </p>
                                    <div class="dropdown-divider"></div>
                                    <?php endforeach;?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <?php if (($status['status'] == '0') OR ($status['status'] == '4') OR ($status['status'] == '5')) {?>
                        <span style="font-size: 3em; color: Tomato;"><i class="fas fa-hourglass-start"></i></span>
                        <hr width="70%">
                        <h5>Waiting</h5>
                        <?php } else if ($status['status'] == '1') {?>
                        <span style="font-size: 3em; color: orange;"><i class="fas fa-hourglass-start"></i></span>
                        <hr width="70%">
                        <h5>Ongoing</h5>
                        <hr>
                        <small> Editor Name : </small><br>
                        <h6><?=$essay_editors['first_name'].' '.$essay_editors['last_name'];?></h6>
                        <?php } else if (($status['status'] == '2') OR ($status['status'] == '3')OR ($status['status'] == '6') OR ($status['status'] == '8')) {?>
                        <span style="font-size: 3em; color: Orange;"><i class="fas fa-hourglass-end"></i></span>
                        <hr width="70%">
                        <h6>Ongoing</h6>
                        <hr>
                        <small> Editor Name : </small><br>
                        <h6><?=$essay_editors['first_name'].' '.$essay_editors['last_name'];?></h6>
                        <?php } else if (($status['status'] == '7')) { ?>
                        <span style="font-size: 3em; color: Green;"><i class="far fa-check-circle"></i></span>
                        <hr width="70%">
                        <h6>Completed</h6>
                        <hr>
                        <small> Editor Name : </small><br>
                        <h6><?=$essay_editors['first_name'].' '.$essay_editors['last_name'];?></h6>
                        <?php } else {?>
                        <span style="font-size: 3em; color: Mediumslateblue;"><i class="fas fa-file-upload"></i></span>
                        <hr width="70%">
                        <h5>Upload Your File</h5>
                        <?php }?>
                    </div>
                </div>

                <?php if (isset($essay)) { ?>
                <div class="card mb-2">
                    <div class="text-center p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>" alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-success">
                        <a href="<?=base_url('upload_files/program/essay/students/' . $essay['attached_of_clients']);?>"
                            class="btn btn-sm btn-block text-light">Download Your File</a>
                    </div>
                </div>
                <?php } ?>

                <!-- Verified -->
                <?php if ($status['status'] == '7') {?>
                <div class="card mb-2">
                    <div class="text-center  p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>" alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-primary">
                        <?php if($essay_editors['managing_file']) { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/revised/' . $essay_editors['managing_file']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's Essay</a>
                        <?php } else { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/editors/' . $essay_editors['attached_of_editors']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's Essay</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <label class="text-dark">Tags :</label>
                        <br>
                        <?php foreach($tags as $tg): ?>
                        <small class="badge badge-dark">#<?=$tg['topic_name'];?></small>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <hr>
                    <div class="col-md-12" style="font-size:11px;">
                        <?php if (($essay['status_essay_clients']=='7')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <b>Thank you</b>, your essay has been completed.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                style="margin-top:-5px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } else if (isset($essay)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="spinner-border spinner-border-sm text-warning" role="status">
                                <span class="sr-only">Loading...</span>
                            </div> &nbsp;
                            <b>Please wait</b>, Your essay is being processed.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                style="margin-top:-5px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="card mb-2">
                    <div class="card-header">
                        <div class="float-left mt-2"><i class="fas fa-users"></i>&nbsp; Basic Info</div>
                        <div class="float-right">
                            <a href="<?=base_url('mentor/essay-list');?>"
                                class="btn btn-sm btn-light text-decoration-none text-dark"><i
                                    class="fas fa-arrow-left"></i></a>
                            <a href="<?=base_url('mentor/essay-list/delete/') . $essay['id_essay_clients'];?>"
                                class="text-danger btn btn-sm btn-light delete-button ml-1" title="Delete"
                                data-message="essay"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-sm text-dark">
                            <tr>
                                <td width="15%">Full Name</td>
                                <td width="1%">:</td>
                                <td><?=$user['first_name'].' '.$user['last_name'];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?=$user['email'];?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$user['address'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="card mb-4" style="font-size:13px;">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Essay Detail
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-sm text-dark">
                            <tr>
                                <td width="15%">Essay Title</td>
                                <td class="align-middle" width="1%">:</td>
                                <td class="align-middle"><?=$program['category_name'];?> Editing
                                    (<?=$program['minimum_word'].' - '.$program['maximum_word'];?> Words)</td>
                            </tr>
                            <tr>
                                <td width="15%">University Name</td>
                                <td class="align-middle" width="1%">:</td>
                                <td class="align-middle"><?=$essay['university_name'];?></td>
                            </tr>
                            <?php if ($status['status'] != '7') {?>
                            <tr>
                                <td width="15%">Request (Editor)</td>
                                <td class="align-middle" width="1%">:</td>
                                <td class="align-middle">
                                    <?php 
                                    if($essay['id_editors']>0) {
                                        $req = $this->Editors_model->getAllEditorsById($essay['id_editors']);
                                        echo $req['first_name'].' '.$req['last_name'];
                                    } else {
                                        echo '-';
                                    }
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td width="15%">Essay Type</td>
                                <td class="align-middle" width="1%">:</td>
                                <td class="align-middle"><?=$essay['essay_title'];?></td>
                            </tr>
                            <tr>
                                <td width="15%">Date</td>
                                <td class="" width="1%">:</td>
                                <td class="">
                                    <p class="font-weight-bold"><i class="fa fa-calendar"></i> &nbsp; Essay Deadline :
                                        <?=date('D, d M Y', strtotime($essay['essay_deadline']));?></p>
                                    <p class="font-weight-bold"><i class="fa fa-calendar"></i> &nbsp; Application
                                        Deadline : <?=date('D, d M Y', strtotime($essay['application_deadline']));?></p>

                                </td>
                            </tr>
                            <tr>
                                <td width="15%">Essay Prompt</td>
                                <td width="1%">:</td>
                                <td><?=$essay['essay_prompt'];?></td>
                            </tr>
                            <?php if (($essay['status_essay_clients']=='7')) { ?>
                            <tr>
                                <td width="15%">Editor Upload Date</td>
                                <td class="" width="1%">:</td>
                                <td class="">
                                    <p class="font-weight-bold"><i class="fa fa-calendar"></i> &nbsp;
                                        <?=date('D, d M Y', strtotime($essay_editors['uploaded_at']));?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle" width="15%">Essay Status</td>
                                <td class="align-middle" width="1%">:</td>
                                <td class="align-middle">
                                    <?=$status_essay;?>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Essay Rating -->
<?php if (($essay['status_essay_clients']=='7') AND (empty($feedback))) { ?>
<div class="row" style="margin-top:-5px;">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="card mb-5 bg-white">
                <div class="card-body pt-5">
                    <form action="<?=base_url();?>mentor/essay-list/feedback/<?=$essay['id_essay_clients'];?>"
                        method="post" name="feedback">
                        <h5 class="text-dark">Please give us your feedback
                        </h5>
                        <br>
                        <input name="id" value="<?=$essay['id_essay_clients'];?>" hidden></input>

                        <input name="prog" value="<?=$essay['id_program'];?>" hidden></input>
                        <table width="100%" class="table table-hover">
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Turn around time.</div>
                                    <small class="text-dark">How long does it take for the editors to edit and then
                                        return the
                                        essays.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option1" name="option1" value="5" />
                                        <label for="5-option1" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option1" name="option1" value="4" />
                                        <label for="4-option1" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option1" name="option1" value="3" />
                                        <label for="3-option1" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option1" name="option1" value="2" />
                                        <label for="2-option1" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option1" name="option1" value="1" />
                                        <label for="1-option1" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option1', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Specificity of feedback.</div>
                                    <small class="text-dark">How helpful is the feedback.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option2" name="option2" value="5" />
                                        <label for="5-option2" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option2" name="option2" value="4" />
                                        <label for="4-option2" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option2" name="option2" value="3" />
                                        <label for="3-option2" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option2" name="option2" value="2" />
                                        <label for="2-option2" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option2" name="option2" value="1" />
                                        <label for="1-option2" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option2', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Clarity of feedback.</div>
                                    <!-- <small>How helpful is the feedback.</small> -->
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option3" name="option3" value="5" />
                                        <label for="5-option3" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option3" name="option3" value="4" />
                                        <label for="4-option3" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option3" name="option3" value="3" />
                                        <label for="3-option3" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option3" name="option3" value="2" />
                                        <label for="2-option3" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option3" name="option3" value="1" />
                                        <label for="1-option3" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option3', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">How encouraged do you feel from the feedback.</div>
                                    <small class="text-dark">How the editor speaks with the client AKA customer
                                        service.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option4" name="option4" value="5" />
                                        <label for="5-option4" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option4" name="option4" value="4" />
                                        <label for="4-option4" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option4" name="option4" value="3" />
                                        <label for="3-option4" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option4" name="option4" value="2" />
                                        <label for="2-option4" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option4" name="option4" value="1" />
                                        <label for="1-option4" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option4', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Do they help you grow as a writer/did you learn anything
                                        new.
                                    </div>
                                    <!-- <small>How the editor speaks with the client AKA customer service.</small> -->
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option5" name="option5" value="5" />
                                        <label for="5-option5" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option5" name="option5" value="4" />
                                        <label for="4-option5" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option5" name="option5" value="3" />
                                        <label for="3-option5" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option5" name="option5" value="2" />
                                        <label for="2-option5" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option5" name="option5" value="1" />
                                        <label for="1-option5" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option5', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">How likely would you recommend this editor to others?
                                    </div>
                                    <!-- <small>How the editor speaks with the client AKA customer service.</small> -->
                                </td>
                                <td class="align-middle">
                                    <div class="star-rating">
                                        <input type="radio" id="5-option6" name="option6" value="5" />
                                        <label for="5-option6" class="star">&bigstar;</label>
                                        <input type="radio" id="4-option6" name="option6" value="4" />
                                        <label for="4-option6" class="star">&bigstar;</label>
                                        <input type="radio" id="3-option6" name="option6" value="3" />
                                        <label for="3-option6" class="star">&bigstar;</label>
                                        <input type="radio" id="2-option6" name="option6" value="2" />
                                        <label for="2-option6" class="star">&bigstar;</label>
                                        <input type="radio" id="1-option6" name="option6" value="1" />
                                        <label for="1-option6" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option6', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="text-dark">Additional Comments</label>
                                    <textarea name="add_comments" rows="6"
                                        class="form-control form-control-sm"></textarea>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary"><i
                                    class="far fa-paper-plane"></i>&nbsp; Send Your Feedback</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>

<!--<script>-->
<!--function programs() {-->
<!--    $("#programs").load(" #programs");-->
<!--    console.log('test');-->
<!--}-->

<!--setInterval(programs, 180000);-->
<!--</script>-->