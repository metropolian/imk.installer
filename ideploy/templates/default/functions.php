<?php

	Html_Init( 'default', 
	array(
		'head' => 'html_header.php',
		'foot' => 'html_footer.php'
	));

    Html_Script('css/bootstrap.css');
    Html_Script('css/material.css');
    Html_Script('css/ripples.css');
    Html_Script('css/roboto.css');

    Html_Script('js/jquery.min.js');
    Html_Script('js/bootstrap.min.js');
    Html_Script('js/material.min.js');
    Html_Script('js/ripples.min.js');

    /* check user login */
	// $User = User_GetCurrent();

?>