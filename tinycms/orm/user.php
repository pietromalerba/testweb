<?php 
class user {
	protected $user_id,$user_name,$password,$user_type,$ban_count,$is_active,$login_time;

		public function set_user_id($userid) {
			$this->user_id=$userid;
		}
		public function get_user_id(){
			return $this->user_id;
		}
		public function set_username($username) {
			$this->user_name=$username;
		}
		public function get_username(){
			return $this->user_name;
		}
        public function set_password($pass) {
			$this->password=$pass;
		}
		public function get_password(){
			return $this->password;
		}
        public function set_usertype($usertype) {
			$this->user_type=$usertype;
		}
		public function get_usertype(){
			return $this->user_type;
		}
        public function set_bancount($bcount){
			$this->ban_count=$bcount;
		}
		public function get_bancount() {
			return $this->ban_count;
		}
		public function set_isactive($status){
			$this->is_active=$status;
		}
		public function get_isactive() {
			return $this->is_active;
		}
		public function set_logintime($ltime){
			$this->login_time=$ltime;
		}
		public function get_logintime() {
			return $this->login_time;
		}
		
}