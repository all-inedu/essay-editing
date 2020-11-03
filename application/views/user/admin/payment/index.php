<div class="container-fluid">
    <div class="card animated--grow-in mb-5">
        <div class="card-header">
            <div class="m-0 float-left pt-1"><i class="fas fa-shopping-cart"></i>&nbsp;
                Payment List</div>
        </div>
        <div class="card-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item ">
                    <a class="nav-link active text-dark" data-toggle="tab" href="#pending">Pending <span
                            class="badge badge-danger"><?=count($pending);?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#verify">Verify <span
                            class="badge badge-warning"><?=count($verify);?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#paid">Paid <span
                            class="badge badge-success"><?=count($paid);?></span></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="pending">
                    <br><br>
                    <h4>Pending List</h4>
                    <hr>
                    <table class="table table-bordered" id="dataTable1" width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Transaction Code</th>
                                <th>Date</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Total Payment</th>
                                <th>Status Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;foreach ($pending as $pd): ?>
                            <tr>
                                <td class="align-middle text-center"><?=$i;?></td>
                                <td class="align-middle text-center"><?=$pd['transaction_code'];?></td>
                                <td class="align-middle text-center">
                                    <?=date('d M Y', strtotime($pd['created_at']));?><br>
                                    <small><?=date('h:i:s', strtotime($pd['created_at']));?></small>
                                </td>
                                <td class="align-middle text-center"><?=$pd['email'];?></td>
                                <td class="align-middle text-center"><?=$pd['full_name'];?></td>
                                <td class="align-middle text-center">Rp. <?=number_format($pd['total'], 0, '.', '.');?>
                                </td>
                                <td class="align-middle text-center">

                                    <a href="#" class="btn btn-sm btn-danger" title=''><i
                                            class="fas fa-stopwatch"></i></a>

                                    <!-- <a href="#" class="btn btn-sm btn-warning" title="Verify"><i
                                            class="far fa-clock"></i></a>

                                    <a href="#" class="btn btn-sm btn-success" title="Success"><i
                                            class="fas fa-check"></i></a> -->

                                </td>
                            </tr>
                            <?php $i++;endforeach;?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane container fade" id="verify">
                    <br><br>
                    <h4>Verify List</h4>
                    <hr>
                    <table class="table table-bordered " id="dataTable2" width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Transaction Code</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Total Payment</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;foreach ($verify as $v): ?>
                            <tr>
                                <td class="align-middle text-center"><?=$i;?></td>
                                <td class=" align-middle text-center"><?=$v['transaction_code'];?></td>
                                <td class="align-middle text-center"><?=$v['email'];?></td>
                                <td class="align-middle text-center"><?=$v['full_name'];?></td>
                                <td class="align-middle text-center">Rp. <?=number_format($v['total'], 0, '.', '.');?>
                                </td>
                                <td class="align-middle text-center">
                                    <img id="myImg<?=$i;?>"
                                        src="<?=base_url('upload_files/payments/confirmation/' . $v['upload_file']);?>"
                                        class="img-thumbnail img-embed-responsive" width="50px">

                                    <!-- The Modal -->
                                    <div id="myModal" class="modals">
                                        <!-- The Close Button -->
                                        <span class="closes">&times;</span>
                                        <!-- Modal Content (The Image) -->
                                        <img class="modals-content" id="img">
                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption <?=$i;?>"></div>
                                    </div>

                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?=base_url('admin/payments/verified/') . $v['id'];?>"
                                        class="btn btn-sm btn-success verified-button" title="Verify"
                                        data-message="Code : <?=$v['transaction_code'];?>">
                                        <i class="fas fa-check-square"></i>
                                        &nbsp; Verified
                                    </a>
                                </td>
                            </tr>
                            <?php $i++;endforeach;?>
                        </tbody>
                    </table>
                </div>


                <div class="tab-pane container fade" id="paid">

                    <br><br>
                    <h4>Paid List</h4>
                    <hr>
                    <table class="table table-bordered" id="dataTable3" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Transaction Code</th>
                                <th>Vierified Date</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Total Payment</th>
                                <th>Status Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;foreach ($paid as $p): ?>
                            <tr>
                                <td class="align-middle text-center" width="1%"><?=$i;?></td>
                                <td class="align-middle text-center"><?=$p['transaction_code'];?></td>
                                <td class="align-middle text-center">
                                    <?=date('d M Y', strtotime($p['verified_at']));?><br>
                                    <small><?=date('h:i:s', strtotime($p['verified_at']));?></small>
                                </td>
                                <td class="align-middle text-center"><?=$p['email'];?></td>
                                <td class="align-middle text-center"><?=$p['full_name'];?></td>
                                <td class="align-middle text-center">Rp. <?=number_format($p['total'], 0, '.', '.');?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="#" class="btn btn-sm btn-success" title="Success"><i
                                            class="fas fa-check"></i></a>

                                </td>
                            </tr>
                            <?php $i++;endforeach;?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>