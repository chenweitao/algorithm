<?php
/*优秀的扫地机器人（IQ：80    目标时间：20分钟）

	现在有很多制造商都在卖扫地机器人，它非常有用，能为忙碌的我们分担家务负担。不过我们也很难理解为什么扫地机器人有时候会反复清扫某一个地方。

	假设有一款不会反复清扫同一个地方的机器人，它只能前后左右移动。举个例子，如果第1 次向后移动，那么连续移动3 次时，就会有以下9 种情况（ 图6 ）。又因为第1 次移动可以是前后左右4 种情况，所以移动3 次时全部路径有9×4 ＝ 36 种。

※ 最初的位置用0 表示，其后的移动位置用数字表示。
0	0		0		0		 0	
1	1		1		1 2	   2 1
2	2 3	  3	2		  3    3
3

3 0		0 3		0			   0
2 1		1 2		1 2 3      3 2 1

问题：求这个机器人移动12 次时，有多少种移动路径？**/
//假设机器人00开始
list($befor,$after,$left,$right)=$ac=[[0,1],[0,-1],[-1,0],[1,0]];

$x=$y=$i=0;
$a=[$x.'|'.$y];
$count=1;
while($i<12)
{
	$acount=count($ac);
	$stemp=array_rand($ac,1);
	$action=$ac[$stemp];
	if($befor==$action)
	{
		$ac=[[0,1],[-1,0],[1,0]];
	}
	if($after==$action)
	{
		$ac=[[0,-1],[-1,0],[1,0]];
	}
	if($left==$action)
	{
		$ac=[[0,1],[0,-1],[-1,0]];
	}
	if($right==$action)
	{
		$ac=[[0,1],[0,-1],[1,0]];
	}
	$tox=$x+$action[0];
	$toy=$y+$action[1];
	$position=$tox.'|'.$toy;
	if(in_array($position,$a))
	{//print_R($position).'=======';echo $i.'<br />';exit;
		//$i--;
	}else
	{
		$x=$tox;$count=$count*$acount;
		$y=$toy;
		array_push($a,$position);print_R($a);
		$i++;
	}
	
}echo $count;
?>