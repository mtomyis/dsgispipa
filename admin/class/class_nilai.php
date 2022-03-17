<?php 

class nilai extends database{

	public function UH1($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0101'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function UH2($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0102'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function UH3($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0103'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function UH4($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0104'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function UH5($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0105'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function T1($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0201'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function T2($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0202'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function T3($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0203'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function T4($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='0204'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function uas($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              NL.nilai_jenis_id, NL.nilai
	            FROM nilai NL
	            JOIN siswa_kelas SK ON NL.siswa_kelas_id=SK.id
	            JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'
                  AND NL.nilai_jenis_id='04'
	              AND SK.aktif='1'
	              AND NL.aktif='1'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function raport($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              RN.nilai
	            FROM raport_nilai RN
	              JOIN raport RP ON RN.raport_id=RP.id
	              JOIN siswa_kelas SK ON RP.siswa_kelas_id=SK.id
	              JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'";
	    $item = $this->datasql($sql);
	    return $item['nilai'];
	}

	public function status($kelas_id, $semester_id, $tahun_akademik_id, $sw_nis){
		$sql = "SELECT 
	              RN.nilai, RN.kkm
	            FROM raport_nilai RN
	              JOIN raport RP ON RN.raport_id=RP.id
	              JOIN siswa_kelas SK ON RP.siswa_kelas_id=SK.id
	              JOIN siswa SW ON SK.siswa_id=SW.id
	            WHERE SK.kelas_id='$kelas_id'
                  AND SK.semester_id='$semester_id'
                  AND SK.tahun_akademik_id='$tahun_akademik_id'
                  AND SW.nis='$sw_nis'";
	    $item = $this->datasql($sql);
	    if($item['nilai'] > $item['kkm']){
	    	$status = "Lulus";
	    }else{
	    	$status = "Remidi";
	    }
	    return $status;
	}

	public function rata($UH1,$UH2,$UH3,$UH4,$UH5,$T1,$T2,$T3,$T4){
		$rata = ($UH1+$UH2+$UH3+$UH4+$UH5+$T1+$T2+$T3+$T4)/10;
		$rata = number_format($rata,2,'.','.');
	    return $rata;
	}
}
?>