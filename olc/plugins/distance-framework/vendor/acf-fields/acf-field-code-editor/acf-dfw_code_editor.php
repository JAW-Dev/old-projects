<?php
function include_field_types_code($version) {
    include_once 'acf-dfw_code_editor-v5.php';
}
add_action('acf/include_field_types', 'include_field_types_code');