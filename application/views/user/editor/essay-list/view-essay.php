<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class=" card mb-2">
                    <div class="card-header3">
                        <i class="far fa-clock"></i>&nbsp; Status
                    </div>
                    <div class="card-body m-1 text-center">
                        <?php  if ($status['status'] == '1') {?>
                        <img src="<?=base_url('assets/img/assign.png');?>" width="50%">
                        <hr width="70%">
                        <h5 class="font-weight-bold text-primary">Assigned to You</h5>
                        <?php } else if (($status['status'] == '2') OR ($status['status'] == '3')) {?>
                        <img src="<?=base_url('assets/img/process.gif');?>" width="50%">
                        <hr width="70%">
                        <h6 class="font-weight-bold text-info">Accepted and Ongoing</h6>
                        <?php } else if ($status['status'] == '6'){?>
                        <img src="<?=base_url('assets/img/revise.png');?>" width="50%">
                        <hr width="70%">
                        <h5 class="font-weight-bold text-warning">Revision</h5>
                        <?php } else if($status['status'] == '8') {?>
                        <img src="<?=base_url('assets/img/revise.png');?>" width="50%">
                        <hr width="70%">
                        <h5 class="font-weight-bold text-info">Revised</h5>
                        <?php } else if (($status['status'] == '7')) { ?>
                        <img src="<?=base_url('assets/img/completed.png');?>" width="50%">
                        <hr width="70%">
                        <h6 class="font-weight-bold text-success">Completed</h6>
                        <?php } else {?>
                        <span style="font-size: 3em; color: Mediumslateblue;"><i class="fas fa-file-upload"></i></span>
                        <hr width="70%">
                        <h3>Upload Your File</h3>
                        <?php }?>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="text-center p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>"
                            alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-success">
                       <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/students/' . $essay['attached_of_clients']);?>"
                            class="btn btn-sm btn-block text-light">Download Students Essay</a>
                    </div>
                </div>

                <!-- Verified -->
                <?php if ($status['status'] == '7') {?>
                <div class="card mt-2 mb-2">
                    <div class="text-center  p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>" alt="..."
                            width="30%">
                    </div>
                    <div class="card-footer bg-primary">
                        <?php if($essay_editor['managing_file']) { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/revised/' . $essay_editor['managing_file']);?>"
                            class="btn btn-sm btn-block text-light">Download Editor's Essay</a>
                        <?php } else { ?>
                        <a target="_blank"
                            href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>"
                            class="btn btn-sm btn-block text-light">Download Your Essay</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <label class="text-dark">Tags :</label>
                        <br>
                        <?php foreach($tags_clients as $t):?>
                        <div class="badge badge-dark">#<?=$t['topic_name'];?></div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php } ?>


            </div>
            <div class="col-md-9">
                <div class=" card mb-2">
                    <div class="card-header2">
                        <i class="fas fa-users pt-2"></i>&nbsp; Basic Info
                        <div class="float-right">
                            <a class="btn btn-sm text-white"
                                href="<?=base_url('editor/students/view/'.$essay['id_clients']);?>"
                                data-toggle="tooltip" data-placement="left" title="Student's Detail" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table class="table table-borderless table-responsive table-sm text-dark"
                            style="font-size:13px;">
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

                <!-- Essay Prompt -->
                <div class=" card mb-2">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Essay Detail
                    </div>
                    <div class="card-body" style="font-size:13px;">
                        <?=form_open_multipart('');?>
                        <?=form_hidden('id_essay_clients', $essay['id_essay_clients']);?>
                        <?=form_hidden('id_essay_editors', $essay_editor['id_essay_editors']);?>
                        <div class="bg-default">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="text-dark">University Name :</label>
                                        <input readonly type="text" name="trans" value="<?=$essay['university_name'];?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="text-dark">Essay Title :</label>
                                        <input readonly type="text" name="trans" value="<?=$essay['essay_title'];?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="text-dark">Essay Prompt :</label>
                                    <textarea name="description" id="desc" class="form-control form-control-sm" rows="8"
                                        disabled><?=$essay['essay_prompt'];?>
                                </textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label class="text-dark">Essay Deadline :</label>
                                    <input type="text" name="essay_deadline" class="form-control form-control-sm"
                                        value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['essay_deadline']));?>"
                                        readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="text-dark">Application Deadline :</label>
                                    <input type="text" name="app_deadline" class="form-control form-control-sm"
                                        value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['application_deadline']));?>"
                                        readonly>
                                </div>
                            </div>
                            <!-- Accept -->
                            <?php  if ($status['status'] == '1') {?>
                            <hr>
                            <div class="text-center">
                                <a href="<?=base_url('editor/essay-list/accepted/'.$essay['id_essay_clients'].'/'.$essay_editor['id_essay_editors']);?>"
                                    class="btn btn-sm btn-primary mr-1"><i class='fas fa-clipboard-check'></i>&nbsp;
                                    Accept</a>
                                <!-- <?=base_url('editor/essay-list/rejected/'.$essay['id_essay_clients']);?> -->
                                <a href="#" class="btn btn-sm btn-danger ml-1" data-toggle="modal"
                                    data-target="#reject"><i class="far fa-times-circle"></i> &nbsp;Reject</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Accepted & Ongoing -->
                <?php if($status['status']=='2') {?>
                <div class=" card mb-5">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Upload Your File
                    </div>
                    <div class="card-body" style="font-size:13px;">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-dark">Upload your File :</label>
                                <div class="input-group">
                                    <input id="fakeUploadLogo" class="form-control form-control-sm fake"
                                        placeholder="Choose File" readonly>
                                    <div class="input-group-btn btn-group-sm">
                                        <div class="fileUpload btn bg-dark text-light fake" style="margin-left:-20px;">
                                            <span><i class="fas fa-upload"></i></span>
                                            <input id="logo-id" name="files" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">Upload your essay with the *docx extension.</small>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-7">
                                <label class="text-dark">Tags :</label><br>
                                <select multiple id="tags" name="tags[]">
                                    <?php foreach($tags as $t): ?>
                                    <option value="<?=$t['id_topic'];?>"><?=$t['topic_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('tags[]', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="text-dark">Work Duration :</label> ( <spam class="text-muted">Time spent on editing essay</spam> )
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" class="form-control" name="work_duration">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Minutes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"> </div>
                            <div class="col-md-7">
                                <label class="text-dark">Descriptions :</label>
                                <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <hr>
                            <button name="upload" type="submit" class="btn btn-sm btn-info" value="upload"><i
                                    class="fas fa-cloud-upload-alt"></i>&nbsp; Upload Your Essay</butoon>
                        </div>
                    </div>
                </div>

                <?php }?>


                <!-- Review by Systems -->
                <?php if (($status['status'] == '3') OR ($status['status'] == '8')) {?>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="text-dark">Your essay :</label>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="https://cdn1.iconfinder.com/data/icons/ms-word-docs/512/edit_blue-512.png"
                                            alt="..." width="20%">
                                    </div>
                                    <div class="card-footer">
                                        <?php if ($status['status'] == '8') { ?>
                                        <a class="btn btn-sm btn-block"
                                            href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>">
                                            <i class="far fa-file-word"></i>&nbsp; Download Your Revised Essay</a>
                                        <?php } else {?>
                                        <a class="btn btn-sm btn-block"
                                            href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>">
                                            <i class="far fa-file-word"></i>&nbsp; Download Your Essay</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label class="text-dark">Tags :</label>
                                <br>
                                <?php foreach($tags_clients as $t):?>
                                <div class="badge badge-dark"><?=$t['topic_name'];?></div>
                                <?php endforeach;?>

                                <hr>
                                <div class="mt-4" style="bottom:0;">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><i class="fas fa-exclamation"></i></strong> &nbsp; Your
                                        essay is
                                        being
                                        reviewed.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>


                <!-- Revision -->
                <?php if (($status['status'] == '6')) {?>
                <div class="card mb-2">
                    <div class="card-header">
                        <i class="fas fa-upload"></i>&nbsp; Old Essay
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="text-dark">Editor's essay :</label>
                                <a class="text-decoration-none text-dark"
                                    href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>">
                                    <div class="card">
                                        <div class="card-body text-center">

                                            <img src="https://cdn1.iconfinder.com/data/icons/ms-word-docs/512/edit_blue-512.png"
                                                alt="..." width="50px">
                                            &nbsp; &nbsp;
                                            <span class="font-weight-bold">Download Your Old File</span>
                                        </div>
                                    </div>
                                </a>

                                <label class="text-dark mt-3">Tags :</label>
                                <br>
                                <?php foreach($tags_clients as $t):?>
                                <div class="badge badge-dark"><?=$t['topic_name'];?></div>
                                <?php endforeach;?>
                            </div>
                            <div class="col-md-7 mb-3">
                                <label class="text-dark">Notes :</label>
                                <?php if(!$revise) {} else { ?>
                                <div class="scroll-box">
                                    <?php foreach($revise as $r): ?>
                                    <?php if($r['role']=='editor'){ ?>
                                    <!-- Editors -->
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <img class="img-responsive user-photo"
                                                src="<?=base_url('assets/img/editors.png');?>" width="100%">
                                        </div>
                                        <div class="col-md-10">
                                            <span class="tip tip-left"></span>
                                            <div class="box">
                                                <div class="box-header">
                                                    <span class="text-dark font-weight-bold">
                                                        You</span><br>
                                                    <small class="text-primary float-right" style="margin-top:-15px;">
                                                        <i class="far fa-clock"></i> &nbsp;
                                                        <?=date('D, d M Y', strtotime($r['created_at']));?>
                                                    </small>
                                                </div>
                                                <p class="mt-2">
                                                    <?=$r['notes'];?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else if($r['role']=='managing_editor'){ ?>
                                    <!-- Editors -->
                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <span class="tip tip-right"></span>
                                            <div class="box">
                                                <div class="box-header">
                                                    <small class="text-primary">
                                                        <?=date('D, d M Y', strtotime($r['created_at']));?> &nbsp;
                                                        <i class="far fa-clock"></i>
                                                    </small>
                                                    <span class="text-dark font-weight-bold  float-right"
                                                        style="margin-top:-8px;">
                                                        <?php
                                                        $email = $r['admin_mail'];
                                                        $me = $this->editors->getAllEditorsByEmail($email);
                                                        echo $me['first_name'].' '.$me['last_name'];
                                                    ?>
                                                        <br>
                                                        <small>Managing Editor</small>
                                                    </span>
                                                </div>
                                                <p class="mt-2">
                                                    <?=$r['notes'];?>
                                                </p>
                                                <?php if($r['file']!=''){ ?>
                                                    <a href="<?=base_url('upload_files/program/essay/revise/'.$r['file']);?>" target="_blank" class="text-warning text-decoration-none"><i class="fas fa-file-word"></i>&nbsp; Download attachments.</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img class="img-responsive user-photo"
                                                src="<?=base_url('assets/img/me.png');?>" width="100%">
                                        </div>
                                        <hr>
                                    </div>
                                    <?php } else { ?>
                                    <!-- Admin -->
                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <span class="tip tip-right"></span>
                                            <div class="box">
                                                <div class="box-header">
                                                    <small class="text-primary">
                                                        <?=date('D, d M Y', strtotime($r['created_at']));?> &nbsp;
                                                        <i class="far fa-clock"></i>
                                                    </small>
                                                    <span class="text-dark font-weight-bold  float-right"
                                                        style="margin-top:-3px;">Admin
                                                    </span>
                                                </div>
                                                <p class="mt-2">
                                                    <?=$r['notes'];?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img class="img-responsive user-photo"
                                                src="<?=base_url('assets/img/admin.png');?>" width="100%">
                                        </div>
                                        <hr>
                                    </div>
                                    <?php } ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php }?>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <textarea name="notes_editors" class="form-control form-control-sm" rows="4"
                                            placeholder="Give your notes."></textarea>
                                        <?=form_error('notes_editors', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="text-right mt-2">
                                    <button type="submit" name="comments" value="comments"
                                        class="btn btn-primary btn-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;
                                        Comments</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="text-dark">Notes :</label>
                                <textarea name="notes_editors" class="form-control form-control-sm" rows="5"
                                    readonly><?= trim($essay_editor['notes_editors']);?></textarea>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Upload Revision -->
                <div class="card mb-5">
                    <div class="card-header3">
                        <i class="fas fa-upload"></i>&nbsp; Please Upload Your Revision
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-dark">Upload your File :</label>
                                <div class="input-group">
                                    <input id="fakeUploadLogo" class="form-control form-control-sm fake"
                                        placeholder="Choose File" readonly>
                                    <div class="input-group-btn btn-group-sm">
                                        <div class="fileUpload btn bg-dark text-light fake" style="margin-left:-20px;">
                                            <span><i class="fas fa-upload"></i></span>
                                            <input id="logo-id" name="files" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">Upload your essay with the *docx extension.</small>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-7">
                                <label class="text-dark">Tags :</label><br>
                                <select multiple id="tags" name="tags[]">
                                    <?php foreach($tags as $t): ?>
                                    <option value="<?=$t['id_topic'];?>"><?=$t['topic_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('tags[]', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="text-dark">Work Duration :</label> ( <spam class="text-muted">Time spent on revising essay</spam> )
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" class="form-control" name="work_duration">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Minutes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"> </div>
                            <div class="col-md-7">
                                <label class="text-dark">Descriptions :</label>
                                <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <hr>
                            <input name="revision" type="submit" class="btn btn-sm btn-success"
                                value="Upload Your Revision">
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- Verified -->
                <?php if ($status['status'] == '7') {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="far fa-thumbs-up"></i>&nbsp; Thank you,</strong> your essay has been completed.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=base_url('editor/essay-list/rejected/'.$essay['id_essay_clients']);?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Reject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_essay_clients" value="<?=$essay['id_essay_clients'];?>">
                    <input type="hidden" name="id_essay_editors" value="<?=$essay_editor['id_essay_editors'];?>">
                    <input type="hidden" name="editors" value="<?=$this->session->userdata('email');?>">
                    <label class="text-dark">Notes :</label>
                    <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                    <?=form_error('notes', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="reject" value="reject" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
new SlimSelect({
    select: '#tags',
    placeholder: 'Select tags'
})

// function programs() {
//     $("#programs").load(" #programs");
// }

// setInterval(programs, 180000);
</script>