<?

class menu {
		
	function tree($id = 0, $depth = 0) {
		$menu = array();
		$mysqli = new mysqli('localhost','root','','mobilplan');
		$sql = "
			SELECT id, parent_id, name, uri
			FROM menu 
			WHERE parent_id = '$id'";
		
		$result = $mysqli->query($sql);
		while ($row = $result->fetch_assoc()) {
			$menu[$row['id']] = array(
				'id' => $row['id'],
				'parent_id' => $row['parent_id'],
				'name' => $row['name'],
				'uri' => $row['uri'],
				'sub_menu' => $this->tree($row['id']),
				);
		}
		return $menu;	
	}
		
	function print_tree($array, $first = 0) {
		if($first == 0) {
			$output = '<ul class="top nav flex-column">';
		} else { 
			$output = '<ul class="nav flex-column pl-2">';
		}
		foreach ($array as $value) {
			$output .= '<li class="nav-item" id="menu_'.$value['id'].'">';
			if (is_countable($value['sub_menu']) && sizeof($value['sub_menu']) > 0 ? true : false) {	
				$output .= '
				<a href="javascript:void(0);" class="nav-link has_sub_menu" onclick="open_menu(this)">
					<span>'. $value['name'] .'</span><i></i>
				</a>';
				$output .= $this->print_tree($value['sub_menu'], $value['id']);
			} else {
				$output .= '<a class="nav-link" href="'. $value['uri'] .'">'. $value['name'] .'</a></li>';
			}
			
			$output .= '</li>';
		}
		$output .= '</ul>';
		return $output;
	}
	
}
