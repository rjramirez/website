<?php
Class User_Model extends CI_Model
{

  function __construct()
  {
      parent::__construct();
  }

 public function login($email, $password)
 {

   $encryptedPass = sha1($password);
   $queryEmailExist = $this->db->query('select * from tb_members where email = "'.$email.'"');
   $queryMatchEmailPass = $this->db->query('select studentNo, firstName, email, password from tb_members
    where email = "'.$email.'" and password = "'.$encryptedPass.'" limit 1');

   $this->load->helper('email');

     if(valid_email($email) AND $password){
       if($queryEmailExist->num_rows() == 0){
        return 1;
       }else{//Tama ang E-Mail
          if($queryMatchEmailPass->num_rows() == 1){
           return $queryMatchEmailPass->result();
          }else{ 
           return 0;
          }
       }
     }else{
      return "2";
     }
 }

 public function show_all()
 {

    $data = $this->db->query('select studentNo, lastName, firstName, middlename, email from tb_members');
    
    $output['aaData'] = $data->result(); 

    return $output;

 }

 public function register_user($studentno, $firstname, $lastname, $middlename, $email, $password)
 {
    $this->load->helper('date');
    $datestring = "%Y";
    $data = array(
               'studentNo' => $studentno,
               'firstName' => $firstname,
               'lastName' => $lastname,
               'middleName' => $middlename,
               'email' => $email,
               'password' => $password,
               'role' => "User",
               'yearOfMemLocal' => mdate($datestring)
            );

    $this->db->insert('tb_members', $data);

    return $this->db->affected_rows();

 }
}
?>