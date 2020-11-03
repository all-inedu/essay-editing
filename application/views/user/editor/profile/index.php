 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-3 mb-2">
             <?=form_open_multipart('');?>
             <div class="card">
                 <div class="card-body">
                     <div class="main-img-preview text-center">
                         <img class="thumbnail img-preview rounded-circle"
                             src="<?=base_url('upload_files/user/editors/'.$editors['image']);?>" title="Preview Logo"
                             width="200px" height="auto">
                     </div>
                     <hr <?=$hidden;?>>
                     <div class="input-group" <?=$hidden;?>>

                         <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                             placeholder="Choose File" disabled="disabled">
                         <div class="input-group-btn btn-group-sm">
                             <div class="fileUpload btn bg-dark text-light fake-shadow" style="margin-left:-20px;">
                                 <span><i class="fas fa-upload"></i></span>
                                 <input id="logo-id" name="image" type="file" class="attachment_upload">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-9">
             <div class="card mb-5 animated--grow-in">
                 <div class="card-header py-3">
                     <div class="float-left pt-2"><i class="fas fa-file-upload"></i>&nbsp;
                         <?=$title;?>
                     </div>
                     <a href="<?=base_url('editor/profile/edit');?>" class="btn btn-sm btn-warning float-right"><i
                             class="fas fa-pencil-alt"></i></a>
                 </div>
                 <div class="card-body">
                     <form method="post" action="">
                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">First Name : </label>
                                 <input type="text" name="id" class="form-control form-control-sm"
                                     value="<?= $editors['id_editors'];?>" hidden>
                                 <input type="text" name="first_name" class="form-control form-control-sm"
                                     value="<?= $editors['first_name'];?>" <?=$readonly?>>
                                 <?=form_error('first_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Last Name : </label>
                                 <input type="text" name="last_name" class="form-control form-control-sm"
                                     value="<?= $editors['last_name'];?>" <?=$readonly?>>
                                 <?=form_error('last_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Email : </label>
                                 <input type="text" name="email" class="form-control form-control-sm"
                                     value="<?= $editors['email'];?>" <?=$readonly?>>
                                 <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Phone : </label>
                                 <input type="text" name="phone" class="form-control form-control-sm"
                                     value="<?= $editors['phone'];?>" <?=$readonly?>>
                                 <?=form_error('phone', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Graduated From : </label>
                                 <input type="text" name="graduated_from" class="form-control form-control-sm"
                                     value="<?= $editors['graduated_from'];?>" <?=$readonly?>>
                                 <?=form_error('graduated_from', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Major : </label>
                                 <input type="text" name="major" class="form-control form-control-sm"
                                     value="<?= $editors['major'];?>" <?=$readonly?>>
                                 <?=form_error('major', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-12 mb-3">
                                 <label class="text-dark">Address : </label>
                                 <textarea rows=4 name="address" <?=$readonly?>
                                     class="form-control form-control-sm"><?= $editors['address'];?></textarea>
                                 <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>
                         
                         <div class="row">
                             <div class="col-md-12 mb-3">
                                 <label class="text-dark">About Me : </label>
                                 <textarea rows=4 name="about" <?=$readonly?>
                                     class="form-control form-control-sm"><?= $editors['about_me'];?></textarea>
                                 <?=form_error('about', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>

                         <div class="row" <?=$hidden;?>>
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Password : </label>
                                 <input type="password" name="password1" class="form-control form-control-sm">
                                 <?=form_error('password1', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="col-md-6 mb-3">
                                 <label class="text-dark">Password Confirm : </label>
                                 <input type="password" name="password2" class="form-control form-control-sm">
                             </div>
                             <div class="col-md-12 mb-3">
                                 <br>
                                 <small class="text-danger" <?=$hidden;?>>* If you don't want to change your password,
                                     don't
                                     fill in the password field</small>
                             </div>
                         </div>

                         <div class="text-center" <?=$hidden;?>>
                             <hr>
                             <button type="submit" class="btn btn-sm btn-primary">Update Profile</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>


     </div>

 </div>