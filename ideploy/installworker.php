<?php
    require_once('init.php');
    Html_Init( 'default' );

    $Base_Path = $Configs['base_path'];
    $Temp_Path = 'tmp';
    $Dest = $Request->GET('dest','');

    switch ($Request->GET('install'))         
    {
    case 'from_files':            
        $Files = explode(',', $Request->GET('files'));            
        if (count($Files) > 0) 
        {                     
            foreach ($Files as $F) 
            {
                $FSize = number_format(filesize($F));
                echo "<p>{$F} ({$FSize} bytes)</p>";
                
                $FDest = MakePath($Base_Path, $Dest);
                
                try
                {            
                    if (strpos($F, '.zip')) {

                        $Fzip = new ZipArchive();
                        if ($Fzip->open($F)) {                        
                            $Fzip->extractTo($Temp_Path);
                            $Fzip->close();
                        }

                    } else if (strpos($F, '.gz')) {

                    }
                    
                    DirectoryCopy($Temp_Path, $FDest);
                }
                catch(Exception $Ex)
                {
                    echo "<p>Error: $Ex </p>";
                }
            }
        }
        break;
    
    default:
        break;
    }

    
?>

