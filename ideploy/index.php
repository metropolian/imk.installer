<?php

    require_once('init.php');
    Html_Init( 'default' );
    Html_Title('iDeploy - iMakeService');
    Html_Begin();
    Html_Render('nav');

    $Installed = array();

    $Base_Path = $Configs['base_path'];

    foreach(scandir($Base_Path) as $F)
    {
        $Installed[$F] = 0;
    }

?>

<div class="container" role="main">
    <div class="row">
        <div class="col-md-7">
            
            <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Install by iDeploy</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid">
                    <a href="installer.php?install=drupal">Drupal</a>
                    <a href="installer.php?install=wordpress">Wordpress</a>
                    <a href="installer.php?install=joomla">Joomla</a>
                    <a href="installer.php?install=owncloud">Owncloud</a>
                    <a href="installer.php?install=pligg">Pligg</a>
                </div>
            </div>
        </div>
                </div>
            
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Install from File Package</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            $F = new DynForm('installer.php', 'POST');

                            $F->AddControls(array( 
                                array('type' => 'hidden', 'name' => 'install', 'value' => 'from_files'),

                                array('type' => 'text', 'name' => 'dest', 'label' => 'Directory'),

                                array('type' => 'file', 'name' => 'files[]', 'label' => 'File Package', 'multiple'),

                                array('type' => 'button', 'label' => '&nbsp;', 'value' => 'Upload', 'class' => 'btn btn-primary')
                            ));

                            $F->Render();
                        ?>
                    </div>
                </div>
            </div>
        
            <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Install From GIT</h3>
            </div>
            <div class="panel-body">
                <?php
                    $F = new DynForm('installer.php', 'POST');
                        
                    $F->AddControls(array( 
                        array('type' => 'hidden', 'name' => 'install', 'value' => 'from_git'),
                        
                        array('type' => 'text', 'name' => 'url', 'label' => 'GIT Address'),
                    
                        array('type' => 'button', 'label' => '&nbsp;', 'value' => 'Upload', 'class' => 'btn btn-primary')
                    ));

                    $F->Render();
                ?>
            </div>
        </div>
                </div>
            
            
                        <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Install From FTP</h3>
            </div>
            <div class="panel-body">
                <?php
                    $F = new DynForm('installer.php', 'POST');
                        
                    $F->AddControls(array( 
                        array('type' => 'hidden', 'name' => 'install', 'value' => 'from_ftp'),
                        
                        array('type' => 'text', 'name' => 'dest', 'label' => 'Directory'),
                        array('type' => 'text', 'name' => 'url', 'label' => 'FTP Server'),
                        array('type' => 'text', 'name' => 'user', 'label' => 'FTP Username'),
                        array('type' => 'password', 'name' => 'pass', 'label' => 'FTP Password'),
                        array('type' => 'text', 'name' => 'sourcedir', 'label' => 'FTP Directory'),
                    
                        array('type' => 'button', 'label' => '&nbsp;', 'value' => 'Upload', 'class' => 'btn btn-primary')
                    ));

                    $F->Render();
                ?>
            </div>
        </div>
                </div>

            
        </div>
        
        
        <div class="col-md-5">
            
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Server Name: </th>
                        <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                    </tr>
                    <tr>
                        <th>Server Port: </th>
                        <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
                    </tr>
                    <tr>
                        <th>Server Protocol: </th>
                        <td><?php echo $_SERVER['SERVER_PROTOCOL']; ?></td>
                    </tr>
                    <tr>
                        <th>Base Directory: </th>
                        <td><?php echo $Configs['base_path']; ?></td>
                    </tr>
                    <tr>
                        <th>Server CGI: </th>
                        <td><?php echo $_SERVER['GATEWAY_INTERFACE']; ?></td>
                    </tr>
                    <tr>
                        <th>Server Software: </th>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                    </tr>
                    <tr>
                        <th>PHP Version: </th>
                        <td><?php echo phpversion(); ?></td>
                    </tr>
                    <tr>
                        <th>Server Date/Time: </th>
                        <td><?php echo date('d/m/Y H:i:s'); ?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
            
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Installed</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <?php if ( is_array($Installed) )
                        foreach($Installed as $Name => $V) : ?>
                    <tr>
                        <th><?php echo $Name; ?> </th>
                        <td><?php echo $V; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>
            </div>
        </div>
            
    

        </div>
    </div>
</div> <!-- /container -->


<?php Html_End(); ?>