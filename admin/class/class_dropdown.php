<?php

class dropdown extends database{
    
    public function create($attr=array('sql','name'=>NULL,'id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_select'=>NULL,'option_all'=>NULL,'val'=>NULL,'label'=>NULL,'disabled'=>NULL,'data'=>NULL)){
        $data = $this->fetchdata($attr['sql']);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];

        if(!isset($attr['class']))
            $class = 'form-control';
        else
            $class = $attr['class'];


        if(!isset($attr['data']))
            $attr['data'] = '';
        if(isset($attr['disabled']))
            $disabled = "disabled";
        else
            $disabled = "";

        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$class."' $disabled ".$attr['data'].">";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>SEMUA PILIHAN</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option>Pilih</option>";
        
        foreach ($data as $dat) {
            if(!isset($attr['val']))
                $attr['val'] = 'id';
            if(!isset($attr['label'])){
                $attr['label'] = array('nama');
                $label = $dat['nama'];
            }
            else{
                $label = '';
                foreach($attr['label'] as $labels)
                    $label.= $dat[$labels].' ';
            }
                
            if((isset($attr['value']))&&($dat[$attr['val']]==$attr['value'])){
                    echo "<option value='".$dat[$attr['val']]."' selected='selected'>".$label."</option>";    
            }else{
                    echo "<option value='".$dat[$attr['val']]."'>".$label."</option>";    
            }
        }
        echo "</select>";
    }
    
    public function guru($attr=array('name'=>'guru_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_all'=>NULL)){
        $sql = "SELECT * FROM guru ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-medium';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }

    public function kelas($attr=array('name'=>'kelas_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM kelas ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }
    public function nilai_jenis($attr=array('name'=>'nilai_jenis_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                        'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM nilai_jenis ORDER BY id";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-mini';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }
    
    public function mapel($attr=array('name'=>'mapel_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM mapel ORDER BY kompetensi_id,kode";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-medium';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['kompetensi_id'].' '.$dat['kode'].' '.$dat['nama']."</option>";	
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['kompetensi_id'].' '.$dat['kode'].' '.$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }

    public function semester($attr=array('name'=>'semester_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM semester ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }
            else if((!isset($attr['value']))&&($dat['id']==$_SESSION['semester_now'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }
            else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }
    
    public function tahun_akademik($attr=array('name'=>'tahun_akademik_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                                'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM tahun_akademik ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-small';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }
            else if((!isset($attr['value']))&&($dat['id']==$_SESSION['tahun_akademik_now'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";	
            }
            else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";	
            }
        }
        echo "</select>";
    }

    public function bidang_studi($attr=array('name'=>'bidang_studi_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM bidang_studi ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-large';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }
    
    public function mapel_jenis($attr=array('name'=>'mapel_jenis_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM mapel_jenis WHERE jenis='detail' ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-medium';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }

    public function program_studi($attr=array('name'=>'program_studi_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM program_studi ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-medium';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }

    public function kompetensi($attr=array('name'=>'kompetensi_id','id'=>NULL,'value'=>NULL,'class'=>NULL,
                            'option_all'=>NULL, 'option_select'=>NULL)){
        $sql = "SELECT * FROM kompetensi ORDER BY nama";
        $data = $this->fetchdata($sql);
        if(!isset($attr['id']))
            $attr['id'] = $attr['name'];
        if(!isset($attr['class']))
            $attr['class'] = 'input-medium';
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
        
        if((isset($attr['option_all']))&&($attr['option_all']=='TRUE'))
            $attr['option_all'] = TRUE;
        else
            $attr['option_all'] = FALSE;
        if($attr['option_all'])
            echo "<option value=''>ALL</option>";
        
        if((isset($attr['option_select']))&&($attr['option_select']=='TRUE'))
            $attr['option_select'] = TRUE;
        else
            $attr['option_select'] = FALSE;
        if($attr['option_select'])
            echo "<option value=''>Pilih</option>";
        
        foreach ($data as $dat) {
            if((isset($attr['value']))&&($dat['id']==$attr['value'])){
                    echo "<option value='".$dat['id']."' selected='selected'>".$dat['nama']."</option>";    
            }else{
                    echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";    
            }
        }
        echo "</select>";
    }
    //=================================================================

	public function propinsi($attr){
        if(empty($attr['id'])){$attr['id'] = $attr['name'];}
        if(empty($attr['value'])){$attr['value'] = '';}
        if(empty($attr['class'])){$attr['class'] = 'span3';}

        $sql = "SELECT * FROM propinsi WHERE aktif='1' ORDER BY nama ASC";
        $items = $this->fetchdata($sql);
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
            echo "<option value=''>Pilih</option>";
        foreach ($items as $item) {
            if($attr['value'] == $item['id']){
                echo "<option value='".$item['id']."' selected='selected'>".$item['nama']."</option>";  
            }else{
                echo "<option value='".$item['id']."'>".$item['nama']."</option>";  
            }
        }
        echo "</select>";
    }

    public function kota($attr){
        if(empty($attr['id'])){$attr['id'] = $attr['name'];}
        if(empty($attr['value'])){$attr['value'] = '';}
        if(empty($attr['class'])){$attr['class'] = 'span3';}

        $sql_1 = "SELECT propinsi_id FROM kabupaten WHERE id='".$attr['value']."' AND aktif='1'";
        $items_1 = $this->fetchdata($sql_1);
        foreach ($items_1 as $item_1) {
            $propinsi_id = $item_1['propinsi_id'];
        }

        $sql_2 = "SELECT * FROM kabupaten WHERE propinsi_id='$propinsi_id' AND aktif='1' ORDER BY nama ASC";
        $items_2 = $this->fetchdata($sql_2);
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
            echo "<option value=''>Pilih</option>";
        foreach ($items_2 as $item_2) {
            if($attr['value'] == $item_2['id']){
                echo "<option value='".$item_2['id']."' selected='selected'>".$item_2['nama']."</option>";  
            }else{
                echo "<option value='".$item_2['id']."'>".$item_2['nama']."</option>";  
            }
        }
        echo "</select>";
    }

    public function kecamatan($attr){
        if(empty($attr['id'])){$attr['id'] = $attr['name'];}
        if(empty($attr['value'])){$attr['value'] = '';}
        if(empty($attr['class'])){$attr['class'] = 'span3';}

        $sql_1 = "SELECT kabupaten_id FROM kecamatan WHERE id='".$attr['value']."' AND aktif='1'";
        $items_1 = $this->fetchdata($sql_1);
        foreach ($items_1 as $item_1) {
            $kota_id = $item_1['kabupaten_id'];
        }

        $sql_2 = "SELECT * FROM kecamatan WHERE kabupaten_id='$kota_id' AND aktif='1' ORDER BY nama ASC";
        $items_2 = $this->fetchdata($sql_2);
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
            echo "<option value=''>Pilih</option>";
        foreach ($items_2 as $item_2) {
            if($attr['value'] == $item_2['id']){
                echo "<option value='".$item_2['id']."' selected='selected'>".$item_2['nama']."</option>";  
            }else{
                echo "<option value='".$item_2['id']."'>".$item_2['nama']."</option>";  
            }
        }
        echo "</select>";
    }

    public function desa($attr){
        if(empty($attr['id'])){$attr['id'] = $attr['name'];}
        if(empty($attr['value'])){$attr['value'] = '';}
        if(empty($attr['class'])){$attr['class'] = 'span3';}

        $sql_1 = "SELECT kecamatan_id FROM desa WHERE id='".$attr['value']."' AND aktif='1'";
        $items_1 = $this->fetchdata($sql_1);
        foreach ($items_1 as $item_1) {
            $kecamatan_id = $item_1['kecamatan_id'];
        }

        $sql_2 = "SELECT * FROM desa WHERE kecamatan_id='$kecamatan_id' AND aktif='1' ORDER BY nama ASC";
        $items_2 = $this->fetchdata($sql_2);
        echo "<select name='".$attr['name']."' id='".$attr['id']."' class='".$attr['class']."'>";
            echo "<option value=''>Pilih</option>";
        foreach ($items_2 as $item_2) {
            if($attr['value'] == $item_2['id']){
                echo "<option value='".$item_2['id']."' selected='selected'>".$item_2['nama']."</option>";  
            }else{
                echo "<option value='".$item_2['id']."'>".$item_2['nama']."</option>";  
            }
        }
        echo "</select>";
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
