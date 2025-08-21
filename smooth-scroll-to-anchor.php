<?php
/*
Plugin Name: Smooth Scroll to Anchor
Description: Adds smooth scrolling to HTML anchors across your WordPress site.
Version: 1.0
Author: sudoRED
Author URI: https://redinblack.net
*/

function simple_scroll_to_anchor_scripts() {
    wp_enqueue_script('smooth-scroll-to-anchor', plugins_url('js/simple-scroll-to-anchor.js', __FILE__), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'smooth_scroll_to_anchor_scripts');

function simple_scroll_to_anchor_inline_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('a[href^="#"]');
            links.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var targetId = this.getAttribute('href');
                    var targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'smooth_scroll_to_anchor_inline_script');
