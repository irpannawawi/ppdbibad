<?php
require 'vendor/autoload.php';
require 'config/database.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * 
 */
class Main extends Database
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getHead($tableName)
	{
		$sql = "SHOW COLUMNS from $tableName";
		$res =  $this->conn->query($sql);
		$columns = array();
		while ( $data = $res->fetch_assoc()) {
			array_push($columns, $data['Field']);
		}
		return $columns;
	}

	public function getBody($tableName)
	{
		$sql = "select * from $tableName";
		$res =  $this->conn->query($sql);
		$col_name = $this->getHead($tableName);
		$columns = array();
		while ( $data = $res->fetch_assoc()) {
			$temp_data = array();
			foreach ($col_name as $key => $value) {
				$temp_data[$key] = $data[$value];
			}
			array_push($columns,$temp_data);
		}
		return $columns;
	}


}

$test = new Main();
$head = $test->getHead('daftar');
$body = $test->getBody('daftar');

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->fromArray($head,null,'A1');
$sheet->fromArray($body,null,'A2');

$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode('dokumen.xlsx').'"');
$writer->save('php://output');