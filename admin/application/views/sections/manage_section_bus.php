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
                        <h2 class="main">Manage Section</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button class="btn btn-round btn-info btn-block"><a href="<?= base_url(); ?>pages/add_page" style="color: white;"><i class="fa fa-plus"></i> Add New</a></button>
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
                        <h2>List for<small>(Section)</small></h2>
                        <!--     <ul class="nav navbar-right panel_toolbox">
                                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                <th>Title</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; if(!empty($pages)) { foreach($pages as $page) { ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?=$i;?></td>
                                    <td style="vertical-align: middle;"><?= $page->page_title; ?></td>
                                    <td style="vertical-align: middle;">Section</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>pages/edit_page/<?= $page->page_id ; ?>" class="btn btn-primary edit_page btn-round btn-sm" ><span class="fa fa-edit"></span></a>
                                            <!--<a href="<?= base_url(); ?>pages/delete_page/<?= $page->page_id ; ?>" class="btn btn-danger delete_page"><span class="fa fa-trash-o"></span></a>-->
                                        </div>
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

