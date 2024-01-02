<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
    .textalign{
        text-align: center;
    }

    /* td {
           color: black;
     }*/
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="main"><?= $this->lang->line('mpages')?></h2>
                        <ul class="nav navbar-right panel_toolbox">

                                <li>
                                    <button class="btn btn-round btn-info btn-block addpages"><i class="fa fa-plus"></i> <?= $this->lang->line('addnew')?></button>
                                </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $this->lang->line('listfor')?><small>(<?= $this->lang->line('pages')?>)</small></h2>
                   <!--     <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Settings 1</a>
                                     </li>
                                     <li><a href="#">Settings 2</a>
                                     </li>
                                 </ul>
                             </li>
                             <li><a class="close-link"><i class="fa fa-close"></i></a>
                             </li>
                        </ul>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--  <p class="text-muted font-13 m-b-30">
                              Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                          </p>-->

                         <table id="pages_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?= $this->lang->line('title')?></th>
                                    <th><?= $this->lang->line('type')?></th>
                                    <th><?= $this->lang->line('action')?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; if(!empty($pages)) { foreach($pages as $page) { ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?=$i;?></td>
                                        <td style="vertical-align: middle;"><?= $page['page_title']; ?></td>
                                        <td style="vertical-align: middle;"><?= ($page['is_section'] == "yes")? "Section" : "Page"; ?></td>
                                        <td class="text-center" style="vertical-align: middle;">

                                                <a href="<?= base_url(); ?>pages/edit_page/<?= $page['page_id'] ; ?>" class="btn btn-primary edit_page btn-round btn-sm" ><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>pages/delete_page/<?= $page['page_id'] ; ?>" class="btn btn-danger btn-round delete_page"><i class="fa fa-trash-o"></i></a>

                                        </td>
                                    </tr>
                                    <?php $i++;} } ?>
                                </tbody>
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- footer content -->


<?php $this->load->view('admin/include/footer')?>
<script>
    var base_url='<?= base_url()?>';
    $(document).ready(function() {
        $('body').on('click','.addpages',function () {
            location.href=base_url+'pages/add_page';


        });

        <?php if($this->session->flashdata('success')){ ?>
        new PNotify({
            title: 'success',
            text: '<?php echo $this->session->flashdata("success");?>',
            type: 'info',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php } elseif ($this->session->flashdata('error')){?>

        new PNotify({
            title: 'Error',
            text: '<?php echo $this->session->flashdata("error");?>',
            type: 'error',
            hide: true,
            styling: 'bootstrap3'
        });
        <?php }?>


    });



</script>
