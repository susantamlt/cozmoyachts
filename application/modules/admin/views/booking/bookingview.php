        <section class="content">
            <input type="hidden" name="page" id="page" value="booking" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Booking Details</h2>
                            </div>
                            <div class="body">
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> OrderId: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['order_id']; ?></div>
                                    <label class="col-md-2"> Website Name: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['web_name']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> UserName: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['user_name']; ?></div>
                                    <label class="col-md-2"> Yacht Name: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['package_name']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Booking Date: </label>
                                    <div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['book_date'])); ?></div>
                                    <label class="col-md-2"> Booking Time: </label>
                                    <div class="col-md-4"><?php echo date('h:i A', strtotime($ljp_Data[0]['book_time'])); ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Durations: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['durations']; ?></div>
                                    <label class="col-md-2"> Discount: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['discount']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Exclusive Facilities Amount: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['amount']; ?></div>
                                    <label class="col-md-2"> Sub Total: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['sub_total']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Total Amount: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['total_amount']; ?></div>
                                    <label class="col-md-2"> Payment Method: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['payment_method']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Payment Status: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['payment_status']; ?></div>
                                    <label class="col-md-2"> Booking Status: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['booking_status']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Facilities: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['facilities']; ?></div>
                                    <label class="col-md-2"> Address: </label>
                                    <div class="col-md-4"><?php echo $ljp_Data[0]['address']; ?></div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-md-2"> Order Created Date: </label>
                                    <div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['created_at'])); ?></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="<?php echo site_url('admin/bookings/') ?>" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>