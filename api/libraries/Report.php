<?php
use Dompdf\Dompdf;

class Report{
    private $dompdf;
    private $file;

    public function __construct(){
        $this->dompdf = new Dompdf();
    }

    public function generatePdf(){
        //testing method only. need to implement properly
        $folder = date("Y-m-d");
        if(! is_dir($folder)) {
            mkdir($folder);
        }
        $fileName = uniqid().".php";
        $this->dompdf->loadHtml('hello world');
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $output = $this->dompdf->output();
        $this->file = $fileName;
        file_put_contents($fileName, $output);
    }

    public function getFileUrl(){
        return $_SERVER['SERVER_NAME']."/api/reports/".date("Y-m-d")."/".$this->file;
    }
}