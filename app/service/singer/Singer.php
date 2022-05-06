<?php 

namespace app\service\singer;
use app\service\Base;

class Singer extends Base
{
    protected function getModel()
    {
        $this->baseModel = make('app/model/singer/Singer');
    }
}