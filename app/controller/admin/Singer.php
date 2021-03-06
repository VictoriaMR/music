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
		if (request()->isPost()) {
			$opn = ipost('opn');
			if (in_array($opn, ['editInfo', 'getInfo'])) {
				$this->$opn();
			}
			$this->error('非法请求');
		}

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
		$this->view();
	}

	protected function editInfo()
	{
		$id = (int)ipost('id');
		$avatar = trim(ipost('avatar', ''));
		$status = (int)ipost('status', -1);
		$data = [];
		if (!empty($avatar)) {
			$data['avatar'] = $avatar;
		}
		if ($status >= 0) {
			$data['status'] = $status;
		}
		if (empty($data)) {
			$this->error('参数不正确');
		}
		$singer = make('app/service/singer/Singer');
		if ($id > 0) {
			$res = $singer->updateData($id, $data);
		} else {
			$res = $singer->insertGetId($data);
		}
		if ($res) {
			$this->success('操作成功');
		} else {
			$this->error('操作失败');
		}
	}

	protected function getInfo()
	{
		$id = (int)ipost('id');
		if ($id <= 0) {
			$this->error('参数不正确');
		}
		$info = make('app/service/singer/Singer')->loadData($id);
		if (empty($info)) {
			$this->error('数据不存在');
		}
		$this->success($info, '');
	}

	public function info()
	{
		html()->addCss();
		html()->addJs();


		$this->view();	
	}
}