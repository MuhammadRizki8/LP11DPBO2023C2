<?php


// include("KontrakPasienView.php");
// include(".\Kontrak\KontrakPasien");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien;
	private $tpl;

	function __construct()
	{
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a href='form.php?id_edit=".$this->prosespasien->getId($i)."' class='btn-sm btn-primary'>Ubah</a>
				<a href='form.php?id_delete=".$this->prosespasien->getId($i)."' class='btn-sm btn-danger'>Hapus</a>
          	</td>";
		}
		$this->tpl = new Template("templates/skin.html");
		$this->tpl->replace("DATA_TABEL", $data);

		$this->tpl->write();
	}
}
