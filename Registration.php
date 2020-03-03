<?php
include "registration_form.html";
include "Excel_file_creator.php";

$csv_file = new Excel_file_creator();
$csv_file->append_csv_file();
$csv_file->create_excel_file();