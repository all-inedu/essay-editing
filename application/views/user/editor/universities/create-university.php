 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-3">
             <div class="card mb-2">
                 <div class="card-body">
                     <?=form_open_multipart('editor/university/create');?>
                     <div class="form-group">
                         <div class="main-img-preview">
                             <img class="thumbnail img-preview" src="<?=base_url('upload_files/univ/default.png');?>"
                                 title="Preview Logo">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="input-group mb-2">
                 <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow" placeholder="Choose File"
                     disabled="disabled">
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
         <div class="col-md-9">
             <div class="card mb-5 animated--grow-in">
                 <div class="card-header">
                     <div class="pt-2 float-left"><i class="fas fa-plus-circle"></i>&nbsp;
                         New Universites</div>
                     <a href="<?=base_url('editor/university');?>"
                         class="btn btn-sm btn-outline-primary float-right text-white"><i
                             class="fas fa-arrow-left"></i></a>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">University Name <span class="text-danger">*</span></smal>
                                     <input type="text" name="univ_name" class="form-control form-control-sm"
                                         placeholder="Enter university name .."
                                         value="<?php echo set_value('univ_name'); ?>">
                                     <?=form_error('univ_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-sm-6">
                                     <smal class="text-dark">Email</smal>
                                     <input type="text" class="form-control form-control-sm" name="email"
                                         placeholder="Enter email .." value="<?php echo set_value('email'); ?>">
                                     <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <smal class="text-dark">Website</smal>
                                 <input type="text" class="form-control form-control-sm" name="website"
                                     placeholder="Enter website .." value="<?php echo set_value('website'); ?>">
                                 <?=form_error('website', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">Phone</smal>
                                     <input type="text" class="form-control form-control-sm" name="phone"
                                         placeholder="Enter phone ..">
                                     <?=form_error('phone', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">Country <span class="text-danger">*</span></smal>
                                     <input type="text" class="form-control form-control-sm" name="country"
                                         placeholder="Enter country ..">
                                     <?=form_error('country', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <smal class="text-dark">Address <span class="text-danger">*</span></smal>
                                 <textarea class="form-control form-control-sm" placeholder="Address" name="address"
                                     rows=4><?php echo set_value('address'); ?></textarea>
                                 <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="text-center">
                                 <button type="submit" class="btn btn-sm btn-primary">
                                     Add University
                                 </button>
                             </div>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>