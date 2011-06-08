<?php
 
class ParentController extends ExtendedController
{   
    /**
     *
     * @var string, sets meta fields in themes.
     * Extend your class from ParentController to have these properties set.
     * This can be set and get directly by accessing $this->meta['name']='value'; and $this->meta['name'];
     * OR you can use $this->setMeta('name', 'value'); and $this->getMeta('name');
     */
    public $meta;
    
    
    /**
     *
     * @var string, sets link meta fields in themes.
     * Extend your class from ParentController to have these properties set.
     * This can be set and get directly by accessing $this->link[]=array('rel', 'type', 'href', 'media', array('options')); and $this->link[];
     * OR you can use $this->addLinkedResource($rel, $type, $href, $media, $options)
     */
    public $link;
    
    /**
     *
     * @return boolean
     * Checks $meta and $link, if not empty, renders them
     */
 
    public function beforeRender()
    {
 
        if (!empty($this->meta))
        {
            foreach($this->meta as $name=>$value)
                    Yii::app()->clientScript->registerMetaTag($value, $name);
        }
        
        if(!empty($this->link))
        {
            foreach ($this->link as $item)
                Yii::app()->clientScript->registerLinkTag($item['rel'], $item['type'], $item['href'], $item['media'], $item['options']);                
            
        }
 
        return true;
 
    }
    
    
    /**
     *
     * @param string $name Name of the meta tag
     * @param string $value Value of the meta tag
     */
    
    public function setMeta($name, $value)
    {
        $this->meta[$name]=$value;       
        
    }
    
    /**
     *
     * @param string $name Name of the meta tag
     * @return string Value of the meta tag
     */
    
    public function getMeta($name)
    {
        return $this->meta[$name];        
    }
    
    
    /**
     *
     * @param string $rel Relation
     * @param string $type Type of linked resources
     * @param string $href URL to the linked resource
     * @param string $media Media type
     * @param array $options Optional Key-Value pair arguments
     */
    public function addLinkedResource($rel, $type, $href, $media=null, $options=null)
    {
        $this->link[]=array( 'rel' => $rel,
                            'type' => $type,
                            'href' => $href,
                            'media' => $media,
                            'options' => $options
                            );
        
    }
    
    
    // filterAccessControl()
    //  
    //  This replicates the access control module in the base controller and lets us 
    //  do our own special rules that insure we fail closed. 
 
    public function filterAccessControl($filterChain)
    {   
        $rules = $this->accessRules();
 
        // default deny
        $rules[] = array('deny', 'users'=>array('*') );
 
        $filter = new CAccessControlFilter;
        $filter->setRules( $rules );
        $filter->filter($filterChain);
    }
 
}
 
?>