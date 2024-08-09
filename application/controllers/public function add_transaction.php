public function add_transaction($wallet_from = 'admin')
	{

		$this->load->library('form_validation');

		// Dành cho nạp tiền
		$this->form_validation->set_rules('deposit', 'Deposit', 'required|trim');

		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		$this->form_validation->set_rules('comment', 'Comment', 'required|trim');

		$this->form_validation->set_rules('user_id', 'user_id', 'required|trim');		

		// Kiểm tra xem đang là Admin rút tiền hay User
		if ($wallet_from == 'admin') {
			$target_wallet = $this->input->post("deposit", true);
			$from_wallet = 'admin_deposit';

			// Dành cho rút tiền
			$this->form_validation->set_rules('withdraw_from', 'withdraw_from', 'required|trim');

			$this->form_validation->set_rules('withdraw_to', 'withdraw_to', 'required|trim');

		} else {
			$target_wallet = $this->input->post("withdraw_to", true);
			$from_wallet = 'user_deposit';
		}

		// Thực hiện
		if ($this->form_validation->run() == FALSE) {

			$json['errors'] = $this->form_validation->error_array();

		} else {

			$result = $this->Wallet_model->addTransaction(array(

				'status'         => 1,

				'user_id'        => $this->input->post("user_id", true),

				'amount'         => $this->input->post("amount", true),

				'comment'        => $this->input->post("comment", true),

				'wallet_to'      => $target_wallet,

				'wallet_from'    => $wallet_from,

				'type'           => $from_wallet . '_transaction',

				'is_sent'        => '0',

				'withdraw_request' => '0',

				'dis_type'       => '',

				'comm_from'      => '',

				'reference_id'   => 0,

				'reference_id_2' => 0,

				'ip_details'     => '',

				'domain_name'    => '',

				'group_id'	=> time() . rand(10, 100)

			));

			if ($result)
				$this->session->set_flashdata('success', __('admin.transaction_added'));
			else
				$this->session->set_flashdata('error', __('admin.transaction_not_add'));

			if ($wallet_from == 'admin') {
				$json['location'] = base_url("admincontrol/addusers/" . $this->input->post("user_id", true));
			} else {
				$json['location'] = base_url("usercontrol/mywallet");
			}
		}

		echo json_encode($json);
	}