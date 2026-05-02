<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Compatibility layer: if PhpSpreadsheet is installed use it, otherwise fall back to bundled PHPExcel

if (class_exists('PHPExcel', false)) {
    return;
}

if (class_exists('\PhpOffice\PhpSpreadsheet\Spreadsheet')) {
    class PHPExcel {
        public $spreadsheet;
        public function __construct()
        {
            $this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        }
        public function setActiveSheetIndex($i)
        {
            $this->spreadsheet->setActiveSheetIndex($i);
        }
        public function getActiveSheet()
        {
            return new PHPExcel_Sheet_Wrapper($this->spreadsheet->getActiveSheet());
        }
        public function getSpreadsheet()
        {
            return $this->spreadsheet;
        }
        public function __call($name, $args)
        {
            if (method_exists($this->spreadsheet, $name)) {
                return call_user_func_array([$this->spreadsheet, $name], $args);
            }
            return null;
        }
    }

    class PHPExcel_Sheet_Wrapper {
        private $sheet;
        public function __construct($sheet)
        {
            $this->sheet = $sheet;
        }
        // Provide legacy method name SetCellValue used across the app
        public function SetCellValue($cell, $value)
        {
            return $this->sheet->setCellValue($cell, $value);
        }
        public function __call($name, $args)
        {
            if (method_exists($this->sheet, $name)) {
                return call_user_func_array([$this->sheet, $name], $args);
            }
            return null;
        }
    }

    // Minimal IOFactory replacement to create writers
    if (!class_exists('PHPExcel_IOFactory', false)) {
        class PHPExcel_IOFactory {
            public static function createWriter($obj, $type)
            {
                $map = [
                    'CSV' => 'Csv',
                    'Excel5' => 'Xls',
                    'Excel2007' => 'Xlsx',
                    'CSV' => 'Csv'
                ];
                $t = isset($map[$type]) ? $map[$type] : $type;
                $spreadsheet = (is_object($obj) && isset($obj->spreadsheet)) ? $obj->spreadsheet : $obj;
                return \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, $t);
            }
        }
    }

} else {
    // PhpSpreadsheet not installed — fall back to bundled PHPExcel
    require_once APPPATH . 'third_party/PHPExcel.php';
}
