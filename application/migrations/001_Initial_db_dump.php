<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Initial_db_dump extends CI_Migration{
        public function up()
        {
            $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
            $tables = $this->db->list_tables();
            foreach ($tables as $table)
            {
                if($table === "migrations")
                    continue;
                $this->dbforge->drop_table($table, TRUE);
            }

			// Name of the file
			$filename = dirname(__FILE__) . '../../../db_dump/initial_db.sql';
			// Temporary variable, used to store current query
			$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line
			foreach ($lines as $line)
			{
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;

				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					$this->db->query($templine);
					// Reset temp variable to empty
					$templine = '';
				}
			}
        }

        public function down(){
            $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
            $tables = $this->db->list_tables();
            foreach ($tables as $table)
            {
                $this->dbforge->drop_table($table);
            }
        }

    }