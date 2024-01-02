<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
    .textalign{
        text-align: center;
    }
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="main">NewsLetter</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button class="btn btn-round btn-info save" type="button"><i class="fa fa-send"></i> send</button>
                                <!--<a href="<?php /*echo base_url().'Loyaltylist'*/?>" target="_blank"><button class="btn btn-round btn-success btn-block "><i class="fa fa-plus"></i>Go To List</button></a>-->
                            </li>

                        </ul>
                        <div class="clearfix"></div>

                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>NewsLetter</h2>
                        <!--    <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form method="post"  enctype="multipart/form-data" id="send_form" action="<?php echo base_url().'cms/Subscrider/send'?>">




                            <div class="x_panel">
                                <!--    <div class="x_title">
                                        <h2 class="main">Beacons</h2>

                                        <div class="clearfix"></div>
                                    </div>-->
                                <div class="x_content">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-6 col-xs-12 item form-group has-feedback">
                                            <label><?= $this->lang->line('subscriber')?></label>
                                            <select class="choose_subs form-control" name="subs[]" id="subs[]" required="required" multiple>
                                                <option value="all"><?= $this->lang->line('Alles')?></option>
                                                <?php foreach ($subs as $val){?>
                                                    <option value="<?php echo $val->sub_email?>"><?php echo $val->sub_email?></option>
                                                <?php }?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 item form-group has-feedback">
                                            <label><?= $this->lang->line('subject')?></label>
                                            <input type="text" class="form-control has-feedback-left" required="required" name="subject" id="subject" placeholder="<?= $this->lang->line('subject')?>">
                                            <span class="fa fa-cog form-control-feedback left" aria-hidden="true"></span
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12 item form-group has-feedback" >
                                            <label>
                                                <?= $this->lang->line('message')?>
                                            </label>
                                            <textarea class="message form-control" placeholder="Message" name=" <?= $this->lang->line('message')?>" minlength="1" maxlength="50" required="required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- /page content -->

<!-- footer content -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function() {
        $('body').on('click','.save', function () {
            $('#send_form').submit();
        });

        $('#send_form').on('submit',function(e) {
            var formURL=$(this).attr("action");
            var postData=$(this).serialize();
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url : formURL,
                type: "POST",
                data : postData,
                dataType:"json",
                success:function(res) {

                    if(res!=''){
                        new PNotify({
                            title: 'success',
                            text: res,
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#send_form').trigger('reset');
                        $(".choose_subs").val('').trigger("change");

                    }else{
                        new PNotify({
                            title: 'fail',
                            text: res,
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#send_form').trigger('reset');
                    }

                }

            });

        });


        $('.choose_subs').select2({
            placeholder: "Choose Subscriber",
            allowClear: true
        });

    });

</script>

<?php $this->load->view('admin/include/footer')?>

