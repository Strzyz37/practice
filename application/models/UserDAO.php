<?php
class UserDAO extends CI_Model
{

      public function getDT()
      {
        $this->db->select( '*' );
        $query=$this->db->get('users');
        $users=$query->result_array();
        return $users;
      }


    public function addDT($user)
    {
      $insert = $this->db->insert('users', $user);
    }

    public function updateDT($user)
    {
      $this->db->where('id', $user['id']);
      $this->db->update('users', $user);
    }
    public function deleteDT($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('users');

    }
    public function getEDT()
    {
      $this->db->select( '*' );
      $query=$this->db->get('edit');
      $users=$query->result_array();
      return $users;
    }
    public function updateEDT($user)
    {
      $this->db->where('id', $user['id']);
      $this->db->update('edit', $user);
    }
    public function addEDT($user)
    {
      $insert = $this->db->insert('edit', $user);
    }
    public function deleteEDT($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('edit');

    }
}
?>
