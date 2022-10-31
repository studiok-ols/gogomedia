<?php

function stk_acf_init_block()
{
    if( !function_exists('acf_register_block_type') ) {
        return;
    }


    acf_register_block_type(array(
        'name'				=> 'gogo-slider',
        'title'				=> __('GogoMedia Slider'),
        'description'		=> __('GogoMedia Slider'),
        'render_template'   => get_theme_file_path() . '/template-parts/block/gogo-slider.php',
        'category'			=> 'widgets',
        'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
	                                width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                    <path fill="#215398" d="M21.52,12.789c0,1.104-0.895,2-2,2H4.38c-1.104,0-2-0.896-2-2V6.12c0-1.104,0.896-2,2-2h15.14 c1.105,0,2,0.896,2,2V12.789z"/>
                                    <circle fill="#215398" cx="4.203" cy="18.057" r="1.823"/>
                                    <circle fill="#215398" cx="19.697" cy="18.057" r="1.824"/>
                                    <circle fill="#215398" cx="12" cy="18.057" r="1.824"/></svg>',
        'keywords'			=> array( 'content' ),
        'mode' 				=> 'preview',
        'supports'        => array(
            'jsx'        => true,
            'color'      => array(
                'text'       => true,
                'background' => false,
                ),
                'align_text' => true,
            )
        )
    );

}

add_action('acf/init', 'stk_acf_init_block');
