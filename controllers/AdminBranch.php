<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBranch extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Branch_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['branches'] = $this->Branch_model->getBranchList();
        $this->load->view('admincontrol/branch/index', $data);
    }

    public function form($id = '') {
        if (!empty($id)) {
            $data['branch'] = $this->Branch_model->getBranchDetails($id);
        }
        $this->load->view('admincontrol/branch/form', $data);
    }

    public function save() {
        $json = array();

        $id = (int)$this->input->post("branch_id", true);

        $this->form_validation->set_rules('name', 'Branch Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'name' => $this->input->post('name', true),
                'address' => $this->input->post('address', true),
                'phone' => $this->input->post('phone', true),
                'location' => $this->input->post('location', true)
            );

            if (empty($id)) {
                $this->Branch_model->insertBranch($data);
                $this->session->set_flashdata('success', 'Branch added successfully');
            } else {
                $this->Branch_model->updateBranch($id, $data);
                $this->session->set_flashdata('success', 'Branch updated successfully');
            }

            $json['location'] = base_url('adminbranch');
        } else {
            $json['errors'] = $this->form_validation->error_array();
        }

        echo json_encode($json);
        die;
    }

    public function delete() {
        $id = $this->input->post('id');
        $this->Branch_model->deleteBranch($id);
        echo json_encode(array('status' => 1, 'message' => 'Branch deleted successfully'));
        die;
    }
}
?>
