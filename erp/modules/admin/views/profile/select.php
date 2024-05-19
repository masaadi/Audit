
<label class=""><?php echo $this->lang->line('business_type'); ?><sup class="error">*</sup></label>
<?php
        $business_type_options = getOptionBusinessType();
        $new_array = array('0' => 'All');
        $bus_typ_ids = array();
        if($business_type_options){
            foreach($business_type_options as $k => $v){
                if($k){
                    $new_array[$k] = $v; 
                    $bus_typ_ids[] = $k;
                }
            }
        }
        $bus_typ_id = $bus_typ_ids; 
    ?>
<?php echo form_dropdown("business_type[]",$new_array,'',"id='business_type' class='form-control business_type' multiple='multiple' required='required' "); ?>


<script type="text/javascript">
    $(document).ready(function(){
        var s2 = $(".business_type").select2({
            placeholder: "--- Select ---",
            tags: true
        });

        var all_buss_type = '<?php echo json_encode($selected_business_ids); ?>';
        var valtoselect = all_buss_type.split(',');
        var parse_data = JSON.parse(valtoselect);
        s2.val(parse_data).trigger("change");

        $(".business_type").on("select2:select select2:unselect", function (e) {
            //this returns all the selected item
            var all_buss_type = "<?php echo json_encode($bus_typ_id); ?>";
            
            var valtoselect = all_buss_type.split(',');
            var parse_data = JSON.parse(valtoselect);
            var items= $(this).val();       
            //Gets the last selected item
            var lastSelectedItem = e.params.data.id; 
            if(lastSelectedItem==0){
                s2.val(parse_data).trigger("change");
            }
        });
    })
    
</script>