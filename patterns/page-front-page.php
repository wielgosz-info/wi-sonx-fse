<?php
/**
 * Title: Front Page
 * Slug: wi-sonx-fse/page-front-page
 * Categories: theme
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package WI\SonxFSE
 */

/*
Initialize the query ID counter.
This is used to generate unique IDs for each query block to prevent with pagination
when the Front Page pattern is inserted directly.
*/
global $next_query_id;
$next_query_id = 0;

?>

<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-hello"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-about"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-services"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-portfolio"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-experience"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-blog"} /-->
<!-- wp:pattern {"slug":"wi-sonx-fse/section-front-page-contact"} /-->
