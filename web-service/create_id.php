<?php 
 
 	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	/**
	 * datos enviados mediante JSON
	 * @return [type] [description]
	 */
	function getPost(){
		$request = file_get_contents('php://input');
		return json_decode($request,true);
	}
	$getPost = getPost();
	$pageId = $getPost['pageId'];
	$array[] = array();
		function sitemapListPage($page) {
				$arr = array();
				$arr[$page->id] = htmlentities($page->title);
        // check if the page has children, if so start a nested list
        if($page->numChildren) {

                foreach($page->children as $child) sitemapListPage($child);
                array_push($array, $arr);
        }

echo json_encode($arr, true);
}





	sitemapListPage($pages->get("/"));



 ?>