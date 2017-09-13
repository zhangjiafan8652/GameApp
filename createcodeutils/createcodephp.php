<?php

/**
 * 生成后台代码工具类
 * 替换controllername生成新的文件
 * mysql表名字要和control名字一样小写
 */

/*$newcontrollername='Sys_Menu';*/
/*$newcontrollername='GameFuben';
$newcontrollername='GameMonster';
*/

$newcontrollername='GameConfig';
/*$newcontrollername='GameMonster';*/
$oldcontrollername='GameUser';
echo "Start createcode Log:" ; 
$basecontrollername='ListController.php';
$basearray=array('ListController.php',
	'.php',
	'edit.blade.php','list.blade.php','new.blade.php');

/*   $oldFileHandle = fopen("./".$oldcontrollername.$basecontrollername, "r+");  
   $oldFileSize = filesize("./".$oldcontrollername.$basecontrollername);   
	$gameusercontent= fread($oldFileHandle, $oldFileSize);
	$newcontent1=str_replace($oldcontrollername,$newcontrollername,$gameusercontent);  
	$newcontent2=str_replace(strtolower($oldcontrollername),strtolower($newcontrollername),$newcontent1);  
echo "Visit Log:" . $newcontent2;

$newfilehandld = fopen("./".$newcontrollername.$basecontrollername, "w");
fwrite($newfilehandld, $newcontent2);
echo "Visit xinjianchenggong" ;*/

function  createFile($newcontrollername,$oldcontrollername,$basecontrollername){
  $oldFileHandle = fopen("./".$oldcontrollername.$basecontrollername, "r+");  
   $oldFileSize = filesize("./".$oldcontrollername.$basecontrollername);   
	$gameusercontent= fread($oldFileHandle, $oldFileSize);
	$newcontent1=str_replace($oldcontrollername,$newcontrollername,$gameusercontent);  
	$newcontent2=str_replace(strtolower($oldcontrollername),strtolower($newcontrollername),$newcontent1);  
//echo "Visit Log:" . $newcontent2;

$newfilehandld = fopen("./".$newcontrollername.$basecontrollername, "w");
fwrite($newfilehandld, $newcontent2);
fclose($newfilehandld);
echo "createcodesuccs:".$oldcontrollername.$basecontrollername;
}

echo "开始";
for ($i=0; $i <count($basearray) ; $i++) { 
	 
	 createFile($newcontrollername,$oldcontrollername,$basearray[$i]);
	 echo "Visit Log:" .$newcontrollername.$basearray[$i];
}
echo "结束";
?>