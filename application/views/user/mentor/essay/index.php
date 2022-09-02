 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in" style="font-size:12px;" id="ongoing">
         <div class="card-header py-3">
             <div class="m-0"><i class="fas fa-clipboard-list"></i>&nbsp; Ongoing Essay List</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="1%">No</th>
                             <th>Student Name</th>
                             <th>Editor Name</th>
                             <th>Request (Editor)</th>
                             <th>Essay Title</th>
                             <th>Essay Deadline</th>
                             <th>App Deadline</th>
                             <th>Status</th>
                             <th width="1%"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                         $no = 1;foreach ($ongoing as $e): 
                        //  Status Read 
                         if($e['status_read']==0){
                            $read = "text-dark font-weight-bold";
                            $title = "Unread";
                         } else {
                             $read = "";
                             $title = "Read";
                         }
                        ?>
                         <tr class="<?=$read;?>" data-toggle="tooltip" data-placement="top" title="<?=$title;?>">
                             <td class="text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                             <td class="align-middle">
                                 <?php
                                        $id = $e['id_essay_clients'];
                                        $editor = $this->Essay_model->getEssayEditorsByEssayClients($id);
                                        if($editor){
                                            echo $editor['first_name'].' '.$editor['last_name'];
                                        } else {
                                            echo '<div class="text-left"> - </div>';
                                        }
                                    ?>
                             </td>
                             <td class="align-middle">
                                <?php 
                                    if($e['id_editors']>0) {
                                        $req = $this->Editors_model->getAllEditorsById($e['id_editors']);
                                        echo $req['first_name'].' '.$req['last_name'];
                                    } else {
                                        echo '-';
                                    }
                                ?>
                             </td>
                             <td class="align-middle"><?=$e['essay_title'];?></td>
                             <td class="align-middle" data-sort="<?=$e['essay_deadline'];?>"><?=date('D, d M Y', strtotime($e['essay_deadline']));?></td>
                             <td class="align-middle" data-sort="<?=$e['application_deadline'];?>"><?=date('D, d M Y', strtotime($e['application_deadline']));?></td>
                             <td class="align-middle text-danger">
                                 <i class="far fa-clock"></i>&nbsp; <?=$e['status_title'];?>
                             </td>
                             <td><a href="<?=base_url();?>mentor/essay-list/view/<?php echo $e['id_essay_clients']; ?>"
                                     class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                         </tr>
                         <?php $no++;endforeach;?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <div class="card mb-4 animated--grow-in" style="font-size:12px;" id="completed">
         <div class="card-header2 py-3">
             <div class="m-0"><i class="fas fa-clipboard-list"></i>&nbsp; Completed Essay List</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="1%">No</th>
                             <th>Student Name</th>
                             <th>Editor Name</th>
                             <th>Essay Title</th>
                             <th>Essay Deadline</th>
                             <th>App Deadline</th>
                             <th>Status</th>
                             <th width="1%"></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                         $no = 1;foreach ($completed as $f): 
                         //  Status Read 
                         if($f['status_read']==0){
                            $read = "text-dark font-weight-bold";
                            $title = "Unread";
                         } else {
                            $read = "";
                            $title = "Read";
                         }
                        ?>
                         <tr class="<?=$read;?>" style="cursor: pointer;" data-toggle="tooltip" data-placement="top"
                             title="<?=$title;?>">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$f['first_name'] . ' ' . $f['last_name'];?></td>
                             <td class="align-middle">
                                 <?php
                                        $id = $f['id_essay_clients'];
                                        $editor = $this->Essay_model->getEssayEditorsByEssayClients($id);
                                        if($editor){
                                            echo $editor['first_name'].' '.$editor['last_name'];
                                        } else {
                                            echo '<div class="text-left"> - </div>';
                                        }
                                    ?>
                             </td>
                             <td class="align-middle"><?=$f['essay_title'];?></td>
                             <td class="align-middle" data-sort="<?=$f['essay_deadline'];?>"><?=date('D, d M Y', strtotime($f['essay_deadline']));?></td>
                             <td class="align-middle" data-sort="<?=$f['application_deadline'];?>"><?=date('D, d M Y', strtotime($f['application_deadline']));?></td>
                             <td class="align-middle text-success">
                                 <i class="fas fa-clipboard-check"></i>&nbsp; <?=$f['status_title'];?>
                             </td>
                             <td><a href="<?=base_url();?>mentor/essay-list/view/<?php echo $f['id_essay_clients']; ?>"
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