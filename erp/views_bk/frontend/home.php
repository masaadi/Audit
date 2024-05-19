    <div class="top">
        <div class="row">
            <div class="col-md-9">
                <marquee class="text-light">Please Login your panel to track your service</marquee>
            </div>

            <div class="col-md-3">
                <a href="<?php echo base_url();?>siteadmin/verify_user" class="blink_link1 mr-3">SERVICE REQUEST HERE</a>                
            </div>
        </div>
    </div>
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>/public/dashboard/images/bsic.png" alt="" style="width: 80px; padding-top: 5px;">
                            <span style="font-size: 20px;font-weight: bold;color: #620001;font-family:'Oswald', sans-serif;position: absolute;top: 35px;bottom: 0;padding-left: 10px;">Bill Tracking System</span>
                        </a>
                            
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <div class="hero-slider">
        <div class="hero-items owl-carousel">
            <?php 
                if(!empty($slider)):
                foreach ($slider as $s):
            ?>
            <div class="single-hero-item set-bg" data-setbg="<?php echo base_url('public/uploads/slider/').$s->image_url;?>">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-lg-8">
                            <div class="hero-text mt-5">
                                <h1> <!-- echo $s->image_title; --></h1>
                                <a href="<?php echo base_url();?>siteadmin/login" class="btn primary-btn ">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; endif;?>
            
        </div>
    </div>

    <section class="client-says set-bg" style="padding-top:7px; padding-bottom:20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="client-text">
                        <h2 style="color:#28a745; margin-bottom:0px">Track Your Service</h2> 
                            <div class="row my-3" style="background-color: #ccc; padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa;">
                                <div class="col-sm-10 ">
                                      <div class="form-group">       
                                             <input type="text" name="" id="tracking_no" class="form-control" placeholder="Enter Your Tracking Number">
                                             <span id="error_msg" style="color:red"></span>
                                      </div>
                                </div>
                                <div class="col-sm-2 ">
                                      <div class="form-group">               
                                        <button class="btn btn-md btn-success" type="button" id="search">Search</button>
                                      </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-says set-bg" style="padding-top:7px; display:none" id="result_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="client-text">
                        <h6 style="padding-bottom:10px">Applicant Name : <span id="applicant_name"></span></h6>
                        <h6 style="padding-bottom:10px">Service Type : <span id="type"></span></h6>
                        <h6 style="padding-bottom:10px">Registration Number : <span id="reg_no"></span></h6>
                        <h6 style="padding-bottom:10px">Registration Date : <span id="reg_date"></span></h6>
                        <h6 style="padding-bottom:10px">Status : <span id="reg_status" style="color:#28a745"></span></h6>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-hover" id="step_table">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Desk Officer</th>
                            <th>Designation</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<br>
<br>
</div>

<script type="text/javascript">
    $('#search').click(function(){
        var tracking_no = $('#tracking_no').val();
        $.ajax({
                type:"Post",
                url:"<?php echo base_url() ?>siteadmin/track_service/"+tracking_no,
                dataType: "JSON",
                success: function(result){
                    if(result.failed == '1'){
                        $('#error_msg').text("No data found");
                        $('#result_sec').hide();
                    }else{
                       $('#tracking_no').val('');
                        $('#result_sec').show();

                        $('#applicant_name').text(result.applicant_name);
                        $('#type').text(result['service_detail'].service_type);
                        $('#reg_no').text(result['service_detail'].registration_id);
                        $('#reg_date').text(result['service_detail'].date);
                        $('#reg_status').text(result['service_detail'].status);

                        for (var i = 0; i < result['service_step'].length - 1; i++) {
                            var $new_row = $("<tr><td>"+(i+1)+"</td><td>"+result['service_step'][i].employee_name+"</td><td>"+result['service_step'][i].designation_name+"</td><td>"+result['service_step'][i].created_date+"</td></tr>");

                            $("#step_table").append($new_row);
                        } 
                    }                 
                                        
                }
            });
    });
</script>