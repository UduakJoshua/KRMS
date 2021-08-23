<?php

//import.php

include '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once 'dbase_conn.php';
include_once 'function.php';

if (isset($_POST['import'])) {


    if ($_FILES["import_excel"]["name"] != '') {
        $allowed_extension = array('xls', 'csv', 'xlsx');
        $file_array = explode(".", $_FILES["import_excel"]["name"]);
        $file_extension = end($file_array);

        if (in_array($file_extension, $allowed_extension)) {
            $inputFileName = $_FILES["import_excel"]["tmp_name"];

            /** Load $inputFileName to a Spreadsheet object **/
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

            $data = $spreadsheet->getActiveSheet()->toArray();
            /*for ($i = 2; $i <= $data; $i++) {
                $id = $data[0];
                $admissionNo = $data[1];
                $name = $row[2];
                $subjectM = $row[3];
                $mthT1 = $row[4];
                $mthT2  = $row[5];
                $mthEx = $row[6];
                $mthTot  = $row[7];
                $mthSp  = $row[8];
                $mthGrade  = $row[9];
                $mthRem  = $row[10];
                $subjectEng = $row[11];
                $engT1 = $row[12];
                $engT2  = $row[13];
                $engEx = $row[14];
                $engTot  = $row[15];
                $engSp  = $row[16];
                $engGrade  = $row[17];
                $engRem  = $row[18];
                */
            foreach ($data as $row) {

                $id = $row[0];
                $admissionNo = $row[1];
                $name = $row[2];
                $subjectM = $row[3];
                $mthT1 = $row[4];
                $mthT2  = $row[5];
                $mthEx = $row[6];
                $mthTot  = $row[7];
                $mthSp  = $row[8];
                $mthGrade  = $row[9];
                $mthRem  = $row[10];
                $subjectEng = $row[11];
                $engT1 = $row[12];
                $engT2  = $row[13];
                $engEx = $row[14];
                $engTot  = $row[15];
                $engSp  = $row[16];
                $engGrade  = $row[17];
                $engRem  = $row[18];
                $term  = $row[19];

                //echo '<pre>';
                //print_r($data);
                //echo '</pre>';
                $sql = "INSERT INTO primary_result ( id, admissionNo, student_name, 
                subject_math, mthT1, mthT2, mthEx, mthTot, mthSp, mthGrade, mthRem, 
                subject_eng, engT1, engT2, engEx, engTot, engSp, engGrade, engRem, term)VALUES 
                ('', '$admissionNo', '$name', 
                '$subjectM', '$mthT1', '$mthT2', '$mthEx', '$mthTot', '$mthSp', '$mthGrade', '$mthRem', 
                '$subjectEng', '$engT1', '$engT2', '$engEx', '$engTot', '$engSp', '$engGrade', '$engRem', '$term')";

                if ($conn->query($sql) === TRUE) {
                    echo "Thank you Jesus";
                    //$_SESSION['upload'] = "Result uploaded successfuly";
                    //$_SESSION['alert'] = "success";
                    // header("location:../result_display.php");
                } else {
                    echo ($conn->error);
                }
            }
        } else {
            echo "Wrong file format";
        }
    }
}
