<?php
    require_once('init.php');
    Html_Init( 'default' );
    Html_Title('iDeploy - iMakeService');
    Html_Begin();
    Html_Render('nav');

    $From = $Request->GET('install','');
    $Dest = $Request->GET('dest','');
    
    $DestUrl = "installworker.php?" . $Request->QueryString();

    

    $Files = Get_UploadedFiles('files');
    if (count($Files) > 0)
    {   
        $Dest = 'tmp';
        $Names = Store_UploadedFile($Files, $Dest);
        
        $DestUrl .= 'install=from_files&';
        $DestUrl .= 'files=' . implode(',', $Names) . '&';
    }

?>

<div class="container" role="main">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Installing</h3>
            </div>
            <div class="panel-body">
                <iframe src="<?php echo $DestUrl; ?>" frameborder="no" width="100%" height="460" />    
            </div>
        </div>
    </div>

</div> <!-- /container -->


<?php Html_End(); ?>