 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0"><i class="fas fa-users"></i>&nbsp; Completed Essay List</div>
         </div>
         <div class="card-body" style="font-size:12px;">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Student Name</th>
                             <th>Mentor Name</th>
                             <th>Editor Name</th>
                             <th width="25%">Essay Title</th>
                             <th>Essay Deadline</th>
                             <th width="10%">Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;foreach ($essay as $e): ?>
                         <tr style="cursor: pointer;"
                             onclick="window.location='<?=base_url();?>admin/essay-list/status/<?php echo $e['id_essay_clients']; ?>'">
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                             <td class="align-middle">
                                    <?php
                                        $mail = $e['mentors_mail'];
                                        $mentor = $this->Mentors_model->getMentorsMail($mail);
                                        if($mentor){
                                            echo $mentor['first_name'].' '.$mentor['last_name'];
                                        } else {
                                            echo '<div class="text-center"> - </div>';
                                        }
                                    ?>
                             </td>
                             <td class="align-middle">
                                 <?php
                                        $id = $e['id_essay_clients'];
                                        $editor = $this->Essay_model->getEssayEditorsByEssayClients($id);
                                        if($editor){
                                            echo $editor['first_name'].' '.$editor['last_name'];
                                        } else {
                                            echo '<div class="text-center"> - </div>';
                                        }
                                    ?>
                             </td>
                             <td class="align-middle"><?=$e['essay_title'];?></td>
                             <td class="align-middle" data-sort="<?=$e['essay_deadline'];?>"><?=date('D, d M Y', strtotime($e['essay_deadline']));?></td>
                             <td class="align-middle text-success">
                                 <i class="fas fa-clipboard-check"></i>&nbsp; <?=$e['status_title'];?>
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