 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-5 mx-auto mt-5 mb-5">
             <div class="card shadow">
                 <div class="card-header">
                     Send invitation to the essay editor
                 </div>
                 <div class="card-body">
                     <form action="" method="post">
                         <label class="text-dark">Email <i class="text-danger">*</i> </label>
                         <input type="text" name="email" class="form-control form-control-sm">
                         <?=form_error('email', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                         <hr>
                         <div class="text-center">
                             <button type="submit" class="btn btn-sm btn-primary"><i
                                     class="far fa-paper-plane"></i>&nbsp;
                                 Send Email</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>