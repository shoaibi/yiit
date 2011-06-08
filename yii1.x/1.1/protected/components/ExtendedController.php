<?php
 
class ExtendedController extends Controller
{
 
    public function render($view, $data = null, $return = false)
    {
        if ($this->beforeRender())
        {
            parent::render($view, $data, $return);
        }
    }
 
    public function beforeRender()
    {
        return true;
    }
 
}
 
?>
