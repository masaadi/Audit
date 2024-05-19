<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo base_url(); ?>/public/images/user.png" width="48" height="48" alt="User"/></div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
            <div class="email">admin@example.com</div>
        </div>
    </div>
    <?php
    $module_id = 1;
    $sub_module_id = 1;
    $active_tab = "poll";
    ?>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Dashboard </span></a>
            </li>

            <!--	-----start----->
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">access_alarm</i>
                    <span>Administration Management  </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>User</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>super/user/add">User Create</a></li>
                            <li><a href="manage-duty-schedule.php">User List</a></li>
                            <li><a href="<?php echo base_url(); ?>super/module">Module</a></li>
                            <li><a href="<?php echo base_url(); ?>super/sub_module">Sub module</a></li>
                            <li><a href="<?php echo base_url(); ?>super/menu">Menu</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <!------end----->


            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span> Human Resource : </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle"><span>Master Configuration</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>hr/pool">Pool Master</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/wing">Wing Master</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/office_type">Office Type</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/office">Office Master</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/section">Section Master</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/sub_section">Sub Section Master</a></li>

                            <a href="<?php echo base_url(); ?>hr/office_mapping">Office Mapping</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/grade">Grade</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/class_master"">Class Master</a> </li>
                            <li>

<!--                            <li>-->
<!--                                <a href="--><?php //echo base_url(); ?><!--hr/grade_step"">Grade Step</a> </li>-->

                            <a href="<?php echo base_url(); ?>hr/designation">Designation Master</a>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/assign_designation">Assign Designation</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/employee_type">Employee Type Master</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/transfer_type"">Transfer Type Master</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>hr/punishment_type"">Punishment Type </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>hr/country">Country</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/district">District</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/thana">Upozilla</a></li>
                            <li>
                                <a href="<?php echo base_url(); ?>hr/union">Union</a></li>
