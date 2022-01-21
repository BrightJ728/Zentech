<?php
    if (! function_exists('upload_to_path')) {
        function upload_to_path($file_name, $path, $allowed_formats = "")
        {
            $CI	=&	get_instance();
            $CI->load->library('upload', $config);

            $config['upload_path']          = $path;
            $config['allowed_types']        = $allowed_formats;

            if( !$CI->upload->do_upload($file_name) )
            {
                $error = array('error' => $CI->upload->display_errors());
                return array(
                    "status" => false,
                    "message" => $error,
                );
            }
            else
            {
                return array(
                    "status" => true,
                    "message" => $this->upload->data(),
                );
            }
        }
    }