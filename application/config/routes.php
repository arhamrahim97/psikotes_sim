<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'BerandaPengusulController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Master
// Soal
// Subtes1
$route['subtes1'] = 'SoalController/subtes1';
$route['insertSubtes1'] = 'SoalController/insertSubtes1';
$route['getSubtes1'] = 'SoalController/getSubtes1';
$route['getEditSubtes1'] = 'SoalController/getEditSubtes1';
$route['editSubtes1'] = 'SoalController/editSubtes1';
$route['hapusSubtes1'] = 'SoalController/hapusSubtes1';
$route['getDetailSubtes1'] = 'SoalController/getDetailSubtes1';

// Subtes2
$route['subtes2'] = 'SoalController/subtes2';
$route['insertSubtes2'] = 'SoalController/insertSubtes2';
$route['getSubtes2'] = 'SoalController/getSubtes2';
$route['getEditSubtes2'] = 'SoalController/getEditSubtes2';
$route['editSubtes2'] = 'SoalController/editSubtes2';
$route['hapusSubtes2'] = 'SoalController/hapusSubtes2';
$route['getDetailSubtes2'] = 'SoalController/getDetailSubtes2';

// Subtes3
$route['subtes3'] = 'SoalController/subtes3';
$route['insertSubtes3'] = 'SoalController/insertSubtes3';
$route['getSubtes3'] = 'SoalController/getSubtes3';
$route['getEditSubtes3'] = 'SoalController/getEditSubtes3';
$route['editSubtes3'] = 'SoalController/editSubtes3';
$route['hapusSubtes3'] = 'SoalController/hapusSubtes3';
$route['getDetailSubtes3'] = 'SoalController/getDetailSubtes3';

// Subtes4
$route['subtes4'] = 'SoalController/subtes4';
$route['insertSubtes4'] = 'SoalController/insertSubtes4';
$route['getSubtes4'] = 'SoalController/getSubtes4';
$route['getEditSubtes4'] = 'SoalController/getEditSubtes4';
$route['editSubtes4'] = 'SoalController/editSubtes4';
$route['hapusSubtes4'] = 'SoalController/hapusSubtes4';
$route['getDetailSubtes4'] = 'SoalController/getDetailSubtes4';

// Subtes5
$route['subtes5'] = 'SoalController/subtes5';
$route['insertSubtes5'] = 'SoalController/insertSubtes5';
$route['getSubtes5'] = 'SoalController/getSubtes5';
$route['getEditSubtes5'] = 'SoalController/getEditSubtes5';
$route['editSubtes5'] = 'SoalController/editSubtes5';
$route['hapusSubtes5'] = 'SoalController/hapusSubtes5';
$route['getDetailSubtes5'] = 'SoalController/getDetailSubtes5';

$route['tessoal'] = 'SoalController/tessoal';
$route['getSoal'] = 'DashboardPengusulController/getSoal';
$route['hasilSoal'] = 'SoalController/hasilSoal';

// Subtes6
$route['subtes6'] = 'SoalController/subtes6';
$route['insertSubtes6'] = 'SoalController/insertSubtes6';
$route['getSubtes6'] = 'SoalController/getSubtes6';
$route['getEditSubtes6'] = 'SoalController/getEditSubtes6';
$route['editSubtes6'] = 'SoalController/editSubtes6';
$route['hapusSubtes6'] = 'SoalController/hapusSubtes6';
$route['getDetailSubtes6'] = 'SoalController/getDetailSubtes6';

$route['standarKelulusan'] = 'SoalController/standarKelulusan';
$route['getStandarKelulusan'] = 'SoalController/getStandarKelulusan';
$route['updateStandarKelulusan'] = 'SoalController/updateStandarKelulusan';

// Adminstrasi
$route['administrasi'] = 'MasterController/administrasi';
$route['insertBank'] = 'MasterController/insertBank';
$route['getBank'] = 'MasterController/getBank';
$route['hapusBank'] = 'MasterController/hapusBank';
$route['getEditBank'] = 'MasterController/getEditBank';
$route['editBank'] = 'MasterController/editBank';

$route['getBiaya'] = 'MasterController/getBiaya';
$route['updateBiaya'] = 'MasterController/updateBiaya';

// Instansi
$route['instansi'] = 'MasterController/instansi';
$route['updateInstansi'] = 'MasterController/updateInstansi';

// User
$route['registerUser'] = 'UserController/registerUser';
$route['hapusAkun'] = 'UserController/hapusAkun';
$route['loginUser'] = 'UserController/loginUser';
$route['logout'] = 'UserController/logout';
// List
$route['listProvinsi'] = 'ListController/listProvinsi';
$route['listKabupaten'] = 'ListController/listKabupaten';
$route['listKecamatan'] = 'ListController/listKecamatan';
$route['listKelurahan'] = 'ListController/listKelurahan';
$route['listUjianBuktiPembayaran'] = 'ListController/listUjianBuktiPembayaran';

// Pengusul
// $route['pengusul-dashboard'] = 'DashboardPengusulController/index';
$route['beranda'] = 'BerandaPengusulController/index';
$route['lupa_password'] = 'BerandaPengusulController/lupa_password';
$route['cekUser'] = 'UserController/cekUser';

$route['dashboard'] = 'DashboardPengusulController/index';
$route['ujian'] = 'DashboardPengusulController/ujian';
$route['hasil'] = 'DashboardPengusulController/hasil';
$route['bayar'] = 'DashboardPengusulController/pembayaran';
$route['getDetailRiwayat'] = 'DashboardPengusulController/getDetailRiwayat';
$route['getDetailBiaya'] = 'DashboardPengusulController/getBiaya';
$route['prosesBayar'] = 'DashboardPengusulController/prosesBayar';

$route['ujianPengusul'] = 'PengusulController/ujianPengusul';
$route['getUjian'] = 'PengusulController/getUjian';
$route['getDetailUjian'] = 'PengusulController/getDetailUjian';
$route['getDetailPembayaran'] = 'PengusulController/getDetailPembayaran';
$route['prosesPembayaran'] = 'PengusulController/prosesPembayaran';

$route['sertifikatPengusul'] = 'PengusulController/sertifikatPengusul';
$route['getSertifikatPengusul'] = 'PengusulController/getSertifikat';
$route['getDetailSertifikat'] = 'PengusulController/getDetailSertifikat';

$route['akunPengusul'] = 'PengusulController/akunPengusul';
$route['getAkunPengusul'] = 'PengusulController/getAkunPengusul';
$route['getDetailAkunPengusul'] = 'PengusulController/getDetailAkunPengusul';
$route['updateAkun'] = 'UserController/updateAkun';
$route['updateFoto'] = 'UserController/updateFoto';

$route['akunAdmin'] = 'MasterController/akunAdmin';
$route['getAkunAdmin'] = 'MasterController/getAkunAdmin';
$route['getDetailAkunAdmin'] = 'MasterController/getDetailAkunAdmin';
$route['registerAdmin'] = 'UserController/registerAdmin';

$route['dashboardAdmin'] = 'DashboardAdminController/index';
$route['profil'] = 'DashboardAdminController/profil';

$route['cetakSertifikat'] = "BerandaPengusulController/cetakSertifikat";
$route['downloadSertifikat'] = "BerandaPengusulController/downloadSertifikat";
