<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mb-2" style="height:460px; overflow-y: scroll;">
            <!-- Recomendations -->
            <ul class="list-group">
                <li class="list-group-item font-weight-bold active">
                    Recomendations
                </li>
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#browser" id="rec">
                    <li class="list-group-item list-group-item-primary">
                        <div class="row">
                            <div class="col-md-10">
                                Use the google chrome browser application.
                            </div>
                            <div class="col text-right p-2">
                                <i class="fas fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </li>
                </a>
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#extension" id="rec">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                Install the docs viewer extension on google chrome.
                            </div>
                            <div class="col text-right p-2">
                                <i class="fas fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </li>
                </a>
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#track" id="rec">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                Activate <b>Track Changes</b> on your essay document (docx).
                            </div>
                            <div class="col text-right p-2">
                                <i class="fas fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </li>
                </a>
            </ul>

            <!-- Help -->
            <ul class="list-group mt-2">
                <li class="list-group-item font-weight-bold active">
                    Help
                </li>
                <a class="text-decoration-none text-dark" data-toggle="collapse" href="#essay" id="help">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                How to upload your essay?
                            </div>
                            <div class="col text-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </li>
                </a>
            </ul>

        </div>

        <div class="col-md-8" style="height:460px; overflow-y: scroll;">
            <div id="accordion">
                <!-- use google -->
                <div class="collapse show" id="browser" data-parent="#accordion">
                    <div class="card card-body text-dark" style="line-height: 26pt; font-size:13px;">
                        <h5>Use the google chrome browser application.</h5>
                        <hr style="margin-top:0px;">
                        Google Chrome is one of the most popular browsers on any platform, whether on a smartphone or
                        on a desktop.
                        <br>
                        How to Install the Google Chrome Browser on Windows 7, 8, 10
                        <ul>
                            <li>First download the software at <a href="https://www.google.com/chrome/">Google
                                    Chrome</a>.</li>
                            <li>After you download, run the installer file that was downloaded earlier.</li>
                            <li>Let the installer run to download the compatibility files until they are finished.</li>
                            <li>When finished, the Google Chrome browser will open and display a Welcome page.</li>
                        </ul>
                    </div>
                </div>
                <!-- docs viewer  -->
                <div class="collapse" id="extension" data-parent="#accordion">
                    <div class="card card-body text-dark" style="line-height: 26pt; font-size:13px;">
                        <h5>Install the docs viewer extension on google chrome.</h5>
                        <hr style="margin-top:0px;">
                        <ul>
                            <li>Please go to <a href="https://chrome.google.com/webstore/category/extensions">Google
                                    Chrome Extension</a> .</li>
                            <li>Type <b><i>Office Editing</i></b> in the search field or go to <a
                                    href="https://chrome.google.com/webstore/detail/office-editing-for-docs-s/gbkeegbaiigmenfmjfclcdgdpimamgkj">Office
                                    Editing</a> .</li>
                            <li>Click the Add to Chrome button.</li>
                            <li>If the extension is not compatible, please update your Google Chrome browser
                                application.</li>
                        </ul>
                    </div>
                </div>
                <!-- track changes  -->
                <div class="collapse" id="track" data-parent="#accordion">
                    <div class="card card-body text-dark" style="line-height: 26pt; font-size:13px;">
                        <h5>Activate <b>Track Changes</b> on your essay document (docx).</h5>
                        <hr style="margin-top:0px;">
                        When you make a document that is opened or opened with someone else, it is necessary to change
                        what has been changed, who made the change, and whenever the change was made.
                        <ul>
                            <li>On the Review tab, in the <b>Tracking group</b>, click <b>Track Changes</b> (if it's not
                                already
                                selected).</li>
                            <li>Click the drop-down list at the top of the <b>Tracking group</b> and select <b>All
                                    Markup</b> (if not
                                already selected).</li>
                        </ul>
                    </div>
                </div>

                <!-- upload your essay  -->
                <div class="collapse" id="essay" data-parent="#accordion">
                    <div class="card card-body text-dark" style="line-height: 26pt; font-size:13px;">
                        <h5>Upload your essay</h5>
                        <hr style="margin-top:0px;">
                        <ul>
                            <li>Click <b>New Request</b> menu, <i class="fas fa-arrow-right"></i> <b>Essay Editing</b>
                            </li>
                            <li>
                                Fill in the fields in the form.</li>
                            <li>Click <b>Upload Students Essay</b> button.
                                <img src="<?=base_url('assets/img/help/upload.png');?>" width="100%">
                        </ul>

                    </div>
                </div>


            </div>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('ul #rec li').click(function() {
        $('#rec li').removeClass("list-group-item-primary");
        $('#help li').removeClass("list-group-item-success");
        $(this).addClass("list-group-item-primary");
    });
});

$(document).ready(function() {
    $('ul #help li').click(function() {
        $('#help li').removeClass("list-group-item-success");
        $('#rec li').removeClass("list-group-item-primary");
        $(this).addClass("list-group-item-success");
    });
});
</script>