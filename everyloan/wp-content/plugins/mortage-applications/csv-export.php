<?php

if(!class_exists("CSVExport")) {
class CSVExport {

    private $_csvData;

    public function  __construct() {
        $this->resetData();
    }

    public function resetData() {
        $this->_csvData = "";
    }

    public function openRow() {
        //  do nothing
    }

    public function closeRow() {
        $this->_csvData = rtrim($this->_csvData, ",");
        $this->_csvData .= "\n";
    }

    public function addEmptyRow() {
        $this->_csvData .= "\n";
    }

    public function addData($data="") {
        $this->_csvData .= strip_tags($data) . ",";
    }

    public function getCSVData() {
        return $this->_csvData;
    }

    public function downloadFile($filename="") {
        if(!$filename || $filename=='') $filename = "csv_export";
        if($this->_csvData!='') {
            header ('Content-type: application/csv');
            header ('Content-Disposition: inline; filename="' . $filename . '.csv"');
            echo $this;
            exit;
        }
    }

    public function  __toString() {
        return $this->getCSVData();
    }
}
}