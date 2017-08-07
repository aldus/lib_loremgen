### readme
*Why this?*
- The syntax-check of the droplet can fail, even if the used (PHP-)code is correct!
- No chance to update the used droplet, e.g. like a code-snippet module or an external lib.
- Usable "outside" the droplet-process e.g. for own module development and css-studies.
- More flex. by using different textes with e.g. accents, osf-numbers or a simple char-table.

#### params
Name|Description
-----|-----
*set*|The used set (of textes). Available 'sets' are **lorem**, **berthold**, **fun**, **css**, **img**, **cicero**, **form** and *all*.
*blocks*|The number of blocks to display. Default is 1 (block).
*offset*|Gives the offset of used set. E.g. if you want only use block 2 of set 'berthold' you will have to set offset to 2.
*repeat*|How many time to repeat the used blocks? Default is 1.
*max*|The maximum of chars to generate. Default is 0 for all (no limitation).

Some details:

Set|Description
-----|-----
*css*|Two css testblocks with some »defaults«.
*img*|Four images (linked inside the ~modules/lib_loremgen/img/...).
*form*|Special - the form-templates are inside ~modules/lib_loremgen/forms/


#### example code

###### notice
- Since version 0.3.0 the code is for LEPTON-CMS 2.3 autoloader. 

Create a new droplet, name it e.g. "lorem2":

```code

if (!isset($blocks)) $blocks = 1;
if (!isset($set)) $set = 'lorem';
if (!isset($offset)) $offset = 0;
if (!isset($repeat)) $repeat = 1;
if (!isset($max)) $max = 0;

return lib_loremgen::getInstance()->lorem2( $set, $blocks, $offset, $repeat, $max );

```

Another example given (inside a e.g. 'code2' section:

```code

$lorem = lib_loremgen::getInstance();

$lorem->use_set("fun");
$lorem->set("blocks", 2 );
$lorem->set("offset", 1);

echo $lorem->generate("<br />");

```

There is a droplet »lorem2« installed during the installation.

#### call as droplet
Example given
```code

[[lorem2?set=berthold&offset=2&blocks=2]]

[[lorem2?set=fun&offset=6]]

[[lorem2?set=img]]

```

Kind regards - Aldus

*3.2017*
