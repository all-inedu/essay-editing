<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Current School</th>
            <th>School Name</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; foreach($students as $s) { ?>
        <tr>
            <td><?= $s['first_name']; ?></td>
            <td><?= $s['last_name'] ;?></td>
            <td><?= $s['email'] ;?></td>
            <td><?= $s['phone'] ;?></td>
            <td><?= $s['address'] ;?></td>
            <td><?= $s['current_school'] ;?></td>
            <td><?= $s['school_name'] ;?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>