 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-1"><i class="fas fa-users"></i>&nbsp; Students</div>
             <div class="spinner-grow float-right bg-success" style="width: 1rem; height: 1rem; margin-top:0px;"
                 role="status">
                 <span class="sr-only">Loading...</span>
             </div>
             <div class="float-right ">
                 <a href="<?=base_url('admin/clients/sycnCRMClients');?>" class="btn btn-sm text-white"
                     style="margin-top:-10px;" data-toggle="tooltip" data-placement="left" title="Sycn CRM Clients"><i
                         class="fas fa-sync animated--fade-in"></i></a>
             </div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Student Name</th>
                             <th>Mentor Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>City</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($clients as $c): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/clients/view/<?php echo $c['id_clients']; ?>'"
                             data-toggle="tooltip" data-placement="top"
                             title="<?=$c['first_name'] . ' ' . $c['last_name'];?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$c['first_name'] . ' ' . $c['last_name'];?></td>
                             <td class="align-middle"><?=$c['first_name1'] . ' ' . $c['last_name1'];?></td>
                             <td class="align-middle"><?=$c['email'];?></td>
                             <td class="align-middle"><?=$c['phone'];?></td>
                             <td class="align-middle"><?=$c['address'];?></td>
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