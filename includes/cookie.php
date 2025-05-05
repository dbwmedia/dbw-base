<?php
function add_cookiebot_script() {
    ?>
<script id="usercentrics-cmp" async data-eu-mode="true" data-settings-id="0nGH0ajvaTb-s0" src="https://app.eu.usercentrics.eu/browser-ui/latest/loader.js"></script>    <?php
}
add_action('wp_head', 'add_cookiebot_script', 1);
