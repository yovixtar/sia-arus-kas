<?php


if (!function_exists('calculate_age')) {
    function calculate_age($dateOfBirth)
    {
        $today = new DateTime();
        $diff = $today->diff(new DateTime($dateOfBirth));
        return $diff->y;
    }
}
function tgl_indo($date)
{
    $formattedDate = date('d-m-Y', strtotime($date));
    return $formattedDate;
}
function get_umur($dateOfBirth)
{
    $today = new DateTime();
    $diff = $today->diff(new DateTime($dateOfBirth));
    $ageInMonths = $diff->y * 12 + $diff->m;
    return $ageInMonths;
}

function rp($number)
{
    $formattedNumber = number_format($number, 0, ',', '.');
    $formattedNumber = 'Rp ' . $formattedNumber;
    return $formattedNumber;
}
function tgl_indo_bulan($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function bulan_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );


    return  $bulan[$tanggal];
}
