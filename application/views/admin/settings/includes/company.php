    <div role="tabpanel" class="tab-pane" id="company_info">
        <p class="text-muted">
            <?php echo _l('settings_sales_company_info_note'); ?>
        </p>
        <?php echo render_input('settings[invoice_company_name]','settings_sales_company_name',get_option('invoice_company_name')); ?>
        <?php echo render_input('settings[invoice_company_address]','settings_sales_address',get_option('invoice_company_address')); ?>
        <?php echo render_input('settings[invoice_company_city]','settings_sales_city',get_option('invoice_company_city')); ?>
        <?php echo render_input('settings[company_state]','billing_state',get_option('company_state')); ?>
        <?php echo render_input('settings[invoice_company_country_code]','settings_sales_country_code',get_option('invoice_company_country_code')); ?>
        <?php echo render_input('settings[invoice_company_postal_code]','settings_sales_postal_code',get_option('invoice_company_postal_code')); ?>
        <?php echo render_input('settings[invoice_company_phonenumber]','settings_sales_phonenumber',get_option('invoice_company_phonenumber')); ?>
        <?php echo render_input('settings[company_vat]','company_vat_number',get_option('company_vat')); ?>
        <?php echo render_custom_fields('company',0); ?>
     
        <?php $custom_company_fields = get_company_custom_fields();
        if(count($custom_company_fields) > 0){
            echo '<hr />';
            echo '<p class="font-medium"><b>'._l('custom_fields').'</b></p>';
            echo '<ul class="list-group">';
            foreach($custom_company_fields as $field){
                echo '<li class="list-group-item"><b>'.$field['name']. '</b>: ' . '<a href="#" class="settings-textarea-merge-field" data-to="company_info_format">{cf_'.$field['id'].'}</a></li>';
            }
            echo '</ul>';
            echo '<hr />';
        }
        ?>
    </div>
