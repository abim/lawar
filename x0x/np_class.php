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
		
			$text = "";
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
		
			$range = 8; //range titik
		
			if ($HALAMAN_SEKARANG > 1) {
			   $text .= "<li><a href='".$url."1'><i class=\"icon-step-backward\"></i></a></li>";//back end
			   $HALAMAN_SEBELUMNYA = $HALAMAN_SEKARANG - 1;
			   $text .= "<li><a href='".$url.$HALAMAN_SEBELUMNYA."'><i class=\"icon-chevron-left\"></i></a></li>";//back
			}
			for ($x = ($HALAMAN_SEKARANG - $range); $x < (($HALAMAN_SEKARANG + $range) + 1); $x++) {
		
			   if (($x > 0) && ($x <= $TOTAL_HALAMAN)) {
		
				  if ($x == $HALAMAN_SEKARANG) {
					 $text .= "<li class=\"active\"><a href=\"#\">$x</a></li>";
				  } else {
					 $text .= "<li><a href='".$url.$x."'>$x</a></li>";
				  } 
			   }
			}
		
			if ($HALAMAN_SEKARANG != $TOTAL_HALAMAN) {
			   $HALAMAN_SELANJUTNYA = $HALAMAN_SEKARANG + 1;
			   $text .= "<li><a href='".$url.$HALAMAN_SELANJUTNYA."'><i class=\"icon-chevron-right\"></i></a></li>"; //next
			   $text .= "<li><a href='".$url.$TOTAL_HALAMAN."'><i class=\"icon-step-forward\"></i></a></li>"; //next end
			}
			$nomorhalaman = "<ul>".$text."</ul>";
			
			
			return $nomorhalaman;
		}
	}
}

?>