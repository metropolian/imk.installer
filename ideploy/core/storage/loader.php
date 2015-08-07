<?php 

    function LoadContent($Url, $FName = "")
	{
		$useragent= "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $Url); 
        curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        //curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $output = curl_exec($ch);         
        $info = curl_getinfo ($ch);
        curl_close($ch);           
		if ($output)
		{
			if (! empty( $FName ) )
			{
				$hdest = fopen($FName, "w");
				if ($hdest)
				{
					fwrite($hdest, $output);
					fclose($hdest);
				}
			}
			return $output;
		}
		return null;
	}

?>