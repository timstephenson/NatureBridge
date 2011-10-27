// $Id$
 
DESCRIPTION:
------------
This module provides an YouTube field type.
I made this module becouse there wasn't good working one for Drupal 7 by now.
Yes there is media module and youtube support, but as I tested it, it was buggy.
So here it is, simple and working one with Drupal 7.


INSTALLATION:
-------------
1. Place the entire email directory into your Drupal sites/all/modules/
	 directory.

2. Enable the youtube field module by navigating to:
	 administer > modules

3. Add your new field in "Content Types"

4. Change display mode whenever you want it under "Manage display" tab


Features:
---------
  * turns links to YouTube videos into
      o embeded video - supports width and height attributes
      o insert image thumbnail with link to YouTube movie
      o insert plain text link to youtube movie
  * exposes fields to Views


Author:
-------
Tomasz Turczyński
tomasz@turczynski.com
http://turczynski.com/