<!--                            <li>-->
<!--                                <a href="--><?php //echo base_url(); ?><!--hr/assign_head">Assign Head</a></li>-->
<!---->
<!--                            </li>-->

                        </ul>
                    </li>


                    <li class="active">
                        <a href="#" class="menu-toggle">
                            <span>Employee Information Entry</span> </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>hr/personal_info">Personal Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/job">Job Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/seniority_info">Seniority Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/family">Family Information Entry</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/educational_info">Educational Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/traning">Training Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/prior">Prior Service Related Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/foreign_travel">Foreign Travel Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/extra_ordinary">Extra Ordinary Qualification</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>hr/reinstate">Reinstate Entry (If Applicable)</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/nominee">Nominee Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/suspend">Suspended Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/disciplinary">Disciplinary Actions Information</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>hr/transfer">Transfer/Posting Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/promotion">Promotional Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/reference">Reference Information</a></li>
                            <li><a href="<?php echo base_url(); ?>hr/assign_head">Assign Division/Office/Section/Sub
                                    Section Head</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Leave Management</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>hr/leave_type">Leave Type</a></li>
                            <li>
                                <a href="add-leave.php">Add Leave (Direct Entry)</a></li>
                            <li>
                                <a href="view-leave.php">View Leave</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>ACR Management</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="assign-evaluation-officer.php">Assign Evaluation Officer</a></li>
                            <li>
                                <a href="ACR-Evaluation-Head.php">ACR Evaluation Head</a></li>
                            <li>
                                <a href="ACR-Evaluation-Topic-Add.php">ACR Evaluation Topic Add</a></li>
                            <li>
                                <a href="ACR-Mark-Configuration.php">ACR Mark Configuration</a></li>

                            <li>
                                <a href="ACR-Evaluation-Report.php">ACR Evaluation Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Reports</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Employee-Profile.php">Employee Profile</a></li>
                            <li>
                                <a href="Employee-Variety-Report.php">Employee Variety Report</a></li>
                            <li>
                                <a href="Retirement-Report.php">Retirement Report</a></li>
                            <li>
                                <a href="individual-leave-report.php">Individual Leave Report</a></li>
                            <li>
                                <a href="leave-type-wise-report.php">Leave Type wise Report</a></li>
                            <li>
                                <a href="monthly-leave-report.php">Monthly Leave Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">perm_contact_calendar</i>
                    <span>Employee Dashboard  </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="profile.php"><span>Profile </span></a></li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Leave </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="ED-Apply-Leave.php">Apply Leave</a></li>
                            <li>
                                <a href="Leave-Summary.php">Leave Summary</a></li>
                            <li>
                                <a href="View-Leave-Status.php">View Leave Status</a></li>
                            <li>
                                <a href="Received-Leave-Request.php">Received Leave Request</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Attendance  </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Daily-Attendance.php">Daily Attendance</a></li>
                            <li <?php if (isset($active_tab) && ($active_tab == "poll")): ?> class="active" <?php endif; ?>>
                                <a href="Monthly-Job-Card.php">Monthly Job Card</a></li>
                            <li>
                                <a href="Attendance-Request-Entry.php">Attendance Request Entry</a></li>
                            <li>
                                <a href="Attendance-Request-Received.php">Attendance Request Received</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Payroll  </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Payslip.php">Payslip</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>CPF Loan  </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Apply-Loan.php">Apply Loan</a></li>
                            <li>
                                <a href="View-Loan-Report.php">View Loan Report</a></li>
                            <li>
                                <a href="View-Loan-Request.php">View Loan Request</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Annual Confidential Report (ACR) </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Prepare-Submit-ACR.php">Prepare & Submit ACR</a></li>
                            <li>
                                <a href="View-ACR-Status.php">View ACR Status</a></li>
                            <li>
                                <a href="Receive-Applied-ACR.php">Receive Applied ACR</a></li>
                            <li>
                                <a href="ViewACRfor-Evaluation.php">View ACR for Evaluation (Senior Evaluation
                                    Officer)</a></li>
                            <li>
                                <a href="View-ACR-for-Finally-Approved-Evaluation.php">View ACR for Finally Approved
                                    Evaluation</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">access_alarm</i>
                    <span>Biometric Attendance  </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Attendance</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="attendance-shift-create.php">Shift Create</a></li>
                            <li>
                                <a href="manage-duty-schedule.php">Manage Duty Schedule</a></li>
                            <li>
                                <a href="prepare-rooster.php">Prepare Rooster</a></li>
                            <li>
                                <a href="manual-attendance.php">Manual Attendance</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Reports</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="employee-job-card.php">Employee Job Card</a></li>
                            <li>
                                <a href="daterange-present-absent-lreport.php">Date Range Present/Absent/Late Report</a>
                            </li>
                            <li>
                                <a href="attendance-summary-report.php">Attendance Summary Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="">
                    <i class="material-icons">star</i>
                    <span>Budget Management</span> </a></li>

            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">monetization_on</i>
                    <span>Payroll Management </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Master Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Salary-Grade.php">Salary Grade</a></li>
                            <li>
                                <a href="Grade-Setup.php">Grade Setup</a></li>
                            <li>
                                <a href="Salary-Head-Setup.php">Salary Head Setup</a></li>
                            <li>
                                <a href="House-Rent.php">House Rent</a></li>
                            <li>
                                <a href="Charge-Allowance.php">Charge Allowance</a></li>
                            <li>
                                <a href="Additional-Charge-Allowance.php">Additional Charge Allowance</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Salary Info </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Salary-Entry.php">Salary Entry (Employee Type, etin no, Employee Area)</a></li>
                            <li>
                                <a href="Salary-List.php">Salary List</a></li>
                            <li>
                                <a href="Create-Submit-Salary.php">Create and Submit Salary</a></li>
                            <li>
                                <a href="View-Approve-Salary.php">View/Approve Salary</a></li>
                            <li>
                                <a href="Division-Office-Employee-Type-Grade-wise-Combined-Bank-Sheet.php">Division/Office,
                                    Employee Type and Grade wise Combined Bank Sheet</a></li>
                            <li>
                                <a href="Division-Office-Employee-Type-Deduction-Sheet.php">Division/Office, Employee
                                    Type Deduction Sheet</a></li>
                            <li>
                                <a href="Division-Office-Employee-Type-Grade-wise-Tax-Deduction-Sheet.php">Division/Office,
                                    Employee Type and Grade wise Tax Deduction Sheet</a></li>
                            <li>
                                <a href="Division-Office-Employee-Type-Grade-Range-wise-Salary-Sheet.php">Division/Office,
                                    Employee Type and Grade Range wise Salary Sheet</a></li>
                            <li>
                                <a href="Head-Office-Grade-Range-wise-Combined-Salary-Sheet.php">Head Office Grade Range
                                    wise Combined Salary Sheet</a></li>
                            <li>
                                <a href="Head-Office-Grade-Range-wise-Tax-Deduction-Sheet.php">Head Office Grade Range
                                    Wise Tax Deduction Sheet</a></li>
                            <li>
                                <a href="Head-Office-Grade-Range-wise-PF-Report.php">Head Office Grade Range Wise PF
                                    Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Additional Bill Info </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pf-Receive-Additional-Bill.php">Receive Additional Bill</a></li>
                            <li>
                                <a href="Prepare-Approve-Additional-Bill.php">Prepare and Approve Additional Bill</a>
                            </li>
                            <li>
                                <a href="Additional-Bill-Report-Combined.php">Additional Bill Report (Combined)</a></li>
                            <li>
                                <a href="Additional-Bill-Report-Individual.php">Additional Bill Report (Individual)</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Overtime Management</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="OT-Rate.php">OT Rate</a></li>
                            <li>
                                <a href="Maximum-Hour-Set.php">Maximum Hour Set</a></li>
                            <li>
                                <a href="Receive-OT-Bill.php">Receive OT Bill</a></li>
                            <li>
                                <a href="OT-Report-Individual.php">OT Report (Individual)</a></li>
                            <li>
                                <a href="OT-Report-Combined.php">OT Report (Combined)</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Festival Bonus</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Create-Bonus.php">Create Bonus</a></li>
                            <li>
                                <a href="Bonus-Sheet-View-Approve.php">Bonus Sheet View and Approve</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Increment Manage</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Create-Increment.php">Create Increment</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Gratuity Management</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Create-Deduction-Head.php">Create Deduction Head</a></li>
                            <li>
                                <a href="Entry-Deduction.php">Entry Deduction</a></li>
                            <li>
                                <a href="Prepare-Approve-Gratuity.php">Prepare and Approve Gratuity</a></li>
                            <li>
                                <a href="Gratuity-Report.php">Gratuity Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">card_giftcard</i>
                    <span>CPF & Loan Management</span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="CPF-Define.php">CPF Define</a></li>
                            <li>
                                <a href="PFInterest-Rate.php">PF Interest Rate</a></li>
                            <li>
                                <a href="Loan-Step.php">Loan Approve Step</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>CPF </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Assign-Employee-PF.php">Assign Employee PF</a></li>
                            <li>
                                <a href="Assign-CPF-Opening-Balance.php">Assign CPF Opening Balance</a></li>
                            <li>
                                <a href="CPF-Report-Individual.php">CPF Report Individual</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Employee Loan Manage </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Loan-Approved-List.php">Loan Approved List</a></li>
                            <li>
                                <a href="Loan-Entry.php">Loan Entry</a></li>
                            <li>
                                <a href="Loan-Hold.php">Loan Hold</a></li>
                            <li>
                                <a href="Loan-Report.php">Loan Report</a></li>
                            <li>
                                <a href="FinalPFReport.php">Final PF Report</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">attach_money</i>
                    <span>Accounts Management</span> </a></li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">search</i>
                    <span>Audit Management</span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">

                            <li>
                                <a href="Project-Information-Entry-Form.php">Project Information Entry Form</a></li>
                            <li>
                                <a href="Work-Schedule-Information-Entry-Form.php">Work Schedule Information Entry
                                    Form</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-toggle">
                            <span>BADC Audit Management</span> </a>
                        <ul class="ml-menu">

                            <li>
                                <a href="Commercial-Audit-Objection-Information-Entry-Form.php">Commercial Audit
                                    Objection Information Entry Form</a></li>
                            <li>
                                <a href="Internal-Audit-Objection-Information-Entry-Form.php">Internal Audit Objection
                                    Information Entry Form</a></li>
                            <li>
                                <a href="Person-Involved-audit-Objection-Information-Entry-Form.php">Person Involved in
                                    audit Objection Information Entry Form</a></li>
                            <li>
                                <a href="Pending-Audit-Objection-Information-Entry-Form.php">Pending Audit Objection
                                    Information Entry Form</a></li>
                            <li>
                                <a href="Meeting-Information-Entry-Form.php">Meeting Information Entry Form</a></li>
                            <li>
                                <a href="Meeting-with-PA-committee-Information-Entry-form.php">Meeting With PA Committee
                                    Information Entry Form</a></li>
                            <li>
                                <a href="Internal-Audit-Objection-Settlement-Meeting-Information-Entry-Form.php">Internal
                                    Audit Objection Settlement Meeting Information Entry Form</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>BADC Audit Management Reports </span> </a>
                        <ul class="ml-menu">
                            <!--
                            <li>
                                <a href="AddPay-Scale-Year.php">Add Pay Scale Year</a>
                            </li>
                            -->
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">person_pin_circle</i>
                    <span>Pay Fixation  </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="AddPay-Scale-Year.php">Add Pay Scale Year</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Employee Pay Fixation </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="national-grade-Entry.php">Salary Calculation by Following National Grade
                                    Entry</a></li>
                            <li>
                                <a href="Promotional-Salary-Fixation-Entry.php">Promotional Salary Fixation Entry</a>
                            </li>
                            <li>
                                <a href="Upper-Grade-wise-Fixation-Entry.php">Upper Grade Wise Fixation Entry</a></li>
                            <li>
                                <a href="Selection-grade-Entry.php">Salary Calculation by Following Selection Grade
                                    Entry</a></li>
                            <li>
                                <a href="Time-Scale-Salary-Fixation-Entry.php">Time Scale Salary Fixation Entry</a></li>
                            <li>
                                <a href="Leave-Calculation.php">Leave Calculation</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Reports  </span> </a>
                        <ul class="ml-menu">

                            <li>
                                <a href="Leave-Calculation-Record-Register.php">Leave Calculation Record Register</a>
                            </li>
                            <li>
                                <a href="Salary-fixation-Record-Register.php">Salary fixation Record Register</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">wc</i>
                    <span>Insurance Management</span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Add-Insurance-Type.php">Add Insurance Type</a></li>
                            <li>
                                <a href="Ship-Information-Entry.php">Ship Information Entry</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Employee Life Insurance </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Premium-Deposit-Entry.php">Premium Deposit Entry</a></li>
                            <li>
                                <a href="Insurance-Claim-Information-Entry.php">Insurance Claim Information Entry</a>
                            </li>
                            <li>
                                <a href="Insurance-Bill-Prepare-Approved.php">Insurance Bill Prepare and Approved</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>General Insurance</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Insurance-Information-Entry-with-Premium.php">Insurance Information Entry With
                                    Premium</a></li>
                            <li>
                                <a href="GI-Premium-Deposit-Entry.php">Premium Deposit Entry</a></li>
                            <li>
                                <a href="GI-Insurance-Claim-Information-Entry.php">Insurance Claim Information Entry</a>
                            </li>
                            <li>
                                <a href="GI-Insurance-Bill-Prepare-Approved.php">Insurance Bill Prepare and Approved</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Reports</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Employee-Wise-Yearly-Life-Insurance-Premium-Deposit-Information-Report.php">Employee
                                    Wise Yearly Life Insurance Premium Deposit Information Report</a></li>
                            <li>
                                <a href="Employee-Wise-Yearly-Life-Insurance-Claim-Information-Report.php">Employee Wise
                                    Yearly Life Insurance Claim Information Report</a></li>
                            <li>
                                <a href="Vehicle-Wise-Yearly-General-Insurance-Premium-Deposit-Information-Report.php">Vehicle
                                    Wise Yearly General Insurance Premium Deposit Information Report</a></li>
                            <li>
                                <a href="Vehicle-Wise-Yearly-General-Insurance-Claim-Information-Report.php">Vehicle
                                    Wise Yearly General Insurance Claim Information Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">map</i>
                    <span>Asset &  Inventory Management</span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Item-Category.php">Item Category</a></li>
                            <li>
                                <a href="Item-Sub-Category.php">Item Sub Category</a></li>
                            <li>
                                <a href="Item-Condition.php">Item Condition</a></li>
                            <li>
                                <a href="Measurement-Unit.php">Measurement Unit</a></li>
                            <li>
                                <a href="Create-Item.php">Create Item</a></li>
                            <li>
                                <a href="Supplier-Info.php">Supplier Info</a></li>
                            <li>
                                <a href="Area-Info.php">Area Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Inventory Manage </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Add-Requisition.php">Add Requisition</a></li>
                            <li>
                                <a href="View-Requisition.php">View Requisition</a></li>
                            <li>
                                <a href="Receive-Requisition.php">Receive Requisition (From Employee)</a></li>
                            <li>
                                <a href="Receive-Requisition-FDH.php">Receive Requisition (From Division Head)</a></li>
                            <li>
                                <a href="Delivery-Entry.php">Delivery/Issue Entry</a></li>
                            <li>
                                <a href="PO-Entry.php">PO Entry</a></li>
                            <li>
                                <a href="Receive-Against-PO.php">Receive Against PO</a></li>
                            <li>
                                <a href="Stock-In.php">Stock In</a></li>
                            <li>
                                <a href="Stock-Out-Requisition.php">Stock Out Requisition</a></li>
                            <li>
                                <a href="Stock-Out-Approval.php">Stock Out Approval</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>BADC Fixed Asset Management </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Fixed-Asset-Register.php">Fixed Asset Register</a></li>
                            <li>
                                <a href="Land-Information-Under-control-BADC.php">Land Information Under Control of
                                    BADC</a></li>
                            <li>
                                <a href="Land-Information-Without-control-BADC.php">Land Information Without Control of
                                    BADC</a></li>
                            <li>
                                <a href="Table-of-Organization-Equipment-TOE-Entry.php">Table of Organization and
                                    Equipment (TO & E) Entry</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>BADC Inventory and Fixed Asset Reports</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Current-Stock-Report.php">Current Stock Report</a></li>
                            <li>
                                <a href="Official-Stock-Report.php">Official Stock Report</a></li>
                            <li>
                                <a href="Supplier-List-Report.php">Supplier List Report</a></li>
                            <li>
                                <a href="Item-List-Report.php">Item List Report</a></li>
                            <li>
                                <a href="Land-Information-Without-control-of-BADC-Report.php">Land Information Without
                                    control of BADC Report</a></li>
                            <li>
                                <a href="Land-Information-Under-control-of-BADC-Report.php">Land Information Under
                                    control of BADC Report</a></li>
                            <li>
                                <a href="Table-of-Organization-Equipment-TO&E-Report.php">Table of Organization and
                                    Equipment(TO & E) Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">trending_up</i>
                    <span>Procurement Management</span> </a></li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">directions_car</i>
                    <span>Vehicle Management  </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Vehicle-type.php">Vehicle Type</a></li>
                            <li>
                                <a href="Route-Name.php">Route Name</a></li>
                            <li>
                                <a href="Driver-Info-Entry.php">Driver Info Entry</a></li>
                            <li>
                                <a href="Vehicle-Insurance-Type.php">Vehicle Insurance Type</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Vehicle Management System </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="vd-vi.php">Vehicle Details Info / Vehicle Entry</a></li>
                            <li>
                                <a href="Division-Wise-Vehicle-Allotment.php">Division Wise Vehicle Allotment</a></li>
                            <li>
                                <a href="Driver-Info-for-Allotment.php">Driver Info for Allotment</a></li>
                            <li>
                                <a href="Designation-wise-Vehicle-allocation.php">Designation Wise Vehicle
                                    Allocation</a></li>
                            <li>
                                <a href="Vehicle-wise-Budget-Entry.php">Vehicle Wise Budget Entry</a></li>
                            <li>
                                <a href="Vehicle-wise-Repair-Maintenance-Cost-entry.php">Vehicle Wise Repair &
                                    Maintenance Cost Entry</a></li>
                            <li>
                                <a href="Root-wise-Vehicle-Allocation.php">Root Wise Vehicle Allocation</a></li>
                            <li>
                                <a href="Application-for-Ticket.php">Application for Ticket</a></li>
                            <li>
                                <a href="Application-for-Cancle-Ticket.php">Application for Cancle Ticket</a></li>
                            <li>
                                <a href="Approval-from-Common-Service-For-Ticket-Issue.php">Approval from Common Service
                                    for Ticket Issue</a></li>
                            <li>
                                <a href="Approval-from-Common-Service-For-Ticket-Cancellation.php">Approval from Common
                                    Service for Ticket Cancellation</a></li>
                            <li>
                                <a href="Requisition-for-vehicle-Personal-Official.php">Requisition for Vehicle
                                    (Personal or Official)</a></li>
                            <li>
                                <a href="Condemned-Vehicle-Selection.php">Condemned Vehicle Selection</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Reports </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Vehicle-wise-Repair-Maintenance-Report.php">Vehicle Wise Repair & Maintenance
                                    Report</a></li>
                            <li>
                                <a href="Vehicle-Wise-Driver-Info.php">Vehicle wise Driver Allocation Info</a></li>
                            <li>
                                <a href="Condemned-Vehicle-Selection.php">Condemned Vehicle Selection</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">business</i>
                    <span>Staff Quarter Management </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Quarter-Name.php">Quarter Name</a></li>
                            <li>
                                <a href="Add-Building-Type.php">Add Building Type</a></li>
                            <li>
                                <a href="Create-Quarter-Info.php">Create Quarter Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>BADC Staff Quarter </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Application-Submit-for-Allocation-Staff-Quarter.php">Application & Submit for
                                    Allocation Staff Quarter </a></li>
                            <li>
                                <a href="View-Allocation-Entry.php">View and Quarter Allocation Entry</a></li>
                            <li>
                                <a href="Staff-Quarter-Cancellation-Entry.php">Staff Quarter Cancellation Entry</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Staff Quarter Reports</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Allocated-Unallocated-Report.php">Allocated and Unallocated Report</a></li>
                            <li>
                                <a href="House-Rent-Utility-bill-Report.php">House Rent and Utility bill Report</a></li>
                            <li>
                                <a href="Quarter-Allocation-Register.php">Quarter Allocation Register</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">filter_vintage</i>
                    <span>Fertilizer Management</span> </a></li>
            <li>
                <a href="#">
                    <i class="fas fa-seedling"></i>
                    <span>Seeds Management</span> </a></li>
            <li>
                <a href="#">
                    <i class="material-icons"><i class="fab fa-pagelines"></i></i>
                    <span>Irrigation Management</span> </a></li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Notice and Event </span> </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Configuration </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Event-Type.php">Event Type</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Event Management </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Manage-Event.php">Manage Event</a></li>
                            <li>
                                <a href="View-Event.php">View Event</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <span>Notice Management </span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="Manage-Notice.php">Manage Notice</a></li>
                            <li>
                                <a href="View-Notice.php">View Notice</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="www.syntechbd.com">Syntech Solution Ltd.</a></div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->

