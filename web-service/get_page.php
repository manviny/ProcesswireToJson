<?php 
    header("Access-Control-Allow-Origin: *"); 
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
 
 
		$pagina = wire('pages')->get($pageId);
 
		$array = array(); 
 
        // fields to be avoided
        $avoid = array("FieldtypeFieldsetOpen", "FieldtypeFieldsetClose","FieldtypeFieldsetTabOpen","FieldtypeFieldsetTabClose");
 
		foreach($pagina->fields as $field) {
			if (!in_array($field->type, $avoid)) {
				// si el campo no esta vacio
				if( htmlspecialchars($pagina->get($field->name)) )
					if($field->type == "FieldtypePage"){
							$buscar = htmlspecialchars($pagina->get($field->name));
							$paginas = $pages->get($buscar); 

							$array[$field->name] = $paginas->title;
						
				}else{
					$array[$field->name] = htmlspecialchars($pagina->get($field->name));
				}
			}
		}
		echo json_encode($array);
 






?>