<?php

/******************************************
Asisten Pemrogaman 11
******************************************/

class TabelPasien extends DB
{
    function getPasien()
    {
        // Query mysql select data pasien
        $query = "SELECT * FROM pasien";
        // Mengeksekusi query
        return $this->execute($query);
    }
	function getPasienByID($id)
    {
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		return $this->execute($query);
    }

	function addPasien($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tgl_lahir = $data['tgl_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telepon'];

		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp)
				VALUES ('$nik', '$nama', '$tempat', '$tgl_lahir', '$gender', '$email', '$telepon')";

		return $this->execute($query);
	}

    function updatePasien($id, $data)
    {
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tgl_lahir = $data['tgl_lahir'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telepon = $data['telepon'];

        // Query mysql update data pasien
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tgl_lahir',
                  gender='$gender', email='$email', telp='$telepon' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deletePasien($id)
    {
        // Query mysql delete data pasien
        $query = "DELETE FROM pasien WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
