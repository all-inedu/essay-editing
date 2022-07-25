 <div class="container-fluid">
     <div class="row">
         <div class="col-md-3">
             <div class="card mb-2">
                 <div class="card-body">
                     <?=form_open_multipart('admin/program/create');?>
                     <div class="form-group">
                         <div class="main-img-preview">
                             <img class="thumbnail img-preview"
                                 src="<?=base_url('upload_files/programs/default.png');?>" title="Preview Logo">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="input-group">
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
                 <div class="card-header py-3">
                     <div class="float-left pt-2"><i class="fas fa-tasks"></i>&nbsp;
                         New Programs
                     </div>
                     <a href="<?=base_url('admin/program');?>" class="btn btn-sm btn-outline-primary float-right"><i
                             class="fas fa-undo"></i></a>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <smal class="text-dark">Program Name <span class="text-danger">*</span></smal>
                                         <input type="text" name="program_name" class="form-control form-control-sm"
                                             placeholder="Enter program name.."
                                             value="<?php echo set_value('program_name'); ?>">
                                         <?=form_error('program_name', '<small
                                                class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <smal class="text-dark">Program Category <span class="text-danger">*</span>
                                         </smal>
                                         <select type="text" name="id_category" id="program"
                                             placeholder="Enter program name..">
                                             <option value="">Select program category</option>
                                             <?php foreach ($category as $c): ?>
                                             <option value="<?=$c['id_category'];?>"><?=$c['category_name'];?></option>
                                             <?php endforeach;?>
                                         </select>
                                         <?=form_error('id_category', '<small
                                                class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <smal class="text-dark">Description <span class="text-danger">*</span></smal>
                                 <textarea class="form-control form-control-sm" placeholder="Description"
                                     name="description" rows=4><?php echo set_value('description'); ?></textarea>
                                 <?=form_error('description', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-6">
                                     <smal class="text-dark">Price <span class="text-danger">*</span></smal>
                                     <input type="text" class="form-control form-control-sm" name="price"
                                         placeholder="Enter price.." value="<?php echo set_value('price'); ?>">
                                     <?=form_error('price', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-6">
                                     <smal class="text-dark">Discount </smal>
                                     <input type="text" class="form-control form-control-sm" name="discount"
                                         placeholder="Enter discount.." value="<?php echo set_value('discount'); ?>">
                                     <?=form_error('discount', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <smal class="text-dark">Minimum Words <span class="text-danger">*</span></smal>
                                     <input type="text" class="form-control form-control-sm" name="min_word"
                                         placeholder="" value="<?php echo set_value('min_word'); ?>">
                                     <?=form_error('min_word', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-3">
                                     <smal class="text-dark">Maximum Words <span class="text-danger">*</span></smal>
                                     <input type="text" class="form-control form-control-sm" name="max_word"
                                         placeholder="" value="<?php echo set_value('max_word'); ?>">
                                     <?=form_error('max_word', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-6">
                                     <smal class="text-dark">Completed Within <span class="text-danger">*</span></smal>
                                     <div class="input-group mb-3  input-group-sm">
                                         <input type="text" class="form-control form-control-sm" name="completed_within"
                                             value="<?php echo set_value('completed_within'); ?>">
                                         <div class="input-group-append ">
                                             <span class="input-group-text">Hours</span>
                                         </div>
                                     </div>

                                     <?=form_error('completed_within', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-primary btn-sm btn-block">
                                 Add Program
                             </button>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
     new SlimSelect({
         select: '#program'
     })
     </script>