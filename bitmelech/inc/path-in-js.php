<?php
// Pass the path to the js file
add_action( 'wp_enqueue_scripts', 'action_function_name_bitmelech', 99 );
function action_function_name_bitmelech(){
   $listCurrencies = get_field('listCurrencies', 'option');
   
    wp_localize_script( 'main-script', 'bitmelech', array(
        'template_url' => get_template_directory_uri(),
        'currency_data' => json_encode($listCurrencies)
    ) );
};