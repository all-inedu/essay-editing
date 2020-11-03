 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-3">
             <?=form_open_multipart('');?>
             <div class="card">
                 <div class="card-body">
                     <div class="main-img-preview">
                         <img class="thumbnail img-preview rounded-circle"
                             src="<?=base_url('upload_files/user/editors/default.png');?>" title="Preview Logo"
                             width="100%" height="auto">
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-9">
             <div class="card mb-5 animated--grow-in">
                 <div class="card-header py-3">
                     <div class="m-0 pt-1 float-left pt-2"><i class="fas fa-file-upload"></i>&nbsp;
                         New Editors
                     </div>
                     <a href="<?=base_url('admin/editors');?>" class="btn btn-sm btn-primary float-right"><i
                             class="fas fa-undo"></i></a>
                 </div>
                 <div class="card-body">
                     <form method="post" action="">
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
                                 <input type="text" name="email" class="form-control form-control-sm">
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
                             <div class="col-md-12">
                                 <label class="text-dark">Position <i class="text-danger">*</i> </label>
                                 <select name="position" id="position">
                                     <?php foreach($position as $p): ?>
                                     <option value="<?=$p['id_position'];?>">
                                         <?=$p['position_name'];?>
                                     </option>
                                     <?php endforeach; ?>
                                 </select>
                                 <?=form_error('position', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>
                         <hr>
                         <div class="text-center">
                             <button type="submit" class="btn btn-sm btn-primary">Create Editor</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
new SlimSelect({
    select: '#position'
})
 </script>