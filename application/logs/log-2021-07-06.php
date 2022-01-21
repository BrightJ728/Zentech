<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-06 14:28:14 --> Query error: Table 'student_portal.ci_sessions' doesn't exist - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'rk3hj40cjrfg0fmm3is07ja7et970loi'
ERROR - 2021-07-06 14:28:14 --> Severity: Warning --> session_write_close(): Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2021-07-06 14:28:14 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: /var/lib/php/sessions) Unknown 0
ERROR - 2021-07-06 14:48:24 --> Query error: Not unique table/alias: 'programs' - Invalid query: CREATE VIEW `students_view` 
                AS SELECT `students`.*, `users`.`name`, `users`.`email`, `users`.`address`, `users`.`phone`, `users`.`gender`, `users`.`role`, `programs`.`description` AS `program`, `year_levels`.`name` AS `level`
                FROM `students`  
                LEFT JOIN `users` ON `users`.`id` = `students`.`user_id` 
                LEFT JOIN `year_levels` ON `year_levels`.`id` = `students`.`level_id` 
                LEFT JOIN `programs` ON `students`.`program_id` = `programs`.`id`
                LEFT JOIN `programs` ON `students`.`program_id` = `programs`.`id` 
ERROR - 2021-07-06 14:52:44 --> Query error: Table 'fee_currencies_view' already exists - Invalid query: CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC
ERROR - 2021-07-06 14:53:17 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:53:19 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:53:21 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:30 --> Query error: Table 'school_fees_view' already exists - Invalid query: CREATE VIEW `school_fees_view` AS 
                SELECT `school_fees`.*,`currencies`.`name` AS `currency_name`,
                `currencies`.`symbol` AS `currency_symbol`,
                `departments`.`name` AS `department`,
                `year_levels`.`name` AS `year_level`,
                `academic_years`.`description` AS `academic_year` 
                FROM `school_fees` 
                LEFT JOIN `academic_years` on `school_fees`.`academic_year_id` = `academic_years`.`id`
                LEFT JOIN `year_levels` on `school_fees`.`year_level_id` = `year_levels`.`id`
                LEFT JOIN `currencies` on `school_fees`.`currency_id` = `currencies`.`id`
                LEFT JOIN `departments` on `school_fees`.`department_id` = `departments`.`id`
ERROR - 2021-07-06 14:54:32 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:34 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:35 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:35 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:36 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:36 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:36 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:54:37 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:04 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:06 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:06 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:34 --> Query error: Table 'fee_currencies_view' already exists - Invalid query: CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC
ERROR - 2021-07-06 14:55:37 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:38 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:39 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:39 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:39 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:40 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:40 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:40 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:40 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:55:43 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:56:19 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:57:27 --> Query error: Table 'fee_currencies_view' already exists - Invalid query: CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC
ERROR - 2021-07-06 14:58:09 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:58:11 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:58:11 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:58:12 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:58:12 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 14:58:12 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:11 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:12 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:13 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:13 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:13 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:13 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:14 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:14 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:14 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:15 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:15 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:15 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:16 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:16 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:16 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:17 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:18 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:18 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:19 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:20 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:20 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:21 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:22 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:23 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:23 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:24 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:25 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:01:25 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:04:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'student_portal' /var/www/html/student_portal/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-06 15:04:08 --> Unable to connect to the database
ERROR - 2021-07-06 15:04:35 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'student_portal' /var/www/html/student_portal/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-06 15:04:35 --> Unable to connect to the database
ERROR - 2021-07-06 15:04:36 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'student_portal' /var/www/html/student_portal/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-06 15:04:36 --> Unable to connect to the database
ERROR - 2021-07-06 15:06:39 --> Query error: Table 'student_portal.ci_sessions' doesn't exist - Invalid query: SELECT 1
FROM `ci_sessions`
WHERE `id` = '4frelok1kltemta4d1kgnirua2umgmlu'
ERROR - 2021-07-06 15:06:45 --> Query error: Table 'student_portal.ci_sessions' doesn't exist - Invalid query: SELECT 1
FROM `ci_sessions`
WHERE `id` = '4frelok1kltemta4d1kgnirua2umgmlu'
ERROR - 2021-07-06 15:06:46 --> Query error: Table 'student_portal.ci_sessions' doesn't exist - Invalid query: SELECT 1
FROM `ci_sessions`
WHERE `id` = '4frelok1kltemta4d1kgnirua2umgmlu'
ERROR - 2021-07-06 15:06:46 --> Query error: Table 'student_portal.ci_sessions' doesn't exist - Invalid query: SELECT 1
FROM `ci_sessions`
WHERE `id` = '4frelok1kltemta4d1kgnirua2umgmlu'
ERROR - 2021-07-06 15:10:59 --> Query error: Not unique table/alias: 'programs' - Invalid query: CREATE VIEW `students_view` 
                AS SELECT `students`.*, `users`.`name`, `users`.`email`, `users`.`address`, `users`.`phone`, `users`.`gender`, `users`.`role`, `programs`.`description` AS `program`, `year_levels`.`name` AS `level`
                FROM `students`  
                LEFT JOIN `users` ON `users`.`id` = `students`.`user_id` 
                LEFT JOIN `year_levels` ON `year_levels`.`id` = `students`.`level_id` 
                LEFT JOIN `programs` ON `students`.`program_id` = `programs`.`id`
                LEFT JOIN `programs` ON `students`.`program_id` = `programs`.`id` 
