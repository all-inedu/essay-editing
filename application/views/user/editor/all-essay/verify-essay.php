<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header3">
                        <i class="far fa-clock"></i>&nbsp; Status
                    </div>
                    <div class="card-body text-center">
                        <img src="<?=base_url('assets/img/completed.png');?>" width="50%">
                        <hr width="70%">
                        <h6 class="font-weight-bold text-success">Completed</h6>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="text-center p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>" alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-success">
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/students/' . $essay['attached_of_clients']);?>"
                            class="btn btn-sm btn-block text-light">Download Student's Essay</a>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-body text-center">
                        <label class="text-dark">Assigned to Editor <span class="text-danger">*</span></label>
                        <hr style="margin:0 0 10px 0;">
                        <b>
                            <?=$essay_editor['first_name'].' '.$essay_editor['last_name'];?>
                        </b>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="text-center  p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>" alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-primary">
                        <?php if($essay_editor['managing_file']) { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/revised/' . $essay_editor['managing_file']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's Essay</a>
                        <?php } else { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's Essay</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-body">
                        <label class="text-dark">Tags :</label>
                        <br>
                        <?php foreach($tags as $tg): ?>
                        <small class="badge badge-dark">#<?=$tg['topic_name'];?></small>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class=" card mb-2">
                    <div class="card-header2">
                        <div class="float-left mt-2">
                            <i class="fas fa-users"></i>&nbsp; Basic Info
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm text-white"
                                href="<?=base_url('editor/students/view/'.$essay['id_clients']);?>"
                                data-toggle="tooltip" data-placement="left" title="Student's Detail" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table class="table table-borderless table-sm text-dark" style="font-size:13px;">
                            <tr>
                                <td width="15%">Full Name</td>
                                <td width="1%">:</td>
                                <td><?=$essay['first_name'].' '.$essay['last_name'];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?=$essay['email'];?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$essay['address'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class=" card mb-2">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Essay Detail
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-dark">University Name :</label>
                                <input readonly type="text" name="trans" value="<?=$essay['university_name'];?>"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6">
                                <label class="text-dark">Essay Title :</label>
                                <input readonly type="text" name="trans" value="<?=$essay['essay_title'];?>"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-dark">Essay Prompt :</label>
                                <textarea name="description" id="desc" class="form-control form-control-sm" rows="5"
                                    disabled><?=$essay['essay_prompt'];?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-4 mb-2">
                                <label class="text-dark">Essay Deadline :</label>
                                <input type="text" name="essay_deadline" class="form-control form-control-sm"
                                    value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['essay_deadline']));?>"
                                    readonly>
                            </div>
                            <div class="col mb-2">
                                <label class="text-dark">Application Deadline :</label>
                                <input type="text" name="app_deadline" class="form-control form-control-sm"
                                    value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['application_deadline']));?>"
                                    readonly>
                            </div>
                            <div class="col mb-2">
                                <label class="text-dark">Editor's Upload :</label>
                                <input type="text" name="app_deadline" class="form-control form-control-sm"
                                    value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay_editor['uploaded_at']));?>"
                                    readonly>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="text-dark">Status Essay :</label>
                                <?=$status;?>
                            </div>
                        </div>
                        <div class="text-center">
                            <hr>
                            <a href="<?=base_url('editor/all-essay/send-email/'.$essay['id_essay_clients']);?>"
                                class="btn btn-success btn-sm">
                                <i class="fas fa-envelope"></i>&nbsp; Send to Students/Mentors
                            </a>&nbsp; &nbsp;
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#revise">
                                <i class="fas fa-exclamation-circle"></i>&nbsp; Cancel, Revise
                            </a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="far fa-thumbs-up"></i>&nbsp; Congratulations,</strong> editors essay has been
                    completed.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if ($feedback) { ?>
                <div class="card mb-5">
                    <div class="card-body pt-5">
                        <h5>Feedback from Students
                        </h5>
                        <br>
                        <table width="100%" class="table table-hover">
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Turn around time.</div>
                                    <small>How long does it take for the editors to edit and then return the
                                        essays.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option1']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option1" name="option1" value="5" disabled />
                                        <label for="5-option1" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option1']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option1" name="option1" value="4" disabled />
                                        <label for="4-option1" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option1']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option1" name="option1" value="3" disabled />
                                        <label for="3-option1" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option1']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option1" name="option1" value="2" disabled />
                                        <label for="2-option1" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option1']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option1" name="option1" value="1" disabled />
                                        <label for="1-option1" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option1', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Specificity of feedback.</div>
                                    <small>How helpful is the feedback.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option2']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option2" name="option2" disabled value="5" />
                                        <label for="5-option2" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option2']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option2" name="option2" disabled value="4" />
                                        <label for="4-option2" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option2']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option2" name="option2" disabled value="3" />
                                        <label for="3-option2" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option2']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option2" name="option2" disabled value="2" />
                                        <label for="2-option2" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option2']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option2" name="option2" disabled value="1" />
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
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option3']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option3" name="option3" disabled value="5" />
                                        <label for="5-option3" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option3']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option3" name="option3" disabled value="4" />
                                        <label for="4-option3" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option3']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option3" name="option3" disabled value="3" />
                                        <label for="3-option3" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option3']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option3" name="option3" disabled value="2" />
                                        <label for="2-option3" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option3']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option3" name="option3" disabled value="1" />
                                        <label for="1-option3" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option3', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">How encouraged do you feel from the feedback.</div>
                                    <small>How the editor speaks with the client AKA customer service.</small>
                                </td>
                                <td class="align-middle">
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option4']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option4" name="option4" disabled value="5" />
                                        <label for="5-option4" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option4']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option4" name="option4" disabled value="4" />
                                        <label for="4-option4" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option4']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option4" name="option4" disabled value="3" />
                                        <label for="3-option4" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option4']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option4" name="option4" disabled value="2" />
                                        <label for="2-option4" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option4']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option4" name="option4" disabled value="1" />
                                        <label for="1-option4" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option4', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-dark">Do they help you grow as a writer/did you learn anything new.
                                    </div>
                                    <!-- <small>How the editor speaks with the client AKA customer service.</small> -->
                                </td>
                                <td class="align-middle">
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option5']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option5" name="option5" disabled value="5" />
                                        <label for="5-option5" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option5']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option5" name="option5" disabled value="4" />
                                        <label for="4-option5" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option5']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option5" name="option5" disabled value="3" />
                                        <label for="3-option5" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option5']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option5" name="option5" disabled value="2" />
                                        <label for="2-option5" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option5']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option5" name="option5" disabled value="1" />
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
                                    <div class="star-ratings">
                                        <input <?php if($feedback['option6']=='5'){ echo 'checked'; } ?> type="radio"
                                            id="5-option6" name="option6" disabled value="5" />
                                        <label for="5-option6" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option6']=='4'){ echo 'checked'; } ?> type="radio"
                                            id="4-option6" name="option6" disabled value="4" />
                                        <label for="4-option6" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option6']=='3'){ echo 'checked'; } ?> type="radio"
                                            id="3-option6" name="option6" disabled value="3" />
                                        <label for="3-option6" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option6']=='2'){ echo 'checked'; } ?> type="radio"
                                            id="2-option6" name="option6" disabled value="2" />
                                        <label for="2-option6" class="star">&bigstar;</label>
                                        <input <?php if($feedback['option6']=='1'){ echo 'checked'; } ?> type="radio"
                                            id="1-option6" name="option6" disabled value="1" />
                                        <label for="1-option6" class="star">&bigstar;</label>
                                    </div>
                                    <?=form_error('option6', '<small
                                        class="text-info float-right"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="text-dark">Additional Comments</label>
                                    <textarea name="add_comments" rows="6" class="form-control form-control-sm"><?=$feedback['add_comments'];?>
                                </textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card mb-5">
                    <div class="card-body text-center">
                        <h3>haven't provided feedback</h3>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="revise" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Revise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_essay_clients" value="<?=$essay['id_essay_clients'];?>">
                    <input type="hidden" name="editors_mail" value="<?=$essay_editor['editors_mail'];?>">
                    <label class="text-dark">Notes :</label>
                    <textarea name="notes_editors" class="form-control form-control-sm" rows="5"></textarea>
                    <?=form_error('notes_editors', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="revision" value="revision">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// function programs() {
//     $("#programs").load(" #programs");
// }

// setInterval(programs, 180000);
</script>