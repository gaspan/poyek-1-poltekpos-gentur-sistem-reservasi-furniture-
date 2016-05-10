<?php

Class harga
{
	public function persentaseDP($hrg_asli,$hrg_dp)
	{
		$no=0;
		$setengah = $hrg_asli/2;

		if ($hrg_dp > $setengah) {
			return 0;	
		}else{
			return 1;
		}
	}
	public function harga_pelunasan($hrg_asli,$hrg_dp)
	{
		$harga_pelunasan = $hrg_asli - $hrg_dp;
		return $harga_pelunasan;

	}
}
?>