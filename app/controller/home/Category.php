<?php

namespace app\controller\home;
use app\controller\HomeBase;

class Category extends HomeBase
{
    public function list()
    {
        html()->addCss();
        html()->addJs();
        $id = (int)iget('id', 0);
        $where = ['status'=>1];
        if ($id > 0) {
            $where['group_id'] = $id;
        }
        $cate = make('app/service/category/Category');
        $cateList = $cate->getListData($where, '*', 0, 0, ['sort'=>'asc', 'cate_id'=>'asc']);
        $group = make('app/service/category/Group');
        $groupList = $group->getListData($where, '*', 0, 0, ['sort'=>'asc', 'group_id'=>'asc']);
        $groupList = array_column($groupList, null, 'group_id');
        foreach ($cateList as $value) {
            if (isset($groupList[$value['group_id']])) {
                $groupList[$value['group_id']]['list'][] = $value;
            }
        }
        $this->assign('_title', '音乐歌曲分类 | 无损音乐下载 - 尽在无损音乐网®');
        $this->assign('_keyword', '无损音乐分类,流行歌曲、英文歌、DJ舞曲、网络歌曲、流行歌曲、一人一首成名曲');
        $this->assign('_desc', '无损音乐网音乐歌曲分类,提供不同的“曲风流派、心情感受、主题场合、语言地域、乐器演奏”的歌曲,中国风、伤感、怀旧、空间背景音乐、轻音乐、纯音乐、经典老歌,无损音乐下载');
        $this->assign('list', $groupList);
        $this->assign('id', $id);
        $this->view(true);
    }

    public function info()
    {
        html()->addCss();
        html()->addJs();
        $id = (int)iget('id', 0);
        $this->assign('id', $id);
        $this->view(true);
    }
}