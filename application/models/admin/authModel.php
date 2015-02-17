<?php 
class AuthModel extends CI_Model {
	function __constructor() {
		parent::__constructor();
		$this->load->library('session');
	}
	function _set_user($login,$role) {
		$this->session->set_userdata(
			array(
				'user_login'=>$login,
				'user_role' =>$role,
			)
		);
	}
	function _unset_user() {
		$this->session->unset_userdata(
			array(
				'user_login'=>'',
				'user_role' =>'',
			)
		);
	}
	function check($role='admin') {
		return ($this->session->userdata('user_role') == $role);
	}
	function login($login,$pass) {
		if($this->session->userdata('user_login')){
			return array(
				'code'=>101,
				'msg' =>'msg_already_logined',
			);
		}
		if(!$login){
			_unset_user();
			return array(
				'code'=>201,
				'msg' =>lang('msg_enter_login_pass'),
			);
		}
		if(!$pass){
			_unset_user();
			return array(
				'code'=>202,
				'msg' =>lang('msg_enter_login_pass'),
			);
		}
		$pass=md5($pass);
		$user_q = $this->db->query("SELECT  * FROM users WHERE (login='{$login}') AND (pass='{$pass}')");
		if($user_q->num_rows() == 0) {
			_unset_user();
			return array(
				'code'=>203,
				'msg' =>lang('msg_wrong_login_pass'),
			);
		}
		$user = $user_q->row();
		_set_user($user->login,$user->role);
		return array(
			'code'=>100,
			'user'=>$user,
		);
	}
	function logout() {
		_unset_user();
	}
}
?>