<?php
/*
这里我们考虑一种“前后左右的座位上一定都是异性”的座次安排。也就是说，像图26 右侧那样，前后左右都是同性的座次安排是不符合要求的（男生用蓝色表示，女生用灰色表示）。
男	女	男	女	男	女

女	男	女	男	女	男

男	女	男	女	男	女

女	男	女	男	女	男

男	女	男	女	男	女


假设有一个男生和女生分别有15 人的班级，要像图26 那样，排出一个6×5的座次。求满足上述条件的座次安排共多少种（前后或者左右镜像的座次也看作不同的安排。另外，这里不在意具体某个学生坐哪里，只看男生和女生的座次安排）？
*/
//假设 1-15 为男生 16-30为女生
$a1=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
$a2=[16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
$seat=[];

for($x=0;$x<6;$x++)
{
	for($y=0;$y<5;$y++)
	{
		if($x==0&&$y==0)
		{
			$seat[0][0]=$first=rand(15,1);	$a=30;
		}elseif($first<16)
		{
			unset($a1[$first-1]);
			$ar=circle($a2);
			$first=$ar['key'];
			$seat[$x][$y]=$first;$a=$a*$ar['count'];
			
		}else{
			unset($a2[$first-16]);
			$ar=circle($a1);$a=$a*$ar['count'];
			$first=$ar['key'];
			$seat[$x][$y]=$first;
			
		}
	}
}echo (string)$a;
print_r($seat);
function circle($array)
{
	while($array)
		{
			$key=array_rand($array,1);
			$keys=$array[$key];
			if($keys!=0)
			{
				return ['key'=>$keys,'count'=>count($array)];
			}
		}
}