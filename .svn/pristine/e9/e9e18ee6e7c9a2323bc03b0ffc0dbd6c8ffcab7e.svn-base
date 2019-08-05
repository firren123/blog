<?php
	/**
	* System配置文件修改
	*/
	class SystemAction extends CommonAction
	{
		
		function verify()
		{
			if (IS_POST) {
				if(F('verify',$_POST,CONF_PATH,ture)){
					$this->success('修改成功',U(GROUP_NAME . '/System/verify'));
				}else{
					$this->error('修改失败');
				}
			}else{
				$this->display();
			}
		}
	}

?>