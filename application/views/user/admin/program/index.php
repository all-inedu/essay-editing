 <div class="container-fluid">

     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-2"><i class="fas fa-tasks"></i>&nbsp; Programs
             </div>
             <a href="<?=base_url('admin/program/create');?>"
                 class="text-white btn btn-sm btn-outline-primary float-right"><i class="fas fa-plus"></i></a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Program Name</th>
                             <th>Description</th>
                             <th>Price</th>
                             <th>Max Word</th>
                             <th>Completed Within</th>
                             <th>Image</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($program as $p): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/program/view/<?php echo $p['id_program']; ?>'">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$p['program_name'];?></td>
                             <td class="align-middle"><?=$p['description'];?></td>
                             <td class="align-middle">Rp. <?=number_format($p['price'], 0, ',', '.');?></td>
                             <td class="align-middle text-center"><?=$p['maximum_word'];?></td>
                             <td class="align-middle text-center"><?=$p['completed_within'];?></td>
                             <td class="text-center align-middle"><img
                                     src="<?=base_url('upload_files/programs/' . $p['images']);?>" width="50"
                                     height="50" />
                             </td>
                         </tr>
                         <?php $no++;endforeach;?> </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->