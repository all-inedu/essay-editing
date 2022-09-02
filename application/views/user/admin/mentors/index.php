 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left"><i class="fas fa-users"></i>&nbsp; Mentors</div>
             <div class="spinner-grow float-right bg-success" style="width: 1rem; height: 1rem; margin-top:0px;"
                 role="status">
                 <span class="sr-only">Loading...</span>
             </div>
             <div class="float-right">
                 <a href="<?=base_url('admin/mentors/sycnCRMMentors');?>" class="btn btn-sm text-white"
                     style="margin-top:-10px;" data-toggle="tooltip" data-placement="left" title="Sycn CRM Mentors"><i
                         class="fas fa-sync animated--fade-in"></i></a>
             </div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Mentor Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>City</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($mentors as $m): ?>
                         <tr data-toggle="tooltip" data-placement="top"
                             title="<?=$m['first_name'] . ' ' . $m['last_name'];?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$m['first_name'] . ' ' . $m['last_name'];?></td>
                             <td class="align-middle"><?=$m['email'];?></td>
                             <td class="align-middle"><?=$m['phone'];?></td>
                             <td class="align-middle"><?=$m['address'];?></td>
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