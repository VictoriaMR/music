<?php

namespace app\controller\admin;
use app\controller\AdminBase;

class Index extends AdminBase
{
	public function __construct()
	{
		$this->_arr = [
			'index' => '首页',
			'statInfo' => '统计信息',
		];
		$this->_tagShow = false;
		$this->_default = '概览';
	}

	public function index()
	{
		html()->addCss();
		html()->addJs();
		$list = make('app/service/controller/Controller')->getList();
		$this->assign('funcList', $list);
		$this->assign('info', session()->get('admin_info'));
		$this->view();
	}

	public function statInfo()
	{
		html()->addCss();
		html()->addJs();

		$this->view();	
	}
}