ERROR - 2021-07-06 15:11:56 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:23:55 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:24:21 --> Query error: Table 'fee_currencies_view' already exists - Invalid query: CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC
ERROR - 2021-07-06 15:24:46 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:25:07 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:26:20 --> Query error: Table 'school_fees_view' already exists - Invalid query: CREATE VIEW `school_fees_view` AS 
                SELECT `school_fees`.*,`currencies`.`name` AS `currency_name`,
                `currencies`.`symbol` AS `currency_symbol`,
                `departments`.`name` AS `department`,
                `year_levels`.`name` AS `year_level`,
                `academic_years`.`description` AS `academic_year` 
                FROM `school_fees` 
                LEFT JOIN `academic_years` on `school_fees`.`academic_year_id` = `academic_years`.`id`
                LEFT JOIN `year_levels` on `school_fees`.`year_level_id` = `year_levels`.`id`
                LEFT JOIN `currencies` on `school_fees`.`currency_id` = `currencies`.`id`
                LEFT JOIN `departments` on `school_fees`.`department_id` = `departments`.`id`
ERROR - 2021-07-06 15:27:33 --> Query error: Table 'fee_currencies_view' already exists - Invalid query: CREATE VIEW `fee_currencies_view` AS 
                SELECT `school_fees_currencies`.`student_type`, `currencies`.* 
                FROM `school_fees_currencies` 
                LEFT JOIN `currencies` 
                ON `school_fees_currencies`.`currency_id` = `currencies`.`id`
                ORDER by student_type DESC
ERROR - 2021-07-06 15:27:35 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:27:36 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:27:37 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:27:38 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:27:38 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 15:27:38 --> Query error: Table 'semesters' already exists - Invalid query: CREATE TABLE `semesters` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`academic_year_id` INT(5) UNSIGNED NOT NULL,
	`semester` INT(1) UNSIGNED NOT NULL,
	`reporting_date_start_date` DATE NOT NULL,
	`reporting_date_end_date` DATE NOT NULL,
	`teaching_begins` DATE NOT NULL,
	`registration_deadline` DATE NOT NULL,
	`late_registration_deadline` DATE NOT NULL,
	`mid_semester_exams_start_date` DATE NOT NULL,
	`mid_semester_exams_end_date` DATE NOT NULL,
	`teaching_ends` DATE NOT NULL,
	`revision_period_start_date` DATE NOT NULL,
	`revision_period_end_date` DATE NOT NULL,
	`final_semester_exams_start_date` DATE NOT NULL,
	`final_semester_exams_end_date` DATE NOT NULL,
	`vacation_period_start_date` DATE NOT NULL,
	`vacation_period_end_date` DATE NOT NULL,
	CONSTRAINT `pk_semesters` PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-07-06 19:42:50 --> Severity: Notice --> Undefined index: email /var/www/html/student_portal/application/controllers/Login.php 66
ERROR - 2021-07-06 19:43:19 --> Severity: Notice --> Undefined index: email /var/www/html/student_portal/application/controllers/Login.php 66
ERROR - 2021-07-06 15:46:47 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:50:39 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:50:42 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:55:00 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:55:01 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:55:02 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:55:08 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 15:59:06 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:00:11 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:00:13 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:07:44 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:07:49 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:07:52 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:08:05 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:08:16 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:08:33 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:08:59 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:09:02 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:09:04 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:14:59 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:08 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:10 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:12 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:13 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:16 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:51 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:56 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:58 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:15:59 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:16:06 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:16:09 --> 404 Page Not Found: Superadmin/course_registration
ERROR - 2021-07-06 16:19:47 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:19:51 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:19:52 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:19:54 --> 404 Page Not Found: Superadmin/course_registration
ERROR - 2021-07-06 16:20:43 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:33 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:33 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:41 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:43 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:45 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:21:53 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:24:46 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 16:24:46 --> 404 Page Not Found: Assets/backend
ERROR - 2021-07-06 19:37:46 --> 404 Page Not Found: Assets/backend
