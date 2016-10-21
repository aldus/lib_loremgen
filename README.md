### readme
*Why this?*
- The syntax-check of the droplet can fail, even if the used (PHP-)code is correct!
- No chance to update the used droplet, e.g. like a code-snippet module or an external lib.
- Usable "outside" the droplet-process e.g. for own module development and css-studies.
- More flex. by using different textes with e.g. accents, osf-numbers or a simple char-table.

#### params
Name|Description
-----|-----
*set*|The used set (of textes). Available 'sets' are **lorem**, **berthold**, **fun**, **css**, **img**, **cicero** and *all*.
*blocks*|The number of blocks to display. Default is 1 (block).
*offset*|Gives the offset of used set. E.g. if you want only use block 2 of set 'berthold' you will have to set offset to 2.
*repeat*|How many time to repeat the used blocks? Default is 1.

#### droplet code
Create a new droplet, name it e.g. "lorem2":

```code

if (!isset($blocks)) $blocks = 1;
if (!isset($set)) $set = 'lorem';
if (!isset($offset)) $offset = 0;
if (!isset($repeat)) $repeat = 1;

require_once( LEPTON_PATH."/modules/lib_loremgen/library.php" );
return LEPTON_loremgen::getInstance()->lorem2( $set, $blocks, $offset, $repeat );

```

Another example given (inside a e.g. 'code2' section:

```code

require_once( LEPTON_PATH."/modules/lib_loremgen/library.php" );

$lorem = LEPTON_loremgen::getInstance();

$lorem->use_set("fun");
$lorem->set("blocks", 2 );
$lorem->set("offset", 1);

echo $lorem->generate("<br />");

```

There is also a zip file for importing an example-droplet inside the module.

#### call as droplet
Example given
```code

[[lorem2?set=berthold&offset=2&blocks=2]]

[[lorem2?set=fun&offset=4]]

[[lorem2?set=img]]

```

Kind regards - Aldus

*10.2016*
