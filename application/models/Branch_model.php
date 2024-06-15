<?php

class Branch_model extends MY_Model {

    public function getHtml($file, $data = []) {
        return $this->load->view($file, $data, true);
    }

    public function friendly_seo_string($vp_string) {
        $vp_string = trim($vp_string);
        $vp_string = html_entity_decode($vp_string);
        $vp_string = strip_tags($vp_string);
        $vp_string = strtolower($vp_string);
        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
        $vp_string = preg_replace('~ ~', '-', $vp_string);
        $vp_string = preg_replace('~-+~', '-', $vp_string);
        return strtolower($vp_string);
    }



    public function getBranchCategory($product_id) {
        return $this->db->query("SELECT pc.product_id,c.* FROM product_categories pc LEFT JOIN categories c ON c.id = pc.category_id WHERE pc.product_id = {$product_id}")->result_array();
    }

    public function getCategory($filter = array(), $isModeCheck = null) {
        $sql = "";

        $sql = "SELECT SQL_CALC_FOUND_ROWS c.*, pc.name as parent_name,(SELECT count(pc.category_id) FROM product_categories pc WHERE pc.category_id = c.id ) as total_product FROM categories c LEFT JOIN categories pc ON pc.id = c.parent_id WHERE 1";

        $sql .= " ORDER BY c.id DESC ";

        if (isset($filter['page'], $filter['limit'])) {
            $offset = (($filter['page'] - 1) * $filter['limit']);
            $sql .= " LIMIT {$offset}," . $filter['limit'];
        }

        $categories = $this->db->query($sql)->result_array();

        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

        $data = array();
        foreach ($categories as $key => $value) {

            // Tính cấp độ của chuyên mục
            //$level = $this->get_category_level($value['id']);

            if ($value['mlm_categories'] == 'hang-hoa') {
                $value['mlm_name'] = "Hàng Hoá";
            } else if ($value['mlm_categories'] == 'te-bao-goc') {
                $value['mlm_name'] = "Tế Bào Gốc";
            } else if ($value['mlm_categories'] == 'dich-vu') {
                $value['mlm_name'] = "Dịch Vụ";
            } else if ($value['mlm_categories'] == 'dao-tao') {
                $value['mlm_name'] = "Đào Tạo";
            }

            $data[] = array(
                'id' => $value['id'],
                'name' => $value['name'],
                'description' => $value['description'],
                'parent_name' => $value['parent_name'],
                'mlm_name' => $value['mlm_name'],
                'image' => $value['image'],
                'total_product' => (int) $value['total_product'],
                'image_url' => base_url($value['image'] != '' ? 'assets/images/product/upload/thumb/' . $value['image'] : 'assets/images/no_image_available.png'),
                'parent_id' => $value['parent_id'],
                'created_at' => date("d-m-Y h:i A", strtotime($value['created_at'])),
                // 'level' => $level // Thêm cấp độ vào dữ liệu
            );
        }

        return array($data, $total);
    }

    public $loginUser = [];

    public function userdetails($guard = 'administrator', $force = 0) {

        if ($force) {
            $this->loginUser[$guard] = $this->db->query("SELECT * FROM users WHERE id=" . (int) $this->session->userdata($guard)['id'])->row_array();
        }

        if (!isset($this->loginUser[$guard])) {
            $u = $this->session->userdata($guard);

            return $u;

            if ($u) {
                $this->loginUser[$guard] = $this->db->query("SELECT * FROM users WHERE id=" . (int) $u['id'])->row_array();
            }
        }

        return $this->loginUser[$guard];
    }

    public function getSiteSetting() {
        return $this->getSettings('site');
    }

    public function getLicese() {
        return $this->session->userdata('license');
    }

    public function getBranchByIdArray($product_id) {
        return $this->db->get_where('product', array('product_id' => $product_id))->row_array();
    }

    public function getUserDetailsObject($branch_id) {
        return $this->db->get_where('branch', array('id' => $branch_id))->row_object();
    }

    public function getBranchById($product_id) {
        return $this->db->get_where('product', array('product_id' => $product_id))->row_object();
    }

