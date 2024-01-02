<?php
/**
 * Created by PhpStorm.
 * User: ikram khan
 * Date: 2/3/14
 * Time: 11:41 PM
 */
include("tcpdf.php");

/* class MYPDF extends TCPDF {
   public $CI;

   function __construct(){
       $this->CI =& get_instance();
       $this->CI->load->model("branchmodel");
   }

 public function Footer() {
       $branches['BranchInfo']=$this->CI->branchmodel->getData('',array('*'),array('BranchID'=>$this->CI->session->userdata("BranchID")));
       $this->CI->load->view('common/report_footer',$branches);
       $html = $this->CI->output->get_output();
       // Get output html
      /* $html = '<style type="text/css">
                   .arabiclang {			font-family:Helvetica, sans-serif;
                       font-size:7px;
                   }
                   .headerDate {
                       margin-bottom:0px;
                   }
                   .RowClass{
                       background-color:#999;
                       color:white;
                   }
               </style>
               <table class="arabiclang " width="100%" border="0" cellspacing="0" cellpadding="5">
                 <tr class="RowClass">
                   <td width="4%">&nbsp;</td>
                   <td width="63%">Branch Name : <?php echo $BranchInfo[0]->BranchName; ?></td>
                   <td width="33%">&nbsp;</td>
                 </tr>
               </table>';
       $this->writeHTML($html, true, false, true, false);
   }

}*/