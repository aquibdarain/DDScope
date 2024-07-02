<?php
class Admin_aboutus_model extends CI_Model
{
    public function showall()
    {
        $result = $this->db->order_by("abt_id", "ASC")->get('tbl_aboutus');
        return $result->num_rows() ? $result->result_array() : FALSE;
    }

    public function get_count()
    {
        return $this->db->count_all("tbl_aboutus");
    }
    
    public function get_aboutuspage($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('abt_id', "DESC");
        return $this->db->get("tbl_aboutus")->result_array();
    }    

    public function getaboutusById($abt_id)
    {
        return $this->db->where('abt_id', $abt_id)->get('tbl_aboutus')->row();
    }
    
    public function getaboutusByName($abt_title = FALSE, $limit = FALSE, $start = FALSE)
    {
        if($abt_title)
            $this->db->like('abt_title', $abt_title);
        if($limit && $start !== FALSE)
            $this->db->limit($limit, $start);

        $query = $this->db->get('tbl_aboutus');
        return $query->num_rows() ? $query->result_array() : FALSE;
    }

    public function addaboutus($abt_image, $abth_image)
    {
        $data = array(
            'abt_title' => $this->security->xss_clean($this->input->post('abt_title')),
            'abt_desc' => $this->security->xss_clean($this->input->post('abt_desc')),
            'abt_image' => $abt_image ?: '',
            'abth_image' => $abth_image ?: ''
        );

        return $this->db->insert('tbl_aboutus', $data) ? TRUE : FALSE;
    }

    public function editaboutus($abt_id)
    {
        return $this->db->where('abt_id', $abt_id)->get('tbl_aboutus')->row();
    }

    public function updateaboutus($abt_image, $abth_image)
    {
        $abt_id = $this->input->post('abt_id');
        $data = array(
            'abt_title' => $this->security->xss_clean($this->input->post('abt_title')),
            'abt_desc' => $this->security->xss_clean($this->input->post('abt_desc'))
        );

        if ($abt_image)
            $data['abt_image'] = $abt_image;
        if ($abth_image)
            $data['abth_image'] = $abth_image;

        return $this->db->where('abt_id', $abt_id)->update('tbl_aboutus', $data) ? TRUE : FALSE;
    }

    public function deleteaboutus($abt_id)
    {
        return $this->db->delete('tbl_aboutus', array('abt_id' => $abt_id)) ? TRUE : FALSE;
    }    
}
?>
