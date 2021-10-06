 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-1"><i class="fas fa-users"></i>&nbsp; Editors</div>
             <a href="<?=base_url('admin/editors/create');?>" class="btn btn-sm btn-primary float-right"
                 data-toggle="tooltip" data-placement="bottom" title="Create New Editor"><i class="fas fa-plus"></i></a>
             <a href="<?=base_url('admin/editors/invite');?>" class="btn btn-sm btn-success float-right mr-2"
                 data-toggle="tooltip" data-placement="bottom" title="Invit Editor"><i class="far fa-envelope"></i></a>

         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Editor Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>City</th>
                             <th>Position</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($editors as $e): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/editors/view/<?php echo $e['id_editors']; ?>'"
                             data-toggle="tooltip" data-placement="top"
                             title="<?=$e['first_name'] . ' ' . $e['last_name'];?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                             <td class="align-middle"><?=$e['email'];?></td>
                             <td class="align-middle"><?=$e['phone'];?></td>
                             <td class="align-middle"><?=$e['address'];?></td>
                             <td class="align-middle"><?=$e['position_name'];?></td>
                             <td class="align-middle text-center">
                                 <?php if($e['status']==1) { ?>
                                 <div class="badge badge-success p-2">Activated</div>
                                 <?php } else { ?>
                                 <div class="badge badge-danger p-2">Deactivated</div>
                                 <?php } ?>
                             </td>
                         </tr>
                         <?php $no++;endforeach;?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->