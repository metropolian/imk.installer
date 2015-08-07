<?php

    require_once('init.php');
    Html_Init( 'default' );
    Html_Title('iDeploy - iMakeService');
    Html_Begin();
    Html_Render('nav');

    $Page = $Request->GET('page', 'ini');

    $Sidebar = new DynMenu('navtab');
    $Sidebar->AddControls(array(
        array('href' => MakeLink('page', 'ini'), 'text' => 'ini settings')
        ));
    

    switch( $_REQUEST['page'] )
    {
        
    case 'ini':
        
        $ini_data = ini_get_all(null, false);
        $Data = array();
        foreach($ini_data as $K => $V) {
            $Data[] = array($K, $V);
        }
        
        break;
    }
?>

<div class="container" role="main">
    <div class="row">
                
        <div class="col-md-3">
                        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
            <?php $Sidebar->Render(); ?>
                            </div>
        </div>

        </div>
        
                <div class="col-md-9">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <?php 
                    Html_Table(array('class' => 'table'), 
                              array('name', 'value'));
                           

                    Html_Table_Data( $Data );
                               
                    Html_Table_End();
                    ?>
                </table>
            </div>
        </div>
        </div>

    </div>
</div> <!-- /container -->


<?php Html_End(); ?>