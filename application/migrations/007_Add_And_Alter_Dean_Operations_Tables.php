<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Add_and_alter_dean_operations_tables extends CI_Migration{
    public function up()
    {
        $fields = array(
            'dean_access' => 
                array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'default' => '0'
                ),

            );
        
        $this->dbforge->add_column('menus', $fields);

        $this->db->query("UPDATE menus SET menus.dean_access = menus.lecturer_access");
        $this->db->query("UPDATE `menus` SET `status` = '0' WHERE `displayed_name` = 'marks'");
        $this->db->query("INSERT INTO `menus` (`displayed_name`, `route_name`, `parent`,
            `status`, `superadmin_access`, `admin_access`, `lecturer_access`, `parent_access`, 
            `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, 
            `unique_identifier`, `dean_access`) 
            VALUES ('dean', 'dean', '1', '1', '1', '1', '0', '0', '0', '0', '0', '31', '0', 'dean', '0');
        ");
        $this->db->query("INSERT INTO `menus` (`displayed_name`, `route_name`, `parent`,
            `status`, `superadmin_access`, `admin_access`, `lecturer_access`, `parent_access`, 
            `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, 
            `unique_identifier`, `dean_access`) 
            VALUES ('vetting', 'vetting', '19', '1', '0', '0', '0', '0', '0', '0', '0', '15', '0', 'vetting', '1');
        ");

        $this->db->query("INSERT INTO `menus` 
            (`displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, `lecturer_access`, 
            `parent_access`, `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, `unique_identifier`, `dean_access`) 
            VALUES ('grading_scheme', 'grading_scheme', '62', NULL, '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', 'grading_scheme', '0');
        ");
        $this->db->query("INSERT INTO `menus` (`displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, 
        `lecturer_access`, `parent_access`, `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, `unique_identifier`, `dean_access`) 
        VALUES ( 'promotions', 'promotions', '9', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '30', '0', 'promotions', '1');");

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'department_id' => array(
                'type' => 'VARCHAR',
                'nulls' => true,
                'constraint' => '255',
            ),
            'designation' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'nulls' => true,
                'constraint' => '10',
            ),
            'school_id' => array(
                'type' => 'INT',
                'nulls' => true,
                'unsigned' => TRUE,
            ),
            'lecturer_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => '3',
            ),
            'social_links' => array(
                'type' => 'TEXT',
            ),
            'about' => array(
                'type' => 'TEXT',
            ),
            'show_on_website' => array(
                'type' => 'INT',
                'default' => 0,
                'constraint' => 1,
            ),
            'created timestamp DEFAULT CURRENT_TIMESTAMP',
            'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'deleted timestamp DEFAULT NULL',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('deans');

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'grade' => array(
                'type' => 'VARCHAR',
                'nulls' => TRUE,
                'constraint' => '5',
                'unique' => TRUE,
            ),
            'upper_bound' => array(
                'type' => 'DECIMAL',
                'unsigned' => TRUE,
                'nulls' => TRUE,
                'constraint' => '10',
                'constraint' => '5,2',
            ),
            'lower_bound' => array(
                'type' => 'DECIMAL',
                'nulls' => TRUE,
                'unsigned' => TRUE,
                'constraint' => '4,2',
            ),
            'last_updated_by' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'created timestamp DEFAULT CURRENT_TIMESTAMP',
            'modified timestamp on update CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'deleted timestamp DEFAULT NULL',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('grading_schemes');
        
    }

    public function down(){
        $this->dbforge->drop_column('menus', 'dean_access');
        $this->db->query("DELETE FROM `menus` WHERE `menus`.`displayed_name` = 'grading_scheme'");
        $this->db->query("DELETE FROM `menus` WHERE `menus`.`displayed_name` = 'vetting'");
        $this->db->query("DELETE FROM `menus` WHERE `menus`.`displayed_name` = 'dean'");
        $this->db->query("DELETE FROM `menus` WHERE `menus`.`displayed_name` = 'promotions'");
        $this->dbforge->drop_table('deans', true);
        $this->dbforge->drop_table('grading_schemes', true);
    }

}