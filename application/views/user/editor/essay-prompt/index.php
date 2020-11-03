 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card mb-4 animated--grow-in">
         <div class="card-header py-3">
             <div class="m-0 float-left pt-2"><i class="far fa-list-alt"></i>&nbsp;
                 Essay
                 Prompt
             </div>
             <a href="<?=base_url('editor/essay-prompt/create');?>"
                 class="btn btn-sm btn-outline-primary float-right text-white"><i class="fas fa-plus"></i></a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>University Name</th>
                             <th>Title</th>
                             <th>Description</th>
                             <th width="10px"></th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php $no = 1;foreach ($prompt as $p): ?>
                         <tr>
                             <td class=" text-center align-middle"><?=$no;?></td>
                             <td class="align-middle"><?=$p['university_name'];?></td>
                             <td class="align-middle"><?=$p['title'];?></td>
                             <td class="align-middle"><?=word_limiter($p['description'], 10, ' ...');?></td>
                             <td class="align-middle"><a
                                     href="<?=base_url();?>editor/essay-prompt/view/<?php echo $p['id_essay_prompt']; ?>"
                                     class="btn btn-block btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                         </tr>
                         <?php $no++;endforeach;?> </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->