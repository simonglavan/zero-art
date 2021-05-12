<?php
function write_header_inline_css() { ?>
    <style>
       
    </style>
<?php
}
 
add_action('wp_head', 'write_header_inline_css');
 