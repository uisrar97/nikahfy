<style>
.cropmodal{
	z-index:9999 !important;
}
</style>

<footer>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-12">
               <a href="http://plandstudios.com/"> powered By Plan D Studios</a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                For email support, contact support@nikahfy.com
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="https://nikahfy.com" class="pull-right"> <img src="<?=base_url().'uploads/editor_images/logo_1.png'?>" style="width: 150px; height: 33px;"></a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
<!-- /Sidebar div(s) end -->
</div>
</div>
<script type="text/javascript">
    $(document).ajaxStart(function()
    {
        $('#loader').show();
    }).ajaxStop(function()
    {
        $('#loader').hide();
    });
    $(document).ready(function ()
    {
        $('body').on('click','#english',function()
        {
            var lang = 'english';
            $.ajax(
            {
                url:"<?php echo base_url();?>admin/Dashboard/change_lang/"+lang,
                success:function(response)
                {
                    location.reload();
                }
            });
        });
        $('body').on('click','#german',function()
        {
            var lang = 'german';
            $.ajax(
            {
                url:"<?php echo base_url();?>admin/Dashboard/change_lang/"+lang,
                success:function(response)
                {
                    location.reload();
                }
            });
        });
    });
</script>
<!-- jQuery -->

<!-- Bootstrap -->
<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url()?>assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url()?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url()?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url()?>assets/vendors/skycons/skycons.js"></script>
<script src="<?php echo base_url()?>assets/vendors/validator/validator.js"></script>
<!-- Flot -->
<script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url()?>assets/vendors/switchery/dist/switchery.min.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url()?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url()?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url()?>assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url()?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="<?php echo base_url()?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!--wizard jquery library-->

<script src="<?php echo base_url()?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- PNotify -->
<script src="<?php echo base_url()?>assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?php echo base_url()?>assets/build/js/custom.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()?>assets/vendors/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/clock/clock.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=<?= GOOGLE_API_KEY?>"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyCyrQXkRAMOxbeIY2bYRIEEqJaQNOFk7P0"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyrQXkRAMOxbeIY2bYRIEEqJaQNOFk7P0&libraries=places&callback=initMap"
        async defer></script> -->
</body>
</html>
