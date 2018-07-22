<?php
//appliaction/views/news/success.php
$this->load->view($this->config->item('theme') . 'header');
?>

<p>Yay! You entered data!</p>
<p>Should we show it to you?</p>

<p><a href="<?php echo site_url('news/')?>">View News</a></p>
<p><a href="<?php echo site_url('news/create/')?>">Create Another</a></p>
<?php  
$this->load->view($this->config->item('theme') . 'footer');
?>