    public function getSettingById($product_id) {
        return $this->db->get_where('setting', array('setting_id' => $setting_id))->row_object();
    }

    public function getBranchBySlug($product_slug) {
        return $this->db->get_where('product', array('product_slug' => $product_slug))->row_array();
    }

    public function getBranchDetails($product_id) {
        return $this->db->get_where('product', array('product_id' => $product_id))->row_array();
    }

    public function getAllSettings() {
        return $this->db->get_where('setting', array('setting_status' => 1))->result_array();
    }

    // Phương thức để lấy toàn bộ dữ liệu từ bảng branches
    public function get_all_branch() {
        $query = $this->db->get('branch');  // 'branch' là tên của bảng
        return $query->result_array();        // Trả về kết quả dưới dạng mảng
    }

    public function getAllBranchrecord() {
        return $this->db->get_where('product', array('product_status' => 1))->result_array();
    }

    function update_branch($id, $data) {

        // Thực hiện cập nhật dữ liệu trong bảng branches
        $this->db->where('id', $id);
        $updated = $this->db->update('branch', $data);

        // Kiểm tra xem việc cập nhật có thành công hay không
        if ($updated) {
            return true;
        } else {
            return false;
        }
    }

    function update_data($product, $details, $where_data_array = NULL) {
        if ($where_data_array) {
            foreach ($where_data_array as $key => $data)
                $this->db->where($key, $data);
        }
        return $this->db->update($product, $details);
    }

