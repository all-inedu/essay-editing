<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header2">
                    <div class="float-left"><i class="fas fa-plus-circle"></i>&nbsp;
                        Add Categories / Tags
                    </div>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$cat['id_topic'];?>">
                        <label>Title</label>
                        <input type="text" class="form-control form-control-sm" name="title"
                            value="<?=$cat['topic_name'];?>">
                        <?=form_error('title', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                        <hr>
                        <div class="text-center">
                            <a href="<?=base_url('editor/categories');?>" class="btn btn-sm btn-warning"><i
                                    class="fas fa-undo"></i> &nbsp;Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>
                                &nbsp; Update</button>
                            <a href="<?=base_url('editor/categories/delete/'.$cat['id_topic']);?>"
                                class="btn btn-sm btn-danger delete-button" data-message="category/tags"><i
                                    class="fas fa-trash"></i> &nbsp; Delete</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4 animated--grow-in">
                <div class="card-header">
                    <div class="float-left"><i class="fas fa-tasks"></i>&nbsp;
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