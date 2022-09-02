 <!-- Begin Page Content -->
 <style>
p {
    margin: 0px;
}
 </style>
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-1"><i class="fas fa-users"></i>&nbsp; Students</div>
             <div class="spinner-grow float-right bg-success" style="width: 1rem; height: 1rem; margin-top:0px;"
                 role="status">
                 <span class="sr-only">Loading...</span>
             </div>
             <div class="float-right ">
                 <a href="#" data-toggle="modal" data-target="#sync" class="btn btn-sm text-white"
                     style="margin-top:-10px;" data-toggle="tooltip" data-placement="left" title="Sync CRM Clients"><i
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
                             <th width="15%">Phone</th>
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


 <div class="modal fade" id="sync" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h6>Sync Bigdata Platform</h6>
             </div>
             <div class="modal-body" style="font-size:10px;">
                 <table class="table table-bordered" width="100%">
                     <tr class="text-center">
                         <th>No</th>
                         <th>Students Name</th>
                         <th>Email</th>
                         <th>Mentor Name</th>
                     </tr>
                     <?php $no=1; foreach ($bigdata_clients as $b): ?>
                     <tr>
                         <td class="text-center"><?=$no;?></td>
                         <td><?=$b['first_name']." ".$b['last_name'];?></td>
                         <td><?=$b['email'];?></td>
                         <td class="text-center">
                             <?php
                                $mentor = $this->Mentors_model->getMentorsID($b['id_mentor']);
                                echo $mentor['first_name']." ".$mentor['last_name'];
                             ?>
                         </td>
                     </tr>
                     <?php $no++; endforeach; ?>
                 </table>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                 <a href="<?=base_url('admin/clients/syncCRMClients');?>" class="btn btn-primary btn-sm">Save
                     changes</a>
             </div>
         </div>
     </div>
 </div>

 <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
 <!-- /.container-fluid -->
 <!-- <script>
function alerts() {
    window.location.href = "";
}

setInterval(alerts, 10000);
 </script> -->