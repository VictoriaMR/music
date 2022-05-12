<?php

namespace app\controller\admin;
use app\controller\AdminBase;

class SystemInfo extends AdminBase
{
	//初始化
	public function __construct()
	{
		$this->_arr = [
			'index'=>'组件安装状态',
			'mysql' => 'MySQL信息',
			'redis' => 'Redis信息',
			'phpinfo' => 'PHP信息',
		];
		$this->_default = '服务器信息';
		$this->_init();
	}

	public function index()
	{
		$redis_version = redis()->info()['redis_version'] ?? 0;
		$rst = db()->getQuery('SELECT version() AS version')[0] ?? [];
		$this->assign('mysql_version', $rst['version'] ?? '未知');
		$this->assign('redis_version', $redis_version);
		$this->view();
	}

	public function mysql()
	{
		$stat = db()->stat();
		$stat = explode('  ',$stat);
		$info = [];
		foreach($stat as$key => $val){
			$stat[$key] = explode(': ',$val);
		}
		$info['stat'] = $stat;
		$info['client'] = db()->get_client_info();
		$info['server'] = db()->getQuery('SELECT version() AS version')[0]['version'] ?? [];;
		$arr = [];
		$query = ['character','version','client','server','collation'];
		foreach ($query as $keyword) {
			$rst = db()->getQuery("show variables like '%$keyword%'");
			foreach ($rst as $val) {
				$arr[$val['Variable_name']]=$val['Value'];
			}
		}
		$info['other'] = $arr;
		$this->assign('info',$info);
		$this->view();
	}

	public function redis()
	{
		$this->assign('info', redis()->info());
		$this->view();
	}

	public function phpinfo()
	{
		$this->view();
	}
}