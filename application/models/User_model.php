<?php
class User_model extends MY_Model {
	protected $_table = 'users';
	public $register_rules = array(
		'firstname' => array(
			'field' => 'firstname',
			'label' => 'first name',
			'rules' => 'trim|required|xss_clean'
		),
		'lastname' => array(
			'field' => 'lastname',
			'label' => 'last name',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
		),
		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required|callback_unique_username|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|matches[cpassword]|xss_clean'
		),
		'cpassword' => array(
			'field' => 'cpassword',
			'label' => 'confirm password',
			'rules' => 'trim|required|matches[password]|xss_clean'
		),
		'address' => array(
			'field' => 'address',
			'label' => 'address',
			'rules' => 'trim|required|xss_clean'
		),
		'state' => array(
			'field' => 'state',
			'label' => 'state',
			'rules' => 'trim|required'
		),
		'country' => array(
			'field' => 'country',
			'label' => 'country',
			'rules' => 'trim|required'
		),
		'paypal_email' => array(
			'field' => 'paypal_email',
			'label' => 'paypal email',
			'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
		),
		'phone_number' => array(
			'field' => 'phone_number',
			'label' => 'phone number',
			'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
		),
		'alternate_phone_number' => array(
			'field' => 'alternate_phone_number',
			'label' => 'alternate phone number',
			'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
		)
	);
	public $login_rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	);
	public $profile_rules = array(
		'firstname' => array(
			'field' => 'firstname',
			'label' => 'firstname',
			'rules' => 'trim|required'
		),
		'lastname' => array(
			'field' => 'lastname',
			'label' => 'lastname',
			'rules' => 'trim|required'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email'
		)
	);
	public $password_rules = array(
		'current_password' => array(
			'field' => 'current_password',
			'label' => 'current password',
			'rules' => 'trim|required|callback_password_check'
		),
		'new_password' => array(
			'field' => 'new_password',
			'label' => 'new password',
			'rules' => 'trim|required'
		),
		'confirm_newpassword' => array(
			'field' => 'confirm_newpassword',
			'label' => 'confirm password',
			'rules' => 'trim|required|matches[new_password]'
		)
	);

	function login($username) {
		return $this->db->where('username', $username)->or_where('email', $username)
			->get('users')->row_array();
	}

	function getCountries() {
		return $this->db->select('id,name')->from('countries')->get()->result_array();
	}
	function getState($country_id) {
		return $this->db->select('id,name')->from('states')->where('country_id', $country_id)->get()->result_array();
	}
	function update_user_login($user_id) {
		return $this->db->where('id', $user_id)->update('users', array('online' => '1'));
	}
	function update_user($user_id, $url) {
		return $this->db->where('id', $user_id)->update('users', $url);
	}

	function get_user_by_id($usr_id) {
		return $this->db->get_where('users', array('id' => $usr_id))->row_array();
	}
	function get_user_by_type($type) {
		return $this->db->get_where('users', array('type' => $type))->row_array();
	}

	function checkmail($mail) {
		return $this->db->get_where('users', array('email' => $mail))->row_array();
	}
	function checkuser($username) {
		return $this->db->get_where('users', array('username' => $username))->row_array();
	}

	function getUserCountry() {
		$this->db->select('count(*) as num, countries.name');
		$this->db->from('users');
		$this->db->group_by('users.country');
		$this->db->join('countries', 'users.country=countries.id');
		$query = $this->db->get();
		return $query->result();
	}

	function getUserCountryUserId($user_id) {
		$this->db->select('countries.name,countries.name,sortname');
		$this->db->from('users');
		$this->db->join('countries', 'users.country=countries.id');
		$this->db->where('users.id', $user_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function custom_query() {
	}
	function getAllNotification($user_id = null) {
		$this->db->from('notification');
		if (!empty($user_id)) {
			$this->db->where('notification_view_user_id', $user_id);
		}
		$this->db->where('notification_is_read', 0);
		$this->db->order_by("notification_created_date", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	function getAllNotificationPaging($notification_viewfor = null, $user_id = null, $limit, $start) {
		$this->db->from('notification');
		$this->db->limit($limit, $start);
		if (!empty($notification_viewfor)) {
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		if (!empty($user_id)) {
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
		}

		$this->db->order_by("notification_created_date", "desc");
		$data['notifications'] = $this->db->get()->result_array();

		$this->db->from('notification');
		if (!empty($user_id)) {
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
		}
		if (!empty($notification_viewfor)) {
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		$data['total'] = $this->db->count_all_results();
		return $data;
	}

	/*
	* User
	*/
	// Lấy toàn bộ cây dưới dạng mảng
	public function getTree() {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	// Lấy thông tin của một node
	public function getNode($id) {
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	// Lấy các con của một node
	public function getChildren($id) {
		$query = $this->db->get_where('users', array('refid' => $id));
		return $query->result_array();
	}

	// Lấy toàn bộ phần con bằng cách đệ quy
	public function getAllDescendants($id) {
		$descendants = [];

		$children = $this->getChildren($id);
		foreach ($children as $child) {
			$descendants[] = $child['id'];
			$grandChildren = $this->getAllDescendants($child['id']);
			$descendants = array_merge($descendants, $grandChildren);
		}

		return $descendants;
	}


	/*
	* Branch 
	*/
	function checkbranch($branch_name, $id) {
		$where['name'] = $branch_name;
		if (!empty($id)) {
			$where['id !='] = $id;
		}
		return $this->db->get_where('branch', $where)->row_array();
	}

	function branchinsert($data) {
		return $this->db->insert('branch', $data);
	}

	function update_branch($id, $data) {
		return  $this->db->update('branch', $data, ['id' => $id]);
	}

	function getbranchlist() {
		return $this->db->query('select * from branch')->result();
	}

	function getDefaultBranch() {
		return $this->db->get_where('branch', ['is_default' => 1])->row();
	}

	function getbranchdetails($id) {
		return $this->db->get_where('branch', ['id' => $id])->row();
	}

	/** For commission and Users */

	// Lấy các người dùng gián tiếp của user
	public function get_indirect_users($user_id) {
		$this->db->select('ids_indirect');
		$this->db->from('users_indirect');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_indirect) {
			return explode(',', $result->ids_indirect);
		}
		return [];
	}

	// Hàm lấy người dùng trực tiếp của user
	public function get_direct_users($user_id) {
		$this->db->select('ids_direct');
		$this->db->from('users_direct');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_direct) {
			return explode(',', $result->ids_direct);
		}
		return [];
	}

	// Hàm lấy người dùng tuyến dưới của user
	public function get_downline_users($user_id) {
		$this->db->select('ids_direct');
		$this->db->from('users_downline');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_direct) {
			return explode(',', $result->ids_direct);
		}
		return [];
	}

	// Hàm lấy người dùng đội nhóm của user
	public function get_team_users($user_id) {
		$this->db->select('ids_direct');
		$this->db->from('users_team');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_direct) {
			return explode(',', $result->ids_direct);
		}
		return [];
	}

	// Hàm lấy người dùng nhánh user nằm trong
	public function get_branch_users($user_id) {
		$this->db->select('ids_direct');
		$this->db->from('users_branch');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_direct) {
			return explode(',', $result->ids_direct);
		}
		return [];
	}

	// Hàm lấy người dùng shop người dùng hoạt động
	public function get_shop_users($user_id) {
		$this->db->select('ids_direct');
		$this->db->from('users_shop');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if ($result && $result->ids_direct) {
			return explode(',', $result->ids_direct);
		}
		return [];
	}

	// Hàm lấy doanh thu cho một user cụ thể
	public function get_revenues_by_user($user_id) {
		$this->db->select_sum('revenue');
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('user_revenue')->row();
		return $result ? $result->revenue : 0;
	}

	// Hàm lấy chi tiêu cho một user cụ thể
	public function get_consum_by_user($user_id) {
		$this->db->select_sum('consum');
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('user_consum')->row();
		return $result ? $result->consum : 0;
	}
	
	// Hàm lấy cấp bậc của một user cụ thể
    public function get_user_rank($user_id) {
        // Lấy thông tin từ bảng user_rank
        $this->db->select('award_id, reward_id, star_id');
        $this->db->from('user_rank');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $rank_result = $query->row();

        if (!$rank_result) {
            return null;
        }

        // Lấy thông tin user_level từ bảng award_level
        $this->db->select('level_number as user_level');
        $this->db->from('award_level');
        $this->db->where('id', $rank_result->award_id);
        $query = $this->db->get();
        $award_result = $query->row();

        // Lấy thông tin user_reward từ bảng reward
        $this->db->select('name as user_reward');
        $this->db->from('reward');
        $this->db->where('id', $rank_result->reward_id);
        $query = $this->db->get();
        $reward_result = $query->row();

        // Lấy thông tin user_star từ bảng star_level
        $this->db->select('star');
        $this->db->from('star_level');
        $this->db->where('id', $rank_result->star_id);
        $query = $this->db->get();
        $star_result = $query->row();

        return [
            'award_id' => $rank_result->award_id,
            'reward_id' => $rank_result->reward_id,
            'star_id' => $rank_result->star_id,
            'user_level' => $award_result ? $award_result->user_level : null,
            'user_reward' => $reward_result ? $reward_result->user_reward : null,
            'user_star' => $star_result ? $star_result->star : null
        ];
    }
	
	/*
	* User group 
	*/
	function checkgroup($group_name, $id) {
		$where['group_name'] = $group_name;
		if (!empty($id)) {
			$where['id !='] = $id;
		}
		return $this->db->get_where('user_groups', $where)->row_array();
	}

	function groupinsert($data) {
		return $this->db->insert('user_groups', $data);
	}

	function update_group($id, $data) {
		return  $this->db->update('user_groups', $data, ['id' => $id]);
	}

	function getgrouplist() {
		return $this->db->query('select user_groups.*, COUNT(integration_tools.id) as tools_count, integration_tools.allow_groups, users.groups, COUNT(users.id) as users_count from user_groups left join integration_tools ON FIND_IN_SET(user_groups.id, integration_tools.allow_groups) left join users ON FIND_IN_SET(user_groups.id, users.groups) GROUP BY user_groups.id ORDER BY user_groups.created_at DESC')->result();
	}

	function getDefaultGroup() {
		return $this->db->get_where('user_groups', ['is_default' => 1])->row();
	}

	function getgroupdetails($id) {
		return $this->db->get_where('user_groups', ['id' => $id])->row();
	}

	function setStarForUser() {
		$get_user_star_3_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 30000000 AND SUM(order_products.total) < 50000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$get_user_star_4_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 50000000 AND SUM(order_products.total) < 100000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$get_user_star_5_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 100000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$results_user_star_3 = $this->db->query($get_user_star_3_query)->result_array();
		$results_user_star_4 = $this->db->query($get_user_star_4_query)->result_array();
		$results_user_star_5 = $this->db->query($get_user_star_5_query)->result_array();

		if (count($results_user_star_3) > 0) {
			$arr_id_user_star_3 = [];
			foreach ($results_user_star_3 as $result_user_star_3) {
				array_push($arr_id_user_star_3, $result_user_star_3['refer_id']);
			}
			$update_user_star_3 = "UPDATE users SET user_star = 3 WHERE id IN (" . implode(",", $arr_id_user_star_3) . ")";
			$this->db->query($update_user_star_3);
		}

		if (count($results_user_star_4) > 0) {
			$arr_id_user_star_4 = [];
			foreach ($results_user_star_4 as $result_user_star_4) {
				array_push($arr_id_user_star_4, $result_user_star_4['refer_id']);
			}
			$update_user_star_4 = "UPDATE users SET user_star = 4 WHERE id IN (" . implode(",", $arr_id_user_star_4) . ")";
			$this->db->query($update_user_star_4);
		}

		if (count($results_user_star_5) > 0) {
			$arr_id_user_star_5 = [];
			foreach ($results_user_star_5 as $result_user_star_5) {
				array_push($arr_id_user_star_5, $result_user_star_5['refer_id']);
			}
			$update_user_star_5 = "UPDATE users SET user_star = 5 WHERE id IN (" . implode(",", $arr_id_user_star_5) . ")";
			$this->db->query($update_user_star_5);
		}
	}
}
