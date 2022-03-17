<?php
session_start();
require_once "../class/class_db.php";
$db = new database();
include "../class/class_custom.php";
$cst = new custom();
include "../class/class_login_log.php";
$login_log = new login_log();
include "../class/class_db_client.php";
$client = new database_client();

$username = $_POST['username'];
$password = $_POST['password'];
$sql_login="SELECT L.*, G.login_grp_id as login_grp_id 
            FROM login_usr L 
            JOIN login_usr_grp G ON G.login_usr_id=L.id
            WHERE L.username='$username' AND L.passwd=PASSWORD('$password')";
//die($sql_login);
$jumrec_login=$db->jumrec($sql_login);
if($jumrec_login > 0){
    $dat_login = $db->datasql($sql_login);
    //die();
        if($dat_login['aktif']==1){
            $date_now = date('Y-m-d');
            if(($dat_login['tgl_1']<=$date_now)&&($dat_login['tgl_2']>=$date_now)){
                if($dat_login['login_grp_id']!='SA'){
                    $sql_grp = "SELECT login_grp_id FROM login_usr_grp WHERE login_usr_id='".$dat_login['id']."'";
                    $data_grp = $db->fetchdata($sql_grp);
                    foreach($data_grp as $dat_grp){
                        $sql_enable = "SELECT * FROM login_grp_acl WHERE login_grp_id='".$dat_grp['login_grp_id']."' ORDER BY menu_id";
                        $data = $db->fetchdata($sql_enable);
                        foreach($data as $dat_enable){
                                $ses_name = "menu_".$dat_enable["menu_id"];
                                $ses_level = "level_".$dat_enable["menu_id"];
                                
                                if(isset($_SESSION[$ses_name])&&($_SESSION[$ses_name]=='0'))
                                    $_SESSION[$ses_name] = $dat_enable["enable"];
                                if(!isset($_SESSION[$ses_name]))
                                    $_SESSION[$ses_name] = $dat_enable["enable"];
                                
                                if(isset($_SESSION[$ses_level])&&($_SESSION[$ses_level]=='0'))
                                    $_SESSION[$ses_level] = $dat_enable["level"];
                                if(!isset($_SESSION[$ses_level]))
                                    $_SESSION[$ses_level] = $dat_enable["level"];
                                
                        }

                        if(!isset($_SESSION['login_grp_id']))
                            $_SESSION['login_grp_id'] = $dat_grp["login_grp_id"];
                        else
                            $_SESSION['login_grp_id'].= ' '.$dat_grp["login_grp_id"];
                    }
                }
                else{
                    $_SESSION['login_grp_id'] = $dat_login['login_grp_id'];
                }
                
                $sql_curr_sem = "SELECT value FROM setup_variable WHERE jenis='system' AND variable='semester'";
                $dat_curr_sem = $db->datasql($sql_curr_sem);
                $sql_curr_ta = "SELECT value FROM setup_variable WHERE jenis='system' AND variable='tahun_akademik'";
                $dat_curr_ta = $db->datasql($sql_curr_ta);
                
                $_SESSION['semester_now'] = $dat_curr_sem['value'];
                $_SESSION['tahun_akademik_now'] = $dat_curr_ta['value'];
                
                $sql_user = "SELECT nama FROM ".$dat_login['tabel_relasi']." WHERE id='".$dat_login['id_relasi']."'";
                if($db->jumrec($sql_user>0)){
                    $dat_user = $db->datasql($sql_user);
                    $_SESSION['user_nama'] = $dat_user['nama'];
                }
                else
                    $_SESSION['user_nama'] = '';
                
                $_SESSION['user_jenis'] = $dat_login['tabel_relasi'];
                
                $_SESSION['user_id'] = $dat_login["id_relasi"];
                
                $_SESSION['username'] = $username;
                $_SESSION['login_id'] = $dat_login["id"];
                
                //Data Sekolah
                $sql_sch = "SELECT SK.*, DS.nama as ds_nama, KC.nama as kc_nama, 
                            KB.nama as kb_nama, PR.nama as pr_nama 
                            FROM sekolah SK 
                            JOIN desa DS ON SK.desa_id=DS.id
                            JOIN kecamatan KC ON SK.kecamatan_id=KC.id
                            JOIN kabupaten KB ON SK.kabupaten_id=KB.id
                            JOIN propinsi PR ON SK.propinsi_id=PR.id";
                $dat_sch = $db->datasql($sql_sch);
                $alamat = $dat_sch['alamat'];
                if($dat_sch['rt']!='')
                    $alamat.= ' RT '.$dat_sch['rt'];
                if($dat_sch['rw']!='')
                    $alamat.= ' RW '.$dat_sch['rw'];
                if($dat_sch['ds_nama']!='-')
                    $alamat.= ''.$dat_sch['ds_nama'];
                if($dat_sch['kc_nama']!='-')
                    $alamat.= ''.$dat_sch['kc_nama'];
                if($dat_sch['kb_nama']!='-')
                    $alamat.= ''.$dat_sch['kb_nama'];
                if($dat_sch['pr_nama']!='-')
                    $alamat.= ''.$dat_sch['pr_nama'];
                if($dat_sch['kode_pos']!='')
                    $alamat.= ''.$dat_sch['kode_pos'];
                $_SESSION['sekolah_id'] = $dat_sch['id'];
                $_SESSION['sekolah_nama'] = $dat_sch['nama'];
                $_SESSION['sekolah_nisn'] = $dat_sch['nisn'];
                $_SESSION['sekolah_alamat'] = $alamat;
                
                //data client
                $sql_cl = "SELECT CL.*, 
                            DATEDIFF(CL.start_date,NOW()) as date_diff_start,
                            DATEDIFF(CL.end_date,NOW()) as date_diff_end 
                        FROM client CL 
                        WHERE CL.id='".$dat_sch['id']."'";
                $dat_cl = $client->datasql($sql_cl);
                //die('<hr>'.$dat_cl['start_date'].'<hr>'.$dat_cl['end_date'].'<hr>'.$dat_cl['date_diff_start'].'<hr>'.$dat_cl['date_diff_end']);
                if(($dat_cl['date_diff_start']<=0)&&($dat_cl['date_diff_end']>=0)){
                    $_SESSION['client_status'] = $dat_cl['status'];
                    $_SESSION['client_start_date'] = $dat_cl['start_date'];
                    $_SESSION['client_end_date'] = $dat_cl['end_date'];
                    $_SESSION['client_access_days'] = $dat_cl['date_diff_end'];
                } else{
                    $_SESSION['warning'] = "Aplikasi Telah Kadaluarsa. Silahkan Hubungi Admin SIAS-K13 <br>&nbsp;<br>siakadsekolah.com";
                    header('Location: ../index.php');
                    exit();
                }
                
                
                //login history
                $link_file = '../appl/master/kelola/home.php';
                $login_log->create_log('Li','','Login');
                header("location: $link_file");
                exit();
            }
            else{
                $tgl_1 = $cst->tanggal_angka_indo_garing($dat_login['tgl_1']);
                $tgl_2 = $cst->tanggal_angka_indo_garing($dat_login['tgl_2']);
                $_SESSION['warning'] = "Login GAGAL! Login Aktif tanggal $tgl_1 - $tgl_2";
                header('Location: ../index.php');
                exit();
            }
        }
        else{
            $_SESSION['warning'] = 'Login GAGAL! Login Non Aktif. Silahkan hubungi administrator untuk mengaktifkan Login';
            header('Location: ../index.php');
            exit();
        }        
}
else {
    $_SESSION['warning'] = '<strong>Login GAGAL!</strong> Ulangi Lagi';
    header('Location: ../index.php');
    exit();
}
?>