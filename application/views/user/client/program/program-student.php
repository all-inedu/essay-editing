<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header2">
                        <div class="float-left mt-1">
                            <i class="far fa-clock"></i>&nbsp; Status
                        </div>
                        <div class="float-right">
                            <div class="dropdown">
                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
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
                        <span style="font-size: 3em; color: orange;"><i class="fas fa-hourglass-half"></i></span>
                        <hr width="70%">
                        <h5>Asigned to Editors</h5>
                        <hr>
                        <small> Essay Editors Name : </small>
                        <h6><?=$essay_editors['first_name'].' '.$essay_editors['last_name'];?></h6>
                        <?php } else if (($status['status'] == '2') OR ($status['status'] == '3')OR ($status['status'] == '6') OR ($status['status'] == '8')) {?>
                        <span style="font-size: 3em; color: Green;"><i class="far fa-check-circle"></i></span>
                        <hr width="70%">
                        <h6>Accepted and Ongoing</h6>
                        <hr>
                        <small> Essay Editors Name : </small>
                        <h6><?=$essay_editors['first_name'].' '.$essay_editors['last_name'];?></h6>
                        <?php } else if (($status['status'] == '7')) { ?>
                        <span style="font-size: 3em; color: Green;"><i class="far fa-check-circle"></i></span>
                        <hr width="70%">
                        <h6>Verified</h6>
                        <hr>
                        <small> Essay Editors Name : </small>
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
                        <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/68-word-512.png"
                            alt="..." width="30%">
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
                        <img src="https://cdn1.iconfinder.com/data/icons/ms-word-docs/512/edit_blue-512.png" alt="..."
                            width="30%">
                    </div>
                    <div class="card-footer bg-primary">
                        <a href="<?=base_url('upload_files/program/essay/editors/' . $essay_editors['attached_of_editors']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's File</a>
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-body">
                        <label class="text-dark">Tags :</label>
                        <br>
                        <?php foreach($tags as $tg): ?>
                        <small class="text-primary">#<?=$tg['topic_name'];?>,</small>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-9">
                <div class=" card mb-2">
                    <div class="card-header3">
                        <i class="fas fa-tasks"></i>&nbsp; Basic Info
                        <div class="float-right">
                            <a href="<?=base_url('student/programs');?>" class="text-decoration-none text-dark"><i
                                    class="far fa-arrow-alt-circle-left"></i> &nbsp;
                                Back To List</a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table class="table table-borderless table-sm text-dark" style="font-size:13px;">
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
                        <i class="fas fa-tasks"></i>&nbsp; Essay Prompt
                    </div>
                    <div class="card-body ">
                        <?=form_open_multipart('student/programs/essay/' . $code . '/' . $program['id_program']);?>
                        <?=form_hidden('trans', $code);?>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="text-dark">Program Name :</label>
                                    <input readonly type="hidden" name="id" value="<?=$program['id_program'];?>">
                                    <input readonly type="text" value="<?=$program['description'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="text-dark">Number of Words :</label>
                                <?php if (isset($essay)) {?>
                                <input name="words" type="number" min="<?=$program['minimum_word'];?>"
                                    max="<?=$program['maximum_word'];?>" class="form-control form-control-sm"
                                    value="<?=$essay['number_of_words'];?>" readonly>
                                <?php } else { ?>
                                <input name="words" type="number" min="<?=$program['minimum_word'];?>"
                                    max="<?=$program['maximum_word'];?>" class="form-control form-control-sm">
                                <?php } ?>
                                <?=form_error('words', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="text-dark">University Name : <span class="text-danger">*</span></label>
                                <?php if (isset($essay)) {?>
                                <input readonly type="text" name="trans" value="<?=$essay['university_name'];?>"
                                    class="form-control form-control-sm">
                                <?php } else {?>
                                <select type="text" name="univ_name" id="univ" style="font-size:14px;">
                                    <option value="">Select university name.</option>
                                    <?php foreach ($univ as $univ): ?>
                                    <option value="<?php echo $univ['id_univ']; ?>">
                                        <?php echo $univ['university_name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('univ_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');}?>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="text-dark">Title : <span class="text-danger">*</span></label>
                                <?php if (isset($essay)) {?>
                                <input readonly type="text" name="trans" value="<?=$essay['title'];?>"
                                    class="form-control form-control-sm">
                                <?php } else {?>
                                <select type="text" name="title" id="prompt" onChange="get_values()">
                                    <option value="">Select essay prompt.</option>
                                    <?php foreach ($prompt as $p): ?>
                                    <option class="<?php echo $p['id_univ']; ?>"
                                        value="<?php echo $p['id_essay_prompt']; ?>">
                                        <?php echo $p['title']; ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('title', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');}?>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label class="text-dark">Description : <span class="text-danger">*</span></label>
                            <?php if (isset($essay)) {?>
                            <textarea name="description" id="desc" class="form-control form-control-sm" rows="4"
                                disabled><?=$essay['description'];?>
                    </textarea>
                            <?php } else {?>
                            <textarea name="description" id="desc" class="form-control form-control-sm" rows="4"
                                disabled>
                    </textarea>
                            <?php }?>
                        </div>
                        <?php if (isset($essay)) {} else {?>
                        <div class="form-group">
                            <label class="text-dark">Notes : </label>
                            <small><i>
                                    <div id="notes"></div>
                                </i></small>
                        </div>
                        <?php }?>
                        <div class="row">
                            <div class="col-md-6 mt-1" <?php if (isset($essay)) { echo 'hidden';}?>>
                                <div class="input-group">
                                    <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                                        placeholder="Choose File" disabled="disabled">
                                    <div class="input-group-btn btn-group-sm">
                                        <div class="fileUpload btn bg-dark text-light fake-shadow"
                                            style="margin-left:-20px;">
                                            <span><i class="fas fa-upload"></i></span>
                                            <input id="logo-id" name="files" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($essay)) {} else {?>
                            <div class="col-md-6 align-middle">
                                <small>Please, upload your essay according to the description you have
                                    chosen.</small><br>
                                <small>document extension must be docx.</small>
                            </div>
                            <?php }?>
                        </div>
                        <hr>

                        <div class="row mt-3">
                            <div class="col-md-12 text-center" <?php if (isset($essay)) {echo 'hidden';}?>>
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fas fa-cloud-upload-alt"></i>&nbsp; Upload Your Essay</button>
                            </div>
                            <div class="col-md-12 text-center">
                                <?php if (($essay['status_essay_clients']=='7')) { ?>
                                Thank You <br>
                                <a href="#">Your essay has been successfully edited.</a>
                                <?php } else if (isset($essay)) { ?>
                                <div class="spinner-border spinner-border-sm text-warning" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <br>
                                Thank You <br>
                                <a href="#">
                                    Your essay is being processed</a>
                                <?php } ?>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <?php if (($essay['status_essay_clients']=='7') AND (empty($feedback))) { ?>
                <div class="text-right">
                    <img src="<?=base_url('assets/img/feedback.png');?>" class="img-responsive" width="50%">
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- Essay Rating -->
<?php if (($essay['status_essay_clients']=='7') AND (empty($feedback))) { ?>
<div class="row" style="margin-top:-30px;">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="card mb-5 bg-white">
                <div class="card-body pt-5">
                    <form action="<?=base_url();?>student/programs/feedback/<?=$essay['id_essay_clients'];?>"
                        method="post" name="feedback">
                        <h5 class="text-dark">Please give us your feedback
                        </h5>
                        <br>
                        <input name="id" value="<?=$essay['id_essay_clients'];?>" hidden></input>
                        <input name="code" value="<?=$code;?>" hidden></input>
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

<script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/js/jquery.chained.min.js');?>"></script>
<script>
new SlimSelect({
    select: '#univ',
})
new SlimSelect({
    select: '#prompt'
})

$("#prompt").chained("#univ");

// function programs() {
//     $("#programs1").load(" #programs1");
// }
// setInterval(programs, 10000);

function get_values() {
    var prompt_id = $("#prompt").val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('students-json/prompt/') ?>' + prompt_id,
        success: function(data) {
            var json = data,
                obj = JSON.parse(json);
            $("#desc").html(obj.description);
            $("#notes").html(obj.notes);
        }
    })
}
</script>