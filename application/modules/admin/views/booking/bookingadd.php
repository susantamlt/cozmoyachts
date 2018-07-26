        <section class="content">
            <input type="hidden" name="page" id="page" value="booking" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Add Booking</h2>
                                <div id="massage"></div>
                            </div>
                            <div class="body">
                                <?php echo form_open_multipart('admin/bookings/bookings_save', array('id' =>'bookings_form','name'=>'bookings_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                                    <div class="form-group">
                                        <label class="col-md-2"> Customers: </label>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon1">
                                                    <input class="form-control new_exsting" id="new_exsting1" name="new_exsting" type="radio" value="1" />
                                                    <label for="new_exsting1">New</label>
                                                </span>
                                                <span class="input-group-addon1">
                                                    <input class="form-control new_exsting" id="new_exsting2" name="new_exsting" type="radio" value="2" />
                                                    <label for="new_exsting2">Existing</label>
                                                </span>
                                            </div>
                                            <label id="new_exsting-error" class="error" for="new_exsting"></label>
                                        </div>
                                        <label class="col-md-2"> UserName: </label>
                                        <div class="col-md-4">
                                            <div id="newemailid">
                                                <input type="text" name="emailide" id="emailid" class="form-control" value="" placeholder="E-mail" />
                                            </div>
                                            <input type="hidden" name="user_id" id="user_id" value="" />
                                            <label id="emailide-error" class="error" for="emailide"></label>
                                            <label id="emailid-error" class="error" for="emailid"></label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="newuserdetails" style="display:none;">
                                        <label class="col-md-2"> Name: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Full Name" />
                                            <label id="name-error" class="error" for="name"></label>
                                        </div>
                                        <label class="col-md-2"> Phone Number: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="phone" id="phone" class="form-control" value="" placeholder="Phone Number" />
                                            <label id="phone-error" class="error" for="phone"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Leads: </label>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon1">
                                                    <input class="form-control new_exstingL" id="new_exstingL1" name="new_exstingL" type="radio" value="1" />
                                                    <label for="new_exstingL1">New</label>
                                                </span>
                                                <span class="input-group-addon1">
                                                    <input class="form-control new_exstingL" id="new_exstingL2" name="new_exstingL" type="radio" value="2" />
                                                    <label for="new_exstingL2">Existing</label>
                                                </span>
                                            </div>
                                            <label id="new_exsting-error" class="error" for="new_exsting"></label>
                                        </div>
                                        <label class="col-md-2"> lead: </label>
                                        <div class="col-md-4">
                                            <div id="newleadid">
                                                <input type="text" name="leadid" id="leadid" class="form-control" value="" placeholder="Leads" />
                                            </div>
                                            <label id="leadid-error" class="error" for="leadid"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Website Name: </label>
                                        <div class="col-md-4">
                                            <?php echo form_dropdown('web_id',$cy_website,'','class="form-control show-tick" id="web_id"') ?>
                                            <label id="web_id-error" class="error" for="web_id"></label>
                                        </div>
                                        <label class="col-md-2"> Package / Yacht  Name: </label>
                                        <div class="col-md-4">
                                            <?php echo form_dropdown('pak_id',$cy_package,'','class="form-control show-tick" id="pak_id"') ?>
                                            <label id="pak_id-error" class="error" for="pak_id"></label>
                                        </div>
                                    </div>
                                    <div class="form-group demo-masked-input">
                                        <label class="col-md-2"> No of PAX: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="no_pax" id="no_pax" class="form-control" value="" placeholder="No of PAX" />
                                            <label id="no_pax-error" class="error" for="no_pax"></label>
                                        </div>
                                        <label class="col-md-2"> Booking for Date: </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text"  name="book_date" id="book_date" class="form-control date" placeholder="Ex: 07/30/2016">
                                                </div>
                                            </div>
                                            <label id="book_date-error" class="error" for="book_date"></label>
                                        </div>
                                    </div>
                                    <div class="form-group demo-masked-input">
                                        <label class="col-md-2"> Booking for Time: </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input name="book_time" id="book_time" type="text" class="form-control time12" placeholder="Ex: 11:59 pm">
                                                </div>
                                            </div>
                                            <label id="book_time-error" class="error" for="book_time"></label>
                                        </div>
                                        <label class="col-md-2"> Durations: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="durations" id="durations" class="form-control" value="" placeholder="Durations" />
                                            <label id="durations-error" class="error" for="durations"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Discount: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="discount" id="discount" class="form-control" value="" placeholder="Discount" />
                                            <label id="discount-error" class="error" for="discount"></label>
                                        </div>
                                        <label class="col-md-2"> Exclusive Facilities Amount: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="amount" id="amount" class="form-control" value="" placeholder="Exclusive Facilities Amount" />
                                            <label id="amount-error" class="error" for="amount"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Sub Total: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="sub_total" id="sub_total" class="form-control" value="" placeholder="Sub Total" />
                                            <label id="sub_total-error" class="error" for="sub_total"></label>
                                        </div>
                                        <label class="col-md-2"> Total Amount: </label>
                                        <div class="col-md-4">
                                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="" placeholder="Total Amount" />
                                            <label id="total_amount-error" class="error" for="total_amount"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Address: </label>
                                        <div class="col-md-4">
                                            <textarea name="address" id="address" class="form-control" placeholder="Address" /></textarea>
                                            <label id="address-error" class="error" for="address"></label>
                                        </div>
                                        <label class="col-md-2"> Payment Method: </label>
                                        <div class="col-md-4">
                                            <select name="payment_method" id="payment_method" class="form-control" title="Payment Method">
                                                <option value="">--Select One--</option>
                                                <option value="cash">Cash</option>
                                                <option value="stripe">Stripe</option>
                                            </select>
                                            <label id="payment_method-error" class="error" for="payment_method"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2"> Payment Status: </label>
                                        <div class="col-md-4">
                                            <select name="payment_metpayment_statushod" id="payment_status" class="form-control" title="Payment Method">
                                                <option value="">--Select One--</option>
                                                <option value="1">Unpaid</option>
                                                <option value="2">Pay 100%</option>
                                                <option value="3">Pay 20%</option>
                                                <option value="4">Refund</option>
                                            </select>
                                            <label id="payment_status-error" class="error" for="payment_status"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success"> Save </button>
                                            <a href="<?php echo site_url('admin/bookings/') ?>" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(function() {
                $.validator.addMethod("regex",function(value, element, regexp) {
                    if (regexp.constructor != RegExp)
                        regexp = new RegExp(regexp);
                    else if (regexp.global)
                        regexp.lastIndex = 0;
                    return this.optional(element) || regexp.test(value);
                },"Please check your input.");
                $("form[name='bookings_form']").validate({
                    rules: {
                        emailid: {
                            required: function (el) {
                                return $(el).closest('form').find('#user_id').val()=='';
                            },
                        },
                        emailide: {
                            required: function (el) {
                                return $(el).closest('form').find('#user_id').val()=='';
                            },
                            email: true,
                            regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
                        },
                        name: {
                            required: function (el) {
                                return $(el).closest('form').find('#new_exsting1').is(':checked');
                            },
                            regex:/^[a-zA-Z ]*$/,
                        },
                        phone: {
                            required: function (el) {
                                return $(el).closest('form').find('#new_exsting1').is(':checked');
                            },
                            number: true,
                            minlength: 7,
                            maxlength: 10,
                        },
                        leadid: {
                            required: function (el) {
                                return $(el).closest('form').find('#new_exstingL2').is(':checked');
                            },
                        },
                        web_id: {
                            required: true, 
                        },
                        pak_id: {
                            required: true,
                        },
                        no_pax: {
                            required: true,
                            number: true,
                            maxlength:3,
                        },
                        book_date: {
                            required: true,
                        },
                        book_time: {
                            required: true,
                        },
                        durations: {
                            required: true,
                        },
                        discount: {
                            required: true,
                            regex: /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/,
                        },
                        amount: {
                            regex: /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/,
                        },
                        sub_total: {
                            required: true,
                            regex: /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/,
                        },
                        total_amount: {
                            required: true,
                            regex: /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/,
                        },
                        address: {
                            required: true,
                        },
                        payment_method: {
                            required: true,
                        },
                        payment_status: {
                            required: true,
                        },
                    },
                    messages: {
                        emailid: {
                            required: "Please select user",
                        },
                        emailide: {
                            required: "Please enter a email address.",
                            email: "Please enter a valid email address.",
                            regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
                        },
                        name: {
                            required: "Please enter name",
                            regex: "Special character & number not allowed"
                        },
                        phone: {
                            required: "Please enter a phone number.",
                            number: "Please enter a valid phone number.",
                            minlength: "Your phone must be at min 7 digits",
                            maxlength: "Your phone must be at max 10 digits"
                        },
                        leadid: {
                            required: "Please select lead",
                        },
                        web_id: {
                            required: "Please select website", 
                        },
                        pak_id: {
                            required: "Please select package",
                        },
                        no_pax: {
                            required: "Please select no of pax",
                            number: "number only allowed",
                            maxlength: "Maximum 4 digits accepted",
                        },
                        book_date: {
                            required: "Please enter for preferable date you want to book",
                        },
                        book_time: {
                            required: "Please enter for preferable time you want to book",
                        },
                        durations: {
                            required: "Please enter for how many hour want to book",
                        },
                        discount: {
                            required: "Please enter discount",
                            regex: "Only interger and decimal number are allowed",
                        },
                        amount: {
                            regex: "Only interger and decimal number are allowed",
                        },
                        sub_total: {
                            required: "Please enter sub total",
                            regex: "Only interger and decimal number are allowed",
                        },
                        total_amount: {
                            required: "Please enter total amount",
                            regex: "Only interger and decimal number are allowed",
                        },
                        address: {
                            required: "Please full address",
                        },
                        payment_method: {
                            required: "Please select payment method",
                        },
                        payment_status: {
                            required: "Please select payment method",
                        },
                      },
                    onfocusout: function(element) {
                        this.element(element);
                    },
                    submitHandler: function(form,event){
                        event.preventDefault();// using this page stop being refreshing
                        var formData = new FormData();
                        formData.append('user_id', $('#user_id').val());
                        formData.append('web_id', $('#web_id').val());
                        formData.append('pak_id', $('#pak_id').val());
                        formData.append('no_pax', $('#no_pax').val());
                        formData.append('book_date', $('#book_date').val());
                        formData.append('book_time', $('#book_time').val());
                        formData.append('durations', $('#durations').val());
                        formData.append('durations', $('#durations').val());
                        formData.append('discount', $('#discount').val());
                        formData.append('sub_total', $('#sub_total').val());
                        formData.append('total_amount', $('#total_amount').val());
                        formData.append('address', $('#address').val());
                        formData.append('amount', $('#amount').val());
                        formData.append('name', $('#name').val());
                        formData.append('phone', $('#phone').val());
                        formData.append('payment_method', $('#payment_method').val());
                        formData.append('payment_status', $('#payment_status').val());
                        formData.append('booking_id', '');
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            async:false,
                            cache:false,
                            contentType:false,
                            enctype:'multipart/form-data',
                            processData:false,
                            data: formData,
                            success: function(res) {
                                var resD = $.parseJSON(res);
                                if(resD.status=='1'){
                                    var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> '+resD.msg+'.</div>';
                                    $('#massage').html(html);
                                    $("html, body").animate({ scrollTop: 0 }, "fast");
                                    window.setTimeout(function () {
                                        location.href = "<?php echo site_url('admin/bookings') ?>/"+resD.url;
                                    }, 1000);
                                } else { 
                                    var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> '+resD.msg+'.</div>';
                                    $('#massage').html(html);
                                    $("html, body").animate({ scrollTop: 0 }, "fast");
                                }
                            }
                        });
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click',".new_exsting",function(){
                    var radioValue = $("input[name='new_exsting']:checked").val();
                    var id = $("input[name='new_exsting']").attr('id');
                    if(radioValue!=undefined || radioValue!=''){
                        if(radioValue==2){
                            var formData1 = new FormData();
                            formData1.append('new_exsting', radioValue);
                            $.ajax({
                                url: "<?php echo site_url('admin/bookings/existingCustomer') ?>",
                                type: "POST",
                                async:false,
                                cache:false,
                                contentType:false,
                                enctype:'multipart/form-data',
                                processData:false,
                                data: formData1,
                                success: function(res) {
                                    var resD = $.parseJSON(res);
                                    if(resD.status=='1'){
                                        var html='';
                                        html +='<option value="">--Select One--</option>';
                                        $.each(resD.datas, function( index, value ) {
                                            html +='<option value="'+index+'">'+value+'</option>';
                                        });
                                        $("#newemailid").html('<select id="emailid" name="emailid" class="form-control show-tick"></select>');
                                        $('#emailid').html(html).selectpicker('refresh');
                                        $('#newuserdetails').css({'display':'none'});
                                    } else {
                                        $('#emailid-error').show();
                                        $('#emailid-error').html(resD.msg);
                                    }
                                }
                            });
                        } else {
                            $("#newemailid").html('<input type="text" name="emailide" id="emailid" class="form-control" value="" placeholder="E-mail" />');
                            $('#newuserdetails').css({'display':'block'});
                        }
                    } else {
                        $("#newemailid").html('<input type="text" name="emailide" id="emailid" class="form-control" value="" placeholder="E-mail" />');
                        $('#newuserdetails').css({'display':'block'});
                    }
                });
                $(document).on('click',".new_exstingL",function(){
                    var radioValue = $("input[name='new_exstingL']:checked").val();
                    var id = $("input[name='new_exstingL']").attr('id');
                    if(radioValue!=undefined || radioValue!=''){
                        if(radioValue==2){
                            var formData1 = new FormData();
                            formData1.append('new_exstingL', radioValue);
                            formData1.append('user_id', $('#user_id').val());
                            formData1.append('emailid', $('#emailid').val());
                            $.ajax({
                                url: "<?php echo site_url('admin/bookings/existingLead') ?>",
                                type: "POST",
                                async:false,
                                cache:false,
                                contentType:false,
                                enctype:'multipart/form-data',
                                processData:false,
                                data: formData1,
                                success: function(res) {
                                    var resD = $.parseJSON(res);
                                    if(resD.status=='1'){
                                        var html='';
                                        html +='<option value="">--Select One--</option>';
                                        $.each(resD.datas, function( index, value ) {
                                            html +='<option value="'+index+'">'+value+'</option>';
                                        });
                                        $("#newleadid").html('<select id="leadid" name="leadid" class="form-control show-tick"></select>');
                                        $('#leadid').html(html).selectpicker('refresh');
                                    } else {
                                        $('#emailid-error').show();
                                        $('#emailid-error').html(resD.msg);
                                    }
                                }
                            });
                        } else {
                            $("#newleadid").html('<input type="text" name="leadid" id="leadid" class="form-control" value="" placeholder="Leads" />');
                        }
                    } else {
                        $("#newleadid").html('<input type="text" name="leadid" id="leadid" class="form-control" value="" placeholder="Leads" />');
                    }
                });
                $(document).on('change',"#emailid",function(){
                    $('#user_id').val($(this).val());
                });
                $(document).on('change',"#leadid",function(){
                    $('#lead_id').val($(this).val());
                    var formData1 = new FormData();
                    formData1.append('lead_id', $('#leadid').val());
                    $.ajax({
                        url: "<?php echo site_url('admin/bookings/existingLeadDetails') ?>",
                        type: "POST",
                        async:false,
                        cache:false,
                        contentType:false,
                        enctype:'multipart/form-data',
                        processData:false,
                        data: formData1,
                        success: function(res) {
                            var resD = $.parseJSON(res);
                            if(resD.status=='1'){
                                var data = resD.datas;
                                if(data.web_id >0){
                                    $('#web_id').val(data.web_id).selectpicker('refresh');
                                }
                                if(data.pak_id >0){
                                    $('#pak_id').val(data.pak_id).selectpicker('refresh');
                                }
                                $('#no_pax').val(data.no_of_pax);
                                $('#book_date').attr('type','text');
                                $('#book_date').val(data.date_of_trip);
                                $('#book_time').val(data.time_of_trip);
                                //$('#book_date').attr('type','date');
                            } else {
                                $('#pak_id').val('').selectpicker('refresh');
                                $('#web_id').val('').selectpicker('refresh');
                                $('#no_pax').val('');
                                $('#book_date').val('');
                                $('#book_time').val('');
                            }
                        }
                    });
                });

                $(document).on('focusout',"input[name='emailide']",function(){
                    var formData1 = new FormData();
                    formData1.append('email', $('#emailid').val());
                    $.ajax({
                        url: "<?php echo site_url('admin/bookings/existingEmail') ?>",
                        type: "POST",
                        async:false,
                        cache:false,
                        contentType:false,
                        enctype:'multipart/form-data',
                        processData:false,
                        data: formData1,
                        success: function(res) {
                            var resD = $.parseJSON(res);
                            if(resD.status=='1'){
                                $('#emailide-error').hide();
                            } else {
                                $('#emailid').val('');
                                $('#user_id').val('');
                                $('#emailide-error').html(resD.msg).show();
                            }
                        }
                    });
                });
            });
        </script>
        <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
        </script>