<?php 

$sql = "select `start_time`,`end_time` from `config` where `id`=1";

$mysql = new SaeMysql();
$row = $mysql->getLine($sql);
$mysql->closeDb();  

$str = "\"".$row["start_time"]."\"".",\"".$row["end_time"]."\"";

?>

<script type="text/javascript">
oes_time(<?php echo $str;?>);
</script>