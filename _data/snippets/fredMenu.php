id: 3
source: 1
name: fredMenu
category: 'One-pager Theme'
properties: 'a:0:{}'

-----

$menu = null;
if(!empty($modx->resource)){
    $properties = $modx->resource->get('properties');
    if(!empty($properties) && is_array($properties) && !empty($properties['fred']) && !empty($properties['fred']['data'])){
        foreach($properties['fred']['data'] as $key=>$values){
            if(!empty($values) && is_array($values)){
                foreach($values as $value){
                    if(!empty($value['settings']) && !empty($value['settings']['anchortext']) && $value['settings']['published']){
                        $menu .= $modx->getChunk('fred-menu-tpl', array('anchortext'=>$value['settings']['anchortext'], 'link' => str_replace(" ","", strtolower($value['settings']['anchortext']))));
                    }
                }
            }
        }
    }
}
return $menu;