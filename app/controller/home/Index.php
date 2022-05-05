<?php

namespace app\controller\home;
use app\controller\HomeBase;

class Index extends HomeBase
{
    public function index()
    {
        html()->addCss();
        html()->addJs();
        $this->assign('_title', '无损音乐® | 无损音乐免费下载 - FLAC,APE,WAV,DSD,最新最全免费无损音乐下载网站');
        $this->assign('_keyword', '无损音乐下载,无损音乐,无损音乐免费下载,无损音乐网,音乐下载,无损歌曲下载,ape音乐下载,flac音乐下载,Wav音乐下载');
        $this->assign('_desc', 'LosslessMusic.com无损音乐网是一个免费提供无损音乐下载的网站,专注于收录、提供Ape音乐、Flac音乐、Wav音乐等各类高品质无损音乐的免费下载,致力于每日更新各类无损音乐资源给热爱无损音乐的无损音乐发烧友,力求做最新的最全的最好的无损音乐免费下载网站。');
        $this->view();
    }
}