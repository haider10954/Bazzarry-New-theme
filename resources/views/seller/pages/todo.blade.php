@extends('admin.layout.layout')
@section('title','Admin-Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                <div class="file-manager-content w-100 p-4 pb-0">
                    <div class="hstack mb-4">
                        <h5 class="fw-semibold flex-grow-1 mb-0">Bazaarry Dashboard ToDo</h5>
                    </div>
                    <div class="p-3 bg-light rounded mb-4">
                        <div class="row g-2">
                            <div class="col-lg-auto">
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" data-choices="" data-choices-search-false="" name="choices-select-sortlist" id="choices-select-sortlist" tabindex="-1" data-choice="active" hidden=""><option value="" data-custom-properties="[object Object]">Sort</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Sort</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-select-sortlist-item-choice-3" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="3" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Sort</div><div id="choices--choices-select-sortlist-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="By ID" data-select-text="Press to select" data-choice-selectable="">By ID</div><div id="choices--choices-select-sortlist-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="By Name" data-select-text="Press to select" data-choice-selectable="">By Name</div></div></div></div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" data-choices="" data-choices-search-false="" name="choices-select-status" id="choices-select-status" tabindex="-1" data-choice="active" hidden=""><option value="" data-custom-properties="[object Object]">All Tasks</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">All Tasks</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-select-status-item-choice-1" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">All Tasks</div><div id="choices--choices-select-status-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Completed" data-select-text="Press to select" data-choice-selectable="">Completed</div><div id="choices--choices-select-status-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Inprogress" data-select-text="Press to select" data-choice-selectable="">Inprogress</div><div id="choices--choices-select-status-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="New" data-select-text="Press to select" data-choice-selectable="">New</div><div id="choices--choices-select-status-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Pending" data-select-text="Press to select" data-choice-selectable="">Pending</div></div></div></div>
                            </div>
                            <div class="col-lg">
                                <div class="search-box">
                                    <input type="text" id="searchTaskList" class="form-control search" placeholder="Search task name">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal" data-bs-target="#createTask">
                                    <i class="ri-add-fill align-bottom"></i> Add Tasks
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                        <div id="elmLoader"></div>
                        <div class="todo-task" id="todo-task">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Vendor</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="apps-ecommerce-order-details.html"
                                               class="fw-medium link-primary">#VZ2112</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img
                                                        src="{{asset('admin_assets/images/users/avatar-1.jpg')}}"
                                                        alt="" class="avatar-xs rounded-circle"/>
                                                </div>
                                                <div class="flex-grow-1">Alex Smith</div>
                                            </div>
                                        </td>
                                        <td>Clothes</td>
                                        <td>
                                            <span class="text-success">$109.00</span>
                                        </td>
                                        <td>Zoetic Fashion</td>
                                        <td>
                                            <span class="badge badge-soft-success">Paid</span>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 fw-medium mb-0">5.0<span
                                                    class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td>
                                            <a href="apps-ecommerce-order-details.html"
                                               class="fw-medium link-primary">#VZ2111</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img
                                                        src="{{asset('admin_assets/images/users/avatar-2.jpg')}}"
                                                        alt="" class="avatar-xs rounded-circle"/>
                                                </div>
                                                <div class="flex-grow-1">Jansh Brown</div>
                                            </div>
                                        </td>
                                        <td>Kitchen Storage</td>
                                        <td>
                                            <span class="text-success">$149.00</span>
                                        </td>
                                        <td>Micro Design</td>
                                        <td>
                                            <span class="badge badge-soft-warning">Pending</span>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 fw-medium mb-0">4.5<span
                                                    class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td>
                                            <a href="apps-ecommerce-order-details.html"
                                               class="fw-medium link-primary">#VZ2109</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img
                                                        src="{{asset('admin_assets/images/users/avatar-3.jpg')}}"
                                                        alt="" class="avatar-xs rounded-circle"/>
                                                </div>
                                                <div class="flex-grow-1">Ayaan Bowen</div>
                                            </div>
                                        </td>
                                        <td>Bike Accessories</td>
                                        <td>
                                            <span class="text-success">$215.00</span>
                                        </td>
                                        <td>Nesta Technologies</td>
                                        <td>
                                            <span class="badge badge-soft-success">Paid</span>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 fw-medium mb-0">4.9<span
                                                    class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td>
                                            <a href="apps-ecommerce-order-details.html"
                                               class="fw-medium link-primary">#VZ2108</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img
                                                        src="{{asset('admin_assets/images/users/avatar-4.jpg')}}"
                                                        alt="" class="avatar-xs rounded-circle"/>
                                                </div>
                                                <div class="flex-grow-1">Prezy Mark</div>
                                            </div>
                                        </td>
                                        <td>Furniture</td>
                                        <td>
                                            <span class="text-success">$199.00</span>
                                        </td>
                                        <td>Syntyce Solutions</td>
                                        <td>
                                            <span class="badge badge-soft-danger">Unpaid</span>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 fw-medium mb-0">4.3<span
                                                    class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                        </td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <td>
                                            <a href="apps-ecommerce-order-details.html"
                                               class="fw-medium link-primary">#VZ2107</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img
                                                        src="{{asset('admin_assets/images/users/avatar-6.jpg')}}"
                                                        alt="" class="avatar-xs rounded-circle"/>
                                                </div>
                                                <div class="flex-grow-1">Vihan Hudda</div>
                                            </div>
                                        </td>
                                        <td>Bags and Wallets</td>
                                        <td>
                                            <span class="text-success">$330.00</span>
                                        </td>
                                        <td>iTest Factory</td>
                                        <td>
                                            <span class="badge badge-soft-success">Paid</span>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 fw-medium mb-0">4.7<span
                                                    class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                        </td>
                                    </tr><!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
