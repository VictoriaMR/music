<?php

namespace app\controller\admin;
use app\controller\AdminBase;

class Api extends AdminBase
{
	protected $_cateArr = ['singer', 'album'];

	public function upload()
	{	
		$file = $_FILES['file'] ?? [];
		if (empty($file)) {
			$this->error('上传数据为空');
		}
		$cate = $_POST['cate'] ?? '';
		if (!in_array($cate, $this->_cateArr)) {
			$this->error('没有权限操作'.$cate.'文件夹');
		}
		$fileService = make('app/service/File');
		$result = $fileService->upload($file, $cate);
		if ($result) {
			$this->success($result);
		}
		$this->error('上传失败');
	}

	public function stat()
	{
		make('app/service/Logger')->addLog();
	}
}