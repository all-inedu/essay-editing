<div class="container-fluid animated--grow-in">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-cart-arrow-down"></i>&nbsp; Order Your Program
                </div>
                <div class="card-body" style="font-size:13px;">
                    <form action="" method="post" id="orderProgram">
                        <input type="hidden" name="email" value="<?=$user['email'];?>">
                        <input type="hidden" name="name" value="<?=$user['first_name'].' '.$user['last_name'];?>">
                        <input id="total" type="hidden" name="total">
                        <input id="id_prog" type="hidden" name="prog">
                        <input type="hidden" name="code" value="<?=$code;?>">
                        <label class="text-dark">Programs :</label>
                        <select name="program" id="program" class="mb-3" onChange="getProgram()">
                            <option value="">&#xf00b; &nbsp; Select your program</option>
                            <?php foreach($prog as $prog): ?>
                            <option value="<?=$prog['id_program'];?>">&#xf05d; &nbsp;<?=$prog['program_name'];?>
                            </option>
                            <?php endforeach;?>
                        </select>
                        <?=form_error('program', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>

                        <div class="info" style="display:none;">
                            <label class="text-dark">Description :</label>
                            <div id="desc"></div>
                            <hr style="margin-top:5px; margin-bottom:-10px;">
                            <label class="text-dark mt-3">Completed Within :</label>
                            <div id="time"></div>
                            <hr style="margin-top:5px; margin-bottom:-10px;">
                            <label class="mt-3 text-dark">Price :</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="price"></div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <b>
                                        <div id="disc"></div>
                                    </b>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary order-button" title="Order"
                                data-message="Code Transaction : <?=$code;?>">
                                <i class="fas fa-shopping-cart"></i>&nbsp; Order
                                Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header2">
                    <i class="fas fa-tasks"></i>&nbsp; Program List
                </div>
                <div class="card-body" style="font-size:13px;">
                    <div class="table-responsive">
                        <table class="table" id="dataTable1" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Transaction Code</th>
                                    <th>Program</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;foreach ($trans as $t): ?>
                                <tr>
                                    <td class="align-middle"><?=$i;?></td>
                                    <td class="align-middle"><?=$t['transaction_code'];?></td>
                                    <td class="align-middle"><?=$t['program_name'];?></td>
                                    <td class="align-middle">
                                        <?php if ($t['status'] <= 1) {$bt = 'disabled';?>
                                        <div class="text-danger" title="Incative">Inactive</div>
                                        <?php } else { $bt = '';?>
                                        <div class="text-success" title="Active">Active</div>
                                        <?php }?>
                                    </td>
                                    <td class="align-middle">
                                        <?=date("D, d-m-Y", strtotime($t['created_at']));?>
                                    </td>
                                    <td class="align-middle"><button class="btn btn-info btn-sm"
                                            onclick="window.location='<?=base_url('student/programs/essay/') . $t['id'] . '/' . $t['id_program'];?>'"
                                            <?=$bt;?>><i class="fas fa-cogs"></i>
                                            &nbsp; Manage</button></td>
                                </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new SlimSelect({
    select: '#program',
})

// function programs() {
//     $("#programList").load(" #programList");
//     console.log('hello');
// }

// setInterval(programs, 10000);

function getProgram() {
    var p = $('#program').val();
    if (p == '') {
        $('.info').hide();
    } else {
        $('.info').show();
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>student/student-json/programByIdJson/' + p,
            dataType: 'json',
            success: function(data) {
                $('#desc').html(data.description);
                $('#time').html(data.completed_within + ' hours');
                var price = (parseInt(data.price) + parseInt(data.discount));
                var prices = parseInt(data.price);
                var disc = parseInt(data.discount);
                $('#price').html('<del>Rp. ' + price.toLocaleString('id-ID') + '</del>');
                $('#disc').html('Rp. ' + prices.toLocaleString('id-ID'));
                $('#total').val(prices);
                $('#id_prog').val(p);
            }
        });
    }
}
</script>