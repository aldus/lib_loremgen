<?php

/**
 * This file is part of an ADDON for use with LEPTON Core.
 * This ADDON is released under the GNU GPL.
 * Additional license terms can be seen in the info.php of this module.
 *
 * @module          lib_loremGen
 * @author          LEPTON Project
 * @copyright       2013-2016 LEPTON Project
 * @link            http://www.lepton-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see info.php of this module
 *
 */

if (defined('LEPTON_PATH')) {   
   include(LEPTON_PATH.'/framework/class.secure.php');
} else {
   $oneback = "../";
   $root = $oneback;
   $level = 1;
   while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
      $root .= $oneback;
      $level += 1;
   }
   if (file_exists($root.'/framework/class.secure.php')) {
      include($root.'/framework/class.secure.php');
   } else {
      trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
   }
}
class LEPTON_loremgen
{
	/**
	 *	Private protected var for the currend version.
	 */
	protected $version = "0.1.2";

	/**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance;
    
	/**
	 *	Public var that holds the settings inside an assoc. array.
	 */
	public static $settings = array(
		"set"		=> "lorem",
		"blocks"	=> 1,
		"offset"	=> 0,
		"repeat"	=> 1
	);
	
	/**
	 *	Public var for the textes. 
	 */
	private static $text = array(
		'lorem' => array(
		/* 0 */	"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut odio. Nam sed est. Nam a risus et est iaculis adipiscing. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer ut justo. In tincidunt viverra nisl. Donec dictum malesuada magna. Curabitur id nibh auctor tellus adipiscing pharetra. Fusce vel justo non orci semper feugiat. Cras eu leo at purus ultrices tristique.",
		/* 1 */	"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		/* 2 */	"Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.",
		/* 3 */	"Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.",
		/* 4 */	"Cras consequat magna ac tellus. Duis sed metus sit amet nunc faucibus blandit. Fusce tempus cursus urna. Sed bibendum, dolor et volutpat nonummy, wisi justo convallis neque, eu feugiat leo ligula nec quam. Nulla in mi. Integer ac mauris vel ligula laoreet tristique. Nunc eget tortor in diam rhoncus vehicula. Nulla quis mi. Fusce porta fringilla mauris. Vestibulum sed dolor. Aliquam tincidunt interdum arcu. Vestibulum eget lacus. Curabitur pellentesque egestas lectus. Duis dolor. Aliquam erat volutpat. Aliquam erat volutpat. Duis egestas rhoncus dui. Sed iaculis, metus et mollis tincidunt, mauris dolor ornare odio, in cursus justo felis sit amet arcu. Aenean sollicitudin. Duis lectus leo, eleifend mollis, consequat ut, venenatis at, ante.",
		/* 5 */	"Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet."
		),
		'berthold' => array(
		/* 0 */	"Berthold's quick brown fox jums over the lasy dog and feels as if he were in the seventh heaven of typo&shy;graphy out of Hamburg.",
		/* 1 */	"In general, body&shy;types are measured in the typo&shy;graphical point size. The sizes of Berthold Foto&shy;type faces can be exacly deter&shy;mintated. All faces of the same point size have the same capital height - ir&shy;respective of their x-height.",
		/* 2 */	"La valeur de la force de corps des caractères de labeur èst génè&shy;ralement ex&shy;primèe en points typo&shy;graphiques. La force de corps des caractères Berthold-Foto&shy;type peut êntre dèter&shy;minée avec précision. Tous les caractères du même corpsont des capital&shy;es d'une hauteur identique, in&shy;dépendamment de la hauteur des bas de casse sans jambage.",
		/* 3 */	"ABCDEFGHIJKLMNOPQRSTUVWÖÄÜ<br />abcdefghijklmnopqrstuvwxyzöäü<br />1234567890<br />ÁÀÂ áàâ ÉÈÊ éèê ÓÒÔ óòô ÚÙÛ úùû<br />! \" § $ % & / ( ) = ? * \' ",
		/* 4 */	"Berthold's quick brown fox jumps over the lasy dog. Sphinx of black quartz, judge my vow."
		),
		'fun' => array(
		/* 0 */	"Zwei flinke Boxer jagen die quirli&shy;ge Eva und ihren Mops durch Sylt. Franz jagt im komplett ver&shy;wahr&shy;lost&shy;en Taxi quer durch Bayern. Zwölf Box&shy;kämpfer jagen Viktor quer über den großen Sylter Deich. Vogel Quax zwickt Johnys Pferd Bim. Sylvia wagt quick den Jux bei Pforz&shy;heim. Poly&shy;fon zwitschernd aßen Mäxchens Vögel Rüb&shy;en, Joghurt und Quark. \"Fix, Schwyz! \" quäkt Jürgen blöd vom Paß. Victor jagt zwölf Box&shy;kämpfer quer über den großen Sylter Deich. Falsches Üben von Xylophon&shy;musik quält jed&shy;en größer&shy;en Zwerg. Heiz&shy;öl&shy;rück&shy;stoß&shy;ab&shy;dämpf&shy;ung.",
		/* 1 */	"Überall dieselbe alte Leier. Das Layout ist fertig, der Text lässt auf sich warten. Damit das Layout nun nicht nackt im Raume steht und sich klein und leer vorkommt, springe ich ein: der Blindtext. Genau zu diesem Zwecke erschaffen, immer im Schatten meines großen Bruders »Lorem Ipsum«, freue ich mich jedes Mal, wenn Sie ein paar Zeilen lesen. Denn <em>»esse est percipi«</em> - Sein ist wahr&shy;ge&shy;nommen werden. Und weil Sie nun schon die Güte haben, mich ein paar weitere Sätze lang zu be&shy;gleiten, möchte ich diese Ge&shy;legen&shy;heit nutzen, Ihnen nicht nur als Lücken&shy;füll&shy;er zu dienen, sondern auf etwas hin&shy;zu&shy;weisen, das es ebenso ver&shy;dient wahr&shy;ge&shy;nommen zu werden:",
		/* 2 */	"Auch gibt es niemanden, der den Schmerz an sich liebt, sucht oder wünscht, nur, weil er Schmerz ist, es sei denn, es kommt zu zu&shy;fälligen Um&shy;ständen, in denen Müh&shy;en und Schmerz ihm große Freude bereiten können. Um ein triviales Beispiel zu nehmen, wer von uns unter&shy;zieht sich je anstrengender körperlicher Be&shy;täti&shy;gung, außer um Vor&shy;teile daraus zu ziehen? Aber wer hat irgend ein Recht, einen Menschen zu tadeln, der die Ent&shy;scheid&shy;ung trifft, eine Freude zu genießen, die keine un&shy;an&shy;ge&shy;nehm&shy;en Folgen hat, oder einen, der Schmerz ver&shy;meidet, welcher keine daraus re&shy;sult&shy;ierende Freude nach sich zieht?",
		/* 3 */	"Zu meiner Ent&shy;schuldig&shy;ung kann ich nur sagen: Ich habe diesen Text nur als Blindtext für die Setzerei Appel in Hamburg geschrieben. Wenn ich gewusst hätte, dass Sie diese Zeilen lesen (man stelle sich das mal vor: Sie persönlich lesen das hier!), dann hätte ich mir natürlich mehr Mühe gegeben. Immerhin bin ich gelernter Texter und seit über 20 Jahren am Üben - da hätte ich wahrlich was Besseres schreiben können als diesen Stuss. Was sollen Sie jetzt von mir denken? Bisher haben Sie Konstantin Jacoby vielleicht für einen ganz ordentlichen Krea&shy;tiven gehalten - und dann das hier! Ehrlich ge&shy;sagt: Ich weiss auch nicht, wie mir das passier&shy;en konnte. Eine Wort&shy;hülse nach der anderen! Buch&shy;stabe an Buch&shy;stabe - Inhalt aber gleich Null. Vermutlich geben Sie mir nie einen Auftrag, nachdem Sie das hier gelesen haben - da kann ich soviel Goldmedaillen haben, wie ich will. Dies ist der Beweis: Jacoby kann's einfach nicht, Schluss aus!",
		/* 4 */	"Sie gestatten - ich stelle mich kurz vor. Ich bin der Blind&shy;text, und während Sie mich wahr&shy;nehmen, habe ich meine Auf&shy;gabe schon er&shy;füllt. Viel&shy;leicht ist der richti&shy;ge Text noch bei Ihrem Texter oder er ist einfach noch ein&shy;ge&shy;fangen in einer Text&shy;be&shy;arbeit&shy;ung. Viel&shy;leicht ist er aber schon auf dem Weg zu Ihnen via E-Mail oder der (guten alten) Post. Auf jed&shy;en Fall hatte die Person, die das Layout oder das Template zu er&shy;stellen hatte, keine an&shy;dere Chance als nun aus&shy;ge&shy;rechnet mich zu nehmen. Tja - das ist mein Job! Immer aus&shy;helfen, wenn der richti&shy;ge Text noch zu kom&shy;men hat. Aber ich mache das ger&shy;ne.",
		/* 5 */	"Ober&shy;donau&shy;dampf&shy;schiffs&shy;fahrt&shy;ge&shy;sellschafts&shy;kapitäns&shy;an&shy;wärter&shy;mützen&shy;ent&shy;wurf ",
		/* 6 */	"Als der Inhalt die Fläche fragte, ob er sich ihrer be&shy;dienen dürfe, sagte sie: »In Ordn&shy;ung - aber bitte kein Chaos!« Da nahm der In&shy;halt seine Be&shy;stand&shy;teile zu&shy;sammen, zog ein paar Kriteri&shy;en zu Hilfe, und glieder&shy;te sich zu einer In&shy;form&shy;ation um sich an&shy;schliessend mit der Helvetica auf der Fläche nieder zu lassen. Nicht, das er die Helvetica be&shy;sonders sympathisch fand - aber sie war ge&shy;nügsam und stellte alle Zeich&shy;en zur Ver&shy;füg&shy;ung, die der Inhalt für not&shy;wen&shy;dig hielt. Da kam die Typogra&shy;phie vorbei, und wunder&shy;te sich, das der Inhalt so grob flatternd auf der Fläche lag. »Da hättest Du ja gleich Ge&shy;danke bleiben können!« murrte sie."
		),
		'css' => array(
		/* 0 */	"<p><h1>heading 1</h1></p><h2>heading 2</h2></p><p><h3>heading 3</h3></p><p><h4>heading 4</h4></p><p><strong>strong</strong></p><p>normal paragraph</p>",
		/* 1 */	"<p><form><input type='text' name='testfield' value='normal textfield' /><textarea name='testtextarea'>simple test text</textarea><input type='submit' value='submit' />"
		),
		'img' => array(
		/* 0 */	"<img src='{{ URL }}/modules/lib_loremgen/img/image_1.jpg' alt='Example image 1' title='Image 1' style='float:left'>",
		/* 1 */	"<img src='{{ URL }}/modules/lib_loremgen/img/image_2.jpg' alt='Example image 2' title='Image 2' style='float:right'>",
		/* 2 */	"<img src='{{ URL }}/modules/lib_loremgen/img/image_3.jpg' alt='Example image 3' title='Image 3' style='float:left'>",
		/* 3 */	"<img src='{{ URL }}/modules/lib_loremgen/img/image_4.jpg' alt='Example image 4' title='Image 4' style='float:right'>"
		),
		'cicero' => array(
		/* 0 */	"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<br /><span class='lorem2_footnote'>[Section 1.10.32 of <em>»de Finibus Bonorum et Malorum«</em>, written by <em>Cicero</em> in 45 BC]</span>",
		/* 1 */	"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<br /><span class='lorem2_footnote'>[Section 1.10.33 of <em>»de Finibus Bonorum et Malorum«</em>, written by <em>Cicero</em> in 45 BC]</span>"
		),
		'form'	=> array()
	);

