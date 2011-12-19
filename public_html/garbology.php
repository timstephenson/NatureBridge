<?php
// $Id: garbology.php,v 1.2 2011-12-02 21:17:39 kristen Exp $

/**
 * @file Based on page-garbology.tpl.php from D6 site.
 */

/**
 * Shorten the given string.
 */
function garbology_string_shorten($text, $length) {
  $text = substr($text, 0, $length);
  if (substr($text, 0, strrpos($text, ' ')) != '') {
    // get rid of incomplete words
    $text = substr($text, 0, strrpos($text, ' '));
  }
  $text = $text.'...';
  return $text;
}

/**
 * Define menu items.
 */
$menu_links = array();
// hardcode the garbology menu array
$garbology_menu = array(
  'menu-3288' => array(
    'href' => 'garbology/about',
    'title' => 'About',
  ),
  'menu-3289' => array(
    'href' => 'garbology/resources',
    'title' => 'Resources',
  ),
  'menu-3290' => array(
    'href' => 'garbology/teachers',
    'title' => '<i>for</i> Teachers',
  ),
  'menu-3291' => array (
    'href' => 'garbology/students',
    'title' => '<i>for</i> Students',
  ),
  'menu-3292' => array (
    'href' => 'garbology/families',
    'title' => '<i>for</i> Families',
  ),
  'menu-3293' => array (
    'href' => 'blog/kc-nattinger/what-garbology',
    'title' => 'Trash Talk',
  ),
  'menu-3294' => array (
    'href' => 'garbology/contact',
    'title' => 'Contact',
  ),
);

foreach ($garbology_menu as $menu_link) {
  $menu_links[] = '<a href="/'.$menu_link['href'].'">'.$menu_link['title'].'</a>';
}

/**
 * Define left section items.
 */
$left_sections = array(
  array(
    'heading' => 'For Teachers',
    'alias' => 'garbology/teachers',
    'image' => 'source/img/placeholder_teachers.jpg',
    'title' => 'Featured Activity: Waste-Less Lunch',
    'summary' => 'Lead your students in learning about natural resources used in common packaging materials. Challenge your students to conserve natural resources through their lunch choices.',
    'more' => 'Check out this and other Garbology lessons for the classroom',
  ),
  array(
    'heading' => 'For Students',
    'alias' => 'garbology/students',
    'image' => 'source/img/placeholder_students.jpg',
    'title' => 'Featured Activity: Conduct a Waste Assessment',
    'summary' => 'Do you know how much waste your school puts in landfills each week? How much your school recycles or composts? Find out with a waste assessment and help your school create less waste.',
    'more' => 'Learn how and check out other Garbology activities',
  ),
  array(
    'heading' => 'For Families',
    'alias' => 'garbology/families',
    'image' => 'source/img/placeholder_families.jpg',
    'title' => 'Featured Activity: Composting With the FBI',
    'summary' => 'The FBI turn waste into healthy soil. Learn about how fungus, bacteria, and invertebrates break down organic matter. Help them out by composting in your home to keep food and yard waste out of landfills.',
    'more' => 'Bring Garbology home',
  ),
);

function garbology_remove_paragraph_tags(&$text) {
  if (! empty($text)) {
    $text = str_replace('<p>', '', $text);
    $text = str_replace('</p>', '', $text);
  }
}

/**
 * Trash talk blog array.
 */
