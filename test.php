<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-8-26
 * Time: 下午2:20
 * To change this template use File | Settings | File Templates.
 */
$str = '';
if ($rows['bx_state']==0) {
    $str = '未分配';
}else if ($rows['bx_state']==1) {
    $str = '分配';
}
echo "<td align='center' bgcolor='#FFFFFF'>$str</td>";
