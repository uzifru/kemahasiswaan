<?php
function format_rupiah($angka){
  $rupiah='Rp ' . number_format($angka,2,',','.');
  return $rupiah;
}
?> 
