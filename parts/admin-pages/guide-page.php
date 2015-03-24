<?php
/*
 * Page: simple-directory-guide
 */

global $current_user;
get_currentuserinfo();

?>
<style type="text/css">

.row {width:100%;}
.col-12 {width:100%;}
.col-9 {width:75%;}
.col-8 {width:66.66%;}
.col-6 {width:50%;}
.col-4 {width:33.33%;}
.col-3 {width:25%;}

[class*='col-'] {
  float: left;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}

*, *:after, *:before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

[class*='col-'] {
  padding-right: 20px;
}
[class*='col-']:last-of-type {
  padding-right: 0;
}
[class*='col-'] {
  padding-right: 20px;
}
[class*='col-']:last-of-type {
  padding-right: 0;
}
.grid-pad > [class*='col-']:last-of-type {
  padding-right: 20px;
} 
.white-bg {background-color:#ffffff; border:1px solid #BDBDBD;}
.box {padding:10px; margin-top:3px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
padding-bottom:15px;}
.btn {
  -webkit-box-shadow: 0px 1px 3px #666666;
  -moz-box-shadow: 0px 1px 3px #666666;
  box-shadow: 0px 1px 3px #666666;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  margin-bottom:5px;
}

.btn:hover {
		color:#ffffff;
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
text-decoration:underline;
}
.center {text-align:center;}
</style>
<div class="row">
<div class="col-8">
<p>Simple Directory creates a custom post type called a 'Listing'.  Each listing has a title (just like a regular post) and a description. There are fields for contact info and social links.  To add a logo, use the 'Featured Image' uploader.</p>
<h2>Templates</h2>
<p>The plugin comes with two templated for displaying the listings: single-listing.php and archive-listing.php.  Both of these files are found in the /templates/ directory.  You can customize the templates, but any changes will be overwritten when you upgrade.
<h2>Support</h2>
<p>Looking for support? Got questions?  <a href="http://lautman.ca/forums/" target="_blank">Visit the support forum to get answers</a>.  Want more?  <a href="http://lautman.ca/simple-directory" target="_blank">Upgrage to Pro</a>.
</div>
<div class="col-4 center">
<div class="box white-bg">

<h2>Want More?</h2>
<h3>More Features.  More Support.</h3>
<p><strong>Simple Directory Pro</strong> gives you more features and more control to take your directory site to new heights.</p>
<a href="http://lautman.ca/simple-directory/" target="_blank" class="btn">Learn About Pro</a>
</div>
<div class="box white-bg">
<h2>Improve Your Local SEO</h2>
<p>Display your contact info property formatted for Rich Snippets, with the <strong>FREE</strong> hCard Widget Plugin</p>
<a href="http://wordpress.org/plugins/hcard-widget" target="_blank" class="btn">Get the hCard Widget</a>
</div>
</div>
</div>