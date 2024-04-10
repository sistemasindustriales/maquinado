<?php if(isset($client)){ ?>
<h4 class="customer-profile-group-heading"><?php echo _l('estimates'); ?></h4>
<?php if(has_permission('estimates','','create')){ ?>
<a href="<?php echo admin_url('estimates/estimate?customer_id='.$client->userid); ?>" class="btn btn-info mbot15<?php if($client->active == 0){echo ' disabled';} ?>"><?php echo _l('create_new_estimate'); ?></a>
<?php } ?>
<?php if(has_permission('estimates','','view') || has_permission('estimates','','view_own') || get_option('allow_staff_view_estimates_assigned') == '1'){ ?>

<?php } ?>
<div id="estimates_total"></div>
<?php
   $this->load->view('admin/estimates/table_html', array('class'=>'estimates-single-client'));
   include_once(APPPATH . 'views/admin/clients/modals/zip_estimates.php');
?>
<?php } ?>