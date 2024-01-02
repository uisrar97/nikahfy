<?php $this->load->view('admin/include/header') ?>
<?php $this->load->view('admin/include/sidebar') ?>
<style>
    .textalign {
        text-align: center;
    }

    /* td {
           color: black;
     }*/
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif') ?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="main"><?= $this->lang->line('pageseo')?></h2>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif') ?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!--  <div class="x_title">
                          <h2><i class="fa fa-align-left"></i>Pages Seo</h2>
                          <div class="clearfix"></div>
                      </div>-->
                    <div class="x_content">
                        <div id="accordion">
                            <h3><i class="fa fa-plus-circle"></i> <?= $this->lang->line('home')?></h3>
                            <div>
                                <div class="panel-body">
                                    <div class="row top_tiles">
                                        <form action="<?php echo base_url().'Seo/save' ?>" method="post">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-xs-12 vacation_message item">
                                                    <label>
                                                        <?= $this->lang->line('title')?>
                                                    </label>
                                                    <input type="text" required="required" class="message form-control"
                                                           placeholder="<?= $this->lang->line('title')?>" value="<?=$home["meta_title"];?>" name="title" id="title">
                                                    <input type="hidden" class="message form-control" name="type" id="title" value="home">

                                                </div>



                                                <div class="col-md-12 col-sm-12 col-xs-12 item form-group has-feedback">
                                                    <label><?= $this->lang->line('desc')?></label>
                                                    <textarea name="desc" id="desc" class="form-control"
                                                              rows="3"><?=$home["meta_description"];?></textarea>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <button type="submit" class="btn btn-primary pull-right"><?= $this->lang->line('update')?></button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                            <h3><i class="fa fa-plus-circle"></i> <?= $this->lang->line('contactus')?></h3>
                            <div>
                                <div class="panel-body">
                                    <div class="row top_tiles">
                                        <form action="<?php echo base_url().'Seo/save' ?>" method="post">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-xs-12 vacation_message item">
                                                    <label>
                                                   <?= $this->lang->line('title')?>
                                                    </label>
                                                    <input type="text" required="required" class="message form-control"
                                                           placeholder="<?= $this->lang->line('title')?>" value="<?=$contact["meta_title"];?>" name="title" id="title">
                                                    <input type="hidden" class="message form-control" name="type" id="title" value="contact">

                                                </div>


                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12 item form-group has-feedback">
                                                    <label><?= $this->lang->line('desc')?></label>
                                                    <textarea name="desc" id="desc" class="form-control"
                                                              rows="3"><?=$contact["meta_description"];?></textarea>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <button type="submit" class="btn btn-primary pull-right"><?= $this->lang->line('update')?></button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
							
							

							
							<h3><i class="fa fa-plus-circle"></i>About us</h3>
                            <div>
                                <div class="panel-body">
                                    <div class="row top_tiles">
                                        <form action="<?php echo base_url().'Seo/save' ?>" method="post">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-xs-12 vacation_message item">
                                                    <label>
                                                        <?= $this->lang->line('title')?>
                                                    </label>
                                                    <input type="text" required="required" class="message form-control"
                                                           placeholder=" <?= $this->lang->line('title')?>" value="<?=$gallery["meta_title"];?>" name="title" id="title">
                                                    <input type="hidden" class="message form-control" name="type" id="title" value="aboutus">

                                                </div>


                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12 item form-group has-feedback">
                                                    <label> <?= $this->lang->line('desc')?></label>
                                                    <textarea name="desc" id="desc" class="form-control"
                                                              rows="3"><?=$gallery["meta_description"];?></textarea>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">   <?= $this->lang->line('update')?></button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
							<!--
                            <h3><i class="fa fa-plus-circle"></i> <?/*= $this->lang->line('productshop')*/?></h3>
                            <div>
                                <div class="panel-body">
                                    <div class="row top_tiles">
                                        <form action="<?php /*echo base_url().'Seo/save' */?>" method="post">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-xs-12 vacation_message item">
                                                    <label>
                                                        <?/*= $this->lang->line('title')*/?>
                                                    </label>
                                                    <input type="text" required="required" class="message form-control"
                                                           placeholder="   <?/*= $this->lang->line('title')*/?>" value="<?/*=$shop["meta_title"];*/?>" name="title" id="title">
                                                    <input type="hidden" class="message form-control" name="type" id="title" value="shop">

                                                </div>



                                                <div class="col-md-12 col-sm-12 col-xs-12 item form-group has-feedback">
                                                    <label>   <?/*= $this->lang->line('desc')*/?></label>
                                                    <textarea name="desc" id="desc" class="form-control"
                                                              rows="3"><?/*=$shop["meta_description"];*/?></textarea>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">   <?/*= $this->lang->line('update')*/?></button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>-->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- footer content -->

<?php $this->load->view('admin/include/footer') ?>
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function () {
        $("#accordion").accordion();

        <?php if($this->session->flashdata('msg')){ ?>
        new PNotify({
            title: 'Save',
            text: '<?php echo $this->session->flashdata("msg");?>',
            type: 'info',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php } elseif ($this->session->flashdata('error')){?>

        new PNotify({
            title: 'Save',
            text: '<?php echo $this->session->flashdata("error");?>',
            type: 'error',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php }?>
/*        $('body').on('click', '.test', function () {
            var t = $('#title').val();
            var d = $('#desc').val();
            var k = $('#key').val();
            $.ajax({
                url: "",
                type: "POST",
                data: {title: t, desc: d, key: k},
                success: function (res) {
                    if (res != "false") {
                        $('#title').val('');
                        $('#desc').val('');
                        $('#key').val('');
                        new PNotify({
                            title: 'save',
                            text: 'Records Save successfully',
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });

                    } else {

                        new PNotify({
                            title: 'Branch | store',
                            text: 'No Branch | store Found',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });
        });*/


        /*        $('body').on('change','#store',function () {
                   var storeid=$(this).val();
                   var hid=$('#Hid').val();
                    $.ajax({
                        url: base_url+"admin/Manageloyalty/get_loyalty_statistic",
                        type:"POST",
                        dataType:"json",
                        data:{hid:hid,storeid:storeid},
                        success:function(res) {
                          $('#store').html('');
                            if(res!="false"){

                                alert("wating for hint about response")

                            }else{

                                new PNotify({
                                    title: 'Branch | store',
                                    text: 'No Branch | store Found',
                                    type: 'error',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                            }

                        }
                    });
                });*/

    });


</script>


