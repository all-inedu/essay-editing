 <!-- Begin Page Content -->
 <div class="container mt-5">
     <div class="row">
         <div class="col-md-3">

             <form action="" method="post">
                 <div class="form-group">
                     <div class="main-img-preview">
                         <img class="thumbnail img-preview" src="<?=base_url('assets/img/default.png');?>"
                             title="Preview Logo" width="100%" height="auto">
                     </div>
                     <br>
                     <div class="input-group">
                         <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                             placeholder="Choose File" disabled="disabled">
                         <div class="input-group-btn btn-group-sm">
                             <div class="fileUpload btn bg-dark text-light fake-shadow" style="margin-left:-20px;">
                                 <span><i class="fas fa-upload"></i></span>
                                 <input id="logo-id" name="image" type="file" class="attachment_upload">
                             </div>
                         </div>
                     </div>
                     <?=form_error('photo_univ', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                 </div>
         </div>
         <div class="col-md-9">
             <div class="card shadow mb-5 animated--grow-in">
                 <div class="card-header py-3">
                     <p class="m-0 float-left"><i class="fas fa-file-upload"></i>&nbsp;
                         New Editors
                     </p>
                 </div>
                 <div class="card-body">
                     <div class="row mb-3">
                         <div class="col-md-6">
                             <label class="text-dark">First Name <i class="text-danger">*</i> </label>
                             <input type="text" name="first_name" class="form-control form-control-sm">
                             <?=form_error('first_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="col-md-6">
                             <label class="text-dark">Last Name</label>
                             <input type="text" name="last_name" class="form-control form-control-sm">
                             <?=form_error('last_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                     </div>

                     <div class="row mb-3">
                         <div class="col-md-6">
                             <label class="text-dark">Email <i class="text-danger">*</i> </label>
                             <input type="text" name="email" class="form-control form-control-sm" value=<?=$email;?>
                                 readonly>
                             <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="col-md-6">
                             <label class="text-dark">Phone <i class="text-danger">*</i> </label>
                             <input type="text" name="phone" class="form-control form-control-sm">
                             <?=form_error('phone', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                     </div>

                     <div class="row mb-3">
                         <div class="col-md-6">
                             <label class="text-dark">Graduated From <i class="text-danger">*</i> </label>
                             <input type="text" name="graduated_from" class="form-control form-control-sm">
                             <?=form_error('graduated_from', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="col-md-6">
                             <label class="text-dark">Major <i class="text-danger">*</i> </label>
                             <input type="text" name="major" class="form-control form-control-sm">
                             <?=form_error('major', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                     </div>

                     <div class="row mb-3">
                         <div class="col-md-12">
                             <label class="text-dark">Address <i class="text-danger">*</i> </label>
                             <textarea rows=4 name="address" class="form-control form-control-sm"></textarea>
                             <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                     </div>

                     <div class="row mb-3">
                         <div class="col-sm-6 mb-3 mb-sm-0">
                             <input type="password" class="form-control form-control-sm" name="password1"
                                 placeholder="Password">
                             <?=form_error('password1', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="col-sm-6">
                             <input type="password" class="form-control form-control-sm" name="password2"
                                 placeholder="Repeat Password">
                         </div>
                     </div>
                     <hr>
                     <div class="text-center">
                         <button type="submit" class="btn btn-sm btn-primary">Create Your Account</button>
                     </div>
                 </div>
             </div>
         </div>
         </form>
     </div>

 </div>