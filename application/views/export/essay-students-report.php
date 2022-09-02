<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>Students Name</th>
            <th>University</th>
            <th>Essay Title</th>
            <th>Description</th>
            <th>Essay Deadline</th>
            <th>Application Deadline</th>
            <th>Files</th>
            <th>Status</th>
            <th>Uploaded Date</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; foreach($essay as $e) { ?>
        <tr>
            <td><?= $e['first_name'].' '.$e['last_name']; ?></td>
            <td><?= $e['university_name'] ;?></td>
            <td><?= $e['essay_title'];?></td>
            <td><?= $e['essay_prompt'];?></td>
            <td><?= $e['essay_deadline'] ;?></td>
            <td><?= $e['application_deadline'] ;?></td>
            <td><a
                    href="<?= base_url('upload_files/program/essay/students/'.$e['attached_of_clients']) ;?>">Download</a>
            </td>
            <td><?= $e['status_title'] ;?></td>
            <td><?= $e['uploaded_at'] ;?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>