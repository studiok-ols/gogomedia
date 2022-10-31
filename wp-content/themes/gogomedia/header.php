<?php
/**
 * The header for our theme
 *
 */

if ( function_exists( 'the_custom_logo' ) ) {
    $logo = get_custom_logo() ?? null;
}

$name = 'Primary';
$menu = wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

<header>
    <div class="header container">

        <div class="header__logo-wrapper">
            <a href="<?php echo get_home_url(); ?>"><?php  echo $logo; ?></a>
        </div>

        <div class="header__menu-wrapper">
            <?php  echo $menu; ?>
        </div>

    </div>
</header>

