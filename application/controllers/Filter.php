<?php
class Filter extends Application
{
        public function actor($filter = FILTER_All)
        {
            $this->session->set_userdata('filter',$filter);
            redirect($_SERVER['HTTP_REFERER']); // back where we came from
        }
}
?>