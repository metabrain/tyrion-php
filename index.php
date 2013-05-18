<?php
require 'lib/flight/Flight.php';
require 'lib/markdown/Michelf/Markdown.php';
require 'config.php';
use \Michelf\Markdown;

function extract_json($txt) {
	$jsontxt = preg_split('/(\r\n?|\n)(\r\n?|\n)/',$txt)[0];
	$json = json_decode($jsontxt, true);
	return $json;
}

function parse_article($file) {
	$contents = file_get_contents($file);
	$article = extract_json($contents);
	$article["body"] =
str_replace(preg_split('/(\r\n?|\n)(\r\n?|\n)/',$contents)[0],"",$contents);
        $article["body"] = markdown_parse($article["body"]);
	$article["path"] = $file ;
	return $article ;
}


function get_posts() {
	$directory = "./articles/" ; 
	$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
	$posts = array();

	while($it->valid()) {
	    if (!$it->isDot()) {
		$name = $it->getSubPathName() ;
		$path = $it->key();	
		
		//only match files ending with .txt
		if(substr($name, -4) == ".txt") {
			array_push($posts, parse_article($path));
		}
	    }
	    $it->next(); 
	}
	return $posts ;
}

function markdown_parse($txt) {
    return Markdown::defaultTransform($txt);
}

function article($name) {
    //TODO Just fetch the right post instead of all and filtering
    $posts = get_posts() ;
    for($i=0; $i<sizeof($posts); $i++) {
	if(strpos($posts[$i]["path"], $name) !== FALSE)
	{
	    //echo "FOUND!";
 	    $post = $posts[$i];
	    include('templates/article.php');
	    return ;
	}
    }
}

function index() {
    $posts = get_posts() ;
    include('templates/index.php');
}

Flight::route('/', function(){
	index();
});

//TODO Put route path into config.php
Flight::route('/articles/@article', function($article){
    article($article);//echo "post requested : $article!";
});

/*

//TODO unimplemented
Flight::route('/tag/@tag', function($tag){
    echo "tag requested : $tag!";
});

//TODO unimplemented
Flight::route('/year/@year', function($year){
    echo "year requested : $year!";
});
*/

//Load config.php file into memory
Flight::before('start', function(&$params, &$output){
    // Do something
	$config["asd"]="sdsa";
});

Flight::start();
?>
