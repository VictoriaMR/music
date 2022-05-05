<?php

namespace app\controller;

class HomeBase extends Base
{
	public function __construct()
	{
		$this->assign('_title', \App::get('base_info', 'name'));
	}

	protected function isLogin()
	{
		return !empty(userId());
	}
}