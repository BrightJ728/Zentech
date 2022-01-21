
<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Accounting_m extends CI_Model
    {
        protected $school_id;
        protected $active_session;

        public function __construct()
        {
            parent::__construct();
            $this->school_id = school_id();
            $this->active_session = active_session();
        }

        public function add_resit_fee($data_input)
        {
            $data_input =html_escape($data_input);
            if(!in_array($data_input["student_type"], array("local", "foreign"))){
                $response =array(
                    'status'=> false,
                    'notification' => get_phrase('wrong_student_type_entered')
                );
            } elseif($this->db->get_where("resit_fees", array("academic_year_id" => $data_input["academic_year_id"], "student_type" => $data_input["student_type"], "program_id" => $data_input["program_id"], "year_level_id" => $data_input["academic_year_id"]))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('resit_fees_for_this_academic_year_department_and_student_type_entered_already')
                ); 
            }else {
                $data["academic_year_id"] = $data_input["academic_year_id"];
                $data["program_id"] = $data_input["program_id"];
                $data["currency_id"] = $data_input["currency_id"];
                $data["year_level_id"] = $data_input["year_level_id"];
                $data["student_type"] = $data_input["student_type"];
                $data["amount"] = $data_input["fee"];
    
                if ($this->db->insert("resit_fees", $data)) {
                    $response = array(
                        'status' => true,
                        'notification' => get_phrase('resit_fee_added_successfully')
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('failed_to_add_resit_fee')
                    );
                }
            }
            
            return json_encode($response);
        }

        public function update_resit_fee($data_input, $id)
        {
            $data_input = html_escape($data_input);
            if (!in_array($data_input["student_type"], array("local", "foreign"))) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong_student_type_entered')
                );
            }
            $data["academic_year_id"] = $data_input["academic_year_id"];
            $data["year_level_id"] = $data_input["year_level_id"];
            $data["program_id"] = $data_input["program_id"];
            $data["currency_id"] = $data_input["currency_id"];
            $data["student_type"] = $data_input["student_type"];
            $data["amount"] = $data_input["fee"];

            $this->db->where("id", $id);
            if ($this->db->update("resit_fees", $data)) {
                $response = array(
                    'status' => true,
                    'notification' => get_phrase('resit_fee_updated_successfully')
                  );
            } else {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_update_resit_fee')
                );
            }
            return json_encode($response);
        }

        public function delete_resit_fee($id)
        {
            // Check if row exists.
            if ($this->db->get_where("resit_fees", ["id" => $id])->num_rows() === 1) {
                $this->db->where("id", $id);
                if ($this->db->delete("resit_fees")) {
                    $response = array(
                        'status' => true,
                        'notification' => get_phrase('resit_fee_deleted_successfully')
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('failed_to_delete_resit_fee')
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_delete_resit_fee')
                );
            }

            return json_encode($response);
        }
        

        public function add_academic_year_fee($data_input)
        {
            $data_input = html_escape($data_input);
            if (!in_array($data_input["student_type"], array("local", "foreign"))) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong_student_type_entered')
                );
            } elseif ($this->db->get_where("school_fees", array("academic_year_id" => $data_input["academic_year_id"], "student_type" => $data_input["student_type"], "program_id" => $data_input["program_id"], "year_level_id" => $data_input["academic_year_id"]))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('fees_for_this_academic_year_department_and_student_type_entered_already')
                );
            } else {
                $data["academic_year_id"] = $data_input["academic_year_id"];
                $data["program_id"] = $data_input["program_id"];
                $data["currency_id"] = $data_input["currency_id"];
                $data["year_level_id"] = $data_input["year_level_id"];
                $data["student_type"] = $data_input["student_type"];
                $data["amount"] = $data_input["fee"];
    
                if ($this->db->insert("school_fees", $data)) {
                    $response = array(
                        'status' => true,
                        'notification' => get_phrase('academic_fee_added_successfully')
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('failed_to_add_academic_fee')
                    );
                }
            }
            
            return json_encode($response);
        }

        public function update_academic_year_fee($data_input, $id)
        {
            $data_input = html_escape($data_input);
            if (!in_array($data_input["student_type"], array("local", "foreign"))) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong_student_type_entered')
                );
            }
            $data["academic_year_id"] = $data_input["academic_year_id"];
            $data["year_level_id"] = $data_input["year_level_id"];
            $data["program_id"] = $data_input["program_id"];
            $data["currency_id"] = $data_input["currency_id"];
            $data["student_type"] = $data_input["student_type"];
            $data["amount"] = $data_input["fee"];

            $this->db->where("id", $id);
            if ($this->db->update("school_fees", $data)) {
                $response = array(
                    'status' => true,
                    'notification' => get_phrase('academic_fee_updated_successfully')
                  );
            } else {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_update_academic_fee')
                );
            }
            return json_encode($response);
        }

        public function delete_academic_year_fee($id)
        {
            // Check if row exists.
            if ($this->db->get_where("school_fees", ["id" => $id])->num_rows() === 1) {
                $this->db->where("id", $id);
                if ($this->db->delete("school_fees")) {
                    $response = array(
                        'status' => true,
                        'notification' => get_phrase('academic_fee_deleted_successfully')
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('failed_to_delete_academic_fee')
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_delete_academic_fee')
                );
            }

            return json_encode($response);
        }
        public function get_resit_fees($id = null)
        {
            if ($id === null) {
                $results = $this->db->get("resit_fees_view")->result_array();
            } else {
                if (is_numeric($id)) {
                    $results = $this->db->get_where("resit_fees_view", ["id" => $id])->row_array();
                } else {
                    $results = null;
                }
            }

            return $results;
        }
        public function get_academic_fees($id = null)
        {
            if ($id === null) {
                $results = $this->db->get("school_fees_view")->result_array();
            } else {
                if (is_numeric($id)) {
                    $results = $this->db->get_where("school_fees_view", ["id" => $id])->row_array();
                } else {
                    $results = null;
                }
            }

            return $results;
        }

        public function create_school_fees_invoice($data_input, $academic_year_id = NULL)
        {
            $academic_year_id = $academic_year_id === NULL ? $this->crud_model->get_current_academic_year_id() : $academic_year_id;
            $data['title'] = $data_input['title'];
            $data['total_amount'] = $data_input['total_amount'];
            $data['amount_currency_id'] = $data_input['school_fees_currency'];
            $data['student_id'] = $data_input['student_id'];
            $data['program_id'] = $data_input['program_id'];
            $data['paid_amount'] = $data_input['paid_amount'];
            $data['type'] = "school_fees";
            $data['academic_year_id'] = $academic_year_id;
            $data['status'] = $data_input['status'];
            $data['school_id'] = $this->school_id;
            $data['session'] = $this->active_session;
            $data['created_at'] = strtotime(date('d-M-Y'));

            /*KEEPING TRACK OF PAYMENT DATE*/
            

            if ($data['paid_amount'] > $data['total_amount']) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('paid_amount_can_not_be_larger_than_total_amount')
                );
                return json_encode($response);
            }
            if ($data['status'] === 'paid' && floatVal($data['total_amount']) !== floatVal($data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('paid_amount_is_not_equal_to_total_amount')
                );
                return json_encode($response);
            }
              if ($data['status'] === 'Partial payment' && 0.5*floatVal($data['total_amount']) > floatVal($data['paid_amount'])) {
                            $data['status'] = "unpaid";

            }


            if ($data['status'] === 'unpaid' && floatval($data['total_amount']) === floatVal($data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('status_must_be_set_to_paid_if_total_amount_is_equal_to_paid_amount')
                );
                return json_encode($response);
            }$data['status'] = $data_input['status'];

            if ($this->db->get_where("invoices", array("academic_year_id" => $data["academic_year_id"], "type" => $data["type"], "student_id" => $data["student_id"] ))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_for_this_student_has_entered_already_been_for_this_academic_year')
                );
                return json_encode($response);
            }

            $this->db->trans_start();

            $this->db->insert('invoices', $data);
            if ($data['paid_amount'] > 0) {
                $invoice_id = $this->db->insert_id();

                $payment_data["invoice_id"] = $invoice_id;
                $payment_data["amount"] = $data['paid_amount'];
                $payment_data["currency_id"] = $data_input['payment_currency'];
                $payment_data["student_id"]=$data_input['student_id'];

                $payment_data["payment_channel"] = "system";
                $payment_data["receiver_id"] = $this->session->userdata('user_id');

                $this->db->insert('invoice_payments', $payment_data);
            }

            $this->db->trans_complete();

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_added_successfully')
            );
            
            return json_encode($response);
        } 
       
        public function add_payment_for_invoice($data_input, $invoice_id)
        {
            $payment_data["invoice_id"] = $invoice_id;
            $payment_data["amount"] = $data_input['payment_amount'];
            $payment_data["currency_id"] = $data_input['payment_currency_id']; 
            $payment_data["payment_channel"] = "system";
            $payment_data["receiver_id"] = $this->session->userdata('user_id');

            $invoice = $this->db->get_where("invoices", ["id" => $invoice_id])->row_array();

            if($invoice === NULL){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_number_not_found')
                );
                return json_encode($response);
            }

            // Check for signed numbers and zeros
            if ($data_input['payment_amount'] <= 0){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('amount_paid_must_be_greater_than_zero')
                );
                return json_encode($response);
            }


            // Update paid amount in invoice (db)
            $invoice_data['paid_amount'] = floatval($invoice['paid_amount']) + floatval($data_input["payment_amount"]);


            // Check for overpayment
            if (floatVal($invoice['total_amount']) < floatVal($invoice_data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('total_payments_amount_more_than_total_amount_on_invoice')
                );
                return json_encode($response);
            }

            // Check if payment completed
            if (floatval($invoice['total_amount']) === floatVal($invoice_data['paid_amount'])) {
                $invoice_data['status'] = "paid";
            }
            
            
            
            $this->db->trans_start();
            $this->db->insert('invoice_payments', $payment_data);

            $this->db->where(["id" => $invoice_id]);
            $this->db->update('invoices', $invoice_data);

            $this->db->trans_complete();

            $response = array(
                'status' => true,
                'notification' => get_phrase('payment_added_successfully')
            );

            return json_encode($response);
        }

        public function get_invoice_by_date_range($date_from = NULL, $date_to = NULL, $selected_status = "all")
        {
            
            if ($selected_status != "all") {
                $this->db->where('status', $selected_status);
            }
            if($date_from !== NULL)
                $this->db->where('created_at >=', $date_from);
            if($date_to !== NULL)
                $this->db->where('created_at <=', $date_to);

            $this->db->where('school_id', $this->school_id);
            $this->db->where('session', $this->active_session);

            return $this->db->get('invoices_view')->result_array();
        }

        public function get_invoice_payments($invoice_id){
            return $this->db->get_where("invoice_payments_view", ["invoice_id" => $invoice_id])->result_array();
        }

        public function get_invoices($id = NULL){
            if ($id === null) {
                $results = $this->db->get("invoices_view")->result_array();
            } else {
                if (is_numeric($id)) {
                    $results = $this->db->get_where("invoices_view", ["id" => $id])->row_array();
                } else {
                    $results = null;
                }
            }
            return $results;
        }

        public function update_invoice($data_input, $invoice_id){
            $invoice = $this->db->get_where("invoices", ["id" => $invoice_id])->row_array();

            if($invoice === NULL){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_number_not_found')
                );
                return json_encode($response);
            }

            $data["program_id"] = $data_input["program_id"];
            $data["student_id"] = $data_input["student_id"];
            $data["title"] = $data_input["title"];
            $data["total_amount"] = $data_input["total_amount"];

            if ($this->db->get_where("invoices", array("academic_year_id" => $invoice["academic_year_id"], "type" => $invoice["type"], "program_id" => $data["program_id"] ))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_for_this_student_has_entered_already_been_for_this_academic_year')
                );
                return json_encode($response);
            }

            $this->db->where(["id" => $invoice_id]);
            $this->db->update('invoices', $data);

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_updated_successfully')
            );

            return json_encode($response);
        }

        public function delete_invoice($id)
        {
            $this->db->where('invoice_id', $id);
            $this->db->delete('invoice_payments');
            $this->db->where('id', $id);

            $this->db->delete('invoices');
            

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_deleted_successfully')
            );
            return json_encode($response);
        }

        public function soft_delete_invoice($id)
        {
            $data["deleted_at"] = date("Y-m-d H:i:s", time());
            $this->db->where('id', $id);
            $this->db->update('invoices', $data);

            $this->db->where('invoice_id', $id);

            $this->db->update('invoice_payments', $data);

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_deleted_successfully')
            );
            return json_encode($response);
        }

        public function get_student_fees_payment_status_for_academic_year($student_id, $academic_year_id){
            $this->db->where(
                array(
                    'student_id' => $student_id,
                    'academic_year_id' => $academic_year_id
                )
            );
            $this->db->select("*");
            $result = $this->db->get("invoices")->result_array() ;

            if(count($result) > 0 && $result[0]["paid_amount"]< 0.5*$result[0]["total_amount"]&&$result[0]["status"]=="Partial payment"){
                $result[0]["status"]="unpaid";


            }
            if(count($result) ==0){

            $result[0]["status"]="unpaid";
                }
            return $result[0]["status"];
        }
        public function create_resit_fees_invoice($data_input, $academic_year_id = NULL)
        {
            $academic_year_id = $academic_year_id === NULL ? $this->crud_model->get_current_academic_year_id() : $academic_year_id;
            $data['title'] = $data_input['title'];
            $data['total_amount'] = $data_input['total_amount'];
            $data['amount_currency_id'] = $data_input['school_fees_currency'];
            $data['student_id'] = $data_input['student_id'];
            $data['program_id'] = $data_input['program_id'];
            $data['paid_amount'] = $data_input['paid_amount'];
            $data['type'] = "resit_fees";
            $data['academic_year_id'] = $academic_year_id;
            $data['status'] = $data_input['status'];
            $data['school_id'] = $this->school_id;
            $data['session'] = $this->active_session;
            $data['created_at'] = strtotime(date('d-M-Y'));

            /*KEEPING TRACK OF PAYMENT DATE*/
            

            if ($data['paid_amount'] > $data['total_amount']) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('paid_amount_can_not_be_larger_than_total_amount')
                );
                return json_encode($response);
            }
            if ($data['status'] === 'paid' && floatVal($data['total_amount']) !== floatVal($data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('paid_amount_is_not_equal_to_total_amount')
                );
                return json_encode($response);
            }
            if ($data['status'] === 'Partial payment' && 0.5*floatVal($data['total_amount']) > floatVal($data['paid_amount'])) {
                $data['status'] = "unpaid";

        }
              


            if ($data['status'] === 'unpaid' && floatval($data['total_amount']) === floatVal($data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('status_must_be_set_to_paid_if_total_amount_is_equal_to_paid_amount')
                );
                return json_encode($response);
            }$data['status'] = $data_input['status'];

            if ($this->db->get_where("resit_fees_invoice", array("academic_year_id" => $data["academic_year_id"], "type" => $data["type"], "student_id" => $data["student_id"] ))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_for_this_student_has_entered_already_been_for_this_academic_year')
                );
                return json_encode($response);
            }

            $this->db->trans_start();

            $this->db->insert('resit_fees_invoice', $data);
            if ($data['paid_amount'] > 0) {
                $resit_fees_invoice_id = $this->db->insert_id();

                $payment_data["resit_fees_invoice_id"] = $resit_fees_invoice_id;
                $payment_data["amount"] = $data['paid_amount'];
                $payment_data["currency_id"] = $data_input['payment_currency'];
                $payment_data["student_id"]=$data_input['student_id'];

                $payment_data["payment_channel"] = "system";
                $payment_data["receiver_id"] = $this->session->userdata('user_id');

                $this->db->insert('resit_fees_payments', $payment_data);
            }

            $this->db->trans_complete();

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_added_successfully')
            );
            
            return json_encode($response);
        } 
        public function add_payment_for_resit_fees_invoice($data_input, $resit_fees_invoice_id)
        {
            $payment_data["resit_fees_invoice_id"] = $resit_fees_invoice_id;
            $payment_data["amount"] = $data_input['payment_amount'];
            $payment_data["currency_id"] = $data_input['payment_currency_id']; 
            $payment_data["payment_channel"] = "system";
            $payment_data["receiver_id"] = $this->session->userdata('user_id');

            $resit_fees_invoices = $this->db->get_where("resit_fees_invoice", ["id" => $resit_fees_invoice_id])->row_array();

            if($resit_fees_invoices === NULL){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_number_not_found')
                );
                return json_encode($response);
            }

            // Check for signed numbers and zeros
            if ($data_input['payment_amount'] <= 0){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('amount_paid_must_be_greater_than_zero')
                );
                return json_encode($response);
            }


            // Update paid amount in invoice (db)
            $resit_fees_invoices_data['paid_amount'] = floatval($resit_fees_invoices['paid_amount']) + floatval($data_input["payment_amount"]);


            // Check for overpayment
            if (floatVal($resit_fees_invoices['total_amount']) < floatVal($resit_fees_invoices_data['paid_amount'])) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('total_payments_amount_more_than_total_amount_on_invoice')
                );
                return json_encode($response);
            }

            // Check if payment completed
            if (floatval($resit_fees_invoices['total_amount']) === floatVal($resit_fees_invoices_data['paid_amount'])) {
                $resit_fees_invoices_data['status'] = "paid";
            }
            
            
            
            $this->db->trans_start();
            $this->db->insert('resit_fees_payments', $payment_data);

            $this->db->where(["id" => $resit_fees_invoice_id]);
            $this->db->update('resit_fees_invoice', $resit_fees_invoices_data);

            $this->db->trans_complete();

            $response = array(
                'status' => true,
                'notification' => get_phrase('payment_added_successfully')
            );

            return json_encode($response);
        }

        public function get_resit_fees_invoice_by_date_range($date_from = NULL, $date_to = NULL, $selected_status = "all")
        {
            
            if ($selected_status != "all") {
                $this->db->where('status', $selected_status);
            }
            if($date_from !== NULL)
                $this->db->where('created_at >=', $date_from);
            if($date_to !== NULL)
                $this->db->where('created_at <=', $date_to);

            $this->db->where('school_id', $this->school_id);
            $this->db->where('session', $this->active_session);

            return $this->db->get('resit_fees_invoice_view')->result_array();
        }

        public function get_resit_fees_payments($resit_fees_invoice_id){
            return $this->db->get_where("resit_fees_payments_view", ["resit_fees_invoice_id" => $resit_fees_invoice_id])->result_array();
        }

        public function get_resit_fees_invoice($id = NULL){
            if ($id === null) {
                $results = $this->db->get("resit_fees_invoice_view")->result_array();
            } else {
                if (is_numeric($id)) {
                    $results = $this->db->get_where("resit_fees_invoice_view", ["id" => $id])->row_array();
                } else {
                    $results = null;
                }
            }
            return $results;
        }

        public function update_resit_fees_invoice($data_input, $resit_fees_invoice_id){
            $resit_fees_invoice = $this->db->get_where("resit_fees_invoice", ["id" => $resit_fees_invoice_id])->row_array();

            if($resit_fees_invoice === NULL){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_number_not_found')
                );
                return json_encode($response);
            }

            $data["program_id"] = $data_input["program_id"];
            $data["student_id"] = $data_input["student_id"];
            $data["title"] = $data_input["title"];
            $data["total_amount"] = $data_input["total_amount"];

            if ($this->db->get_where("resit_fees_invoice", array("academic_year_id" => $resit_fees_invoice["academic_year_id"], "type" => $resit_fees_invoice["type"], "program_id" => $data["program_id"] ))->num_rows() > 0) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('invoice_for_this_student_has_entered_already_been_for_this_academic_year')
                );
                return json_encode($response);
            }

            $this->db->where(["id" => $resit_fees_invoice_id]);
            $this->db->update('resit_fees_invoice', $data);

            $response = array(
                'status' => true,
                'notification' => get_phrase('invoice_updated_successfully')
            );

            return json_encode($response);
        }

        public function delete_resit_fees_invoice($id)
        {
            $this->db->where('resit_fees_invoice_id', $id);
            $this->db->delete('resit_fees_payments');
            $this->db->where('id', $id);

            $this->db->delete('resit_fees_invoice');
            

            $response = array(
                'status' => true,
                'notification' => get_phrase('resit_fees_invoice_deleted_successfully')
            );
            return json_encode($response);
        }

        public function soft_delete_resit_fees_invoice($id)
        {
            $data["deleted_at"] = date("Y-m-d H:i:s", time());
            $this->db->where('id', $id);
            $this->db->update('resit_fees_invoice', $data);

            $this->db->where('resit_fees_invoice_id', $id);

            $this->db->update('resit_fees_payments', $data);

            $response = array(
                'status' => true,
                'notification' => get_phrase('resit_fees_invoice_deleted_successfully')
            );
            return json_encode($response);
        }

        public function get_resit_fees_payment_status_for_academic_year($student_id, $academic_year_id){
            $this->db->where(
                array(
                    'student_id' => $student_id,
                    'academic_year_id' => $academic_year_id
                )
            );
            $this->db->select("*");
            $result = $this->db->get("resit_fees_invoice")->result_array() ;

            if(count($result) > 0 && $result[0]["paid_amount"]< 0.5*$result[0]["total_amount"]&&$result[0]["status"]=="Partial payment"){
                $result[0]["status"]="unpaid";


            }
            if(count($result) ==0){

            $result[0]["status"]="unpaid";
                }
            return $result[0]["status"];
        }


    }