	public static function getInstance( &$aOptions=array() )
    {
        if (null === static::$instance) {
            static::$instance = new static();
            
            	static::$instance->__construct( $aOptions );
        }
        
        return static::$instance;
    }
    
	/**
	 *	Constructor of the class
	 *
	 *	@param	array	Optional params
	 */
	protected function __construct(&$aOptions=array()) {
		foreach($aOptions as $name=>$val) {
			if(isset(static::$settings[ $name ])) static::$settings[ $name ] = $val;
		}
		$url = (defined("LEPTON_URL"))
			? LEPTON_URL
			: (defined("WB_URL") ? WB_URL : "../")
			;
		foreach( static::$text['img'] as &$ref) $ref = str_replace("{{ URL }}", $url, $ref);
		
		$temp_files = glob(__DIR__."/forms/*.html*");
		foreach($temp_files as $f) static::$text['form'][] = file_get_contents($f);
	}
	
	/**
	 *	Returns the version of this class.
	 */
	public function version() {
		return static::$version;
	}

	/**
	 *	Change a value in the »settings«
	 *	@param	string	The »key« if the setting
	 *	@oaram	mixed 	A value - e.g. 2 for the numbers of repeats
	 *
	 */
	public function set ($aKey="", $aValue="") {
		if(array_key_exists($aKey, static::$settings)) {
			static::$settings[ $aKey ] = $aValue;
		}
	}
	
