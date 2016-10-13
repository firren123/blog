<?php
class FDFS{
 
    public  function __construct(){
        $this->tracker = fastdfs_tracker_get_connection();
        $this->server = fastdfs_connect_server($this->tracker['ip_addr'], $this->tracker['port']);
        // $this->storage = fastdfs_tracker_query_storage_store();
        //  var_dump($this->storage);
        // echo 'bbbbbbbbb44444bb';
 
        // $this->server = fastdfs_connect_server($this->storage['ip_addr'], $this->storage['port']);
        //  var_dump($this->server);
        // echo 'bbbb5555bb';
        // if (!$this->server){
        //     echo ("errno1: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info());
        //     exit(1);
        // }
        $this->storage['sock'] = $this->server['sock'];
 
    }
 
    public  function fdfs_upload($input_name){
        echo $input_name.'cccccccccccccc';
        $file_tmp = $_FILES[$input_name]['tmp_name'];
        $real_name = $_FILES[$input_name]['name'];
       echo  $file_name = dirname($file_tmp)."/".$real_name;
        //@copy($file_tmp, $file_name);
        @rename($file_tmp, $file_name);
        var_dump($filename);
        $file_info = fastdfs_storage_upload_by_filename($file_name, null, array(), null, $this->tracker, $this->storage);
        print_r($file_info);die;
        if($file_info){
            $group_name = $file_info['group_name'];
            $remote_filename = $file_info['filename'];
 
            $i = fastdfs_get_file_info($group_name, $remote_filename);
            $storage_ip = $i['source_ip_addr'];
            //var_dump($file_info);
            return array($remote_filename, $group_name, $storage_ip, $real_name);
        }
        return false;
    }
 
    public function fdfs_down($group_name, $file_id){
        $file_content = fastdfs_storage_download_file_to_buff($group_name, $file_id);
        return $file_content;
    }
 
    public  function fdfs_del($group_name, $file_id){
        fastdfs_storage_delete_file($group_name, $file_id);
    }
}
 
?>