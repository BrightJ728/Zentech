<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Add_Lecturer_Operations_Tables extends CI_Migration{
        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'course_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                'description' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'type' => array(
                    'type' => 'VARCHAR',
                    'null' => TRUE,
                    'constraint' => '20',
                ),
                'src' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'added_by_user_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                '`created` timestamp DEFAULT CURRENT_TIMESTAMP',
                '`modified` timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                '`deleted` timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('course_resources');
          

            $this->db->query("CREATE VIEW `semesters_view` AS 
            SELECT `semesters`.*, `academic_years`.`description` AS `academic_year` FROM `semesters` 
            LEFT JOIN `academic_years` ON `semesters`.`academic_year_id` = `academic_years`.`id`"
            );
            
            // Drop old view
            $this->db->query("DROP VIEW `course_registration_view`");

            // Create new view
            $this->db->query("CREATE VIEW course_registration_view AS 
                SELECT `course_registration`.*, `students_view`.`first_name`, `students_view`.`last_name`, `students_view`.`program`, `students_view`.`level`, `semesters_view`.`academic_year` AS `academic_year`, `courses_view`.`title` AS `course_title`, `courses_view`.`code` AS `course_code`, `courses_view`.`level_id`, 
                `semesters_view`.`reporting_date_start_date`, `semesters_view`.registration_deadline, `semesters_view`.`semester`, `semesters_view`.`late_registration_deadline`, `semesters_view`.`vacation_period_start_date` 
                FROM `course_registration`
                LEFT JOIN `students_view` ON `course_registration`.`student_id` = `students_view`.`id`
                LEFT JOIN `courses_view` ON `course_registration`.`course_id` = `courses_view`.`id` 
                LEFT JOIN `semesters_view` ON `course_registration`.`semester_id` = `semesters_view`.`id`"
            );

            $this->db->query("UPDATE `menus` SET `student_access` = '1' WHERE `displayed_name` = 'courses'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '0' WHERE `displayed_name` = 'marks'");
            $this->db->query("UPDATE `menus` SET `displayed_name` = 'records', `route_name` = 'records', `unique_identifier` = 'records' WHERE `displayed_name` = 'results'");
            $this->db->query("UPDATE `menus` SET `student_access` = '1' WHERE `displayed_name` = 'exam' AND `parent` = 0");
            $this->db->query("INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, `lecturer_access`, 
            `parent_access`, `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, `unique_identifier`) 
            VALUES (NULL, 'records', 'records', '19', NULL, '1', '1', '1', '0', '0', '1', '0', '0', '20', '0', 'records');");


            // Course Records Table
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'lecturer_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                ),
                'approver_id' => array(//Auditor or approver
                    'type' => 'INT',
                    'null' => TRUE,
                    'unsigned' => TRUE,
                ),
                'student_course_registration_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'unique' => TRUE
                ),
                'class_score' => array(
                    'type' => 'DECIMAL',
                    "constraint" => "4,2",
                    'unsigned' => TRUE,
                    'null' => TRUE,
                ),
                'exam_score' => array(
                    'type' => 'DECIMAL',
                    "constraint" => "4,2",
                    'unsigned' => TRUE,
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'VARCHAR',
                    'default' => 'pending',
                    'constraint' => '20',
                ),
                'type' => array(
                    'type' => 'VARCHAR',
                    'null' => TRUE,
                    'constraint' => '20',
                ),
                '`created` timestamp DEFAULT CURRENT_TIMESTAMP',
                '`modified` timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                '`deleted` timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('student_records');

            $this->db->query("CREATE VIEW student_records_view AS 
                SELECT `student_records`.*, (student_records.class_score + student_records.exam_score) AS total_score, `course_registration_view`.`first_name`, `course_registration_view`.`last_name`, `course_registration_view`.`course_id`, `course_registration_view`.`student_id`,
                `course_registration_view`.`program`, `course_registration_view`.`level`, 
                `course_registration_view`.`academic_year`, `course_registration_view`.`academic_year_id`, 
                `course_registration_view`.`semester`,`course_registration_view`.`semester_id`, 
                `course_registration_view`.`course_title`, `course_registration_view`.`course_code`, 
                `course_registration_view`.`level_id` 
                FROM `student_records` 
                INNER JOIN `course_registration_view` ON `student_records`.`student_course_registration_id` = `course_registration_view`.`id`"
            );
        }

        public function down(){
            $this->dbforge->drop_table('course_resources', true);
            $this->dbforge->drop_table('student_records', true);
            $this->db->query("DROP VIEW IF EXISTS `student_records_view`");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'marks'");
            $this->db->query("DROP VIEW IF EXISTS `semesters_view`");
            $this->db->query("UPDATE `menus` SET `student_access` = '0' WHERE `displayed_name` = 'courses'");
            $this->db->query("UPDATE `menus` SET `displayed_name` = 'results', `route_name` = 'results', `unique_identifier` = 'results' WHERE `displayed_name` = 'records'");
        }

    }