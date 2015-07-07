<?php
//Adds Recommended Schema MarkUp to Enable Sitelinks Search
//Code Adapted from https://wordpress.org/plugins/sitelinks-search-box/ by @apasionados
function simple_dir_sitelinks_search_box (){
    if ( is_front_page() ) {
        echo PHP_EOL . '<script type="application/ld+json">' . PHP_EOL;
        echo '{' . PHP_EOL;
        echo '  "@context": "http://schema.org",' . PHP_EOL;
        echo '  "@type": "WebSite",' . PHP_EOL;
        echo '  "url": "' . get_site_url() . '/",' . PHP_EOL;
        echo '  "potentialAction": {' . PHP_EOL;
        echo '    "@type": "SearchAction",' . PHP_EOL;
        echo '    "target": "' . get_home_url() . '/?s={search_term}",' . PHP_EOL;
        echo '    "query-input": "required name=search_term"' . PHP_EOL;
        echo '  }' . PHP_EOL;
        echo '}' . PHP_EOL;
        echo '</script>' . PHP_EOL;
        }
} 

$settings = get_option('simple_directory_settings');
if(isset ($settings['enable_sitelinks_search'])){$sitelinks = $settings['enable_sitelinks_search'];
if ($sitelinks == 'yes') {
add_action( 'wp_footer', 'simple_dir_sitelinks_search_box', 10000 );
}
												}
?>