<?php

namespace app\controller\admin;
use app\controller\AdminBase;

class Singer extends AdminBase
{
	public function __construct()
	{
		$this->_arr = [
			'index' => '歌手列表',
			'info' => '歌手详情',
		];
		$this->_default = '歌手';
		$this->_ignore = ['info'];
	}

	public function index()
	{
		html()->addCss();
		html()->addJs();
		$id = (int)iget('id');
		$name = trim(iget('name', ''));
		$status = (int)iget('status', -1);
		$page = (int)iget('page', 1);
		$size = (int)iget('size', 20);
		$singer = make('app/service/singer/Singer');
		$where = [];
		if ($id > 0) {
			$where['singer_id'] = $id;
		}
		if ($name) {
			$where['name'] = ['like', '%'.$name.'%'];
		}
		if ($status > -1) {
			$where['status'] = $status;
		}
		$total = $singer->getCountData($where);
		if ($total > 0) {
			$list = $singer->getListData($where, '*', $page, $size);
		}

		$this->assign('id', $id>0?$id:'');
		$this->assign('name', $name);
		$this->assign('status', $status);
		$this->assign('total', $total ?? 0);
		$this->assign('size', $size);
		$this->assign('list', $list ?? []);
		$this->_init();
		$this->view();
	}

	public function info()
	{
		html()->addCss();
		html()->addJs();


		$this->_init();
		$this->view();	
	}
}