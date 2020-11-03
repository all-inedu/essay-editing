 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header">
             <div class="mt-2 float-left"><i class="fas fa-users"></i>&nbsp; Editors</div>
             <!-- <a href="<?=base_url('editor/lists/create');?>" class="btn btn-sm btn-primary float-right"
                 data-toggle="tooltip" data-placement="bottom" title="Create New Editor"><i class="fas fa-plus"></i></a> -->
             <a href="<?=base_url('editor/lists/invite');?>" class="btn btn-sm btn-success float-right mr-2"
                 data-toggle="tooltip" data-placement="bottom" title="Invit Editor"><i class="far fa-envelope"></i></a>

         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Editor Name</th>
                             <th>Email</th>
                             <th>Do Tomorrow</th>
                             <th>Due Within 3 Day</th>
                             <th>Due Within 5 Day</th>
                             <th>Position</th>
                             <th width="10px"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($editors as $e): 
                            $editor = $e['email'];
                            $ongoing1 = count($this->essay->essayDeadlineToEditor($editor,'0','1'));
                            $ongoing2 = count($this->essay->essayDeadlineToEditor($editor,'2','3'));
                            $ongoing3 = count($this->essay->essayDeadlineToEditor($editor,'4','5'));
                         ?>
                         <tr data-toggle="tooltip" data-placement="top"
                             title="<?=$e['first_name'] . ' ' . $e['last_name'];?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                             <td class="align-middle"><?=$e['email'];?></td>
                             <td class="align-middle text-right">
                                 <?=$ongoing1;?> Essays
                             </td>
                             <td class="align-middle text-right">
                                 <?=$ongoing2;?> Essays
                             </td>
                             <td class="align-middle text-right">
                                 <?=$ongoing3;?> Essays
                             </td>
                             <td class="align-middle"><?= $e['position_name'];?></td>
                             <td class="align-middle"><a
                                     href="<?=base_url();?>editor/lists/view/<?php echo $e['id_editors']; ?>"
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