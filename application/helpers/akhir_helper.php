<?php
function akhir_bulan($bulan, $tahun)
{
	if ($bulan == 1) {
		$akhir = 31;
	} elseif ($bulan == 2) {
		$akhir  = 28;
	} elseif ($bulan == 3) {
		$akhir  = 31;
	} elseif ($bulan == 4) {
		$akhir  = 30;
	} elseif ($bulan == 5) {
		$akhir  = 31;
	} elseif ($bulan == 6) {
		$akhir  = 30;
	} elseif ($bulan == 7) {
		$akhir  = 31;
	} elseif ($bulan == 8) {
		$akhir  = 31;
	} elseif ($bulan == 9) {
		$akhir  = 30;
	} elseif ($bulan == 10) {
		$akhir  = 31;
	} elseif ($bulan == 11) {
		$akhir  = 30;
	} elseif ($bulan == 12) {
		$akhir  = 31;
	}
	return $tampil = $tahun . '-' . $bulan . '-' . $akhir;
}
function total_hari($bulan, $tahun)
{
	if ($bulan == 1) {
		$akhir = 31;
	} elseif ($bulan == 2) {
		$akhir  = 28;
	} elseif ($bulan == 3) {
		$akhir  = 31;
	} elseif ($bulan == 4) {
		$akhir  = 30;
	} elseif ($bulan == 5) {
		$akhir  = 31;
	} elseif ($bulan == 6) {
		$akhir  = 30;
	} elseif ($bulan == 7) {
		$akhir  = 31;
	} elseif ($bulan == 8) {
		$akhir  = 31;
	} elseif ($bulan == 9) {
		$akhir  = 30;
	} elseif ($bulan == 10) {
		$akhir  = 31;
	} elseif ($bulan == 11) {
		$akhir  = 30;
	} elseif ($bulan == 12) {
		$akhir  = 31;
	}
	return $akhir;
}
