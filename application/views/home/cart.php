<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-muted"><i class="fas fa-bell"></i> &nbsp; View Cart</h3>
            <br>
            <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratultaion, </strong> <?=$this->session->flashdata('success');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <div class="card shadow">
                <div class="card-body">
                    <?php if ($this->cart->contents()) {?>
                    <table class="table table-bordered table-responsive" cellpadding=" 6" cellspacing="1"
                        style="width:100%">

                        <tr>
                            <th width="5%"></th>
                            <th style="text-align:center">QTY</th>
                            <th>Item Description</th>
                            <th style="text-align:center">Item Price</th>
                            <th style="text-align:right">Sub-Total</th>
                        </tr>

                        <?php $i = 1;?>

                        <?php foreach ($this->cart->contents() as $items): ?>

                        <?=form_open('home/update/' . $items['rowid']);?>

                        <tr>
                            <td class="align-middle text-center">
                                <a href="<?=base_url('home/delete/') . $items['rowid'];?>"
                                    class="btn btn-danger btn-sm btn-round"><i class="fas fa-window-close"></i></a>
                                <!-- <button type="submit" class="btn btn-warning btn-sm btn-round"><i
                                class="fas fa-pencil-alt"></i></button> -->
                            </td>
                            <td class="align-middle text-center">
                                <input type="text" name='qty' class="text-center" value="<?=$items['qty'];?>" max=1
                                    size=3 />
                            </td>
                            <td class="align-middle">
                                <?php echo $items['name']; ?>
                                <br>
                                <small>
                                    <strong>Discount : </strong> Rp.
                                    <?php echo number_format($items['discount'], 0, '.', '.'); ?><br />
                                </small>
                            </td>
                            <td class="align-middle" style="text-align:center">
                                Rp. <?php echo number_format($items['price'], 0, '.', '.'); ?>
                                <br>
                                <small>
                                    <del>Rp. <?php $real_price = $items['price'] + $items['discount'];
    echo number_format($real_price, 0, '.', '.');?></del></small>
                            </td>
                            <td class="align-middle" style="text-align:right">Rp.
                                <?php echo number_format($items['subtotal'], 0, '.', '.'); ?></td>
                        </tr>

                        <?=form_close();?>

                        <?php $i++;?>

                        <?php endforeach;?>

                        <tr>
                            <td colspan="3"> </td>
                            <td class="align-middle" style="text-align:center"><strong>Total :</strong></td>
                            <td class="align-middle" style="text-align:right">Rp.
                                <?php echo number_format($this->cart->total(), 0, '.', '.'); ?></td>
                        </tr>

                    </table>

                    <hr>

                    <div class="float-left">
                        <a href="<?=base_url('home/delete')?>" class="btn btn-sm btn-outline-danger"><i
                                class="fas fa-trash"></i>
                            &nbsp; Delete All</a>
                    </div>

                    <div class="float-right">
                        <a href="<?=base_url('home/checkout')?>" class="btn btn-sm btn-outline-primary"><i
                                class="fas fa-clipboard-check"></i> &nbsp; Checkout</a>
                    </div>

                </div>
                <?php } else {echo "<h4 class='text-center'>Empty Program List !</h4><br><p class='text-center'>Back to Home</p>";}?>
            </div>
        </div>
    </div>
</div>
<br><br><br>