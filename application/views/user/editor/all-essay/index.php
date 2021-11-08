 <!-- Begin Page Content -->
 <div id="listLoad">
     <div class="container-fluid">
         <div class="card mb-4">
             <div class="card-header py-3">
                 <div class="m-0"><i class="fas fa-clipboard-list"></i>&nbsp; <?=$title;?></div>
             </div>
             <div class="card-body" style="font-size:12px;">
                 <div class="table-responsive">
                     <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Student Name</th>
                                 <th>Mentor Name</th>
                                 <th>Editor Name</th>
                                 <th>Request (Editor)</th>
                                 <th>Program Name</th>
                                 <th width="15%">Essay Title</th>
                                 <th>Upload Date</th>
                                 <th>Essay Deadline</th>
                                 <th>App Deadline</th>
                                 <th width="10%">Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php 
                                $no = 1;foreach ($essay as $e): 
                                //  Status Read 
                                if($e['status_read_editor']==0){
                                    $read = "text-dark font-weight-bold";
                                    $title = "Unread";
                                } else {
                                    $read = "";
                                    $title = "Read";
                                }
                            ?>
                             <tr class="<?=$read;?>" data-toggle="tooltip" data-placement="top" title="<?=$title;?>"
                                 style="cursor:pointer"
                                 onclick="window.open('<?=base_url('editor/all-essay/status/'.$e['id_essay_clients']);?>')">
                                 <td class=" text-center align-middle"><?=$no;?></td>
                                 <td class="align-middle"><?=$e['first_name'] . ' ' . $e['last_name'];?></td>
                                 <td class="align-middle"><?=$e['mt_fn'] . ' ' . $e['mt_ln'];?></td>
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
                                 <td class="align-middle"><?=$e['category_name'];?> Editing
                                     (<?=$e['minimum_word'].' - '.$e['maximum_word'].' Words)';?></td>
                                 <td class="align-middle"><?=$e['essay_title'];?></td>
                                 <td class="align-middle"><?=date('d/m/Y', strtotime($e['uploaded_at']));?></td>
                                 <td class="align-middle"><?=date('d/m/Y', strtotime($e['essay_deadline']));?></td>
                                 <td class="align-middle"><?=date('d/m/Y', strtotime($e['application_deadline']));?>
                                 </td>
                                 <td class="align-middle <?=$alert;?>">
                                     <?=$icon;?>&nbsp; <?=$e['status_title'];?>
                                 </td>
                             </tr>
                             <?php $no++;endforeach;?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
setInterval(function() {

}, 1000);
 </script>
 <!-- /.container-fluid -->