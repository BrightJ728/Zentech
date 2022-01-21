<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Zentech School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Accountant extends CI_Controller {
	public function __construct(){

		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*LOADING ALL THE MODELS HERE*/
		$this->load->model('Crud_model',     'crud_model');
		$this->load->model('User_model',     'user_model');
		$this->load->model('Settings_model', 'settings_model');
		$this->load->model('Payment_model',  'payment_model');
		$this->load->model('Email_model',    'email_model');
		$this->load->model('Addon_model',    'addon_model');
		$this->load->model('Frontend_model', 'frontend_model');

		/*cache control*/
		$this->output->set_header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");

		/*SET DEFAULT TIMEZONE*/
		timezone();

		/*LOAD EXTERNAL LIBRARIES*/
    $this->load->library('pdf');

		// CHECK WHETHER Accountant IS LOGGED IN
		if($this->session->userdata('accountant_login') != 1){
			redirect(site_url('login'), 'refresh');
		}
	}

	// INDEX FUNCTION
	public function index(){
		redirect(site_url('accountant/dashboard'), 'refresh');
	}

	//DASHBOARD
	public function dashboard(){
		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}

	//	SECTION STARTED
	public function section($action = "", $id = "") {

		// PROVIDE A LIST OF SECTION ACCORDING TO CLASS ID
		if ($action == 'list') {
			$page_data['class_id'] = $id;
			$this->load->view('backend/accountant/section/list', $page_data);
		}
	}
	//	SECTION ENDED
	// ACCOUNTING SECTION STARTS
  

  //EXPORT STUDENT FEES
 
  public function school_fees($param1 = "", $param2 = "")
    {
        // For creating new invoice
        if ($param1 == 'single') {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->create_school_fees_invoice($data);
            echo $response;
        }
        // For creating adding payment to invoice
        if ($param1 == 'add_payment' && is_numeric($param2) ) {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->add_payment_for_invoice($data, $param2);
            echo $response;
        }
        // For creating new mass invoice
        if ($param1 == 'mass') {
            $response = array(
                'status' => false,
                'notification' => get_phrase('not_implemented')
            );
            echo json_encode($response);
        }

        // For editing invoice
        if ($param1 == 'update' && is_numeric($param2) ) {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->update_invoice($data, $param2);
            echo $response;
        }

        // For deleting invoice
        if ($param1 == 'delete' && is_numeric($param2) ) {
            $response = $this->crud_model->delete_invoice($param2);
            echo $response;
        }

        // For editing invoice
        if ($param1 == 'student_school_fees' && is_numeric($param2) ) {
            $response = $this->student_model->get_student_school_fees($param2);
            echo $response;
        }

        // showing the list of invoices
        if ($param1 == 'invoice') {
            $page_data['invoice_id'] = $param2;
            $page_data['folder_name'] = 'school_fees';
            $page_data['page_name'] = 'invoice';
            $page_data['page_title']  = 'invoice';
            $this->load->view('backend/index', $page_data);
        }

        // showing the list of invoices
        if ($param1 == 'list') {
            $date = explode('-', $this->input->get('date'));
            $page_data['date_from'] = strtotime($date[0].' 00:00:00');
            $page_data['date_to']   = strtotime($date[1].' 23:59:59');
          
            $page_data['selected_status'] = $this->input->get('selectedStatus');
            $this->load->view('backend/superadmin/school_fees/list', $page_data);
        }
        // showing the index file
        if (empty($param1)) {
            $page_data['folder_name'] = 'school_fees';
            $page_data['page_title']  = 'invoice';
            $first_day_of_month = "1 ".date("M")." ".date("Y").' 00:00:00';
            $last_day_of_month = date("t")." ".date("M")." ".date("Y").' 23:59:59';
            $page_data['date_from']   = strtotime($first_day_of_month);
            $page_data['date_to']     = strtotime($last_day_of_month);
            
            $page_data['selected_status'] = 'all';
            $this->load->view('backend/index', $page_data);
        }
    }

    //START STUDENT ADN ADMISSION section
    public function student($param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '')
    {
        if ($param1 == 'create') {
            //form view
            if ($param2 == 'bulk') {
                $page_data['aria_expand'] = 'bulk';
                $page_data['working_page'] = 'create';
                $page_data['folder_name'] = 'student';
                $page_data['page_title'] = 'add_student';
                $this->load->view('backend/index', $page_data);
            } elseif ($param2 == 'excel') {
                $page_data['aria_expand'] = 'excel';
                $page_data['working_page'] = 'create';
                $page_data['folder_name'] = 'student';
                $page_data['page_title'] = 'add_student';
                $this->load->view('backend/index', $page_data);
            } else {
                $page_data['aria_expand'] = 'single';
                $page_data['working_page'] = 'create';
                $page_data['folder_name'] = 'student';
                $page_data['page_title'] = 'add_student';
                $this->load->view('backend/index', $page_data);
            }
        }

        //create to database
        if ($param1 == 'create_single_student') {
            $data_input = $this->input->post(NULL, TRUE);
            //TODO validate data input

            // convert date input in this format yyyy-mm-dd to date object
            $date = DateTime::createFromFormat('Y-m-d', $data_input["dob"]);
            $data_input["dob"] = $date->format('Y-m-d');
            $response = $this->user_model->single_student_create($data_input);
            echo $response;
        }

        if ($param1 == 'create_bulk_student') {
            $response = $this->user_model->bulk_student_create();
            echo $response;
        }

        if ($param1 == 'create_excel') {
            $response = $this->user_model->excel_create();
            echo $response;
        }

        // form view
        if ($param1 == 'edit') {
            //Do not change user_id_param to user_id. Another script is using that variable
            $page_data['user_id_param'] = $param2;
            $page_data['working_page'] = 'edit';
            $page_data['folder_name'] = 'student';
            $page_data['page_title'] = 'update_student_information';
            $this->load->view('backend/index', $page_data);
        }

        //updated to database
        if ($param1 == 'updated') {
            $data_input = $this->input->post(NULL, TRUE);
            $date = DateTime::createFromFormat('Y-m-d', $data_input["dob"]);
            $data_input["dob"] = $date->format('Y-m-d');

            $response = $this->user_model->student_update($data_input, $param2, $param3);
            echo $response;
        }
        //updated to database
        if ($param1 == 'id_card') {
            $page_data['student_id'] = $param2;
            $page_data['folder_name'] = 'student';
            $page_data['page_title'] = 'identity_card';
            $page_data['page_name'] = 'id_card';
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'delete') {
            $response = $this->user_model->delete_student($param2, $param3);
            echo $response;
        }

        if ($param1 == 'program_students') {
            $page_data['program_id'] = $param2;
            $this->load->view('backend/superadmin/student/program_student_list', $page_data);
        }

        if ($param1 == 'all') {
            $this->load->view('backend/superadmin/student/list');
        }

        if (empty($param1)) {
            $page_data['working_page'] = 'filter';
            $page_data['folder_name'] = 'student';
            $page_data['page_title'] = 'student_list';
            $this->load->view('backend/index', $page_data);
        }
    }
    //END STUDENT ADN ADMISSION section

    public function export_school_fees($param1 = "", $date_from = "", $date_to = "", $selected_status = "all")
    {
        //RETURN EXPORT URL
        if ($param1 == 'url') {
            $type = $this->input->post('type');
            $date = explode('-', $this->input->post('dateRange'));
            $date_from = strtotime($date[0].' 00:00:00');
            $date_to   = strtotime($date[1].' 23:59:59');
            
            $selected_status = $this->input->post('selectedStatus');
            echo route('export_school_fees/'.$type.'/'.$date_from.'/'.$date_to.'/'.$selected_status);
        }
        // EXPORT AS PDF
        if ($param1 == 'pdf' || $param1 == 'print') {
            $page_data['action']   = $param1;
            $page_data['date_from'] = $date_from;
            $page_data['date_to']   = $date_to;
            
            $page_data['selected_status'] = $selected_status;
            $html = $this->load->view('backend/superadmin/school_fees/export', $page_data, true);
            echo $html;
            $this->pdf->loadHtml($html);
            $this->pdf->set_paper("a4", "landscape");
            $this->pdf->render();

            // FILE DOWNLOADING CODES
            if ($selected_status == 'all') {
                $paymentStatusForTitle = 'paid-and-unpaid-partial';
            } else {
                $paymentStatusForTitle = $selected_status;
            }
            $fileName = 'Student_fees-'.date('d-M-Y', $date_from).'-to-'.date('d-M-Y', $date_to).'-'.$paymentStatusForTitle.'.pdf';

            if ($param1 == 'pdf') {
                $this->pdf->stream($fileName, array("Attachment" => 1));
            } else {
                $this->pdf->stream($fileName, array("Attachment" => 0));
            }
            // EXPORT AS CSV
            if ($param1 == 'csv') {
                $date_from   = $date_from;
                $date_to     = $date_to;
                
                $page_data['selected_status'] = $selected_status;
                $invoices = $this->accounting_m->get_invoice_by_date_range($date_from, $date_to,$selected_status);
                $csv_file = fopen("assets/csv_file/invoices.csv", "w");
                $header = array('Invoice-no', 'Student', 'Class', 'Invoice-Title', 'Total-Amount', 'Paid-Amount', 'Creation-Date', 'Payment-Date', 'Status');
                fputcsv($csv_file, $header);
                foreach ($invoices as $invoice) {
                    if ($invoice['updated_at'] > 0) {
                        $payment_date = date('d-M-Y', $invoice['updated_at']);
                    } else {
                        $payment_date = get_phrase('not_found');
                    }
                    $lines = array(sprintf('%08d', $invoice['id']), $invoice['first_name'] . " " . $invoice["last_name"], $invoice['program'], $invoice['title'], currency($invoice['total_amount']), currency($invoice['paid_amount']), date('d-M-Y', $invoice['created_at']), $payment_date, ucfirst($invoice['status']));
                    fputcsv($csv_file, $lines);
                }

                // FILE DOWNLOADING CODES
                if ($selected_status == 'all') {
                    $paymentStatusForTitle = 'paid-and-unpaid-partial';
                } else {
                    $paymentStatusForTitle = $selected_status;
                }
                $fileName = 'Student_fees-'.date('d-M-Y', $date_from).'-to-'.date('d-M-Y', $date_to).'-'.'-'.$paymentStatusForTitle.'.csv';
                $this->download_file('assets/csv_file/invoices.csv', $fileName);
            }
        }
    } 
  /*FUNCTION FOR DOWNLOADING A FILE*/
  function download_file($path, $name)
  {
    // make sure it's a file before doing anything!
    if(is_file($path))
    {
      // required for IE
      if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

      // get the file mime type using the file extension
      $this->load->helper('file');

      $mime = get_mime_by_extension($path);

      // Build the headers to push out the file properly.
      header('Pragma: public');     // required
      header('Expires: 0');         // no cache
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
      header('Cache-Control: private',false);
      header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
      header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: '.filesize($path)); // provide file size
      header('Connection: close');
      readfile($path); // push it out
      exit();
    }
  }

	// Expense Category
	public function expense_category($param1 = "", $param2 = "") {
		if ($param1 == 'create') {
			$response = $this->crud_model->create_expense_category();
			echo $response;
		}

		if ($param1 == 'update') {
			$response = $this->crud_model->update_expense_category($param2);
			echo $response;
		}

		if ($param1 == 'delete') {
			$response = $this->crud_model->delete_expense_category($param2);
			echo $response;
		}

		if ($param1 == 'list') {
			$this->load->view('backend/accountant/expense_category/list');
		}
		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'expense_category';
			$page_data['page_title']  = 'expense_category';
			$this->load->view('backend/index', $page_data);
		}
	}

	//Expense Manager
	public function expense($param1 = "", $param2 = "") {

		// adding expense
		if ($param1 == 'create') {
			$response = $this->crud_model->create_expense();
			echo $response;
		}

		// update expense
		if ($param1 == 'update') {
			$response = $this->crud_model->update_expense($param2);
			echo $response;
		}

		// deleting expense
		if ($param1 == 'delete') {
			$response = $this->crud_model->delete_expense($param2);
			echo $response;
		}
		// showing the list of expense
		if ($param1 == 'list') {
			$date = explode('-', $this->input->get('date'));
			$page_data['date_from'] = strtotime($date[0].' 00:00:00');
			$page_data['date_to']   = strtotime($date[1].' 23:59:59');
			$page_data['expense_category_id'] = $this->input->get('expense_category_id');
			$this->load->view('backend/accountant/expense/list', $page_data);
		}

		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'expense';
			$page_data['page_title']  = 'expense';
			$page_data['date_from']   = strtotime(date('d-M-Y', strtotime(' -30 day')).' 00:00:00');
			$page_data['date_to']     = strtotime(date('d-M-Y').' 23:59:59');
			$this->load->view('backend/index', $page_data);
		}
	}
	// ACCOUNTING SECTION ENDS

	//MANAGE PROFILE STARTS
	public function profile($param1 = "", $param2 = "") {
		if ($param1 == 'update_profile') {
			$response = $this->user_model->update_profile();
			echo $response;
		}
		if ($param1 == 'update_password') {
			$response = $this->user_model->update_password();
			echo $response;
		}

		// showing the Smtp Settings file
		if(empty($param1)){
			$page_data['folder_name'] = 'profile';
			$page_data['page_title']  = 'manage_profile';
			$this->load->view('backend/index', $page_data);
		}
	}
	//MANAGE PROFILE ENDS
     public function resit_fees($param1 = "", $param2 = ""){
        if ($param1 == 'create') {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->add_resit_fee($data);
            echo $response;
        }

        if ($param1 == 'update' && is_numeric($param2)) {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->update_resit_fee($data, $param2);
            echo $response;
        }

        if ($param1 == 'delete' && is_numeric($param2)) {
            $response = $this->accounting_m->delete_resit_fee($param2);
            echo $response;
        }

        if ($param1 == 'list') {
            $page_data['fee_id'] = $param2;
            $this->load->view('backend/superadmin/resit_fees/list', $page_data);
        }

        if (empty($param1)) {
            $page_data['folder_name'] = 'resit_fees';
            $page_data['page_title'] = 'resit_fees';
            $this->load->view('backend/index', $page_data);
        }
    }
    public function resit_fees_invoice($param1 = "", $param2 = "")
    {
        // For creating new invoice
        if ($param1 == 'single') {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->create_resit_fees_invoice($data);
            echo $response;
        }
        // For creating adding payment to invoice
        if ($param1 == 'add_payment' && is_numeric($param2) ) {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->add_payment_for_resit_fees_invoice($data, $param2);
            echo $response;
        }
        // For creating new mass invoice
        if ($param1 == 'mass') {
            $response = array(
                'status' => false,
                'notification' => get_phrase('not_implemented')
            );
            echo json_encode($response);
        }

        // For editing invoice
        if ($param1 == 'update' && is_numeric($param2) ) {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->accounting_m->update_resit_fees_invoice($data, $param2);
            echo $response;
        }

        // For deleting invoice
        if ($param1 == 'delete' && is_numeric($param2) ) {
            $response = $this->crud_model->delete_resit_fees_invoice($param2);
            echo $response;
        }

        // For editing invoice
        if ($param1 == 'student_resit_fees' && is_numeric($param2) ) {
            $response = $this->student_model->get_student_resit_fees($param2);
            echo $response;
        }

        // showing the list of invoices
        if ($param1 == 'resit_fees_invoice') {
            $page_data['resit_fees_invoice_id'] = $param2;
            $page_data['folder_name'] = 'resit_fees_invoice';
            $page_data['page_name'] = 'resit_fees_invoice';
            $page_data['page_title']  = 'resit_fees_invoice';
            $this->load->view('backend/index', $page_data);
        }

        // showing the list of invoices
        if ($param1 == 'list') {
            $date = explode('-', $this->input->get('date'));
            $page_data['date_from'] = strtotime($date[0].' 00:00:00');
            $page_data['date_to']   = strtotime($date[1].' 23:59:59');
            $page_data['selected_program'] = $this->input->get('selectedProgram');
            $page_data['selected_status'] = $this->input->get('selectedStatus');
            $this->load->view('backend/superadmin/resit_fees_invoice/list', $page_data);
        }
        // showing the index file
        if (empty($param1)) {
            $page_data['folder_name'] = 'resit_fees_invoice';
            $page_data['page_title']  = 'resit_fees_invoice';
            $first_day_of_month = "1 ".date("M")." ".date("Y").' 00:00:00';
            $last_day_of_month = date("t")." ".date("M")." ".date("Y").' 23:59:59';
            $page_data['date_from']   = strtotime($first_day_of_month);
            $page_data['date_to']     = strtotime($last_day_of_month);
            $page_data['selected_program'] = 'all';
            $page_data['selected_status'] = 'all';
            $this->load->view('backend/index', $page_data);
        }
    }

}
