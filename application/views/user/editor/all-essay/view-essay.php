<style>
/* The container */
</style>
<div id="programs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header3">
                        <i class="far fa-clock"></i>&nbsp; Status
                    </div>
                    <div class="card-body text-center">
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
                    <form action="" method="post">
                        <?php
                        echo form_hidden('id_program', $essay['id_program']);
                        echo form_hidden('id_essay_clients', $essay['id_essay_clients']);
                    ?>
                        <div class="card-body text-center">
                            <h5 class="text-dark mb-3">Assignment <span class="text-danger">*</span></h5>
                            <?php if($essay_editor) { ?>
                            <input readonly type="text"
                                value="<?=$essay_editor['first_name'].' '.$essay_editor['last_name'];?>"
                                class="form-control form-control-sm">
                            <?php } ?>
                            <?php 
                               if($essay['id_editors']>0) {
                                    $req = $this->Editors_model->getAllEditorsById($essay['id_editors']);
                                    echo "Request (". $req['first_name'].' '.$req['last_name'].")";
                               }
                            ?>
                            <hr>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#assignEditor"><i class="fas fa-paper-plane"></i> &nbsp; Select The
                                Editor</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#assignEditor">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i><strong> Please</strong>, assign this essay to editors.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </a>
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
                    <div class="card-body">
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
                <?php if($essay_reject) {?>
                <div class="card" style="height:200px; overflow-y: scroll; width:100%; ">
                    <div class="card-body text-left">
                        <h5 class="text-dark">Rejected : </h5>
                        <hr style="margin-top:0px;">
                        <div class="row">
                            <?php foreach($essay_reject as $er): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <strong
                                            class="mr-auto  text-white"><?=$er['first_name'].' '.$er['last_name'];?></strong>
                                        <small
                                            class=" text-white float-right"><?=date('D, d M Y', strtotime($er['created_at']));?></small>
                                    </div>
                                    <div class="toast-body">
                                        <label>Notes : </label>
                                        <?=$er['notes'];?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="assignEditor" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-xl shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign To Editors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body" style="font-size:12px;">
                    <?php
                        echo form_hidden('id_program', $essay['id_program']);
                        echo form_hidden('id_essay_clients', $essay['id_essay_clients']);
                    ?>
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Editors Name</th>
                                <th>Graduated From</th>
                                <th>Do Tomorrow</th>
                                <th>Due Within 3 Day</th>
                                <th>Due Within 5 Day</th>
                                <th>Completed Essay</th>
                                <th>Assignment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1; foreach ($editor as $e):

                                $editor = $e['email'];
                                $ongoing1 = count($this->Essay_model->essayDeadlineToEditor($editor,'0','1'));
                                $ongoing2 = count($this->Essay_model->essayDeadlineToEditor($editor,'1','3'));
                                $ongoing3 = count($this->Essay_model->essayDeadlineToEditor($editor,'3','5'));
                            ?>
                            <tr>
                                <td class="text-center"><?=$no;?></td>
                                <td><?=$e['first_name'].' '.$e['last_name'] ;?></td>
                                <td><?=$e['graduated_from'];?></td>
                                <td class="align-middle text-right">
                                    <?=$ongoing1;?> Essays
                                </td>
                                <td class="align-middle text-right">
                                    <?=$ongoing2;?> Essays
                                </td>
                                <td class="align-middle text-right">
                                    <?=$ongoing3;?> Essays
                                </td>
                                <td class="text-center">
                                    <?php 
                            
                                    $completed = count($this->Essay_model->getVerifiedEssayEditorList($e['email']));
                                    
                                    echo $completed.' Essays';
                                ?>
                                </td>
                                <td class="align-content-center">
                                    <label class="container-opt">
                                        <input type="radio" name="editors" value="<?=$e['email'];?>">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <?php $no++; endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Assign To
                        Editors</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
new SlimSelect({
    select: '#editor'
})

// function programs() {
//     $("#programs").load(" #programs");
// }

// setInterval(programs, 10000);
</script>