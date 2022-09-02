 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-1"><i class="fas fa-users"></i>&nbsp; Students</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Students Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Address</th>
                             <th width="10px"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($clients as $c): ?>
                         <tr data-toggle="tooltip" data-placement="top"
                             title="<?=$c['first_name'] . ' ' . $c['last_name'];?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$c['first_name'] . ' ' . $c['last_name'];?></td>
                             <td class="align-middle"><?=$c['email'];?></td>
                             <td class="align-middle"><?=$c['phone'];?></td>
                             <td class="align-middle"><?=$c['address'];?></td>
                             <td><a href="<?=base_url();?>mentor/students/view/<?php echo $c['id_clients']; ?>"
                                     class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                         </tr>
                         <?php $no++;endforeach;?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->
 <!-- <script>
function alerts() {
    window.location.href = "";
}

setInterval(alerts, 10000);
 </script> -->