	/**
	 *	Generate the text.
	 *
	 *	@param	string	Any 'spacer'-string between the 'blocks'
	 *	@return	string	The generated string.
	 */
	public function generate($aSpacer=" ") {
		$return_str = "";
		
		for($i=1;$i<= static::$settings['repeat'];$i++) {
			$return_str .= implode($aSpacer, array_slice(
				static::$text[ static::$settings['set'] ],
				static::$settings['offset'],
				static::$settings['blocks']
			));
			
			if (static::$settings['repeat'] > 1) $return_str .= $aSpacer;
		}
			
		return $return_str;
	}
	
	/**
	 *	Set the current (text-)set.
	 */
	public function use_set($sName="lorem")
	{
		$aNames = array_keys(static::$text);
		if(!in_array( $sName, $aNames )) $sName = $aNames[0];
		static::$settings['set'] = $sName;
	}
	
	/**
	 *	Generates an lorem-ipsum text.
	 *
	 *	@param	string	The layout-text set.
	 *	@param	integer	The number of blocks to generate.
	 *	@param	integer	The 'offset' of the current used array.
	 *	@param	integer	How many repeats.
	 *	@return	string	The generated sting.
	 *	
	 */
	public function lorem2( $set = 'lorem', $blocks = 1, $offset = 0, $repeat = 1) {

		$aNames = array_keys( static::$text );
		if ( !isset($set) || !in_array( $set, $aNames )) {
			$set = $aNames[0];
		}

		$str = "";

		if ($set === "all") {
			foreach(static::$text as $key=>$sub) {
				$str .= "<p>&nbsp;</p><p>Set= <strong>".$key."</strong></p>";
				$c = 1;
				foreach($sub as &$s) $str .= "<p>".($c++)."&nbsp;".$s."</p><hr />";
			}
		} else {

			if ($blocks > count( static::$text[$set])) $blocks = count(static::$text[ $set ]);
			if (!isset($repeat)) $repeat = 1;

			for($i=1;$i<=$repeat;$i++) {
				$str .= implode("<br /><br />", array_slice(static::$text[$set], $offset, $blocks))." ";
			}
		}
		return $str;

	}
	
}
?>