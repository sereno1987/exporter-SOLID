<?php

class PdfExporter extends Exporter{
    protected $format = '.pdf';
    public  function export(){
        $file_name = "pdf-file-" . rand(100,999). $this->format;
        $file_path ="/files/$file_name";

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML("{$this->data['title']}\n{$this->data['content']}");
        $mpdf->Output($file_name, \Mpdf\Output\Destination::FILE);


        echo "$file_name successfully Created!\n";
    }
}