<?php
add_action('rest_api_init', 'extremeLikeRoutes');

function extremeLikeRoutes() {
    register_rest_route('extremechem/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));

    register_rest_route('extremechem/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data) { 
    if ( is_user_logged_in() ) {
        $product = sanitize_text_field($data['productId']);

        $existQuery = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(
              array(
                'key' => 'liked_product_id',
                'compare' => '=',
                'value' => $product
              )
            )
        ));

        if ($existQuery->found_posts == 0 AND get_post_type($product) == 'product') {
            // create like
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => 'Our php create like test',
                'meta_input' => array(
                    'liked_product_id' => $product
                )
            ));
        } else {
            return 'Invalid product ID.';
        }

       
    } else {
        return 'Only logged in users can create a like.';
    }
   
}

function deleteLike($data) {
    $likeId = sanitize_text_field($data['like']);
    if(get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
        wp_delete_post($likeId, true);
        return 'Congratulations, like deleted.';
    } else {
        return 'You do not have the permission to delete that!';
    }
}
