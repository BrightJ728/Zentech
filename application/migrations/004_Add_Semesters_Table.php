<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Add_Semesters_Table extends CI_Migration{
        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'academic_year_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '5',
                ),
                'semester' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '1',
                ),
                'reporting_date_start_date' => array(
                    'type' => 'DATE',
                ),
                'reporting_date_end_date' => array(
                    'type' => 'DATE',
                ),
                'teaching_begins' => array(
                    'type' => 'DATE',
                ),
                'registration_deadline' => array(
                    'type' => 'DATE',
                ),
                'late_registration_deadline' => array(
                    'type' => 'DATE',
                ),
                'mid_semester_exams_start_date' => array(
                    'type' => 'DATE',
                ),
                'mid_semester_exams_end_date' => array(
                    'type' => 'DATE',
                ),
                'teaching_ends' => array(
                    'type' => 'DATE',
                ),
                'revision_period_start_date' => array(
                    'type' => 'DATE',
                ),
                'revision_period_end_date' => array(
                    'type' => 'DATE',
                ),
                'final_semester_exams_start_date' => array(
                    'type' => 'DATE',
                ),
                'final_semester_exams_end_date' => array(
                    'type' => 'DATE',
                ),
                'vacation_period_start_date' => array(
                    'type' => 'DATE',
                ),
                'vacation_period_end_date' => array(
                    'type' => 'DATE',
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('semesters');
            $this->db->query("ALTER TABLE `semesters` ADD UNIQUE( `academic_year_id`, `semester`);");

            $this->db->query("CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC"
            );

            $this->db->query("CREATE VIEW `school_fees_view` AS 
                SELECT `school_fees`.*,`currencies`.`name` AS `currency_name`,
                `currencies`.`symbol` AS `currency_symbol`,
                `departments`.`name` AS `department`,
                `year_levels`.`name` AS `year_level`,
                `academic_years`.`description` AS `academic_year` 
                FROM `school_fees` 
                LEFT JOIN `academic_years` on `school_fees`.`academic_year_id` = `academic_years`.`id`
                LEFT JOIN `year_levels` on `school_fees`.`year_level_id` = `year_levels`.`id`
                LEFT JOIN `currencies` on `school_fees`.`currency_id` = `currencies`.`id`
                LEFT JOIN `departments` on `school_fees`.`department_id` = `departments`.`id`"
            );

            $this->db->query("CREATE VIEW `students_view` 
                AS SELECT `students`.*, `users`.`name`, `users`.`email`, `users`.`address`, `users`.`phone`, `users`.`gender`, `users`.`role`, `programs`.`description` AS `program`, `year_levels`.`name` AS `level`
                FROM `students`  
                LEFT JOIN `users` ON `users`.`id` = `students`.`user_id` 
                LEFT JOIN `year_levels` ON `year_levels`.`id` = `students`.`level_id` 
                LEFT JOIN `programs` ON `students`.`program_id` = `programs`.`id`"
            );

            $this->db->query("CREATE VIEW `invoices_view` AS 
                SELECT `invoices`.*, `students_view`.`first_name`, 
                `students_view`.`last_name`, `students_view`.`program`, 
                `students_view`.`level`,
                 `academic_years`.`description` AS `academic_year`, 
                 `currencies`.`symbol` AS `currency_symbol` 
                FROM `invoices`
                LEFT JOIN `academic_years` ON `invoices`.`academic_year_id` = `academic_years`.`id`
                LEFT JOIN `students_view` ON `invoices`.`student_id` = `students_view`.`id` 
                LEFT JOIN `currencies` ON `invoices`.`amount_currency_id` = `currencies`.`id`"
            );

            $this->db->query("CREATE VIEW invoice_payments_view AS 
                SELECT `invoice_payments`.*, `currencies`.`symbol` AS `currency`, 
                `users`.`name` AS `receiver_by_name` FROM `invoice_payments` 
                LEFT JOIN  `currencies` ON `currencies`.`id` = `invoice_payments`.`currency_id`
                LEFT JOIN `users` ON `users`.`id` = `invoice_payments`.`receiver_id`"
            );
            $this->db->query("CREATE VIEW academic_years_view AS SELECT * FROM `academic_years` ORDER BY `description`  ASC ");
        }

        public function down(){
            $this->dbforge->drop_table('semesters', true);
            $this->db->query("DROP VIEW `fee_currencies_view`");
            $this->db->query("DROP VIEW `school_fees_view`");
            $this->db->query("DROP VIEW `students_view`");
            $this->db->query("DROP VIEW `invoices_view`");
            $this->db->query("DROP VIEW `academic_years_view`");
            $this->db->query("DROP VIEW `invoice_payments_view`");
        }

    }