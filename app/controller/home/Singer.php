<?php

namespace app\controller\home;
use app\controller\HomeBase;

class Singer extends HomeBase
{
    public function index()
    {
        html()->addCss();
        html()->addJs();
        $this->assign('_title', '歌手 | 无损音乐下载 - 尽在无损音乐网®');
        // $this->assign('_keyword', '无损音乐分类,流行歌曲、英文歌、DJ舞曲、网络歌曲、流行歌曲、一人一首成名曲');
        // $this->assign('_desc', '无损音乐网音乐歌曲分类,提供不同的“曲风流派、心情感受、主题场合、语言地域、乐器演奏”的歌曲,中国风、伤感、怀旧、空间背景音乐、轻音乐、纯音乐、经典老歌,无损音乐下载');
        $this->view(true);
    }

    public function list()
    {
        html()->addCss();
        html()->addJs();
        $id = iget('id');

        $where = [];
        if ($id) {
            $where['group'] = $id;
        }
        $singer = make('app/service/singer/Singer');
        $list = $singer->getListData($where, 'singer_id,name,name_en,avatar,group');
        $tempArr = [];
        foreach ($list as $value) {
            $tempArr[$value['group']][] = $value;
        }
        $this->assign('_title', '歌手列表 | 无损音乐下载 - 尽在无损音乐网®');
        $this->assign('_keyword', '热门歌星歌手,港澳台歌星歌手,欧美歌星歌手,网络歌手');
        $this->assign('_desc', '无损音乐网音乐歌星歌手分类,提供不同的唱风风格类型的歌手筛选,展示歌手风采,歌手个人信息,歌手生涯');
        $this->assign('list', $tempArr);
        $this->assign('id', $id);
        $this->view(true);
    }

    public function info()
    {
        html()->addCss();
        html()->addJs();
        $id = (int)iget('id');
        $info = make('app/service/singer/Singer')->loadData($id);
        if (!empty($info)) {
            $infoData = make('app/service/singer/Data')->getListData(['singer_id'=>$id]);
            $this->assign('info_data', $infoData);
            $this->assign('_title', $info['name'].' | 无损音乐下载 - 尽在无损音乐网®');
            $this->assign('_keyword', $info['keyword']);
            $this->assign('_desc', $info['desc']);
        }
        $this->assign('info', $info);
        $this->assign('id', $id);
        $this->view(true);
    }
}