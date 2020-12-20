<?php

class M_dataset extends CI_Model
{
    public function getData()
    {
        return $this->db->get('data_latih')->result_array();
    }

    public function save_data($length)
    {
        for ($i = 1; $i <= $length; $i++) { // loop to retrieve all data
            $data = [
                'umur' => $this->input->post('umur' . $i),
                'pendapatan' => $this->input->post('pendapatan' . $i),
                'pelajar' => $this->input->post('pelajar' . $i),
                'rating' => $this->input->post('rating' . $i),
                'beli' => $this->input->post('beli' . $i)
            ];

            $query = $this->db->insert('data_latih', $data);
        }

        return $this->db->affected_rows($query); // return affected rows (-1, 1)
    }

    public function getBeli($beli = false)
    {
        if ($beli == false) {
            return count($this->db->query("SELECT beli FROM data_latih")->result_array());
        } else {
            return count($this->db->query("SELECT beli FROM data_latih WHERE beli = " . $beli . " ")->result_array());
        }
    }

    public function getUmur($umur, $beli)
    {
        return count($this->db->query("SELECT umur FROM data_latih WHERE umur = " . $umur . " && beli = " . $beli . " ")->result_array());
    }

    public function getPendapatan($pendapatan, $beli)
    {
        return count($this->db->query("SELECT pendapatan FROM data_latih WHERE pendapatan = " . $pendapatan . " && beli = " . $beli . " ")->result_array());
    }

    public function getPelajar($pelajar, $beli)
    {
        return count($this->db->query("SELECT pelajar FROM data_latih WHERE pelajar = " . $pelajar . " && beli = " . $beli . " ")->result_array());
    }

    public function getRating($rating, $beli)
    {
        return count($this->db->query("SELECT rating FROM data_latih WHERE rating = " . $rating . " && beli = " . $beli . " ")->result_array());
    }
}
