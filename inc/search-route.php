<?php

add_action('rest_api_init', 'extremeRegisterSearch');

function extremeRegisterSearch() {
    register_rest_route('extremechem/v1', 'finder', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'extremeFinder'
    ));
}

function extremeFinder($data) {
    $mainQuery = new WP_Query(array(
      'post_type' => array('post', 'page', 'product', 'service'),
      's' => sanitize_text_field($data['term'])
    ));
  
    $results = array(
      'generalInfo' => array(),
      'products' => array(),
      'services' => array()
      
    );
  
    while($mainQuery->have_posts()) {
      $mainQuery->the_post();
  
      if (get_post_type() == 'post' OR get_post_type() == 'page') {
        array_push($results['generalInfo'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(), 
          'postType' => get_post_type(),
          'authorName' => get_the_author()
        ));
      }
  
      if (get_post_type() == 'product') {
        array_push($results['products'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'image' => get_the_post_thumbnail_url(0, 'productLandscape')
        ));
      }
  
      if (get_post_type() == 'service') {
        array_push($results['services'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'id' => get_the_id()
          
        ));
      }
      
    }

    if($results['services']) {

      $servicesMetaQuery = array('relation' => 'OR');

      foreach($results['services'] as $item) {
        array_push($servicesMetaQuery, array(
          'key' => 'related_services',
          'compare' => 'LIKE',
          'value' => '"' . $item['id'] .'"'
        ));
      }
      $servicesRelationshipQuery = new WP_Query(array(
        'post_type' => 'product',
        'meta_query' => $servicesMetaQuery
      ));

      while($servicesRelationshipQuery->have_posts()) {
        $servicesRelationshipQuery->the_post();
  
        if (get_post_type() == 'product') {
          array_push($results['products'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'image' => get_the_post_thumbnail_url(0, 'productLandscape')
          ));
        }
  
      }

      $results['products'] = array_values(array_unique($results['products'], SORT_REGULAR));

    }

    return $results;

}

