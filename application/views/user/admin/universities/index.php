 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-2"><i class="fas fa-university"></i>&nbsp;
                 Universites</div>
             <a href="<?=base_url('admin/university/create');?>"
                 class="btn btn-sm btn-outline-primary float-right text-white"><i class="fas fa-plus"></i>
             </a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>University Name</th>
                             <th>Website</th>
                             <th>Email</th>
                             <th>Country</th>
                             <th>Phone</th>
                             <th>Image</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php $no = 1;foreach ($univ as $u): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/university/view/<?php echo $u['id_univ']; ?>'">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$u['university_name'];?></td>
                             <td class="align-middle"><?=$u['website'];?></td>
                             <td class="align-middle"><?=$u['univ_email'];?></td>
                             <td class="align-middle"><?=$u['country'];?></td>
                             <td class="align-middle"><?=$u['phone'];?></td>
                             <td class="text-center align-middle"><img
                                     src="<?=base_url('upload_files/univ/' . $u['photo']);?>" width="50" height="50" />
                             </td>
                         </tr>
                         <?php $no++;endforeach;?> </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->