<?php 

	if(! function_exists('setActive') ) {
		function setActive ( $path) {
			return Request::is($path . '*') ? ' class=active' :  '';
		}
	}

	if (!function_exists('renderNode')) {
	    /**
	     * Render nodes for nested sets
	     *
	     * @param $node
	     * @param $resource
	     * @return string
	     */
	    function renderNode($node)
	    {
	    	if($node->category_id != null) {
	    		$name = $node->category->name;
	    	}
	    	if($node->page_id != null) {
	    		$name = $node->page->name;
	    	}
	        $id = 'data-id="' . $node->id .'"';
	        $list = 'class="dd-list"';
	        $class = 'class="dd-item"';
	        $handle = 'class="dd-handle"';
	        $title  = '<div '.$handle.'>' . $name . '</div>';
	        if ($node->isLeaf()) {
	            return '<li '.$class.' '.$id.'>' . $title . '</li>';
	        } else {
		            $html = '<li '.$class.' '.$id.'>' . $title;
		            $html .= '<ol '.$list.'>';
		            foreach ($node->children as $child) {
		                $html .= renderNode($child);
		            }
		            $html .= '</ol>';
		            $html .= '</li>';
	        }
	        return $html;
	    }
	}

	if (!function_exists('navication')) {
	    /**
	     * Render nodes for nested sets
	     *
	     * @param $node
	     * @param $resource
	     * @return string
	     */
	    function navication($node)
	    {
	    	if($node->category_id != null) {
	    		$name = $node->category->name;
	    		$slug = $node->category->slug;
	    	}
	    	if($node->page_id != null) {
	    		$name = $node->page->name;
	    		$slug = $node->page->slug;
	    	}
	    	
	    	$url = route('client.slug', $slug);


	        $style = 'style="visibility: visible; -webkit-animation-delay:1s; animation-delay:1s;"';
	        $class = 'class="sub-menu animated zoomIn"';
	        
	        if ($node->isLeaf()) {
	            return '<li><a href="'.$url.'">' . $name . '</a></li>';
	        } else {
		            $html = '<li> <a href="'.$url.'">' . $name . '</a>';
		            $html .= '<ul '.$class.' '.$style.'>';
		            foreach ($node->children as $child) {
		                $html .= navication($child);
		            }
		            $html .= '</ul>';
		            $html .= '</li>';
	        }
	        return $html;
	    }
	}

if (!function_exists('breadcrumbs')) {
    /**
     * Return breadcrumbs for each resource methods
     *
     * @return string
     */
    function breadcrumbs()
    {
        $route = Route::currentRouteName();
        // get after last dot
        $index = substr($route, 0, strrpos($route, '.') + 1) . 'index';
        $breadcrumbs  = '<ol class="breadcrumb">';
        $breadcrumbs .= '<li><a href="'.route('admin.root').'">
                        <i class="fa fa-dashboard"></i>
                        '.trans('admin.menu.dashboard').'</a></li>';
        // if not admin root
        if (strpos($route, 'root')  === false) {
            $parent_text   = strpos($route, 'index')  !== false ? trans($route) : trans($index);
            $breadcrumbs  .= strpos($route, 'index')  !== false ? '<li class="active">' : '<li>';
            $breadcrumbs  .= strpos($route, 'index')  !== false ? $parent_text :
                '<a href="'.route($index).'">'.$parent_text.'</a>';
            $breadcrumbs  .= '</li>';
            if (strpos($route, 'index')  === false) {
                $breadcrumbs  .= '<li class="active">'.trans($route).'</li>';
            }
        }
        $breadcrumbs .= '</ol>';
        return $breadcrumbs;
    }
}

?>