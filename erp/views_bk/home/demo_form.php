 <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Employee Information Entry
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title"> Basic and Job Information</h2>
                            <form action="">
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Employee ID</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="######" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">CPF No</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter CPF No..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Employee Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Employee Name..." />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="">Attach Photo</label>
                                            <div class="form-line">
                                                <input type="file" class="form-control" />
                                            </div>
<!--
                                            <div class="help-info col-red">
                                                * File Type jpg,jpeg,png are allowed for upload
                                                <br> * Maximum file size is 80kb 
                                            </div>
-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">National ID</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter National ID..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="" class="">Attach National ID</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" />
                                            </div>
<!--
                                             <div class="help-info col-red">
                                               * File Type jpg,jpeg,png are allowed for upload
                                               <br>
                                                * Maximum file size is 80kb 
                                            </div>
-->
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Blood Group</label>
                                        <select class="form-control show-tick">
                                            <option value="">-- Select Blood Group --</option>
                                            <option value="O-">O-</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="A+">A+</option>
                                            <option value="B-">B-</option>
                                            <option value="B+">B+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="AB+">AB+</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Marital Status</label>
                                        <select class="form-control show-tick">
                                            <option value="">-- Select Marital Status --</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed </option>
                                            <option value="Separated">Separated </option>
                                            <option value="Divorced">Divorced </option>
                                            <option value="Single">Single </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Gender</label>
                                        <div class="form-group">

                                            <input name="gender" type="radio" id="male" class="radio-col-green" checked />
                                            <label for="male">Male</label>

                                            <input name="gender" type="radio" id="female" class="radio-col-green" />
                                            <label for="female">Female</label>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Date Of Birth</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="" class="req">Father’s Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Father’s Name..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Mother’s Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Mother’s Name..." />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="">Passport No</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Passport No..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Driving Licence</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Driving Licence..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">E-Mail</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" class="form-control" placeholder="Enter Email..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Contact No</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Contact No..." />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="">Emergency Contact Person Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Enter Person Name..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Relation</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" class="form-control" placeholder="Relation..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Emergency Contact No</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" class="form-control" placeholder="Enter Contact No..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Home District</label>
                                        <select class="form-control show-tick">
                                            <option value="">-- Select Home District --</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed </option>
                                            <option value="Separated">Separated </option>
                                            <option value="Divorced">Divorced </option>
                                            <option value="Single">Single </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 m-b-0">
                                        <label for="" class="">Present Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Type Your Present Address..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-b-0">
                                        <label for="" class="">Permanent Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Type Your Permanent Address..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="card-inside-title"> Joining Job Information</h2>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Date</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Pool Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Pool Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Wing Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Wing Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Division</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Division Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="">Joining Office Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Office Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Designation</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Designation --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Salary Grade</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Grade --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Joining Salary Scale</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Scale --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Basic Salary</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Salary --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Posting District</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select District --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <h2 class="card-inside-title"> Current Job Information</h2>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Joining Date</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Pool Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Pool Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Wing Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Wing Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Division</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Division Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="">Current Section Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Section Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Current Sub Section Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Sub Section Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Current Office Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Office Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Designation</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Designation --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Salary Grade</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Salary Grade --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Current Salary Scale</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Salary Scale --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Basic Salary </label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Salary --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Posting District</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select District --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Other Information</h2>

                                <div class="row">

                                    <div class="col-sm-3">
                                        <label for="" class="req">Employee Type</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Employee Type --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">Employee Class</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Employee class --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="req">PRL Date</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Supervisor Designation</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Designation --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-3">
                                        <label for="" class="">Supervisor Name</label>
                                        <select class="form-control show-tick selectpicker" data-live-search="true">
                                            <option value="">-- Select Name --</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="">Employee Signature </label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="">Responsibility</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control" placeholder="Type Responsibility..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-lg btn-success waves-effect right m-r-10">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>