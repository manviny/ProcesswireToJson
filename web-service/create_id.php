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
	$selector = $getPost['selector'];
	$paginas = $pages->find('template=desplegable'); 
	$arr = array(); 
    foreach ($paginas as $child) {
 
		$arr[$child->id] = $child->title;
			
    }
	echo json_encode($arr);



 ?>