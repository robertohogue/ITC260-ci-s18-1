<?php
//application/views/news/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$pics_item['title'].'</h2>';
echo $pics_item['text'];

foreach($pics as $pic){

    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

    echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />";
 
}
  
$this->load->view($this->config->item('theme') . 'footer');
