<div class="container-fluid animated--grow-in">
    <div class="card mb-2">
        <div class="card-header">
            <i class="far fa-clock"></i>&nbsp; Payment List
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable1" width="100%">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Transaction Code</th>
                        <th>Date</th>
                        <th>Total Payment</th>
                        <th>Status Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach ($trans as $t): ?>
                    <tr>
                        <td class="align-middle text-center"><?=$i;?></td>
                        <td class="align-middle"><?=$t['transaction_code'];?></td>
                        <td class="align-middle"><?=date('D, d-m-Y H:i:s', strtotime($t['created_at']));?>
                        </td>
                        <td class="align-middle">Rp. <?=number_format($t['total'], 0, '.', '.');?></td>
                        <td class="align-middle text-center">
                            <?php if ($t['status'] == 0) {$bt = '';?>
                            <a href="#" class="btn btn-sm btn-danger" title=''><i class="fas fa-stopwatch"></i></a>
                            <?php } else if ($t['status'] == 1) {$bt = '';?>
                            <a href="#" class="btn btn-sm btn-warning" title="Verify"><i class="far fa-clock"></i></a>
                            <?php }?>
                        </td>
                        <td class="align-middle text-center"><button class="btn btn-info btn-sm"
                                onclick="window.location='<?=base_url('student/payment/confirm/') . $t['id'];?>'"
                                <?=$bt;?>><i class="fas fa-file-upload"></i>
                                &nbsp; Confirmation</button></td>
                    </tr>
                    <?php $i++;endforeach;?>
                </tbody>
            </table>

        </div>
    </div>

    <div class="card  mb-4">
        <div class="card-header2">
            <i class="fas fa-shopping-cart"></i>&nbsp; Payment Success List
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable2" width="100%">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Transaction Code</th>
                        <th>Verified Date</th>
                        <th>Total Payment</th>
                        <th>Status Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach ($trans_paid as $tp): ?>
                    <tr>
                        <td class="align-middle text-center"><?=$i;?></td>
                        <td class="align-middle"><?=$tp['transaction_code'];?></td>
                        <td class="align-middle"><?=date('D, d-m-Y H:i:s', strtotime($tp['verified_at']));?>
                        </td>
                        <td class="align-middle">Rp. <?=number_format($tp['total'], 0, '.', '.');?></td>
                        <td class="align-middle text-center text-success">
                            <i class="fas fa-check"></i>&nbsp; Sussess
                        </td>
                    </tr>
                    <?php $i++;endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>