 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-5">
             <div class="card">
                 <div class="card-header">
                     Completed Essay
                 </div>
                 <div class="card-body">
                     <form action="" method="post">
                         <div class="row">
                             <div class="col-md-12 mb-3">
                                 <label>Editor Name</label>
                                 <select name="editors" id="editors">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($editors as $ed): ?>
                                    <option value="<?=$ed['email'];?>" <?php if($se==$ed['email']){echo 'selected';}?>>
                                        <?=$ed['first_name'].' '.$ed['last_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                    <option disabled>───────────────────────────</option>
                                    <option value="all" <?php if($se=='all'){echo 'selected';}?>><b>All Editors</b></option>
                                 </select>
                                 <?=form_error('editors', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                             </div>
                             
                             <div class="col mb-3">
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
                             <div class="col-md-12">
                                <label>Essay Type</label>
                                <select name="essay_type" id="essay_type">
                                    <option data-placeholder="true"></option>
                                    <?php foreach ($essay_title as $p): ?>
                                    <option value="<?= $p; ?>" <?php if($p==$et){echo 'selected';}?>>
                                        &#xf02b; &nbsp; <?= $p; ?></option>
                                    <?php endforeach;?>
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
                     <!--    <a target='_blank' href="<?=base_url('admin/export/essay-editors/'.$month.'/'.$year.'/'.$se);?>"-->
                     <!--        class="btn btn-sm text-white"><i class="fas fa-file-excel"></i>&nbsp; Export to-->
                     <!--        Excell</a>-->
                     <!--</div>-->
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table width="100%" class="table table-bordered table-hover" id="dataTable1" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th class="align-middle text-center">Editors Name</th>
                                     <th class="align-middle text-center">Students Name</th>
                                     <th class="align-middle text-center">Program Name</th>
                                     <th class="align-middle text-center">Essay Title</th>
                                     <th class="align-middle text-center">Files</th>
                                     <th class="align-middle text-center">Status</th>
                                     <th class="align-middle text-center">Essay Rating</th>
                                     <th class="align-middle text-center">Work Duration (Minutes)</th>
                                     <th class="align-middle text-center">Uploaded Date</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i=1; foreach($essay as $e) { ?>
                                 <tr style="font-size:12px;">
                                     <td class=" text-center align-middle"><?=$i;?></td>
                                     <td class="align-middle"><?= $e['editors_fn'].' '.$e['editors_ln']; ?></td>
                                     <td class="align-middle"><?= $e['clients_fn'].' '.$e['clients_ln']; ?></td>
                                     <td class="align-middle"><?= $e['program_name'].'('.$e['min'].'-'.$e['max'].')' ;?>
                                     </td>
                                     <td class="align-middle"><?= $e['essay_title'] ;?></td>
                                     <td class="align-middle">
                                        <?php if($e['managing_file']){ ?>
                                         <a href="<?= base_url('upload_files/program/essay/revised/'.$e['managing_file']) ;?>" target="_blank">Download</a>
                                         <?php } else { ?>
                                         <a href="<?= base_url('upload_files/program/essay/editors/'.$e['files']) ;?>" target="_blank">Download</a>
                                        <?php } ?>
                                     </td>
                                     <td class="align-middle"><?= $e['status_title'] ;?></td>
                                     <td class="align-middle text-center"><?= $e['essay_rating'] ;?></td>
                                     <td class="align-middle text-center"><?= $e['duration'] ;?></td>
                                     <td class="align-middle text-center"><?= date('d/m/Y H:i:s', strtotime($e['upload'])) ;?></td>
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
    select: '#editors',
    placeholder: 'Select editor name.',
    allowDeselect: true
})

new SlimSelect({
    select: '#month',
    placeholder: 'Select month.',
    allowDeselect: true
})

new SlimSelect({
    select: '#year',
    placeholder: 'Select year.',
    allowDeselect: true
})

new SlimSelect({
    select: '#essay_type',
    placeholder: 'Select essay type.',
    allowDeselect: true
})
 </script>