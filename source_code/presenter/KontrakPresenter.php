<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function prosesDataPasienByID($id);
	public function tambahDataPasien($new_pasien);
	public function hapusDataPasien($id);
	public function ubahDataPasien($id, $data);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
}
