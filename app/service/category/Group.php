<?php 

namespace app\service\category;
use app\service\Base;

class Group extends Base
{
    protected function getModel()
    {
        $this->baseModel = make('app/model/category/Group');
    }
}