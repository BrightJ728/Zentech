<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Fees_table_alters extends CI_Migration{
        public function up()
        {
            $this->db->trans_start();


            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'academic_year_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                'currency_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                ),
                'department_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                ),
                'year_level_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                ),
                'amount' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '8,2',
                ),
                'student_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                ),
                'created timestamp DEFAULT CURRENT_TIMESTAMP',
                'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'deleted timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('school_fees');
            $this->db->query("ALTER TABLE `school_fees` ADD UNIQUE( `academic_year_id`, `student_type`, `department_id`, `year_level_id`);");

            $this->dbforge->add_field(array(
                'student_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10',
                    'unique' => TRUE,
                ),
                'currency_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                )
            ));
            $this->dbforge->add_key('student_type', TRUE);
            $this->dbforge->create_table('school_fees_currencies');
            $this->db->query("INSERT INTO `school_fees_currencies` (`student_type`, `currency_id`) VALUES ('local', '38'), ('foreign', '2');");

            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'academic_year_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                'currency_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                ),
                'amount' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '8,2',
                ),
                'student_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                ),
                'created timestamp DEFAULT CURRENT_TIMESTAMP',
                'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'deleted timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('resit_fees');

            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'invoice_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                'student_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'currency_id' => array(
                    'type' => 'INT',
                    'constraint' => '5',
                    'unsigned' => TRUE,
                ),
                'amount' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '8,2',
                ),
                'payment_channel' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                ),
                'receiver_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'created timestamp DEFAULT CURRENT_TIMESTAMP',
                'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'deleted timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('invoice_payments');

            $this->db->query("INSERT INTO 
                `menus` (`displayed_name`, `route_name`, `parent`, 
                `icon`, `status`, `superadmin_access`, `admin_access`, 
                `lecturer_access`, `parent_access`, `student_access`, 
                `accountant_access`, `librarian_access`, `sort_order`, 
                `is_addon`, `unique_identifier`) 
                VALUES ('school_fees', 'fees', '24', NULL, '1', '1', '1', '0', '0', '0', '0', '0', '50', '0', 'school-fees');"
            );

            $fields = array(
                'fee_part_payment_percent' => 
                    array(
                        'type' => 'DECIMAL',
                        'constraint' => '6,2'
                    )
            );
            $this->dbforge->add_column('schools', $fields);

            $fields = array(
                'status' => 
                    array(
                        'type' => 'VARCHAR',
                        'constraint' => '15',
                        'unsigned' => TRUE,
                        'default' => 'active'
                    ),
                'level_id' => 
                    array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'constraint' => '5',
                    )

            );
            $this->dbforge->add_column('students', $fields);

            $fields = array(
                'amount_currency_id' => 
                    array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'constraint' => '5',
                    ),
                'academic_year_id' => 
                    array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'constraint' => '5',
                    ),
                'department_id' => 
                    array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'constraint' => '5',
                    ),
                'type' => 
                    array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                    ),
                'description' => 
                    array(
                        'type' => 'VARCHAR',
                        'constraint' => '500',
                    ),

            );
            $this->dbforge->add_column('invoices', $fields);
            $this->db->query("ALTER TABLE `invoices` ADD UNIQUE( `student_id`, `type`, `academic_year_id`)");
            $this->dbforge->drop_column('invoices', 'class_id');
            
            $this->db->trans_complete();
        }

        public function down(){
            $this->db->trans_start();
            $this->dbforge->drop_table('school_fees', true);
            $this->dbforge->drop_table('school_fees_currencies', true);
            $this->dbforge->drop_table('resit_fees', true);
            $this->dbforge->drop_table('student_fees_payments', true);
            $this->dbforge->drop_table('academic_years', true);
            $this->db->query("DELETE FROM `menus` WHERE `displayed_name` = 'school_fees'");
            
            $this->dbforge->drop_column('schools', 'fee_part_payment_percent');
            $this->dbforge->drop_column('students', 'status');
            $this->dbforge->drop_column('students', 'level_id');
            $this->dbforge->drop_column('invoices', 'amount_currency_id');

            $fields = array(
                'amount_currency_id' => 
                    array(
                        'type' => 'INT',
                        'constraint' => '5',
                    ),

            );
            $this->dbforge->add_column('invoices', $fields);
            $this->db->trans_complete();
        }

    }