    function getBranchByIds($product_ids) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where_in('product_id', $product_ids);
        return $this->db->get();
    }


    function getAllBranchs($filter = []) {

        $sql = " SELECT DISTINCT p.*,seller.id seller_id FROM product p INNER JOIN users as seller ON seller.id =p.product_created_by WHERE 1 and seller.type='admin' and is_campaign_product=0 ";

        if (isset($filter['vendor_id'])) {
            if ($filter['vendor_id'] == 'admin') {
                $sql .= " AND seller.type='admin' ";
            } else {
                $sql .= " AND seller.id=" . (int) $filter['vendor_id'];
            }
        }

        return $this->db->query($sql)->result();
    }

    function getAllBranch($user_id, $user_type, $filter = array()) {

        if ($user_type == 'admin')
            $clause = ' ';
        else {
            $clause = " user_id = $user_id AND ";
            $clause_orders = " op.refer_id = {$user_id} AND ";
        }

        $left_join = $where = '';
        $vendor = $this->getSettings('vendor');

        if ((int) $vendor['storestatus'] == 0) {
            $where .= " AND( seller.id=0 OR seller.id IS NULL)";
        }

        if (isset($filter['seller_id'])) {
            $where .= " AND pa.user_id=" . (int) $filter['seller_id'];
        }

        if (isset($filter['restrict_vendors']) && !empty($filter['restrict_vendors'])) {
            $tempvq = "";

            foreach ($filter['restrict_vendors'] as $vid) {
                if ($tempvq != "") {
                    $tempvq .= " AND (seller.id IS NULL OR seller.id != " . (int) $vid . ") ";
                } else {
                    $tempvq .= " (seller.id IS NULL OR seller.id != " . (int) $vid . ") ";
                }
            }

            if ($tempvq != "") {
                $where .= " AND ( " . $tempvq . " ) ";
            }
        }

        if (isset($filter['on_store'])) {
            $where .= " AND on_store=" . (int) $filter['on_store'];
        }

        if (isset($filter['seller_allow_only_status']) && $filter['seller_allow_only_status']) {
            $where .= " AND (vs.user_id = " . $filter['seller_allow_only_status'] . " OR  vs.vendor_status = 1 OR vs.user_id IS NULL) ";
            $left_join .= " LEFT JOIN vendor_setting AS vs ON (seller.id = vs.user_id)";
        }

        if (isset($filter['only_admin_product'])) {
            $where .= " AND( seller.id=0 OR  seller.id IS NULL) AND on_store=1 ";
        }


        if (isset($filter['not_show_my'])) {
            $where .= " AND( seller.id != " . (int) $filter['not_show_my'] . " OR  seller.id IS NULL )";
        }

        if (isset($filter['product_status'])) {
            $where .= " AND product.product_status=" . (int) $filter['product_status'];
        }

        if (isset($filter['product_status_in'])) {
            $where .= " AND product.product_status IN (" . $filter['product_status_in'] . ")";
        }

        if (isset($filter['category_id']) && $filter['category_id']) {
            $where .= " AND product.product_id IN ( SELECT product_id FROM product_categories WHERE category_id = " . $filter['category_id'] . " GROUP BY product_id)";
        }

        if (isset($filter['ads_name']) && $filter['ads_name']) {
            $where .= " AND product.product_name like '%" . $filter['ads_name'] . "%' ";
        }

        if (isset($filter['vendor_id']) && !empty($filter['vendor_id'])) {
            $where .= " AND product.product_created_by =" . $filter['vendor_id'] . " ";
        }

        if (isset($filter['is_campaign_and_cart_product']) && !empty($filter['is_campaign_and_cart_product'])) {
            $where .= " AND product.is_campaign_product >=0 ";
        } else if (isset($filter['is_campaign_product']) && !empty($filter['is_campaign_product'])) {
            $where .= " AND product.is_campaign_product = 1 ";
        } else {
            $where .= " AND product.is_campaign_product != 1 ";
        }

        if (isset($filter['show_to_affiliates']) && !empty($filter['show_to_affiliates'])) {
            $where .= " AND (pm.meta_value = 1 OR pm.meta_value IS NULL) ";
        }


        $limit = '';
        if (isset($filter['limit']) && (int) $filter['limit'] > 0) {
            $limit = " LIMIT " . (int) $filter['limit'];
        }
        if (isset($filter['start']) && (int) $filter['start'] && $limit) {
            $limit = " LIMIT {$filter['start']} , {$filter['limit']} ";
        }
        if (isset($filter['page']) && $limit) {
            $offset = (int) $filter['limit'] * ((int) $filter['page'] - 1);
            $limit = " LIMIT " . $offset . " ," . (int) $filter['limit'];
        }

        //added for all click count that match with admin ratio
        $all_count_sql = "  (SELECT count(action_id) FROM product_action WHERE   product_id = product.product_id) as all_commition_click_count,
        (SELECT count(op.commission) FROM order_products op LEFT JOIN `order` o ON (o.id = op.order_id) WHERE  op.product_id = product.product_id AND o.status > 0 ) as all_order_count 
        ";

        $query = "SELECT SQL_CALC_FOUND_ROWS
    product.*,
    c.name AS cat_name,
    seller.firstname as seller_firstname,
    seller.lastname as seller_lastname,
    seller.username as seller_username,
    seller.id as seller_id,
    pm.meta_value as show_to_affiliates,
    (
        SELECT sum(op.commission)
        FROM order_products op
        LEFT JOIN `order` o ON (o.id = op.order_id)
        WHERE
        {$clause_orders}
        op.product_id = product.product_id AND o.status > 0 AND op.refer_id > 0) as commission,
    (SELECT count(op.commission) FROM order_products op LEFT JOIN `order` o ON (o.id = op.order_id) WHERE {$clause_orders} op.product_id = product.product_id AND o.status > 0 ) as order_count,
    (SELECT SUM(IF(amount=-1,0,amount)) FROM wallet WHERE {$clause} type = 'click_commission' AND reference_id = product.product_id) as commition_click,
    (SELECT count(action_id) FROM product_action WHERE {$clause} product_id = product.product_id) as commition_click_count,
    (SELECT COUNT(rating_id) FROM `rating` INNER join users on users.id=rating.rating_user_id WHERE rating.products_id=product.product_id) as totalreviews,
    (SELECT  SUM(rating.rating_number)  FROM `rating` INNER join users on users.id=rating.rating_user_id WHERE rating.products_id=product.product_id) as totalrating," . $all_count_sql . "


    FROM product
    LEFT JOIN product_affiliate pa ON pa.product_id = product.product_id
    LEFT JOIN users as seller ON pa.user_id = seller.id
        LEFT JOIN product_categories pc ON pc.product_id = product.product_id
    LEFT JOIN categories c ON c.id = pc.category_id
    LEFT JOIN product_meta as pm ON pm.related_product_id = product.product_id and pm.meta_key = 'show_to_affiliates'
    {$left_join}
    WHERE 1 {$where} AND (seller.id IS NOT NULL OR pa.id IS NULL) ORDER BY product_created_date DESC {$limit}";


        $data = $this->db->query($query)->result_array();

        if (isset($filter['page'])) {
            $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

            return [
                'data' => $data,
                'total' => $total,
            ];
        }
        return $data;
    }

    public function getAllVendorBranchs($user_id, $user_type) {
        if ($user_type == 'admin')
            $clause = ' ';
        else {
            $clause = " ";
            $clause_orders = " op.vendor_id = {$user_id} AND ";
        }
        $where = '';
        $query = "SELECT
    product.*,
    seller.firstname as seller_firstname,
    seller.lastname as seller_lastname,
    seller.username as seller_username,
    seller.id as seller_id,
    (
        SELECT sum(op.commission)
        FROM order_products op
        LEFT JOIN `order` o ON (o.id = op.order_id)
        WHERE
        {$clause_orders}
        o.status = 1 AND
        op.product_id = product.product_id AND o.status > 0 AND op.refer_id > 0) as commission,
    (SELECT count(op.commission) FROM order_products op LEFT JOIN `order` o ON (o.id = op.order_id) WHERE {$clause_orders} op.product_id = product.product_id AND o.status > 0 ) as order_count,
    (SELECT count(action_id) FROM product_action WHERE {$clause} product_id = product.product_id) as commition_click_count,
    (SELECT count(action_id) FROM product_action_admin WHERE product_id = product.product_id) as commition_click_count_admin,
    (SELECT SUM(IF(amount=-1,0,amount)) FROM wallet WHERE {$clause} type = 'click_commission' AND reference_id = product.product_id) as commition_click
    
    
    FROM product
    LEFT JOIN product_affiliate pa ON pa.product_id = product.product_id
    LEFT JOIN users as seller ON pa.user_id = seller.id
    WHERE 1 {$where}
    ORDER BY product_created_date ASC
    ";

        $data = $this->db->query($query)->result_array();

        return $data;
    }

    public function getAllBranchForVendor($user_id, $user_type, $filter = array()) {
        if ($user_type == 'admin')
            $clause = ' ';
        else {
            $clause = " ";
            $clause_orders = " op.vendor_id = {$user_id} AND ";
        }
        $where = '';

        if (isset($filter['seller_id'])) {
            $where .= " AND pa.user_id=" . (int) $filter['seller_id'];
        }

        if (isset($filter['only_admin_product'])) {
            $where .= " AND( seller.id=0 OR  seller.id IS NULL)";
        }

        if (isset($filter['product_status'])) {
            $where .= " AND product.product_status=" . (int) $filter['product_status'];
        }

        $where .= " AND product.is_campaign_product=0";

        if (isset($filter['product_status_in'])) {
            $where .= " AND product.product_status IN (" . $filter['product_status_in'] . ")";
        }

        if (isset($filter['category_id'])) {
            $where .= " AND product_id IN ( SELECT product_id FROM product_categories WHERE category_id = " . $filter['category_id'] . " GROUP BY product_id)";
        }

        //added for ratio count
        $all_count_sql = " (SELECT count(action_id) FROM product_action WHERE   product_id = product.product_id) as all_commition_click_count,
        (SELECT count(op.commission) FROM order_products op LEFT JOIN `order` o ON (o.id = op.order_id) WHERE  op.product_id = product.product_id AND o.status > 0 ) as all_order_count ";

        $query = "SELECT
    product.*,
    seller.firstname as seller_firstname,
    seller.lastname as seller_lastname,
    seller.username as seller_username,
    seller.id as seller_id,
    (
        SELECT sum(op.commission)
        FROM order_products op
        LEFT JOIN `order` o ON (o.id = op.order_id)
        WHERE
        {$clause_orders}
        o.status = 1 AND
        op.product_id = product.product_id AND o.status > 0 AND op.refer_id > 0) as commission,
    (SELECT count(op.commission) FROM order_products op LEFT JOIN `order` o ON (o.id = op.order_id) WHERE {$clause_orders} op.product_id = product.product_id AND o.status > 0 ) as order_count,
    (SELECT count(action_id) FROM product_action WHERE {$clause} product_id = product.product_id) as commition_click_count,
    (SELECT count(action_id) FROM product_action_admin WHERE product_id = product.product_id) as commition_click_count_admin,
    (SELECT SUM(IF(amount=-1,0,amount)) FROM wallet WHERE {$clause} type = 'click_commission' AND reference_id = product.product_id) as commition_click,
    (SELECT COUNT(rating_id) FROM `rating` INNER join users on users.id=rating.rating_user_id WHERE rating.products_id=product.product_id) as totalreviews,
    (SELECT  SUM(rating.rating_number)  FROM `rating` INNER join users on users.id=rating.rating_user_id WHERE rating.products_id=product.product_id) as totalrating," . $all_count_sql . "  
    FROM product
    LEFT JOIN product_affiliate pa ON pa.product_id = product.product_id
    LEFT JOIN users as seller ON pa.user_id = seller.id
    WHERE 1 {$where}
    ORDER BY product_created_date DESC";

        $data = $this->db->query($query)->result_array();

        return $data;
    }

    public function getProductFromBranch($product_id) {
        return $this->db->query("SELECT * FROM product_affiliate WHERE product_id=" . (int) $product_id . " ")->row();
    }

    public $level_count = 0;

    function getAllCategories($filter) {
        $query = '
        SELECT
        users.*,

        (SELECT CONCAT(firstname, " " ,lastname) FROM users u WHERE u.id = users.refid) as ref_user,
        (SELECT COUNT(action_id) FROM product_action WHERE user_id = users.id) as click,
        (SELECT name FROM countries WHERE id = users.Country LIMIT 1) as country_name,
        (SELECT name FROM states WHERE id = users.StateProvince LIMIT 1) as state_name,
        (SELECT SUM(o.total) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as amount ,
        (SELECT COUNT(o.id) FROM `order` o WHERE  o.user_id = users.id AND o.status > 0) as total_sale ,
        (SELECT SUM(amount) FROM product_action WHERE type IN ("click_commission","sale_commission") AND user_id = users.id) as commission
        FROM  users
        WHERE TYPE IN ("client","guest")
        ORDER BY id DESC';

        $total = $this->db->query($query)->num_rows();

        if (isset($filter['page'], $filter['limit'])) {
            $offset = (($filter['page'] - 1) * $filter['limit']);
            $query .= " LIMIT {$offset}," . $filter['limit'];
        }

        $list = $this->db->query($query)->result_array();
        return array($list, $total);
    }


    function checkmail($email, $user_id = null) {
        if ($user_id) {
            $this->db->where('id !=', $user_id);
        }
        return $this->db->get_where('users', array('email' => $email))->result_array();
    }

    function checkuser($username, $user_id = null) {
        if ($user_id) {
            $this->db->where('id !=', $user_id);
        }
        return $this->db->get_where('users', array('username' => $username))->result_array();
    }

    function getAllUserrecord() {
        $this->db->select('countries.*, users.*');
        $this->db->from('users');
        $this->db->where('users.type', 'user');
        $this->db->join('countries', 'countries.id = users.Country', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }


    function process_approval($data) {
        $where = "";

        if (is_array($data['users_ids'])) {
            foreach ($data['users_ids'] as $id) {
                $where .= " OR id=" . $id . " ";
            }
        } else {
            $where .= " OR id=" . $data['users_ids'] . " ";
        }

        if ($this->db->query("UPDATE users SET reg_approved = " . $data['reg_approved'] . " WHERE id=0 " . $where)) {
            $affected_rows = $this->db->affected_rows();
            $msg_suffix = ($affected_rows > 1) ? ' for ' . $affected_rows . ' users' : '';

            $status = ($data['reg_approved'] == 1) ? 'approved' : 'declined';

            if (is_array($data['users_ids'])) {
                foreach ($data['users_ids'] as $id) {
                    $this->db->query('UPDATE wallet SET status=1 WHERE reference_id IN (' . implode(',', $data['users_ids']) . ') AND type="refer_registration_commission" AND status=0');
                }
            } else {
                $this->db->query('UPDATE wallet SET status=1 WHERE reference_id=' . $data['users_ids'] . ' AND type="refer_registration_commission" AND status=0');
            }

            return array('status' => true, 'message' => "Registration has been " . $status . " " . $msg_suffix);
        } else {
            return array('status' => false, 'message' => "something went wrong, please try again!");
        }
    }

    function getApprovalCounts() {
        $data = [];
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where('users.type', "user");
        $query = $this->db->get();
        $data['total'] = $query->row()->total;
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where('users.reg_approved', 0);
        $this->db->where('users.type', "user");
        $query = $this->db->get();
        $data['pending'] = $query->row()->total;
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where('users.type', "user");
        $this->db->where('users.reg_approved', 1);
        $query = $this->db->get();
        $data['approved'] = $query->row()->total;
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where('users.type', "user");
        $this->db->where('users.reg_approved', 2);
        $query = $this->db->get();
        $data['declined'] = $query->row()->total;
        return $data;
    }

    function getAllUserrecordCount() {
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->where('users.type', 'user');
        $query = $this->db->get();

        return $query->row()->total;
    }

    function getAllUserNew() {
        $this->db->select(
            array(
                'countries.*',
                'users.*',
                '(SELECT sum(amount) FROM wallet WHERE status = 3 AND wallet.user_id = users.id AND type IN("click_commission","sale_commission")) as paid_commition',
                '(SELECT sum(amount) FROM wallet WHERE status = 1 AND wallet.user_id = users.id AND type IN("click_commission","sale_commission")) as unpaid_commition',
                '(SELECT SUM(o.total) FROM `order` o LEFT JOIN order_products op ON (o.id = op.order_id) WHERE  op.refer_id = users.id AND o.status > 0) as amount',
                '(SELECT COUNT(action_id) FROM product_action WHERE user_id = users.id) as click',
                '(SELECT SUM(amount) FROM wallet WHERE type IN ("click_commission") AND user_id = users.id) as click_commission',
                '(SELECT SUM(amount) FROM wallet WHERE type IN ("sale_commission") AND user_id = users.id) as sale_commission',
                '(SELECT SUM(amount) FROM wallet WHERE type IN ("affiliate_click_commission") AND user_id = users.id) as aff_click_commission',
                '(SELECT COUNT(id) FROM affiliate_action WHERE user_id = users.id) as aff_click',
            )
        );

        $this->db->from('users');
        $this->db->where('users.type', 'user');
        $this->db->join('countries', 'countries.id = users.Country', 'left');
        $this->db->order_by('users.created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllClientNew() {
        $this->db->select('
            countries.*,
            users.*,
            (SELECT SUM(total) FROM `order` WHERE order.user_id = users.id AND status > 0 ) as buy_product_amount,
            (SELECT count(total) FROM `order` WHERE order.user_id = users.id AND status > 0 ) as buy_product
            ');
        $this->db->from('users');
        $this->db->where('users.type', 'client');
        $this->db->join('countries', 'countries.id = users.Country', 'left');
        $this->db->order_by('users.created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSettings($type = '', $key = "") {
        $language = 0;
        if ($this->db->field_exists('language_id', 'setting'))
            $language = 1;

        $settingdata = array();
        if ($language == 1) {
            if ($key != "") {
                $this->db->where(['setting_type' => $type, 'setting_key' => $key, 'language_id' => 1]);
            } else {
                $this->db->where(['setting_type' => $type, 'language_id' => 1]);
            }
        } else {
            if ($key != "") {
                $this->db->where(['setting_type' => $type, 'setting_key' => $key]);
            } else {
                $this->db->where(['setting_type' => $type]);
            }
        }

        $getSetting = $this->db->get_where('setting', array('setting_status' => 1))->result_array();
        foreach ($getSetting as $setting) {
            $settingdata[$setting['setting_key']] = $setting['setting_value'];
        }
        return $settingdata;
    }

    function getSettingsWithLanaguage($type = '', $language_id = 1, $key = "") {
        $language = 0;
        if ($this->db->field_exists('language_id', 'setting'))
            $language = 1;

        $settingdata = array();
        if ($language == 1) {
            if ($key != "") {
                $this->db->where(['setting_type' => $type, 'setting_key' => $key, 'language_id' => $language_id]);
            } else {
                $this->db->where(['setting_type' => $type, 'language_id' => $language_id]);
            }
        } else {
            if ($key != "") {
                $this->db->where(['setting_type' => $type, 'setting_key' => $key]);
            } else {
                $this->db->where(['setting_type' => $type]);
            }
        }

        $getSetting = $this->db->get_where('setting', array('setting_status' => 1))->result_array();
        foreach ($getSetting as $setting) {
            $settingdata[$setting['setting_key']] = $setting['setting_value'];
        }

        $settingdata['language_id'] = $language_id;

        return $settingdata;
    }

    function getFrontThemeSettings($type = '', $key = "") {
        $settingdata = array();
        if ($key != "") {
            $this->db->where(['setting_type' => $type, 'setting_key' => $key]);
        } else {
            $this->db->where('setting_type', $type);
        }
        $getSetting = $this->db->get_where('theme_colors', array('setting_status' => 1))->result_array();
        foreach ($getSetting as $setting) {
            $settingdata[$setting['setting_key']] = $setting['setting_value'];
        }
        return $settingdata;
    }

    function getnotification($viewfor = null, $user_id) {
        $this->db->select('notification.*');
        $this->db->where('notification_view_user_id', $user_id);
        $this->db->where('notification_viewfor', $viewfor);
        $this->db->where('notification_is_read', 0);
        $this->db->order_by('notification_id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('notification');
        return $query->result_array();
    }

    function getnotificationnew($viewfor = null, $user_id, $limit = 0, $filter = array()) {
        $this->db->select('notification.*');
        if ($user_id > 0) {
            $this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
        }

        if (isset($filter['id_gt'])) {
            $this->db->where('notification_id > ' . (int) $filter['id_gt']);
        }
        $this->db->where('notification_is_read', 0);
        $this->db->where('notification_viewfor', $viewfor);
        if ($viewfor == 'admin')
            $this->db->where(' (notification_view_user_id = "" OR notification_view_user_id = 1 OR notification_view_user_id IS NULL) ');
        $this->db->order_by('notification_id', 'desc');
        if ($limit > 0)
            $this->db->limit($limit);
        $query = $this->db->get('notification');

        return $query->result_array();
    }

    function getnotificationnew_count($viewfor = null, $user_id) {
        $this->db->select('notification.notification_id');
        if ($user_id > 0) {
            $this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
        }
        $this->db->where('notification_is_read', 0);
        $this->db->where('notification_viewfor', $viewfor);

        if ($viewfor == 'admin')
            $this->db->where(' (notification_view_user_id = "" OR notification_view_user_id = 1 OR notification_view_user_id IS NULL) ');

        $query = $this->db->get('notification');
        return $query->num_rows();
    }

    function getnotificationall($viewfor = null, $user_id) {
        $this->db->select('notification.*');
        $this->db->where('notification_view_user_id', $user_id);
        $this->db->where('notification_viewfor', $viewfor);
        $this->db->order_by('notification_id', 'desc');
        $query = $this->db->get('notification');
        return $query->result_array();
    }

    function deleteusers($id = null) {
        $membership_user = $this->db->query("SELECT GROUP_CONCAT(id) as ids FROM membership_user WHERE user_id = {$id}  GROUP BY user_id")->row();

        if (!empty($membership_user->ids)) {
            $this->db->query("DELETE FROM membership_user WHERE id IN ({$membership_user->ids})");
            $this->db->query("DELETE FROM membership_buy_history WHERE buy_id IN ({$membership_user->ids})");
        }

        if (!empty($id)) {
            $this->db->where('id', $id);

            return $this->db->delete('users');
        }

        return false;
    }

    function deleteproducts($id = null) {
        if (!empty($id)) {
            $this->db->query("DELETE FROM product_categories WHERE product_id = {$id} ");
            $this->db->query("DELETE FROM product_affiliate WHERE product_id = {$id} ");
            $this->db->query("DELETE FROM product WHERE product_id = {$id} ");

            return true;
        }
        return false;
    }    


    function getBranchAction($product_id, $user_id, $viewer_id = 0) {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $this->db->from('product_action');
        $this->db->where('product_id', $product_id);

        if ($viewer_id)
            $this->db->where('viewer_id', $viewer_id);

        $this->db->where('user_ip', $ip_address);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function getFormAction($product_id, $user_id, $viewer_id = 0) {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $this->db->from('form_action');
        $this->db->where('form_id', $product_id);
        if ($viewer_id)
            $this->db->where('viewer_id', $viewer_id);
        $this->db->where('user_ip', $ip_address);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->num_rows();
        return $result;
    }

    public function getAllFor($table, $field, $value, $limit = false, $offset = 0, $orderby = false) {
        $ci = get_instance();
        if ($limit != false) {
            $ci->db->limit($limit, $offset);
        }
        if ($orderby != false) {
            $ci->db->order_by($orderby);
        }
        $ci->db->from($table);
        $ci->db->where($field, $value);
        $query = $ci->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function getAllWithExcept($table, $field, $value, $limit = false, $offset = 0, $orderby = false) {
        $ci = get_instance();
        if ($limit != false) {
            $ci->db->limit($limit, $offset);
        }
        if ($orderby != false) {
            $ci->db->order_by($orderby);
        }
        $ci->db->from($table);
        $ci->db->where($field . ' !=', $value);
        $query = $ci->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function getByField($table, $field, $value) {
        $ci = get_instance();
        $ci->db->select('*');
        $ci->db->from($table);
        $ci->db->where($field, $value);
        $query = $ci->db->get();
        $result = $query->row_array();

        return $result;
    }

    public function countByTable($table) {
        $ci = get_instance();
        $ci->db->from($table);
        $result = $ci->db->count_all_results();

        return $result;
    }

    public function countByField($table, $field, $value) {
        $ci = get_instance();
        $ci->db->where($field, $value);
        $ci->db->from($table);
        $result = $ci->db->count_all_results();

        return $result;
    }

    public function setBrowserLanguage() {
        $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

        foreach ($languages as $lang) {
            $all_languages = json_decode(file_get_contents('assets/data/languages.json'));

            $admin_languge = $this->db->query('SELECT id,name FROM language')->result();

            $lang = explode("-", $lang);
            $lang = explode(";", $lang[0]);

            if (isset($all_languages->{$lang[0]})) {
                foreach ($admin_languge as $l) {
                    if ($l->name == $all_languages->{$lang[0]}) {
                        $_SESSION['userLang'] = $l->id;
                        $langChanged = true;
                        break;
                    }
                }
            }

            if (isset($langChanged)) {
                break;
            }
        }
    }




    public function productDataWithMeta($product) {
        $meta = $this->db->get_where('product_meta', ['related_product_id' => $product['product_id']])->result_array();

        foreach ($meta as $m) {
            $product['_meta_' . $m['meta_key']] = $m['meta_value'];
        }

        return $product;
    }

    public function categoryInfo($categorySlug) {
        $categoryInfo = $this->db->query("select id from categories where slug='" . $categorySlug . "'")->result();

        return $categoryInfo;
    }

    public function getUserInfo($id) {

        $userInfo = $this->db->query("select * from users where id='" . $id . "'")->result();

        return $userInfo;
    }
}
