<?php
class Excel_file_creator
{
    public function create_csv_file()
    {
        $fh = fopen("test.csv", "w");
        $headers = array("Имя", "Фамилия", "Отчество");
        fputcsv($fh, $headers);
        fclose($fh);
    }
    public function append_csv_file()
    {
        $fh = fopen("test.csv", "a");
        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['fathers_name'])) {
            $data = array(
                "Имя" => $_POST['name'],
                "Фамилия" => $_POST['surname'],
                "Отчество" => $_POST['fathers_name']
            );
            fputcsv($fh, $data);
            fclose($fh);
        }
    }
    public function delete_csv_file()
    {
        $fh = fopen("test.csv", "w");
        $headers = array("Имя", "Фамилия", "Отчество");
        fputcsv($fh, $headers);
        fclose($fh);

        function create_excel_file()
        {
            include_once 'Classes/PHPExcel/IOFactory.php';
            $objReader = PHPExcel_IOFactory::createReader('CSV');
            // If the files uses a delimiter other than a comma (e.g. a tab), then tell the reader
            $objReader->setDelimiter(",");
            // If the files uses an encoding other than UTF-8 or ASCII, then tell the reader
            $objReader->setInputEncoding('UTF-8');
            $objPHPExcel = $objReader->load('test.csv');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('test.xls');
        }
    }
}
