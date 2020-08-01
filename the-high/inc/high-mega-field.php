<?php
/***
	*
	* Add a custom fields inside the menu editor 
	* Appearances -> Menu 
	*
	*
***/
?>
<?php

// add field to menu editor
add_filter( 'wp_setup_nav_menu_item', 'high_nav_field');
function high_nav_field( $menu_item ) {

    $menu_item->mega = get_post_meta( $menu_item->ID, '_menu_item_high', true );
    return $menu_item;

}

// update field

add_action( 'wp_update_nav_menu_item', 'high_update_nav_field', 10, 3 );
function high_update_nav_field( $menu_id, $menu_item_db_id, $args ) {

    // Check if element is properly sent
    if ( is_array( $_REQUEST['menu-item-mega']) ) {
        $mega_value =  update_post_meta($menu_item_db_id, '_menu_item_high', $_REQUEST['menu-item-mega'][$menu_item_db_id]);
		
} else {
    delete_post_meta($menu_item_db_id, '_menu_item_high');
}

}

// gets the custom walker edit with custom field form added
add_filter( 'wp_edit_nav_menu_walker', 'high_edit_walker', 10, 2 );
function high_edit_walker($walker,$menu_id) {

    return 'Walker_Nav_Menu_Edit_Custom';

}