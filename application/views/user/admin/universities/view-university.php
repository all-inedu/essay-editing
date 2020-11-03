 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-3">
             <div class="card mb-2">
                 <div class="card-body">
                     <?=form_open_multipart('');?>
                     <div class="form-group">
                         <div class="main-img-preview">
                             <img class="thumbnail img-preview"
                                 src="<?=base_url('upload_files/univ/') . $univ['photo'];?>" title="Preview Logo"
                                 width="100%" height="auto">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="input-group" <?=$hidden;?>>
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
                     <div class="m-0 float-left pt-2"><i class="fas fa-university"></i>&nbsp;
                         Universites</div>
                     <a href="<?=base_url('admin/university/delete/') . $univ['id_univ'];?>"
                         class="btn btn-sm btn-danger float-right ml-2 delete-button" title="Delete"
                         data-message="university"><i class="fas fa-trash"></i></a>
                     <a href="<?=base_url('admin/university/edit/') . $univ['id_univ'];?>"
                         class="btn btn-sm btn-warning float-right ml-2" title="Edit"><i
                             class="fas fa-pencil-alt"></i></a>
                     <a href="<?=base_url('admin/university');?>" class="btn btn-sm btn-primary float-right"
                         title="Back to Lis"><i class="fas fa-undo"></i></a>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">University Name :</smal>
                                     <input type="hidden" class="form-control form-control-sm" name="id_univ"
                                         value="<?=$univ['id_univ'];?>">
                                     <input type="text" name="univ_name" class="form-control form-control-sm"
                                         placeholder="Enter university name .." value="<?=$univ['university_name']?>"
                                         <?=$readonly;?>>
                                     <?=form_error('univ_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-sm-6">
                                     <smal class="text-dark">Email :</smal>
                                     <input type="text" class="form-control form-control-sm" name="email"
                                         placeholder="Enter email .." value="<?=$univ['univ_email'];?>" <?=$readonly;?>>
                                     <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <smal class="text-dark">Website :</smal>
                                 <input type="text" class="form-control form-control-sm" name="website"
                                     placeholder="Enter website .." value="<?=$univ['website'];?>" <?=$readonly;?>>
                                 <?=form_error('website', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">Phone :</smal>
                                     <input type="text" class="form-control form-control-sm" name="phone"
                                         placeholder="Enter phone .." value="<?=$univ['phone'];?>" <?=$readonly;?>>
                                     <?=form_error('phone', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <smal class="text-dark">Country :</smal>
                                     <input type="text" class="form-control form-control-sm" name="country"
                                         placeholder="Enter country .." value="<?=$univ['country'];?>" <?=$readonly;?>>
                                     <?=form_error('country', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <smal class="text-dark">Address :</smal>
                                 <textarea class="form-control form-control-sm" placeholder="Address" name="address"
                                     rows=4 <?=$readonly;?>><?=$univ['address'];?></textarea>
                                 <?=form_error('address', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <hr>
                             <div class="text-center">
                                 <button type="submit" class="btn btn-primary btn-sm " <?=$hidden;?>>
                                     Update University
                                 </button>
                             </div>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </div>