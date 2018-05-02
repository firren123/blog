<?php
/**
* 公共模板 
*/
class CommonAction extends Action
{
	protected $param =null;
	protected $sign;
	protected $token;
	function _initialize()
	{
		header('charset=utf-8');
		$this->param = I('','');
		file_put_contents("/tmp/login.log", "======quan ==\r\n",FILE_APPEND);
		file_put_contents("/tmp/login.log", json_encode($this->param)."==========\r\n",FILE_APPEND);
		$this->sign = $this->param['sign'];
		$this->token = $this->param['token'];
		unset($this->param['sign']);
		unset($this->param['token']);
		unset($this->param['_URL_']);
		unset($this->param['dev']);
		unset($this->param[0]);
		unset($this->param[1]);
		unset($this->param[2]);
		$this->key = C("KEY");
		file_put_contents("/tmp/login.log", "==========\r\n",FILE_APPEND);
		file_put_contents("/tmp/login.log", json_encode($this->param)."==========\r\n",FILE_APPEND);
		file_put_contents("/tmp/login.log", "====sign======".($this->sign)."==========\r\n",FILE_APPEND);
		file_put_contents("/tmp/login.log", "====_makeSign======".($this->_makeSign())."==========\r\n",FILE_APPEND);
		$debug = I('debug');
		if($debug !=1){
//			$this->_validateSign();
		}

	}
	/**
	 * 验证签名的方法
	 * @author linxinliang@lashou-inc.com
	 * @create_time 2014-10-20 17:59:00
	 * @return Object
	 */
	protected function _validateSign(){
        if ($this->sign != $this->_makeSign()) {
            file_put_contents('/tmp/livedeal_api_post_sign.log', "请求时间：".date('Y-m-d H:i:s')."|dev:$this->dev |sign:$this->sign |校验sign:".$this->_makeSign()."|请求参数:".json_encode($this->param)."\n", FILE_APPEND);
            die(errorReturn('签名错误'));
        }
	}
	//验证签名
	protected function _makeSign(){
		$str = '';
		ksort($this->param);
		foreach($this->param as $v){
			$str .= rawurlencode($v);
		}
		$sign = md5($str.$this->key);

		return $sign;
	}
	
	
}