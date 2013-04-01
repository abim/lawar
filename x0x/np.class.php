<?php
class nextprev{
	
	function PENGATURAN_HALAMAN ($url, $HALAMAN_SEKARANG, $JUMLAH_PER_HALAMAN, $TOTAL_ITEM) {
		
		if($TOTAL_ITEM > $JUMLAH_PER_HALAMAN){
			$a = ceil($TOTAL_ITEM/$JUMLAH_PER_HALAMAN);
			if($a <= 2) {
				$pages= FALSE;
			}else{
				$pages = $a;
			}
		}else{
			$pages = FALSE;
		}

		if($pages){
		
			$text = "Page: ";
			$TOTAL_HALAMAN = ceil($TOTAL_ITEM / $JUMLAH_PER_HALAMAN - 1);
			if (isset($HALAMAN_SEKARANG) && is_numeric($HALAMAN_SEKARANG)) {
			   $HALAMAN_SEKARANG = (int) $HALAMAN_SEKARANG;
			} else {
			   $HALAMAN_SEKARANG = 1;
			}
		
			if ($HALAMAN_SEKARANG > $TOTAL_HALAMAN) {
			   $HALAMAN_SEKARANG = $TOTAL_HALAMAN;
			}
			if ($HALAMAN_SEKARANG < 1) {
			  
			   $HALAMAN_SEKARANG = 1;
			}
		
			$offset = ($HALAMAN_SEKARANG - 1) * $JUMLAH_PER_HALAMAN;
		
			$range = 8;
		
			if ($HALAMAN_SEKARANG > 1) {
			   $text .= " <a href='".$url."1'><<</a> ";
			   $HALAMAN_SEBELUMNYA = $HALAMAN_SEKARANG - 1;
			   $text .= " <a href='".$url.$HALAMAN_SEBELUMNYA."'> <</a> ";
			}
			for ($x = ($HALAMAN_SEKARANG - $range); $x < (($HALAMAN_SEKARANG + $range) + 1); $x++) {
		
			   if (($x > 0) && ($x <= $TOTAL_HALAMAN)) {
		
				  if ($x == $HALAMAN_SEKARANG) {
					 $text .= " [ <b>$x</b> ] ";
				  } else {
					 $text .= " <a href='".$url.$x."'>$x</a> ";
				  } 
			   }
			}
		
			if ($HALAMAN_SEKARANG != $TOTAL_HALAMAN) {
			   $HALAMAN_SELANJUTNYA = $HALAMAN_SEKARANG + 1;
			   $text .= " <a href='".$url.$HALAMAN_SELANJUTNYA."'>> </a> ";
			   $text .= " <a href='".$url.$TOTAL_HALAMAN."'>>></a> ";
			}
			$nomorhalaman = "<div style='text-align:center'>".$text."</div>";
			
			
			return $nomorhalaman;
		}
	}
}

?>