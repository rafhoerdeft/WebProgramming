<?php 

include_once APPPATH . '/third_party/phpExcel/PHPExcel.php';
class MsExcel extends PHPExcel {
   public function __construct() {
      parent::__construct();
   }
}

 ?>