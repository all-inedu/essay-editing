 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header">
             <div class=""><i class="fas fa-users"></i>&nbsp; List of Ongoing Essay</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Student Name</th>
                             <th>Program Name</th>
                             <th>Title</th>
                             <th>Upload Date</th>
                             <th>Essay Deadline</th>
                             <th>Status</th>
                             <th width="10px"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                                $no = 1;foreach ($essay as $e): 
                                //  Status Read 
                                if($e['read']==0){
                                    $read = "text-dark font-weight-bold";
                                    $title = "Unread";
                                } else {
                                    $read = "";
                                    $title = "Read";
                                }
                            ?>
                         <tr class="<?=$read;?>" data-toggle="tooltip" data-placement="top" title="<?=$title;?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                             <td class="align-middle"><?=$e['program_name'];?></td>
                             <td class="align-middle"><?=$e['essay_title'];?></td>
                             <td class="align-middle"><?=date('D, d M Y', strtotime($e['uploaded_at']));?></td>
                             <td class="align-middle"><?=date('D, d M Y', strtotime($e['essay_deadline']));?></td>
                             <td class="align-middle text-danger">
                                 <?=$e['status_title'];?>
                             </td>
                             <td class="align-middle"><a
                                     href="<?=base_url();?>editor/essay-list/view/<?php echo $e['id_essay_editors']; ?>"
                                     class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                         </tr>
                         <?php $no++;endforeach;?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- verified List -->
     <div class="card mb-5 animated--grow-in">
         <div class="card-header2">
             <div class=""><i class="fas fa-users"></i>&nbsp; List of Completed Essay</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Student Name</th>
                             <th>Editor Name</th>
                             <th>Program Name</th>
                             <th>Title</th>
                             <th>Upload Date</th>
                             <th>Essay Deadline</th>
                             <th>Status</th>
                             <th width="10px"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                                $no = 1;foreach ($verified as $v): 
                                //  Status Read 
                                if($v['read']==0){
                                    $read = "text-dark font-weight-bold";
                                    $title = "Unread";
                                } else {
                                    $read = "";
                                    $title = "Read";
                                }
                            ?>
                         <tr class="<?=$read;?>" data-toggle="tooltip" data-placement="top" title="<?=$title;?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$v['first_name'] . ' ' . $v['last_name'];?></td>
                             <td class="align-middle">
                                 <?php
                                        $id = $v['id_essay_clients'];
                                        $editor = $this->essay->getEssayEditorsByEssayClients($id);
                                        if($editor){
                                            echo $editor['first_name'].' '.$editor['last_name'];
                                        } else {
                                            echo '<div class="text-center"> - </div>';
                                        }
                                    ?>
                             </td>
                             <td class="align-middle"><?=$v['program_name'];?></td>
                             <td class="align-middle"><?=$v['essay_title'];?></td>
                             <td class="align-middle"><?=date('d/M/Y', strtotime($v['uploaded_at']));?></td>
                             <td class="align-middle"><?=date('d/M/Y', strtotime($v['essay_deadline']));?></td>
                             <td class="align-middle text-success">
                                 <i class="fas fa-clipboard-check"></i>&nbsp; <?=$v['status_title'];?>
                             </td>
                             <td class="align-middle"><a
                                     href="<?=base_url();?>editor/essay-list/view/<?php echo $v['id_essay_editors']; ?>"
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