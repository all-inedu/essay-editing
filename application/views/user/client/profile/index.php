<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card p-3 mb-2">
                <?=form_open_multipart('');?>
                <div class="form-group">
                    <div class="main-img-preview">
                        <?php if (!$user['image']) {?>
                        <img class="thumbnail img-preview rounded-circle"
                            src="<?=base_url('upload_files/user/default.png');?>" title="Preview Logo">
                        <?php } else {?>
                        <img class="thumbnail img-preview rounded-circle"
                            src="<?=base_url('upload_files/user/students/' . $user['image']);?>" title="Preview Logo"
                            width="200" height="200px">
                        <?php }?>
                    </div>
                    <div class="input-group mt-2" <?=$hidden;?>>
                        <hr>
                        <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                            placeholder="Choose File" disabled="disabled">
                        <div class="input-group-btn btn-group-sm">
                            <div class="fileUpload btn bg-dark text-light fake-shadow" style="margin-left:-20px;">
                                <span><i class="fas fa-upload"></i></span>
                                <input id="logo-id" name="image" type="file" class="attachment_upload" accept="*docx">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header3">Documents</div>
                <div class="card-body">
                    <div class="border">
                        <h6 class="mt-3 text-left pl-2 text-dark"><img class="thumbnail rounded-circle"
                                src="<?=base_url('upload_files/user/students/activity/default.png');?>"
                                title="Activities" width="25" height="25"> Activities</h6>
                        <hr>
                        <?php if($user['activity']==''){ ?>
                        <div class="text-warning mb-3">
                            Please upload your activities!
                        </div>
                        <?php } else { ?>
                        <a href="<?=base_url('upload_files/user/students/activity/'.$user['activity']);?>"
                            class="btn btn-sm btn-success mb-3"><i class="fas fa-cloud-download-alt"></i> &nbsp;
                            Download <b>Activities</b></a>
                        <br>
                        <small class="text-info" <?=$hidden;?>>
                            Upload the file if you want to change it.</small>
                        <?php } ?>
                        <hr <?=$hidden;?>>
                        <input type="file" name="activity" class="form-control form-control-sm border-0 mb-3"
                            <?=$hidden;?> />
                    </div>

                    <div class="border mt-2">
                        <h6 class="mt-3 text-left pl-2 text-dark"><img class="thumbnail rounded-circle"
                                src="<?=base_url('upload_files/user/students/resume/default.png');?>" title="Resume"
                                width="25" height="25"> Resume</h6>
                        <hr>
                        <?php if($user['resume']==''){ ?>
                        <div class="text-warning mb-3">
                            Please upload your Resume!
                        </div>
                        <?php } else { ?>
                        <a href="<?=base_url('upload_files/user/students/resume/'.$user['resume']);?>"
                            class="btn btn-sm btn-success mb-3"><i class="fas fa-cloud-download-alt"></i> &nbsp;
                            Download <b>Resume</b></a>
                        <br>
                        <small class="text-info" <?=$hidden;?>>
                            Upload the file if you want to change it.</small>
                        <?php } ?>
                        <hr <?=$hidden;?>>
                        <input <?=$hidden;?> type="file" name="resume"
                            class="form-control form-control-sm border-0 mb-3" />
                    </div>


                    <div class="border mt-2">
                        <h6 class="mt-3 text-left pl-2 text-dark"><img class="thumbnail rounded-circle"
                                src="<?=base_url('upload_files/user/students/quisioner/default.png');?>"
                                title="Quisioner" width="25" height="25"> Quistionnaire</h6>
                        <hr>
                        <?php if($user['quisioner']==''){ ?>
                        <div class="text-warning mb-3">
                            Please upload your Quistionnaire!
                        </div>
                        <?php } else { ?>
                        <a href="<?=base_url('upload_files/user/students/quisioner/'.$user['quisioner']);?>"
                            class="btn btn-sm btn-success mb-3"><i class="fas fa-cloud-download-alt"></i> &nbsp;
                            Download <b>Quistionnaire</b></a>
                        <br>
                        <small class="text-info" <?=$hidden;?>>
                            Upload the file if you want to change it.</small>
                        <?php } ?>
                        <hr <?=$hidden;?>>
                        <input <?=$hidden;?> type="file" name="quisioner"
                            class="form-control form-control-sm border-0 mb-3" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header2">
                    <i class="fas fa-user mt-2"></i>&nbsp; Personal Data
                    <a href="<?=base_url('student/profile/edit');?>" class="btn btn-sm btn-warning float-right"
                        title="Edit"><i class="fas fa-pencil-alt"></i></a>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">First Name <span class="text-danger">*</span></label>
                                        <input type="hidden" name="id" class="form-control form-control-sm"
                                            value="<?=$user['id_clients'];?>">
                                        <input <?=$readonly;?> type="text" name="first_name"
                                            class="form-control form-control-sm" value="<?=$user['first_name'];?>">
                                        <?=form_error('first_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Last Name</label>
                                        <input <?=$readonly;?> type="text" name="last_name"
                                            class="form-control form-control-sm" value="<?=$user['last_name'];?>">
                                        <?=form_error('last_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Phone Number <span class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="text" name="phone"
                                            class="form-control form-control-sm" value="<?=$user['phone'];?>">
                                        <?=form_error('phone', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Email <span class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="text" name="email"
                                            class="form-control form-control-sm" value="<?=$user['email'];?>" readonly>
                                        <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Country <span class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="text" name="country"
                                            class="form-control form-control-sm" value="<?=$user['country'];?>">
                                        <?=form_error('country', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">State</label>
                                        <input <?=$readonly;?> type="text" name="state"
                                            class="form-control form-control-sm" value="<?=$user['state'];?>">
                                        <?=form_error('state', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">City</label>
                                        <input <?=$readonly;?> type="text" name="city"
                                            class="form-control form-control-sm" value="<?=$user['city'];?>">
                                        <?=form_error('city', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Postal Code</label>
                                        <input <?=$readonly;?> type="text" name="postal_code"
                                            class="form-control form-control-sm" value="<?=$user['postal_code'];?>">
                                        <?=form_error('postal_code', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">Address <span class="text-danger">*</span></label>
                                <textarea <?=$readonly;?> rows=4 name="address"
                                    class="form-control form-control-sm"><?=$user['address'];?></textarea>
                                <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Birtdate <span class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="date" name="birthdate"
                                            class="form-control form-control-sm" value="<?=$user['birthdate'];?>">
                                        <?=form_error('birthdate', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Current School <span
                                                class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="text" name="current_school"
                                            class="form-control form-control-sm" value="<?=$user['current_school'];?>">
                                        <?=form_error('current_school', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark">School Name <span class="text-danger">*</span></label>
                                        <input <?=$readonly;?> type="text" name="school_name"
                                            class="form-control form-control-sm" value="<?=$user['school_name'];?>">
                                        <?=form_error('school_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark">Curriculum</label>
                                        <input <?=$readonly;?> type="text" name="curriculum"
                                            class="form-control form-control-sm" value="<?=$user['curriculum'];?>">
                                        <?=form_error('curriculum', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark">Year</label>
                                        <input <?=$readonly;?> type="text" name="year"
                                            class="form-control form-control-sm" value="<?=$user['year'];?>">
                                        <?=form_error('year', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row" <?=$hidden;?>>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Password</label>
                                        <input <?=$readonly;?> type="password" name="password1"
                                            class="form-control form-control-sm"
                                            value="<?php echo set_value('password1'); ?>">
                                        <?=form_error('password1', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">Password Confirmation</label>
                                        <input <?=$readonly;?> type="password" name="password2"
                                            class="form-control form-control-sm"
                                            value="<?php echo set_value('password2'); ?>">
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger" <?=$hidden;?>>* If you don't want to change your password, don't
                                fill
                                in
                                the password
                                field</small>

                            <div class="text-center" <?=$hidden;?>>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-sm ">
                                    Update Profile
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>