<?php
// include("KontrakPasienView.php");
// include(".\Kontrak\KontrakPasien");
include("presenter/ProsesPasien.php");

class FormPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraction_btn langsung dengan view
	private $tpl;
	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}
	function tambahPasien($new_pasien)
	{
		$this->prosespasien->tambahDataPasien($new_pasien);
	}
	function hapusPasien($id)
	{
		$this->prosespasien->hapusDataPasien($id);
	}
	function ubahPasien($id, $datapasien)
	{
		$this->prosespasien->ubahDataPasien($id, $datapasien);
	}
	function tampil()
	{
		$action_form = "form.php";
		$action_btn = "add";
		$action_title="TAMBAH";
		$gender_option = '
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-laki" value="Laki-laki" checked />
            <label class="form-check-label" for="gender-laki">Laki-laki</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-perempuan" value="Perempuan" />
            <label class="form-check-label" for="gender-perempuan">Perempuan</label>
        </div>';
		$this->tpl = new Template("templates/form.html");

		$this->tpl->replace("ACTION_FORM", $action_form);
		$this->tpl->replace("ACTION_TITLE", $action_title);
		$this->tpl->replace("DATA_NIK", "");
        $this->tpl->replace("DATA_NAMA", "");
        $this->tpl->replace("DATA_TEMPAT", "");
        $this->tpl->replace("DATA_TL", "");
        $this->tpl->replace("DATA_GENDER", $gender_option);
        $this->tpl->replace("DATA_EMAIL", "");
        $this->tpl->replace("DATA_TELP", "");
		$this->tpl->replace("ACTION_BTN", $action_btn);
		$this->tpl->write();
	}
	function tampil_data_edit($id)
	{
		$this->prosespasien->prosesDataPasienByID($id);
		$action_form = "form.php?id_edit=".$this->prosespasien->getId(0);
		$action_btn = "update";
		$action_title="EDIT";
		$gender_option = '
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-laki" value="Laki-laki" ' . ($this->prosespasien->getGender(0) == "Laki-laki" ? 'checked' : '') . ' />
            <label class="form-check-label" for="gender-laki">Laki-laki</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-perempuan" value="Perempuan" ' . ($this->prosespasien->getGender(0) == "Perempuan" ? 'checked' : '') . ' />
            <label class="form-check-label" for="gender-perempuan">Perempuan</label>
        </div>';
		$this->tpl = new Template("templates/form.html");

		$this->tpl->replace("ACTION_FORM", $action_form);
		$this->tpl->replace("ACTION_TITLE", $action_title);
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl(0));
		$this->tpl->replace("DATA_GENDER", $gender_option);
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp(0));
		$this->tpl->replace("ACTION_BTN", $action_btn);

		$this->tpl->write();
	}
}
