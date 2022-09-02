 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-5">
             <div class="card">
                 <div class="card-header">
                     Ongoing Essay
                 </div>
                 <div class="card-body">
                     <form action="" method="post">
                         <div class="row">
                             <div class="col">
                                 <label>Month</label>
                                 <select name="month" id="month">
                                     <option value="01" <?php if($month==1){echo 'selected';}?>>Januari</option>
                                     <option value="02" <?php if($month==2){echo 'selected';}?>>Februari</option>
                                     <option value="03" <?php if($month==3){echo 'selected';}?>>Maret</option>
                                     <option value="04" <?php if($month==4){echo 'selected';}?>>April</option>
                                     <option value="05" <?php if($month==5){echo 'selected';}?>>Mei</option>
                                     <option value="06" <?php if($month==6){echo 'selected';}?>>Juni</option>
                                     <option value="07" <?php if($month==7){echo 'selected';}?>>Juli</option>
                                     <option value="08" <?php if($month==8){echo 'selected';}?>>Agustus</option>
                                     <option value="09" <?php if($month==9){echo 'selected';}?>>September</option>
                                     <option value="10" <?php if($month==10){echo 'selected';}?>>Oktober</option>
                                     <option value="11" <?php if($month==11){echo 'selected';}?>>November</option>
                                     <option value="12" <?php if($month==12){echo 'selected';}?>>Desember</option>
                                 </select>
                             </div>
                             <div class="col">
                                 <label>Year</label>
                                 <select name="year" id="year">
                                     <?php
                                    $mulai= date('Y') - 5;
                                    for($i = $mulai;$i<$mulai + 10;$i++){
                                        $sel = $i == $year ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                ?>
                                 </select>
                             </div>
                         </div>
                         <hr>
                         <div class="text-center">
                             <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i> &nbsp;
                                 Search &nbsp;</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <div class="row mt-3">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header2">
                     <!--<div class="float-right">-->
                     <!--    <a target='_blank' href="<?=base_url('admin/export/essay-students/'.$month.'/'.$year);?>"-->
                     <!--        class="btn btn-sm text-white"><i class="fas fa-file-excel"></i>&nbsp; Export to-->
                     <!--        Excell</a>-->
                     <!--</div>-->
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table width="100%" class="table table-bordered table-hover" id="dataTable1" cellspacing="0">
                             <thead>
                                 <tr style="font-size:12px;">
                                     <th class="align-middle text-center">No</th>
                                     <th class="align-middle text-center">Students Name</th>
                                     <th class="align-middle text-center">Editor Name</th>
                                     <th class="align-middle text-center">University</th>
                                     <th class="align-middle text-center">Essay Title</th>
                                     <th class="align-middle text-center">Essay Prompt</th>
                                     <th class="align-middle text-center">Essay Deadline</th>
                                     <th class="align-middle text-center">Application Deadline</th>
                                     <th class="align-middle text-center">Students File</th>
                                     <th class="align-middle text-center">Status</th>
                                     <th class="align-middle text-center">Uploaded Date</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i=1; foreach($essay as $e) { ?>
                                 <tr style="font-size:12px;">
                                     <td class=" text-center align-middle"><?=$i;?></td>
                                     <td class="align-middle"><?= $e['first_name'].' '.$e['last_name']; ?></td>
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
                                     <td class="align-middle"><?= $e['university_name'] ;?></td>
                                     <td class="align-middle"><?= $e['essay_title'];?></td>
                                     <td class="align-middle"><?= word_limiter($e['essay_prompt'],10) ;?></td>
                                     <td class="align-middle text-center"><?= date('d/m/Y', strtotime($e['essay_deadline']));?></td>
                                     <td class="align-middle text-center">
                                         <?= date('d/m/Y', strtotime($e['application_deadline']));?></td>
                                     <td class="align-middle text-center"><a
                                             href="<?= base_url('upload_files/program/essay/students/'.$e['attached_of_clients']) ;?>">Download</a>
                                     </td>
                                     <td class="align-middle text-center"><?= $e['status_title'] ;?></td>
                                     <td class="align-middle text-center"><?= date('d/m/Y H:i:s', strtotime($e['uploaded_at']));?></td>
                                 </tr>
                                 <?php $i++; } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>

 <script>
new SlimSelect({
    select: '#month',
    placeholder: 'Select month.'
})

new SlimSelect({
    select: '#year',
    placeholder: 'Select year.'
})
 </script>