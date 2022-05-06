<?php 

namespace app\service\singer;
use app\service\Base;

class Data extends Base
{
    protected function getModel()
    {
        $this->baseModel = make('app/model/singer/Data');
    }
}