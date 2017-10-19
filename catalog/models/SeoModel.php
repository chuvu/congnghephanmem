<?php

class SeoModel extends MY_Model
{
    public function getByUrl($url)
    {
        return $this->db->where('url', $url)->get('seo')->first_row();
    }
}
