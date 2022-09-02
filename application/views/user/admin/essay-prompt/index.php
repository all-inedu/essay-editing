 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-2"><i class="fas fa-file-upload"></i>&nbsp;
                 Essay
                 Prompt
             </div>
             <a href="<?=base_url('admin/essay-prompt/create');?>"
                 class="text-white btn btn-sm btn-outline-primary float-right"><i class="fas fa-plus"></i></a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>University Name</th>
                             <th>Title</th>
                             <th>Description</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php $no = 1;foreach ($prompt as $p): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/essay-prompt/view/<?php echo $p['id_essay_prompt']; ?>'">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$p['university_name'];?></td>
                             <td class="align-middle"><?=$p['title'];?></td>
                             <td class="align-middle"><?=word_limiter($p['description'], 10, ' ...');?></td>
                         </tr>
                         <?php $no++;endforeach;?> </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->