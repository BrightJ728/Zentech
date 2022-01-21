<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Add_Course_Registration_Tables extends CI_Migration{
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
                'course_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'student_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'semester_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '3',
                ),
                'created timestamp DEFAULT CURRENT_TIMESTAMP',
                'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'deleted timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('course_registration');
            $this->db->query("ALTER TABLE `course_registration` ADD UNIQUE( `academic_year_id`, `course_id`,  `student_id`);");
            
            $this->db->query("INSERT INTO 
                `menus` (`displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, `lecturer_access`, `parent_access`,
                `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, `unique_identifier`)
                VALUES ('course_registration', 'course_registration', '9', NULL, '1', '1', '1', '0', '0', '1', '0', '0', '29', '0', 'course-registration');");
            
            $this->db->query("CREATE VIEW course_registration_view AS 
                SELECT `course_registration`.*, `students_view`.`first_name`, `students_view`.`last_name`, `students_view`.`program`, `students_view`.`level`, 
                `academic_years_view`.`description` AS `academic_year`, courses_view.title AS course_title, courses_view.code AS course_code, `courses_view`.`level_id`, 
                `semesters`.`reporting_date_start_date`, semesters.registration_deadline, `semesters`.`semester`, `semesters`.`late_registration_deadline`, `semesters`.`vacation_period_start_date` 
                FROM `course_registration`
                LEFT JOIN `students_view` ON course_registration.`student_id` = `students_view`.`id`
                LEFT JOIN `academic_years_view` ON `course_registration`.`academic_year_id` = `academic_years_view`.`id` 
                LEFT JOIN `courses_view` ON `course_registration`.`course_id` = `courses_view`.`id` 
                LEFT JOIN `semesters` ON `course_registration`.`semester_id` = `semesters`.`id`"
            );
            
            $this->db->query("UPDATE `menus` SET `student_access` = '0'");
            $this->db->query("UPDATE `menus` SET `student_access` = '1' WHERE `displayed_name` = 'course_registration'");
            $this->db->query("UPDATE `menus` SET `student_access` = '1' WHERE `displayed_name` = 'proof_of_registration'");
            $this->db->query("UPDATE `menus` SET `student_access` = '1' WHERE `displayed_name` = 'academic'");

            $this->db->query("UPDATE `menus` SET `lecturer_access` = '0'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'courses'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'student'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'exam'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'marks'");
            $this->db->query("UPDATE `menus` SET `lecturer_access` = '1' WHERE `displayed_name` = 'academic'");

            


            // Lecturer Courses Table
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'lecturer_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'course_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => '10',
                ),
                'start_date' => array(
                    'type' => 'DATE',
                    'default' => NULL,
                ),
                'end_date' => array(
                    'type' => 'DATE',
                    'default' => NULL,
                ),
                'created timestamp DEFAULT CURRENT_TIMESTAMP',
                'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'deleted timestamp DEFAULT NULL',
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('lecturer_courses');

            //Create view for table
            $this->db->query("CREATE VIEW lecturer_courses_view AS 
            SELECT lecturer_courses.*, courses.code, courses.title 
            FROM `lecturer_courses` 
            LEFT JOIn courses ON lecturer_courses.course_id = courses.id
            WHERE end_date IS NULL");
            $this->db->query("DELETE FROM `menus` WHERE displayed_name = 'lecturer_permission'");
            $this->db->query("UPDATE `menus` SET `route_name` = 'courses' WHERE displayed_name = 'courses'");
        }

        public function down(){
            $this->dbforge->drop_table('course_registration', true);
            $this->db->query("DROP VIEW `course_registration_view`");

            $this->db->query("DELETE FROM `menus` WHERE `displayed_name` = 'course_registration'");

            $this->dbforge->drop_table('lecturer_courses', true);
            $this->db->query("DROP VIEW `lecturer_courses_view`");
        }

    }