<?php
function nominal($angka)
{
	$jd = number_format($angka, 0, ',', '.');
	return 'Rp ' . $jd;
}
function nominal1($angka)
{
	$jd = number_format($angka, 0, ',', '.');
	return $jd;
}
