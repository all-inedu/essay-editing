<div class="container-fluid">
    <div class="card mb-4 animated--grow-in">
        <div class="card-header py-3">
            <div class="m-0 float-left pt-2"><i class="fas fa-university"></i>&nbsp;
                Universites</div>
            <a href="<?=base_url('editor/university/create');?>"
                class="btn btn-sm btn-outline-primary float-right text-white"><i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>University Name</th>
                            <th>Website</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th width="20%">Address</th>
                            <th width="14%">Image</th>
                            <th width="1%"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;foreach ($univ as $u): ?>
                        <tr>
                            <td class=" text-center align-middle"><?=$no;?></td>
                            <td class="align-middle"><?=$u['university_name'];?></td>
                            <td class="align-middle"><?=$u['website'];?></td>
                            <td class="align-middle"><?=$u['country'];?></td>
                            <td class="align-middle"><?=$u['phone'];?></td>
                            <td class="align-middle pt-4"><?=$u['address'];?></td>
                            <td class="text-center align-middle"><img
                                    src="<?=base_url('upload_files/univ/' . $u['photo']);?>" width="35%" />
                            </td>
                            <td class="align-middle"><a
                                    href="<?=base_url();?>editor/university/view/<?php echo $u['id_univ']; ?>"
                                    class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                        </tr>
                        <?php $no++;endforeach;?> </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->