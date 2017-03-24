<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Arguments
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function arguments_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'arguments_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function arguments_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'arguments_pingback_header' );
 
/**
 * Gets/displays categories of a post sorted in ways more useful than alphabetically by name
 */
function displayPostCategories($post_id, $separator = '  &bull; ', $max_to_show = '3') {
	$rank_to_category = get_site_categories_orderedby_count();
	$list_of_category_ids = getPostCategories($post_id);
	if ( empty($list_of_category_ids) or empty($rank_to_category) ) { return; }
	$category_to_rank = array_flip($rank_to_category);	

	// print ot the requested number of categories we've assembled
	$output = '';
	$count = 1;
	foreach ( $list_of_category_ids as $cat_id ) {
		if($count > $max_to_show) { break; }
		elseif($count > 1) { $output .= $separator; }

		$link = get_category_link($cat_id);
		$name = get_cat_name($cat_id);
		//$output .= '<a href="' . esc_url($link) . '">' . $name . '(' . $category_to_rank[$cat_id]  . ')</a>';
		$output .= '<a href="' . esc_url($link) . '">' . $name . '</a>';		
		$count++;
	} 
	echo $output;
}
function getPostCategories($post_id) {
	// resort a post's categories: 1. most used category, 2. least used, then randomize the rest
	$rank_to_category = get_site_categories_orderedby_count();
	$post_categories_WP_Terms = get_the_category( $post_id );
	if ( empty($post_categories_WP_Terms) or empty($rank_to_category) ) { return; }
	$category_to_rank = array_flip($rank_to_category);

	// make WP Terms array into one that has term_id as key and rank in site as value
	foreach ( $post_categories_WP_Terms as $term ) {
		$post_categories_default[$term->term_id] = $category_to_rank[$term->term_id];
	}
	//error_log( "post categories with ranking: " . print_r($post_categories_default, true) );

	// FIRST CATEGORY: post category that's most used on the site
	foreach ( $rank_to_category as $cat_id ) {
		if ( $post_categories_default[$cat_id] ) {
			$PostCategories[] = $cat_id;  
			break;
		}
	}
	// SECOND CATEGORY: post category that's least use on the site
	$reverse_rank_to_category = array_reverse($rank_to_category);
	foreach ( $reverse_rank_to_category as $cat_id ) {
		if ( $post_categories_default[$cat_id] ) {
			$PostCategories[] = $cat_id;  
			break;
		}
	}	
	// THIRD+ CATEGORIES: randomly sorted
	$random_categories = $post_categories_default;
	shuffle($random_categories);
	foreach ( $random_categories as $cat_id ) {
		if ( !in_array($cat_id, $PostCategories) and ($cat_id != '1') ) { // exclude "uncategorized" 
			$PostCategories[] = $cat_id;
		}
	}
	return $PostCategories; 
}
function get_site_categories_orderedby_count() {
	// Returns site categories ordered by ranking, with rank as key and term_id as value
	// Get any existing copy of our transient data
	if ( false === ( $terms = get_transient( 'get_terms_category_orderby_count_DESC_hide_empty_1' ) ) ) {
	    // It wasn't there, so regenerate the data and save the transient
		$terms = get_terms( 'category', array(
		    'orderby'    => 'count',
		    'order'		 => 'DESC',
		    'hide_empty' => 1
		) );
	     set_transient( 'get_terms_category_orderby_count_hide_empty_1', $terms, 48 * HOUR_IN_SECONDS );
	}
	// make WP Terms array into one that has term_id as value and numerical rank as key
	$rank = 1;
	foreach ( $terms as $term ) {
		$ranked_list_of_terms[$rank] = $term->term_id;
		$rank++;
	}
	//error_log( "site categories ranked: " . print_r($ranked_list_of_terms, true) );
	return $ranked_list_of_terms; 
}

/**
 * Return estimated reading time in minutes
 */
 function getEstimatedReadingTime( $content ) {
 	$estimatedWPM = 275; // like Medium.com... but we don't care about images
 	// now assume default WPM is for 8th grade, correct based on difficulty
	$flesch_grade = calculate_flesch_grade( $content ); // crude, but...
 	$estimatedWPM = round( $estimatedWPM * (6 / $flesch_grade) );
	$numWords = str_word_count( strip_tags($content) );
		
	$estimatedTime = round($numWords / $estimatedWPM);
	return $estimatedTime; 
 }
 /**
  * Ca;culate Flesch-KincaidL see https://www.addedbytes.com/blog/code/flesch-kincaid-function/
  */
function calculate_flesch($text) {
    return (206.835 - (1.015 * average_words_sentence($text)) - (84.6 * average_syllables_word($text)));
}
function calculate_flesch_grade($text) {
    return ((.39 * average_words_sentence($text)) + (11.8 * average_syllables_word($text)) - 15.59);
}
function average_words_sentence($text) {
    $sentences = strlen(preg_replace('/[^\.!?]/', '', $text));
    $words = strlen(preg_replace('/[^ ]/', '', $text));
    return ($words/$sentences);
}
function average_syllables_word($text) {
    $words = explode(' ', $text);
    for ($i = 0; $i < count($words); $i++) {
        $syllables = $syllables + count_syllables($words[$i]);
    }
    return ($syllables/count($words));
}
function count_syllables($word) {

    $subsyl = Array(
        'cial'
        ,'tia'
        ,'cius'
        ,'cious'
        ,'giu'
        ,'ion'
        ,'iou'
        ,'sia$'
        ,'.ely$'
    );

    $addsyl = Array(
        'ia'
        ,'riet'
        ,'dien'
        ,'iu'
        ,'io'
        ,'ii'
        ,'[aeiouym]bl$'
        ,'[aeiou]{3}'
        ,'^mc'
        ,'ism$'
        ,'([^aeiouy])\1l$'
        ,'[^l]lien'
        ,'^coa[dglx].'
        ,'[^gq]ua[^auieo]'
        ,'dnt$'
    );

    // Based on Greg Fast's Perl module Lingua::EN::Syllables
    $word = preg_replace('/[^a-z]/is', '', strtolower($word));
    $word_parts = preg_split('/[^aeiouy]+/', $word);
    foreach ($word_parts as $key => $value) {
        if ($value <> '') {
            $valid_word_parts[] = $value;
        }
    }

    $syllables = 0;
    // Thanks to Joe Kovar for correcting a bug in the following lines
    foreach ($subsyl as $syl) { 
        $syllables -= preg_match('~'.$syl.'~', $word); 
    } 
    foreach ($addsyl as $syl) { 
        $syllables += preg_match('~'.$syl.'~', $word); 
    }
    if (strlen($word) == 1) {
        $syllables++;
    }
    $syllables += count($valid_word_parts);
    $syllables = ($syllables == 0) ? 1 : $syllables;
    return $syllables;
}
  