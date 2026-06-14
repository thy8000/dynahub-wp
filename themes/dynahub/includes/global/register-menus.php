<?php

function dynahub_register_menus() {
    register_nav_menus(
        array(
            'main-menu' => esc_html__( 'Main Menu', 'dynahub' ),
        )
    );
}

add_action( 'after_setup_theme', 'dynahub_register_menus' );