@include('Collection-boy.partials.header')

    <div class="ms-content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h1 class="db-header-title">Welcome, Admin</h1>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Admin</h6>
                            <p class="ms-card-change"><i class="fas fa-arrow-up"></i> 5</p>
                            <p class="fs-12">48% From Last 24 Hours</p>
                        </div>
                    </div>
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-warning ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>All Vendors</h6>
                            <p class="ms-card-change"><i class="fas fa-arrow-up"></i> 25</p>
                            <p class="fs-12">48% From Last 24 Hours</p>
                        </div>
                    </div>
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>All Users</h6>
                            <p class="ms-card-change"><i class="fas fa-arrow-up"></i> 1150</p>
                            <p class="fs-12">2% Decreased from last Month</p>
                        </div>
                    </div>
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>All Order</h6>
                            <p class="ms-card-change"><i class="fas fa-arrow-up"></i> 2505</p>
                            <p class="fs-12">2% Decreased from last Month</p>
                        </div>
                    </div>
                    <i class="fas fa-shipping-fast"></i>
                </div>
            </div>

            <!-- Food Orders -->
            <div class="col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Trending Orders</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row">

                            <!-- Infographics Widgets -->
                            <div class="col-xl-3 col-md-6">
                                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                                    <span class="ms-chart-label bg-success"><i class="fas fa-arrow-up"></i> 3.2%</span>
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <span>Total Lab Orders</span>
                                            <h2>220</h2>
                                        </div>
                                    </div>
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                                    <span class="ms-chart-label bg-danger"><i class="fas fa-arrow-down"></i> 4.5%</span>
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <span>New Lab Orders</span>
                                            <h2>20</h2>
                                        </div>
                                    </div>
                                    <canvas id="line-chart-2"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                                    <span class="ms-chart-label bg-success"><i class="fas fa-arrow-up"></i> 12.5%</span>
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <span>Repeat Lab Orders</span>
                                            <h2>8</h2>
                                        </div>
                                    </div>
                                    <canvas id="line-chart-3"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                                    <span class="ms-chart-label bg-success"><i class="fas fa-arrow-up"></i> 9.5%</span>
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <span>Cancel Lab Orders</span>
                                            <h2>11</h2>
                                        </div>
                                    </div>
                                    <canvas id="line-chart-4"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END/Food Orders -->


            <!-- Recent Orders Requested -->
            <div class="col-xl-6 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center align-left">
                                <h6>Recent Lab Orders Requested</h6>
                            </div>
                            <button type="button" class="btn btn-primary">View All</button>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Food Item</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Product ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ms-table-f-w"> <img src="{{ URL::asset('admin/img/costic/pizza.jpg') }}" alt="people"> Pizza </td>
                                        <td>$19.99</td>
                                        <td>67384917</td>
                                    </tr>
                                    <tr>
                                        <td class="ms-table-f-w"> <img src="{{ URL::asset('admin/img/costic/french-fries.jpg') }}" alt="people"> French Fries </td>
                                        <td>$14.59</td>
                                        <td>789393819</td>
                                    </tr>
                                    <tr>
                                        <td class="ms-table-f-w"> <img src="{{ URL::asset('admin/img/costic/cereals.jpg') }}" alt="people"> Multigrain Hot Cereal </td>
                                        <td>$25.22</td>
                                        <td>137893137</td>
                                    </tr>
                                    <tr>
                                        <td class="ms-table-f-w"> <img src="{{ URL::asset('admin/img/costic/egg-sandwich.jpg') }}" alt="people"> Fried Egg Sandwich </td>
                                        <td>$11.23</td>
                                        <td>235193138</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-header new">
                        <h6>Monthly Lab Revenue</h6>
                        <select class="form-control new" id="exampleSelect">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March </option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="1">June</option>
                                <option value="2">July</option>
                                <option value="3">August</option>
                                <option value="4">September</option>
                                <option value="5">October</option>
                                <option value="4">November</option>
                                <option value="5">December</option>
                            </select>
                    </div>
                    <div class="ms-panel-body">
                        <span class="progress-label"> <strong>Week 1</strong> </span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <span class="progress-label"> <strong>Week 2</strong> </span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <span class="progress-label"> <strong>Week 3</strong> </span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                        <span class="progress-label"> <strong>Week 4</strong> </span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Food Orders -->
            <div class="col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Trending Orders</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row">

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="ms-card no-margin">
                                    <div class="ms-card-img">
                                        <img src="{{ URL::asset('admin/img/costic/food-5.jpg') }}" alt="card_img">
                                    </div>
                                    <div class="ms-card-body">
                                        <div class="ms-card-heading-title">
                                            <h6>Meat Stew</h6>
                                            <span class="green-text"><strong>$25.00</strong></span>
                                        </div>

                                        <div class="ms-card-heading-title">
                                            <p>Orders <span class="red-text">15</span></p>
                                            <p>Income <span class="red-text">$175</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="ms-card no-margin">
                                    <div class="ms-card-img">
                                        <img src="{{ URL::asset('admin/img/costic/food-2.jpg') }}" alt="card_img">
                                    </div>
                                    <div class="ms-card-body">
                                        <div class="ms-card-heading-title">
                                            <h6>Pancake</h6>
                                            <span class="green-text"><strong>$50.00</strong></span>
                                        </div>

                                        <div class="ms-card-heading-title">
                                            <p>Orders <span class="red-text">75</span></p>
                                            <p>Income <span class="red-text">$275</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="ms-card no-margin">
                                    <div class="ms-card-img">
                                        <img src="{{ URL::asset('admin/img/costic/food-4.jpg') }}" alt="card_img">
                                    </div>
                                    <div class="ms-card-body">
                                        <div class="ms-card-heading-title">
                                            <h6>Burger</h6>
                                            <span class="green-text"><strong>$45.00</strong></span>
                                        </div>

                                        <div class="ms-card-heading-title">
                                            <p>Orders <span class="red-text">85</span></p>
                                            <p>Income <span class="red-text">$575</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="ms-card no-margin">
                                    <div class="ms-card-img">
                                        <img src="{{ URL::asset('admin/img/costic/food-3.jpg') }}" alt="card_img">
                                    </div>
                                    <div class="ms-card-body">
                                        <div class="ms-card-heading-title">
                                            <h6>Saled</h6>
                                            <span class="green-text"><strong>$85.00</strong></span>
                                        </div>
                                        <div class="ms-card-heading-title">
                                            <p>Orders <span class="red-text">175</span></p>
                                            <p>Income <span class="red-text">$775</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@include('Collection-boy.partials.footer')
