<?php
class Pager {
	public $perpage;
	
	function __construct() {
		//items per page
		$this->perpage = 3;
	}
	
	function getAllPageLinks($count,$href) {
		$output = '<ul class="pagination">';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			//number of page
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			//for both first and previous link
			if($_GET["page"] == 1)
				//if page == 1, disable both first and previous link
				$output = $output . '<li class="disabled"><a>&#8810;</a></li>' . '<li class="disabled"><a>&#60;</a></li>';
			else
				//otherwise, enable both first and previous link	
				$output = $output . '<li><a onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a></li><li><a onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a></li>';
			
			//from the forth page, add a link to page 1
			if(($_GET["page"]-3)>0) {				
					$output = $output . '<li><a onclick="getresult(\'' . $href . '1\')" >1</a></li>';
			}
			//from the fifth page, add ... to output
			if(($_GET["page"]-3)>1) {
					$output = $output . '<li><a>...</a></li>';
			}
			
			//render pages
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				//render current page
				if($_GET["page"] == $i)
					$output = $output . '<li class="active"><a id='.$i.'>'.$i.'</a><li>';
				else
				//render the other one				
					$output = $output . '<li><a onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a></li>';
			}

			//render ...
			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<li><a>...</a></li>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<li class="active"><a id=' . ($pages) .'>' . ($pages) .'</a></li>';
				else				
					$output = $output . '<li><a onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a></li>';
			}
			
			//render the next and last.
			if($_GET["page"] < $pages)
				$output = $output . '<li><a onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a></li><li><a onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a></li>';
			//disable the next and last
			else				
				$output = $output . '<li class="disabled"><a>></a></li><li class="disabled"><a>&#8811;</a></li>';
			
			
		}
		return $output;
	}
}
?>