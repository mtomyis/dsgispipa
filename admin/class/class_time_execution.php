<?php
/*
 * 
 * (f) time_execution.php
 * (d) Menghitung lama eksekusi sebuah perintah
 * (l) GPL
 * (a) emaniacs
 * 
 */
 
class time_execution {
 private $_start=null;
 
 // penanda bahwa object tidak bisa dipakai lagi.
 private $_finish=false;
 
 public function __construct($autoStart=true) {
  if ($autoStart)
   $this->start();
 }
 
 public function start() {
  $this->_start = microtime (true);
 }
 
 public function end() {
  // ambil end time
  $end = microtime(true);
  
  if ($this->_finish)
   return false;
   
  /* cek apakah start telah didefinisikan
   * jika belum return array kosong
   */
  if (is_null ($this->_start))
   return array();
 
  // set perbedaan waktu
  $diff = $end - $this->_start;
    
  /*$ret = array (
   'start'  => $this->_start,
   'end'    => $end,
   'diff'   => $diff,
  );*/
    
  // hapus nilai _start
  $this->_flush();
  
  return $diff;
 }
 
 public function restart() {
  $this->start();
  $this->_finish = false;
 }
 
 private function _flush() {
  $this->_start = null;
 }
}
?>