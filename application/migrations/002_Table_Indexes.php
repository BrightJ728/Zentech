<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Table_Indexes extends CI_Migration{
        public function up()
        {
            $this->db->trans_start();
            $this->db->query("ALTER TABLE `academic_years` ADD PRIMARY KEY (`id`), ADD UNIQUE( `description`)");

            $this->db->query("ALTER TABLE `addons` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `books` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `book_issues` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `classes` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `class_rooms` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `courses` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `currencies` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `daily_attendances` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `departments` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `enrols` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `event_calendars` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `exams` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `expenses` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `expense_categories` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `frontend_events` ADD PRIMARY KEY (`frontend_events_id`);");

            $this->db->query("ALTER TABLE `frontend_gallery` ADD PRIMARY KEY (`frontend_gallery_id`);");

            $this->db->query("ALTER TABLE `frontend_gallery_image` ADD PRIMARY KEY (`frontend_gallery_image_id`);");

            $this->db->query("ALTER TABLE `frontend_settings` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `grades` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `invoices` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `lecturers` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `lecturer_permissions` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `marks` ADD PRIMARY KEY (`id`);");

            $this->db->query("ALTER TABLE `menus` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `noticeboard` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `payment_settings` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `programs` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `relationships` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `routines` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `schools` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `sections` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `sessions` ADD PRIMARY KEY (`id`), ADD KEY `name` (`name`) USING BTREE;");
            
            $this->db->query("ALTER TABLE `settings` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `smtp_settings` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `students` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `subjects` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `syllabuses` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `users` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `year_levels` ADD PRIMARY KEY (`id`);");
            
            $this->db->query("ALTER TABLE `academic_years` MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `addons` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `books` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `book_issues` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `classes` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `class_rooms` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `courses` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `currencies` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;");
            
            $this->db->query("ALTER TABLE `daily_attendances`  MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `departments` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `enrols` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `event_calendars` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `exams` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `expenses` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `expense_categories` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `frontend_events` MODIFY `frontend_events_id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `frontend_gallery` MODIFY `frontend_gallery_id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `frontend_gallery_image` MODIFY `frontend_gallery_image_id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `frontend_settings` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
            
            $this->db->query("ALTER TABLE `grades` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `invoices` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `lecturers` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `lecturer_permissions`  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `marks` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `menus` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;");
            
            $this->db->query("ALTER TABLE `noticeboard` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `payment_settings` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;");
            
            $this->db->query("ALTER TABLE `programs` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `relationships` MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;");
            
            $this->db->query("ALTER TABLE `routines` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `schools` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
                
            $this->db->query("ALTER TABLE `sections` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
            
            $this->db->query("ALTER TABLE `sessions` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
            
            $this->db->query("ALTER TABLE `settings` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
            
            $this->db->query("ALTER TABLE `smtp_settings` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `students` MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `subjects` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `syllabuses` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;");
            
            $this->db->query("ALTER TABLE `users` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");
            
            $this->db->query("ALTER TABLE `users` ADD UNIQUE(`email`);");

            $this->db->query("ALTER TABLE `users` ADD UNIQUE(`phone`);");
            
            $this->db->query("ALTER TABLE `year_levels` MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;");
            
            $this->db->trans_complete();
        }

        public function down(){
            
        }

    }