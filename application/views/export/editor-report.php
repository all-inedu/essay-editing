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
            <th>Graduated From</th>
            <th>Major</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; foreach($editors as $e) { ?>
        <tr>
            <td><?= $e['first_name']; ?></td>
            <td><?= $e['last_name'] ;?></td>
            <td><?= $e['email'] ;?></td>
            <td><?= $e['phone'] ;?></td>
            <td><?= $e['address'] ;?></td>
            <td><?= $e['graduated_from'] ;?></td>
            <td><?= $e['major'] ;?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>