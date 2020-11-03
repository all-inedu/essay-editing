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
                                 src="<?=base_url('upload_files/programs/' . $program['images']);?>"
                                 title="Preview Logo" width="100%">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="input-group" <?=$hidden;?>>
                 <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow" value="Choose File"
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
                     <div class="float-left pt-2"><i class="fas fa-tasks"></i>&nbsp;
                         Programs
                     </div>
                     <a href="<?=base_url('admin/program/delete/') . $program['id_program'];?>"
                         class="btn btn-sm btn-danger float-right ml-2 delete-button" title="Delete"
                         data-message="program"><i class="fas fa-trash"></i></a>
                     <a href="<?=base_url('admin/program/edit/') . $program['id_program'];?>"
                         class="btn btn-sm btn-warning float-right ml-2" title="Edit"><i
                             class="fas fa-pencil-alt"></i></a>
                     <a href="<?=base_url('admin/program');?>" class="btn btn-sm btn-primary float-right"><i
                             class="fas fa-undo"></i></a>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <smal class="text-dark">Program Name :</smal>
                                         <input type="text" name="program_name" class="form-control form-control-sm"
                                             value="<?=$program['program_name'];?>" <?=$disabled;?>>
                                         <?=form_error('program_name', '<small
                                                class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <smal class="text-dark">Program Category <span class="text-danger">*</span>
                                         </smal>
                                         <select type="text" name="id_category" id="program"
                                             placeholder="Enter program name.." <?=$disabled;?>>
                                             <option value="<?=$program['id_category'];?>">
                                                 <?=$program['category_name'];?>
                                             </option>
                                             <?php foreach ($category as $c): ?>
                                             <option value="<?=$c['id_category'];?>"><?=$c['category_name'];?></option>
                                             <?php endforeach;?>
                                         </select>
                                         <?=form_error('id_category', '<small
                                                class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                     </div>
                                 </div>
                             </div>

                             <div class=" form-group">
                                 <smal class="text-dark">Description :</smal>
                                 <textarea class="form-control form-control-sm" name="description" rows=4
                                     <?=$disabled;?>><?=$program['description'];?></textarea>
                                 <?=form_error('description', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-6">
                                     <smal class="text-dark">Price :</smal>
                                     <input type="text" class="form-control form-control-sm" name="price"
                                         value="<?=$program['price'];?>" <?=$disabled;?>>
                                     <?=form_error('price', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-6">
                                     <smal class="text-dark">Discount :</smal>
                                     <input type="text" class="form-control form-control-sm" name="discount"
                                         value="<?=$program['discount'];?>" <?=$disabled;?>>
                                     <?=form_error('discount', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <smal class="text-dark">Minimum Word :</smal>
                                     <input type="text" class="form-control form-control-sm" name="minimum_word"
                                         value="<?=$program['minimum_word'];?>" <?=$disabled;?>>
                                     <?=form_error('minimum_word', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-3">
                                     <smal class="text-dark">Maximum Word :</smal>
                                     <input type="text" class="form-control form-control-sm" name="maximum_word"
                                         value="<?=$program['maximum_word'];?>" <?=$disabled;?>>
                                     <?=form_error('maximum_word', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                                 <div class="col-md-6">
                                     <smal class="text-dark">Completed Within :</smal>
                                     <div class="input-group mb-3  input-group-sm">
                                         <input type="text" class="form-control form-control-sm" name="completed_within"
                                             value="<?=$program['completed_within'];?>" <?=$disabled;?>>
                                         <div class="input-group-append ">
                                             <span class="input-group-text">Hours</span>
                                         </div>
                                     </div>
                                     <?=form_error('completed_within', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                 </div>
                             </div>
                             <div class="text-center" <?=$hidden;?>>
                                 <hr>
                                 <button type="submit" class="btn btn-primary btn-sm" <?=$hidden;?>>
                                     Update Program
                                 </button>
                             </div>
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