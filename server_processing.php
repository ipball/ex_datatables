<?php
//ชื่อตาราง
$table = 'datatables_demo';
//ชื่อคีย์หลัก
$primaryKey = 'id';
//ข้อมูลอะเรที่ส่งป datables
$columns = array(
  array( 'db' => 'first_name', 'dt' => 0 ),
  array( 'db' => 'last_name',  'dt' => 1 ),
  array( 'db' => 'position',   'dt' => 2 ),
  array( 'db' => 'office',     'dt' => 3 ),
  array(
    'db' => 'start_date',
    'dt' => 4,
    'formatter' => function( $d, $row ) {
      return date( 'jS M y', strtotime($d));
    }
  ),
  array(
    'db' => 'salary',
    'dt' => 5,
    'formatter' => function( $d, $row ) {
      return '$'.number_format($d);
    }
    )
  );

  //เชื่อต่อฐานข้อมูล
  $sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'datatables',
    'host' => 'localhost'
  );
  // เรียกใช้ไฟล์ spp.class.php
  require( 'ssp.class.php' );

//ส่งข้อมูลกลับไปเป็น JSON
  echo json_encode(
      SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
  );
