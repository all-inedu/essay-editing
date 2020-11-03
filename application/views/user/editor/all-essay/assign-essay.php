<div id="programs">
    <div class="container-fluid animated--grow-in">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header3">
                        <i class="far fa-clock"></i>&nbsp; Status
                    </div>
                    <div class="card-body  text-center">
                        <img src="<?=base_url('assets/img/assign.png');?>" width="50%">
                        <hr width="70%">
                        <h5 class="font-weight-bold text-primary">Assigned to Editors</h5>
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

            </div>
            <div class="col-md-9">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i><strong> Please</strong>, </strong> waiting for accepted by
                    editors.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                    <div class="card-body" style="font-size:12px;">
                        <div class="form-group row">
                            <div class="col-md-6 mb-2">
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

                        <div class="row mt-4">
                            <div class="col mb-2">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
new SlimSelect({
    select: '#editor'
})

// function programs() {
//     $("#programs").load(" #programs");
//     console.log("Test");
// }

// setInterval(programs, 180000);
</script>