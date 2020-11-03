<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2 ">
                <div class="card-header2">
                    <div class="m-0 float-left"><i class="fas fa-plus-circle"></i>&nbsp;
                        Add Categories / Tags
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label>Title</label>
                        <input type="text" class="form-control form-control-sm" name="title">
                        <?=form_error('title', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Add
                                New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4 animated--grow-in">
                <div class="card-header">
                    <div class="m-0 float-left"><i class="fas fa-tasks"></i>&nbsp;
                        Categories / Tags
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($categories as $c): ?>
                            <tr>
                                <td class=" text-center align-middle"><?=$no;?></td>
                                <td class=" align-middle"><?=$c['topic_name'];?></td>
                                <td class="align-middle"><a
                                        href="<?=base_url();?>editor/categories/view/<?php echo $c['id_topic']; ?>"
                                        class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                            </tr>
                            <?php $no++;endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>