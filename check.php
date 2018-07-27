<?php
include("config/koneksi.php");
$getdata=mysql_query("select * from rb_users where email='".$_POST['email']."'");
if(mysql_num_rows($getdata)>0)
{
echo "1";
}
else
{
echo "0";
}


?>
