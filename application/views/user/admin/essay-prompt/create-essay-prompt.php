 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-5 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-2"><i class="fas fa-file-upload"></i>&nbsp;
                 New Essay Prompt
             </div>
             <a href="<?=base_url('admin/essay-prompt');?>" class="btn btn-sm btn-outline-primary float-right"><i
                     class="fas fa-undo"></i></a>
         </div>
         <div class="card-body">
             <form method="post" action="<?=base_url('admin/essay-prompt/create');?>">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="form-group row">
                             <div class="col-md-6">
                                 <smal class="text-dark">University Name <span class="text-danger">*</span></smal>
                                 <select type="text" name="univ_name" id="univ">
                                     <option value="">Select university name.</option>
                                     <?php foreach ($univ as $univ): ?>
                                     <option value="<?php echo $univ['id_univ']; ?>">
                                         <?php echo $univ['university_name']; ?></option>
                                     <?php endforeach;?>
                                 </select>
                                 <?=form_error('univ_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             <div class="col-md-6">
                                 <smal class="text-dark">Title <span class="text-danger">*</span></smal>
                                 <input type="text" class="form-control form-control-sm" name="title"
                                     placeholder="Enter title .." value="<?php echo set_value('title'); ?>">
                                 <?=form_error('title', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                         </div>
                         <div class="form-group">
                             <smal class="text-dark">Description <span class="text-danger">*</span></smal>
                             <textarea class="form-control form-control-sm" placeholder="Description" name="description"
                                 rows=4><?php echo set_value('description'); ?></textarea>
                             <?=form_error('description', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="form-group">
                             <smal class="text-dark">Notes</smal>
                             <textarea class="form-control form-control-sm" placeholder="Notes" name="notes"
                                 rows=4><?php echo set_value('notes'); ?></textarea>
                             <?=form_error('notes', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         </div>
                         <div class="text-center">
                             <button type="submit" class="btn btn-primary btn-sm">
                                 Add Essay Prompt
                             </button>
                         </div>
             </form>
         </div>

     </div>
 </div>
 </div>
 <script>
new SlimSelect({
    select: '#univ'
})
 </script>