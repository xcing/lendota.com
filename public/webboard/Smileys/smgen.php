<?PHP
$path = "more";	// โฟล์เดอร์ที่ใช้เก็บ smileys
$filename = "smgen.sql";	// ชื่อไฟล์ที่ใช้เก็บคำสั่ง sql
$item_per_row = 10;	// จำนวน smileys/emo ที่จะแสดงใน 1 แถว
$show_post = 59;	// จำนวน smileys/emo ที่จะแสดงในหน้าโพสต์ข้อความ ในตัวอย่างนี้คือแสดง smileys/emo เฉพาะ 59 ตัวแรก ตัวอื่นๆจะแสดงเป็น popup

$id = 23;
$row = 0;
$order = 0;

$sql = "INSERT INTO `smf_smileys` (`id_smiley`, `code`, `filename`, `description`, `smiley_row`, `smiley_order`, `hidden`) VALUES\n";
$file = scandir($path);
foreach($file as $value)
{
	if($value=='.' || $value=='..') continue;
	
	if($id<=$show_post)
		$hidden = 0;
	else
		$hidden = 2;
	$sql .= "($id, ':$value:', '$value', '$value', $row, $order, $hidden),\n";
	$id++;
	if(++$order==$item_per_row)
	{
		$order = 0;
		$row++;
	}
}
$sql = rtrim($sql, ",\n");
$sql .= ';';
echo $sql;
$handle = fopen($filename, 'w');
fwrite($handle, $sql);
fclose($handle);
?>