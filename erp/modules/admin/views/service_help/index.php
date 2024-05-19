<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Service Help</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;"></div>
                    </div>
                    <div id="officeList">
                        <?php
                    $this->load->view('admin/service_help/home');
                    ?>
                    </div>
                    <!-- table -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//add data
function edit_master() {

    // alert(id);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/service_help/edit/',
        beforeSend: function() {
            $('.crud_load').show()
        },
        complete: function() {
            $('.crud_load').hide();
        },
        success: function(result) {
            if (result) {
                $('#officeList').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
}
</script>
<script type="text/javascript">
    $(function() {
    $('body').on('click', '#edit_submit', function() {
        $('#service_file_edit').validate({
            rules: {
                help_file: {
                    required: true,
                }
            },
            messages: {
                help_file: {
                    required: 'This field id required',
                } 
            },

            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#service_file_edit');
                var form = $(this);
                var currentForm = $('#service_file_edit')[0];
                var formData = new FormData(currentForm);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/service_help/update",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    //dataType: "JSON",
                    success: function(response) {
                        location.reload();
                    }

                });


            }
        });

    });
});
</script>