<?php
header('Content-Type: application/json');
//dibawah adalah penggunaan tanda salah yg benar adalah ke kiri(\) bukan ke kanan(/)
include dirname(dirname(__FILE__)).'\Db.class.php';
$db = new DB();
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$name = isset($_GET['nama_kampus']) ? $_GET['nama_kampus'] : '';
$sql_limit = '';
if (!empty($limit)) {
    $sql_limit = ' LIMIT 0,'.$limit;
}
$sql_name = '';
if (!empty($name)) {
    $sql_name = ' where nama_kampus LIKE \'%'.$name.'%\' ';
}
$cat_list = $db->query('select * from kampus '.$sql_name.' '.$sql_limit);
$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;
echo json_encode($arr);
