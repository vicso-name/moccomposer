<?php
if ( get_field('new_case_study') ) {
    $directory_path = 'template-parts/project/' . get_field('template_parts_directory') . '/case-study';
    get_template_part( $directory_path, 'p2' );
}; ?>