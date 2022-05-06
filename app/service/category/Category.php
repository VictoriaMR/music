<?php 

namespace app\service\category;
use app\service\Base;

class Category extends Base
{
    protected function getModel()
    {
        $this->baseModel = make('app/model/category/Category');
    }
}