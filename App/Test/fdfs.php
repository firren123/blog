    <?php  
    $tracker = fastdfs_tracker_get_connection();  
      
    if(!fastdfs_active_test($tracker))  
    {  
            error_log("errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info());  
            exit(1);  
    }  
    $storage = fastdfs_tracker_query_storage_store();  
    if(!$storage)  
    {  
            error_log("errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info());  
            exit(1);  
    }  
      
    $original_file1 = "/data/tools/85542.jpg";  
      
    $original_uploaded_info = fastdfs_storage_upload_by_filename($original_file1, null, array(), null, $tracker, $storage);  
      
    print_r($original_uploaded_info);  
    ?>  