date_default_timezone_set('America/Los_Angeles');
$trash_talk = array(
  array(
    'alias' => 'garbology/blog/kc-nattinger/what-garbology',
    'created' => 1321315200,
    'title' => 'What is Garbology?',
    'summary' => '<p>At our NatureBridge campus in Olympic National Park, we educators talk about Garbology all the time with our students. The students practice Garbology as they measure their food waste at every meal, working to reduce the amount that goes into landfills.</p>',
  ),
);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

	<head class="html5reset-bare-bones">
	
    <title>Garbology</title>
    <?php print $head; ?>
    <?php print $scripts; ?>
		
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
        
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
    <link rel="stylesheet" href="/source/css/main.css" media="all">
    <link rel="stylesheet" href="/source/css/_print/main.css" media="print">
		
		<!--[if IE]>
		<link rel="stylesheet" href="/source/css/_patches/win-ie-all.css" media="all">
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" href="/source/css/_patches/win-ie7.css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
		<link rel="stylesheet" href="/source/css/_patches/win-ie-old.css" media="all">
		<![endif]-->
	</head>
		
	<body>
		
    <div id="fb-root"></div>
    <div id="flashWrapper">
			<div id="flashContent">
				<a href="http://www.adobe.com/go/getflashplayer"><div class="playerButton">&nbsp;</div></a>
			</div>
    </div>
	
		<div id="wrapper">
			
			<div id="navigation">
				<ul class="nav_ele">
          <?php foreach ($menu_links as $menu_link): ?>
          <li><?php print $menu_link; ?></li>
          <?php endforeach; ?>
					<div class="clear">&nbsp;</div>
				</ul>
			</div>
			
			<div id="content">
				<div id="mainContent">
          <?php foreach ($left_sections as $left_section): ?>
            <h1><a href="/<?php print $left_section['alias']; ?>"><?php print $left_section['heading']; ?></a></h1>
            <hr />
            <a href="/<?php print $left_section['alias']; ?>"><img class="content" src="/<?php print $left_section['image']; ?>" /></a>
            <h2><a href="/<?php print $left_section['alias']; ?>"><?php print $left_section['title']; ?></a></h2>
            <br/>
            <p><?php print $left_section['summary']; ?></p>
            <p><a href="/<?php print $left_section['alias']; ?>"><?php print $left_section['more']; ?> &raquo;</a></p>
            <div style="clear:both;"></div>
          <?php endforeach; ?>
				</div>
				<div id="sidebar">
					<div class="sidebar_item">
						<h1>Testimonials</h1>
            <blockquote style="font-size:0.9em">&quot;I used the application with my class, and they loved it! 
            The application is easy to use and is adaptable for any grade level.  There 
            is nothing else like it on the web; it's both fun and educational. I think 
            My Garbology is great because any teacher can use the application as a 
            one-shot deal or teach the lessons as part of a whole unit on conservation.&quot;<br/><br/>
            <i style="font-size:0.9em">&ndash; Paul, a third grade teacher in Oakland</i></blockquote>
					</div>
					<hr />
            <div class="sidebar_item">
            <h1>Sign up for teaching resources</h1>
              <div>
                <script type="text/javascript" src="/sites/all/themes/naturebridge/exact_target.js"></script>
                <form id="subscribeForm" onsubmit="return checkETForm();" method="post" name="subscribeForm" action="http://cl.exct.net/subscribe.aspx?lid=1090737">
                  <input value="http://nb.raddhq.com/email/thankyou" name="thx" type="hidden" />
                  <input value="http://nb.raddhq.com/email/error" name="err" type="hidden" />
                  <input value="http://nb.raddhq.com/email/unsubscribe" name="usub" type="hidden" />
                  <input value="96170" name="MID" type="hidden" />
                  <input value="" name="Date" id="DateField" type="hidden" />
                  <input value="sub_add_update" name="SubAction" type="hidden" />
                  <br />
                  <table cellpadding="2" cellspacing="2" width="320">
                  <tbody>
                    <tr>
                      <td>First name:</td>
                      <td><input style="background-color: rgb(255, 255, 160);" name="First Name" gtbfieldid="7" type="text" /></td>
                    </tr>
                    <tr>
                      <td>Last name:</td>
                      <td><input style="background-color: rgb(255, 255, 160);" name="Last Name" gtbfieldid="8" type="text" /></td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><input style="background-color: rgb(255, 255, 160);" name="Email Address" gtbfieldid="9" type="text" /></td>
                    </tr>
                  </tbody>
                  </table>
                  <p><input value="Submit" class="form-submit" type="submit" /></p>
                </form>
              </div>
            </div>
					<hr />
          <?php if (! empty($trash_talk)): ?>
					<div class="sidebar_item">
						<h1>Trash Talk</h1>
            <?php foreach ($trash_talk as $trash_talk_item): ?>
            <div class="date"><p><?php print date('l M. j, Y', $trash_talk_item['created']); ?></p></div>
            <a href="/<?php print $trash_talk_item['alias']; ?>" class="entry_title"><?php print $trash_talk_item['title']; ?></a>
            <p><?php print $trash_talk_item['summary']; ?> <a href="/<?php print $trash_talk_item['alias']; ?>" class="see_more"><?php print "more &raquo;"; ?></a></p>
            <?php endforeach; ?>
					</div>
          <?php endif; ?>
				</div>
				<div class="clear">&nbsp;</div>
			</div>
			
		</div>
		
		<div id="footer">
      <a href="/garbology/credits"><img src="/source/img/a_project_by.png" /></a>
      <div id="footer_content">
        <a href="http://att.com"><img src="/source/img/footer_01_att.png" /></a>
        <a href="http://www.pasco.com/"><img src="/source/img/footer_05_pasco.png" /></a>
        <a href="http://westernizedproductions.com"><img src="/source/img/footer_02_westernized.png" /></a>
        <a href="http://elasticcreative.com"><img src="/source/img/footer_03_elastic.png" /></a>
        <a href="http://www.siriussound.com"><img src="/source/img/footer_06_sirius.png" /></a>
        <a href="/garbology/credits"><img src="/source/img/footer_04_manyMore.png" /></a>
				<div class="clear">&nbsp;</div>
      </div>
			<ul>
          <?php foreach ($menu_links as $menu_link): ?>
          <li><?php print $menu_link; ?></li>
          <?php endforeach; ?>
			</ul>
		</div>
        
		<script type="text/javascript">

      var flashvars = {};
      var params = {};
      params.allowfullscreen = "true";
      swfobject.embedSWF("/source/swf/container.swf", "flashContent", "100%", "770", "10.0.0", "/source/js/expressInstall.swf", flashvars, params, {name:"flashContent"});

      var jsReady = false;
      $(document).ready(function() {
        jsReady = true;
      });

      function isReady() {
        return jsReady;
      }            

      function setFlashHeight(value) {
        $('body').animate({"background-position": "0 "+value+"px"}, 0);
        $('#flashWrapper').animate({height: value+"px", "background-position": "center 0"}, 0);
      }

		</script>
        
	</body>
</html>
