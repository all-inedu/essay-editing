<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Editors Name</th>
            <th>Students Name</th>
            <th>Program Name</th>
            <th>Essay Title</th>
            <th>Files</th>
            <th>Status</th>
            <th>Essay Rating</th>
            <th>Work Duration (Minutes)</th>
            <th>Notes</th>
            <th>Completed Date</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; foreach($essay as $e) { ?>
        <tr>
            <td><?=$i;?></td>
            <td><?= $e['editors_fn'].' '.$e['editors_ln']; ?></td>
            <td><?= $e['clients_fn'].' '.$e['clients_ln']; ?></td>
            <td><?= $e['program_name'].'('.$e['min'].'-'.$e['max'].')' ;?></td>
            <td><?= $e['essay_title'];?></td>
            <td>
                <?php if($e['managing_file']){ ?>
                    <a href="<?= base_url('upload_files/program/essay/revised/'.$e['managing_file']) ;?>">Download</a>
                <?php } else { ?>
                    <a href="<?= base_url('upload_files/program/essay/editors/'.$e['files']) ;?>">Download</a>
               <?php } ?>
            </td>
            <td><?= $e['status_title'] ;?></td>
            <td><?= $e['essay_rating'] ;?></td>
            <td><?= $e['duration'] ;?></td>
            <td><?= $e['notes'] ;?></td>
            <td><?= $e['completed_at'] ;?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>