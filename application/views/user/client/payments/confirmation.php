<div class="container-fluid animated--grow-in">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header3">
                    <i class="fas fa-file-upload"></i>&nbsp; Confirmation
                    <div class="float-right">
                        <a href="<?=base_url('student/payment');?>" class="text-decoration-none text-dark"><i
                                class="far fa-arrow-alt-circle-left"></i> &nbsp;
                            Back To List</a>
                    </div>
                </div>
                <div class="card-body">
                    <?=form_open_multipart('');?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Transaction Code</label>
                                <input type="text" name="code" value="<?=$trans['transaction_code'];?>"
                                    class="form-control form-control-sm" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?=$trans['email'];?>"
                                    class="form-control form-control-sm" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Total Payment</label>
                                <input type="text" name="total"
                                    value="Rp. <?=number_format($trans['total'], 0, '.', '.');?>"
                                    class="form-control form-control-sm" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Transaction Date</label>
                                <input type="text" name="date" value="<?=$trans['created_at'];?>"
                                    class="form-control form-control-sm" readonly>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Upload Proof of Payment
                                </button>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group text-center">
                                <label>Upload Prof of Payment</label>
                                <div class="main-img-preview">
                                    <?php if ($trans['upload_file']) {?>
                                    <img class="thumbnail img-preview"
                                        src="<?=base_url('upload_files/payments/confirmation/' . $trans['upload_file']);?>"
                                        title="Preview Logo" width="80%" height="295">
                                    <?php } else {?>
                                    <img class="thumbnail img-preview"
                                        src="<?=base_url('upload_files/payments/confirmation/default.png');?>"
                                        title="Preview Logo" width="80%" height="295">
                                    <?php }?>
                                </div>
                                <br>
                                <div class="input-group">
                                    <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                                        placeholder="Choose Files" disabled="disabled">
                                    <div class="input-group-btn btn-group-sm">
                                        <div class="fileUpload btn bg-dark text-light fake-shadow"
                                            style="margin-left:-20px;">
                                            <span><i class="fas fa-upload"></i></span>
                                            <input id="logo-id" name="image" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                                <?=form_error('image', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://digitguruitsolutions.com/images/mobile_payment.gif" alt="Test" width="100%">
                <div class="card-body">
                    <h5 class="text-center">Bank Transfer</h5>
                    <hr>
                    <img src="https://cdn.worldvectorlogo.com/logos/bca-bank-central-asia.svg" width="25%"
                        class="float-left mt-2">
                    <p class="float-right">
                        Account Number : 3123221412
                        <br>
                        <b>PT. Jawara Edukasih Indonesia</b>
                    </p>
                    <hr style="margin-top:70px;">
                    <div class="float-left">
                        <span class="font-weight-bold"><i class="fas fa-phone"></i> &nbsp; 0271-xxxx</span>
                    </div>
                    <div class="float-right">
                        <span class="font-weight-bold"><i class="far fa-envelope"></i> &nbsp; info@all-inedu.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>