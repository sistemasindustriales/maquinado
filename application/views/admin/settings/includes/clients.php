<?php echo form_hidden('settings[customer_settings]','true'); ?>

<?php $tabs = get_customer_profile_tabs(null);
$current_selected_tabs = get_option('visible_customer_profile_tabs');
if($current_selected_tabs != 'all') {
	$current_selected_tabs = unserialize($current_selected_tabs);
}
?>
<div class="form-group">
	<label for="visible_customer_profile_tabs" class="control-label"><?php echo _l('visible_tabs'); ?> (<?php echo _l('client_add_edit_profile'); ?>)</label>
	<select name="settings[visible_customer_profile_tabs][]" id="visible_customer_profile_tabs" multiple class="form-control selectpicker" data-none-selected-text="<?php echo _l('all'); ?>" data-actions-box="true">
		<?php foreach($tabs as $tab){
			if($tab['name'] == 'profile'){continue;} ?>
			<option value="<?php echo $tab['name']; ?>"<?php if(is_array($current_selected_tabs) && in_array($tab['name'],$current_selected_tabs)){echo ' selected';} ?>><?php echo $tab['lang']; ?></option>
		<?php } ?>
	</select>
</div>
<hr />
<?php render_yes_no_option('company_is_required','company_is_required'); ?>
<hr />
<?php render_yes_no_option('company_requires_vat_number_field','company_requires_vat_number_field'); ?>
<hr />
<?php render_yes_no_option('allow_registration','settings_clients_allow_registration'); ?>
<hr />
<?php render_yes_no_option('customers_register_require_confirmation','customers_register_require_confirmation'); ?>
<hr />
<?php render_yes_no_option('allow_primary_contact_to_view_edit_billing_and_shipping','allow_primary_contact_to_view_edit_billing_and_shipping'); ?>
<hr />
<?php render_yes_no_option('only_own_files_contacts','only_own_files_contacts','only_own_files_contacts_help'); ?>
<hr />
<?php render_yes_no_option('allow_contact_to_delete_files','allow_contact_to_delete_files'); ?>
<hr />
<?php render_yes_no_option('use_knowledge_base','settings_general_use_knowledgebase','settings_general_use_knowledgebase_tooltip'); ?>
<hr />
<?php render_yes_no_option('knowledge_base_without_registration','settings_clients_allow_kb_view_without_registration'); ?>
<hr />
<?php $default_contact_permissions = unserialize(get_option('default_contact_permissions')); ?>
<div class="form-group">
	<label for="" class="control-label"><?php echo _l('default_contact_permissions'); ?></label>
	<?php foreach($contacts_permissions as $p){ ?>
	<div class="checkbox checkbox-primary">
		<input type="checkbox" name="settings[default_contact_permissions][]" <?php if(is_array($default_contact_permissions) && in_array($p['id'],$default_contact_permissions)){echo 'checked';} ?> id="dcp_<?php echo $p['id']; ?>" value="<?php echo $p['id']; ?>">
		<label for="dcp_<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
	</div>
	<?php } ?>
</div>

<?php $custom_fields = get_custom_fields('customers');
if(count($custom_fields) > 0){
	echo '<hr />';
	echo '<p class="no-mbot font-medium"><b>'._l('custom_fields').'</b></p>';
	if(total_rows('tblcustomfields',array('fieldto'=>'customers','show_on_client_portal'=>1)) == 0){
		echo '<p>' . _l('custom_field_pdf_html_help'). '</p>';
		echo '<hr />';
	}
	echo '<ul class="list-group">';
	foreach($custom_fields as $field){
		echo '<li class="list-group-item"><b>'.$field['name']. '</b>: ' . '<a href="#" class="settings-textarea-merge-field" data-to="customer_info_format">{cf_'.$field['id'].'}</a></li>';
	}
	echo '</ul>';
	echo '<hr />';
}
?>
