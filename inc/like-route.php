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

function createLike() {
    return 'Thanks for trying to create a like.';
}

function deleteLike() {
    return 'Thanks for trying to delete a like.';
}