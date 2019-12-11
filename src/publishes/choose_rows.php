<?php
$ids = '';
for ($i = 1; $i <= 10; $i++) {
    if(isset($_POST["row_".$i.""])) {
	if($i > 8) $ids = $i;
	$ids = ' '.$ids.''.$i.',';
}
}
if(empty($ids)) {
	$rows = '';
} else {
	$ids = rtrim($ids, ',');
	$rows = "WHERE id IN (".$ids.")";
}
?>