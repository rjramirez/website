<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model { 

  function get_gallery_list($album) {
    $query = $this->db->query('SELECT * FROM tb_gallery WHERE album = "'.$album.'"');
	$find = array('"img_name":"', '"caption"');
	$replace = array('"href": "'.base_url().'images/gallery/', '"title"');
	$result = str_replace($find, $replace, json_encode($query->result()));
	return $result;
  }

}

?>