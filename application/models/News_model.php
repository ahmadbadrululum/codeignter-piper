<?php
class News_model extends CI_Model
{

    public function __construct() {
        $this->load->database();
    }

    public function getNews( $slug = false)
    {
        if ($slug == NULL) {    
        $query = $this->db->get('news');
        return $query->result_array();
        }

        $query = $this->db->get_where('news', ['slug' => $slug]);
        return $query->row_array();
    }

    public function getNewsId($id = FALSE){
        $query = $this->db->get_where('news', ['id' => $id]);
        return $query->row_array();
      }

    public function createNews(){
        $this->load->helper('url');
    
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
    
        $data = array(
          'title' => $this->input->post('title'),
          'text' => $this->input->post('text'),
          'slug' => $slug
        );
    
        return $this->db->insert('news', $data);
      }

    public function updateNews($id){
        $this->load->helper('url');
    
        $slug = url_title($this->input->post('title'), 'dash', true);
    
        $data = array(
          'title' => $this->input->post('title'),
          'text' => $this->input->post('text'),
          'slug' => $slug
        );

        $this->db->where('id', $id);    
        return $this->db->update('news', $data);
    }

    public function deleteNews($id)
    {
        $delete = $this->db->where('id', $id);    
        return $this->db->delete('news', $delete );
    }

    
}