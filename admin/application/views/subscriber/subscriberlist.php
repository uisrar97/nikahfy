<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/sidebar')?>
<style>
    .textalign{
        text-align: center;
    }
    #msg{
        overflow: scroll;
    }
</style>
<div class="modal fade bs-example-modal-md v" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2695B9; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
               <p><b>Subject:</b></p>
               <p id='sub'></p>
               <br>
               <p><b>Message:</b></p>
               <p id='msg'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <img id="loader" src="<?php echo base_url('assets/images/loader.gif')?>">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="main">Queries List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <!--<button class="btn btn-round btn-info btn-block addcat"><i class="fa fa-plus"></i> Add New</button>-->
                                <!--<button class="btn btn-round btn-info btn-block download"><i class="fa fa-download"></i> Download</button> -->
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
                    <!--<div class="x_title">
                            <h2>List of<small>Categories</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a></li>
                                         <li><a href="#">Settings 2</a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li><a class="close-link"><i class="fa fa-close"></i></a>
                                 </li>
                             </ul>
                             <div class="clearfix"></div>
                         </div>-->
                    <div class="x_content">
                        <!--  <p class="text-muted font-13 m-b-30">
                              Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                          </p>-->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr class="details-control">
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2695B9; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Record</h4>
            </div>
            <div class="modal-body">
                Are you sure To permanently Deleted Record?..
                <input type="hidden" class="catid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Do You Want To Cancel.</button>
                <button type="button" class="btn btn-primary deleted">Do You Want To Delete.</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->

<!-- footer content -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function() {
    
        $('body').on('click','.download',function () {
             window.open(base_url+'cms/Subscriber/download/', '_blank');
        });
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
            order: [],
            "scrollX": true,
            "ajax":{
                "url": base_url+"cms/Subscriber/get_subscriber",
                "processing" : true,
                "serverside" : false,
                "dataType": "json",
                "deferRender": true,
                "type": "GET"
            },
            /*      "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                      $("td:eq(2)", nRow).css('color', '#eb0000');


                  },*/
            "columns": [
                /*{
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },*/
                {
                    "data": "cnt"

                },
                {
                    "data": "fname"
                },
                {
                    "data": "email"
                },
                {
                    "data": "subject"
                },

                {
                    "data": "btn",
                    className: "textalign"
                }
            ]
        });
        $('body').on('click','.delete_cat',function () {

            var id=$(this).attr('id');
            $('.catid').val(id);
            $('.bs-example-modal-sm').modal('show');

        });
        $('body').on('click','.viewm',function () 
        {
            var id=$(this).attr('id');
            $.ajax({
                url:"<?php echo base_url().'cms/Subscriber/get_Subscriber_msg/'?>",
                type:"POST",
                dataType:"json",
                data:{id:id},
                success:function(res) 
                {
                    if(res!="false")
                    {
                        $('#sub').text(res.subject);
                        $('#msg').text(res.message);
                        $('.v').modal(
                        {
                            show:true,
                            backdrop:false
                        });
                    }
                    else
                    {
                        new PNotify({
                            title: 'No Message Found',
                            text: 'No Subscriber Message Exists.',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }
                }
            });
        });
        $('body').on('click','.editcategory',function () {

            var id=$(this).attr('id');
            $.ajax({
                url:"<?php echo base_url().'cms/Subscriber/get_Subscriber_id/'?>",
                type:"POST",
                dataType:"json",
                data:{catid:id},
                success:function(res) {
                    if(res!="false"){

                        $('.editemail').val(res.sub_email);
                        $('#sub_id').val(res.sub_id);
                        $('.editcatmodal').modal('toggle');

                    }else{

                        new PNotify({
                            title: 'Delete',
                            text: 'No Records Found!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });

        });

        $('body').on('click','.deleted',function (e) {
            var id= $('.catid').val();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.bs-example-modal-sm').modal('hide');
            $.ajax({
                url:"<?php echo base_url().'cms/Subscriber/Delete_subscribers/'?>",
                type:"POST",
                data:{id:id},
                success:function(res) {
                    if(res!="false"){

                        new PNotify({
                            title: 'Delete',
                            text: 'Category Successfully Deleted!',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                    }else{

                        new PNotify({
                            title: 'Delete',
                            text: 'Record Not Deleted!',
                            type: 'error',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                    }

                }
            });
        });


        /*=======================================save categories form using ajax========================================== */



        $('#addcategory_form').on('submit',function(e) {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url : formURL,
                type: "POST",
                data : postData,
                dataType:"json",
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                async:true,
                success:function(res) {

                    if(res!=''){
                        new PNotify({
                            title: 'save',
                            text: 'Records Inserted Successfully',
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                        $('#addcategory_form').trigger('reset');
                        $('.catmodal').modal('hide');

                    }else{
                        new PNotify({
                            title: 'save',
                            text: 'Records Not Inserted Successfully',
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#addcategory_form').trigger('reset');
                    }

                }

            });

        });
        $('#Editcategory_form').on('submit',function(e) {
            var formURL=$(this).attr("action");
            var postData=new FormData(this);
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url : formURL,
                type: "POST",
                data : postData,
                dataType:"json",
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success:function(res) {

                    if(res!=''){
                        new PNotify({
                            title: 'updated',
                            text: res,
                            type: 'info',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#datatable-responsive').DataTable().ajax.reload();
                        $('#Editcategory_form').trigger('reset');
                        $('.editcatmodal').modal('hide');

                    }else{
                        new PNotify({
                            title: 'updated',
                            text: res,
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3'
                        });
                        $('#Editcategory_form').trigger('reset');
                    }

                }

            });

        });



    });



</script>

<?php $this->load->view('admin/include/footer')?>

