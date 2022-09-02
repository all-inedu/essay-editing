<div class="container mt-5">
    <h3 class="text-muted"><i class="fas fa-clipboard-check"></i> &nbsp; Checkout</h3>
    <?php if ($this->session->flashdata('success')) {?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratultaion, </strong> <?=$this->session->flashdata('success');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }?>
    <br>
    <div class="row">
        <div class="col-md-8">
            <?php
echo form_open(base_url('home/process'));
echo form_hidden('code', $code);
echo form_hidden('email', $clients['email']);
echo form_hidden('amount', $this->cart->total_items());
echo form_hidden('total', $this->cart->total());

?>
            <div class="card shadow">
                <div class="card-header">
                    <h6>Information Clients</h6>
                </div>
                <div class="card-body">
                    <small>
                        <table class="table">
                            <tr>
                                <td width="30%">Transaction Code</td>
                                <td width="1%">:</td>
                                <td><input type="text" class="form-control form-control-sm" value="<?=$code;?>"
                                        readonly></td>
                            </tr>
                            <tr>
                                <td width="20%">Full Name</td>
                                <td width="1%">:</td>
                                <td><input type="text" class="form-control form-control-sm"
                                        value="<?=$clients['first_name'] . ' ' . $clients['last_name'];?>" name="name"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">E-mail Address</td>
                                <td width="1%">:</td>
                                <td><input type="text" class="form-control form-control-sm"
                                        value="<?=$clients['email'];?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Address</td>
                                <td width="1%">:</td>
                                <td><textarea class="form-control form-control-sm" rows=3
                                        readonly><?=$clients['address'];?></textarea>
                                </td>
                            </tr>
                        </table>
                    </small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h6>Detail Order </h6>
                    <hr>
                    <?php $i = 1;?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <small>Program</small><br>
                            <small><b><?php echo $items['qty'].' '.$items['name']; ?></b></small>
                        </div>
                        <div class="col-md-6 text-right">
                            <small><b>Rp. <?php echo number_format($items['price'], 0, '.', '.'); ?></b></small><br>
                            <small><del>Rp. <?php $real_price = $items['price'] + $items['discount'];
echo number_format($real_price, 0, '.', '.');?></del></small>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <?php $i++;?>
                    <?php endforeach;?>
                    <h6 class="float-left">Total </h6>
                    <small class="float-right"> Rp.
                        <?php echo number_format($this->cart->total(), 0, '.', '.'); ?></small>
                    <br><br>
                    <hr>
                    <div class="float-left">
                        <a href="<?=base_url('home/cart');?>" class="btn btn-outline-info btn-sm"><i
                                class="fas fa-bell"></i>
                            &nbsp;
                            Back to Cart</a>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fab fa-cloudscale"></i>
                            &nbsp;
                            Proccess</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>