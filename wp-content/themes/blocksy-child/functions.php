<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

function add_admin_link_to_menu($items, $args)
{
	// Vérifier si l'utilisateur est connecté
	if (is_user_logged_in()) {
		// Vérifier si le menu actuel est celui que vous voulez modifier
		if ($args->theme_location == 'menu_mobile') { // Remplacez 'menu_mobile' par le nom de votre emplacement de menu
			// Construire le lien vers le tableau de bord admin
			$admin_link = '<li class="menu-item"><a href="' . admin_url() . '">Admin</a></li>';
			// Trouver la position où insérer le lien admin
			$position = strpos($items, '</li>', strpos($items, 'menu-nous-rencontrer') + 1);
			// Insérer le lien admin à la position trouvée
			$items = substr_replace($items, $admin_link, $position, 0);
		}
	}
	return $items;
}

// Ajouter le filtre pour exécuter la fonction lorsque le menu est généré
add_filter('wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2);
