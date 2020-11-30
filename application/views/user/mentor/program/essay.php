<div id="programs">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card mb-4" style="font-size:13px;">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>&nbsp; Add a New Request
                    </div>
                    <div class="card-body ">
                        <?=form_open_multipart('');?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">Essay Title :</label>
                                    <input readonly type="hidden" name="id" value="">
                                    <input readonly type="text" value="Essay Editing"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                                <div class="col-md-6 mb-3">
                                    <label class="text-dark">Student Name : <span class="text-danger">*</span></label>
                                    <select name="student" id="student">
                                        <option data-placeholder="true"></option>
                                        <!-- <option value="">Select student name.</option> -->
                                        <?php foreach($students as $s):?>
                                        <option value="<?=$s['email'];?>">&#xf007; &nbsp;
                                            <?=$s['first_name'].' '.$s['last_name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('student', '<small
                                            class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                                </div>
                            <div class="col-md-6  mb-3">
                                <label class="text-dark">Request (Editor) :</label>
                                <select name="id_editors" id="editors">
                                    <option data-placeholder="true"></option>
                                    <!-- <option value="">Select number of word.</option> -->
                                    <?php foreach($editor as $e):?>
                                    <option value="<?=$e['id_editors'];?>">&#xf044; &nbsp;
                                        <?=$e['first_name'].' '.$e['last_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark">Number of Words : <span class="text-danger">*</span></label>
                                <select name="words" id="words">
                                    <option data-placeholder="true"></option>
                                    <!-- <option value="">Select number of word.</option> -->
                                    <?php foreach($programs as $p):?>
                                    <option value="<?=$p['id_program'];?>">&#xf039; &nbsp;
                                        <?=$p['minimum_word'].' - '.$p['maximum_word'].' Words';?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('words', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-dark">University Name : <span class="text-danger">*</span></label>
                                <select type="text" name="univ_name" id="univ">
                                    <option data-placeholder="true"></option>
                                    <?php foreach ($univ as $univ): ?>
                                    <option value="<?php echo $univ['id_univ']; ?>">&#xf0a9; &nbsp;
                                        <?php echo $univ['university_name'].' - '.$univ['country']; ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('univ_name', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>
                            <div class="col-md-6 mb-3" id="title">
                                <label class="text-dark">Essay Type : <span class="text-danger">*</span></label>
                                <select type="text" name="title" id="prompt" onChange="get_values()">
                                    <!-- <option id="default" value="0">Select essay prompt.</option> -->
                                    <option data-placeholder="true"></option>
                                    <?php foreach ($essay_title as $p): ?>
                                    <option value="<?= $p; ?>">
                                        &#xf02b; &nbsp; <?= $p; ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('title', '<small
                                        class="text-info"><span class="text-danger">*</span>&nbsp;', '</small>');?>
                            </div>

                        </div>

                        <!-- Essay Title -->
                        <div class="form-group mb-3" id="title1" style="display:none;">
                            <label class="text-dark">Essay Type : <span class="text-danger">*</span></label>
                            <input name="titleOther" id="titleOther" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group mb-3" id="desc1">
                            <label class="text-dark">Essay Prompt : <span class="text-danger">*</span></label>
                            <textarea name="essay_prompt" id="desc" class="form-control form-control-sm"
                                rows="4"></textarea>
                        </div>

                        <!-- End -->

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <label class="text-dark">Essay Deadline : <span class="text-danger">*</span></label>
                                <input type="date" name="essay_deadline" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark">Application Deadline : <span class="text-danger">*</span></label>
                                <input type="date" name="app_deadline" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 mt-1">
                                <div class="input-group">
                                    <input id="fakeUploadLogo" class="form-control form-control-sm fake-shadow"
                                        placeholder="Choose File" disabled="disabled">
                                    <div class="input-group-btn btn-group-sm">
                                        <div class="fileUpload btn bg-dark text-light fake-shadow"
                                            style="margin-left:-20px;">
                                            <span><i class="fas fa-upload"></i></span>
                                            <input id="logo-id" name="files" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-middle mt-1" style="font-size:14px;">
                                <small>Please double-check your file before you upload the essay.</small><br>
                                <small>File type allowed: Microsoft Word (docx).</small>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fas fa-cloud-upload-alt"></i>&nbsp; Upload Students Essay</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-2 text-center">
                    <a href="<?=base_url('mentor/program/resume');?>" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body p-4">
                                <img src="<?=base_url('assets/img/resume.png');?>" width="30%">
                            </div>
                            <div class="card-footer text-center bg-success text-white">
                                <h6>Resume Editing</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-2 text-center">
                    <a href="<?=base_url('mentor/program/cover-letter');?>" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body p-4">
                                <img src="<?=base_url('assets/img/cl.png');?>" width="30%">
                            </div>
                            <div class="card-footer text-center bg-danger text-white">
                                <h6>Cover Letter Editing</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.chained.min.js');?>"></script>
<script>
new SlimSelect({
    select: '#editors',
    placeholder: 'Select editor.'
})

new SlimSelect({
    select: '#words',
    placeholder: 'Select number of words.'
})
new SlimSelect({
    select: '#student',
    placeholder: 'Select student name.'
})
new SlimSelect({
    select: '#univ',
    placeholder: 'Select university.'
})

new SlimSelect({
    select: '#prompt',
    placeholder: 'Select essay prompt.'

})

function get_values() {
    var title = $('#prompt').val();
    if (title == 'Other') {
        document.getElementById('title1').style.display = 'block';
        document.getElementById("titleOther").focus();
    } else {
        document.getElementById('title1').style.display = 'none';
    }
}
</script>