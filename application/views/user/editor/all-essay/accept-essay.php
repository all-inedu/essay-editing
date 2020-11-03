<style>
    input{
        border-radius:10px;
    }
</style>
<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class=" card mb-2">
                    <div class="card-header3">
                        <i class="far fa-clock"></i>&nbsp; Status
                    </div>
                    <div class="card-body text-center">
                        <img src="<?=base_url('assets/img/process.gif');?>" width="50%">
                        <hr width="70%">
                        <h6 class="font-weight-bold text-info">Accepted and Ongoing</h6>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="text-center p-3">
                        <img src="<?=base_url('assets/img/doc.png');?>"
                            alt="..." width="30%">
                    </div>
                    <div class="card-footer bg-success">
                        <a target="_blank" href="<?=base_url('upload_files/program/essay/students/' . $essay['attached_of_clients']);?>"
                            class="btn btn-sm btn-block text-light">Download Students Essay</a>
                    </div>
                </div>

                <?php if($status['status']=='2') {?>
                <div class=" card mb-2">
                    <div class="card-body text-center">
                        <h5 class="text-dark mb-3"><i class="fas fa-paper-plane"></i>&nbsp; Assignment <span
                                class="text-danger">*</span></h5>
                        <hr>
                        <div class="font-weight-bold"><?=$essay_editor['first_name'].' '.$essay_editor['last_name'];?>
                        </div>
                        <hr>
                        <a href="<?=base_url('editor/all-essay/cancel/'.$essay['id_essay_clients']);?>"
                            class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; Cancel</a>
                    </div>
                </div>
                <?php }?>
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

                <div class=" card mb-5" style="font-size:13px;">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Essay Detail
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                        echo form_hidden('id_essay_clients', $essay['id_essay_clients']);
                    ?>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="text-dark">University Name :</label>
                                    <input readonly type="text" name="trans" value="<?=$essay['university_name'];?>"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-dark">Title :</label>
                                    <input readonly type="text" name="trans" value="<?=$essay['essay_title'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="text-dark">Description :</label>
                                    <textarea name="description" id="desc" class="form-control form-control-sm" rows="5"
                                        disabled><?=$essay['essay_prompt'];?>
                                </textarea>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    <label class="text-dark">Essay Deadline :</label>
                                    <input type="text" name="essay_deadline" class="form-control form-control-sm"
                                        value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['essay_deadline']));?>"
                                        readonly>
                                </div>
                                <div class="col">
                                    <label class="text-dark">Application Deadline :</label>
                                    <input type="text" name="app_deadline" class="form-control form-control-sm"
                                        value="&#xf073; &nbsp; <?=date('D, d M Y', strtotime($essay['application_deadline']));?>"
                                        readonly>
                                </div>
                            </div>
                            <?php if (($status['status'] == '3') OR ($status['status'] == '6') OR ($status['status'] == '8')) {?>
                            <div class="row">
                                <div class="col-md-5 mt-3 align-text-bottom">
                                    <label class="text-dark">Assign to Editor <span class="text-danger">*</span></label>
                                    <br>
                                    <input readonly type="text"
                                        value="<?=$essay_editor['first_name'].' '.$essay_editor['last_name'];?>"
                                        class="form-control form-control-sm">
                                    <hr>

                                    <label class="text-dark">Editor's essay :</label>
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="https://cdn1.iconfinder.com/data/icons/ms-word-docs/512/edit_blue-512.png"
                                                alt="..." width="20%">
                                        </div>
                                        <div class="card-footer">
                                            <?php if ($status['status'] == '8') { ?>
                                            <a class="btn btn-sm btn-block"
                                                href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>">
                                                <i class="far fa-file-word"></i>&nbsp; Download Revised Essay</a>
                                            <?php } else {?>
                                            <a class="btn btn-sm btn-block"
                                                href="<?=base_url('upload_files/program/essay/editors/' . $essay_editor['attached_of_editors']);?>">
                                                <i class="far fa-file-word"></i>&nbsp; Download Editors Essay</a>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <br>
                                    <label class="text-dark">Tags :</label>
                                    <br>
                                    <?php foreach($tags as $t):?>
                                    <div class="badge badge-dark">#<?=$t['topic_name'];?></div>
                                    <?php endforeach;?>

                                </div>

                                <div class="col-md-7 mt-3">
                                    <label class="text-dark">Notes :</label>
                                    <input type="hidden" value="<?=$essay_editor['email'];?>" name="editors_mail">
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
                                                        <span class="text-dark font-weight-bold float-left"
                                                            style="margin-top:-8px;">
                                                            <?=$r['first_name'].' '.$r['last_name'];?>
                                                            <br>
                                                            <small>Editor</small>
                                                        </span><br>
                                                        <small class="text-primary float-right"
                                                            style="margin-top:-15px;">
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
                                        <?php } else if($r['role']=='managing_editor') { ?>
                                        <!-- Managing Editor -->
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
                                                            $me = $this->Editors_model->getAllEditorsByEmail($email);
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
                                        <div class="col-md-12 mb-3">
                                            <textarea name="notes_editors" class="form-control form-control-sm" rows="4"
                                                placeholder="Give your notes."></textarea>
                                            <?=form_error('notes_editors', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-dark">Add attachments :</label>
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
                                            <small class="text-danger">Upload your revise file with the *docx format.</small>
                                        </div>
                                    </div>
                                    <div class="text-right mt-2">
                                        <button type="submit" name="revision" value="revision"
                                            class="btn btn-danger btn-sm"><i
                                                class="fas fa-exclamation-circle"></i>&nbsp;
                                            Revise</button>
                                    </div>
                                </div>
                            </div>
                            <hr style="border:1px dashed #dedede;">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-control" style="padding-left:30px; font-size:13px; padding-bottom:30px;">
                                      <input class="form-check-input" type="checkbox"id="myCheck" onclick="myFunction()" name="check_file" value="1">
                                      <label class="form-check-label text-primary" style="padding-top:2px;">
                                        <i>Accept and upload your essay.</i>
                                      </label>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display:none" id="managingUpload">
                                    <div class="fileUpload btn btn-info btn-sm btn-block text-left">
                                        <!--<span>Upload</span>-->
                                        <input type="file" name="managingFile" />
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md-12 text-center">
                                    <?php if(($status['status']=='3') OR ($status['status']=='8')) {?>
                                    <button type="submit" name="verify" value="verify" class="btn btn-success btn-sm"><i
                                            class='fas fa-clipboard-check'></i>&nbsp; Accept</button>

                                    <?php } else if(($status['status']=='6')) {?>
                                    <button type="submit" name="verify" value="verify" class="btn btn-info btn-sm"><i
                                            class='fas fa-clipboard-check'></i>&nbsp; Cancel,
                                        Accept</button>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
// function programs() {
//     $("#programs").load(" #programs");
//     console.log("Test");
// }

// setInterval(programs, 180000);
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("managingUpload");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>