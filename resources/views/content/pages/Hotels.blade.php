@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
@section('content')
    <div class="container">
        <div class="section">
            <input type="hidden" value="{{ url('/category') }}" id="url">
            <input type="hidden" value="{{ csrf_token() }}" id="csfr_token">
            <div class="card ">
                <div class="d-flex justify-content-between p-4">
                    <h4 class="d-block mb-1 text-dark"> HOTEL </h4>

                    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar"> ADD NEW
                        HOTEL</button>
                    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#editEventSidebar"> Edit
                        HOTEL</button>

                </div>
                <div class="card-body text-center">
                    <table class="table1" id="user_list_table">
                        <thead>
                            <tr>
                                <th scope="col">HOTEL NAME</th>
                                <th scope="col">HOTEL TYPE</th>
                                <th scope="col">FEATURED IMAGE</th>
                                <th scope="col">NO OF ROOMS</th>
                                <th scope="col">ROOM CATEGORY</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- add product data --}}

    <div class="offcanvas offcanvas-end event-sidebar " tabindex="-1" id="addEventSidebar"
        aria-labelledby="addEventSidebarLabel" aria-modal="true" role="dialog">
        <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title" id="addEventSidebarLabel">Add Hotel</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


        <div class="offcanvas-body pt-0">
            <form action="{{ url('/') }}/product" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">HOTEL CATEGORY</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected value="0">Corbett Hotels</option>
                            <option value="1">Nainitals Hotels</option>
                        </select>
                        <span class="text-danger">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Hotel Name</label>
                        <input type="text" class="form-control" name="name" id=" "
                            placeholder="enter product name" value="">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Hotel Type</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="one">2 star</option>
                            <option value="two">3 star</option>
                            <option value="three">4 star</option>
                            <option value="three">5 star</option>
                        </select>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">No of Rooms</label>
                        <input type="number" class="form-control" name="price" id=" " placeholder="No of Rooms"
                            value="{{ old('Price') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Room Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="Fruits">LUXURY COTTAGE</option>
                            <option value="Vegitable">LUXURY VILLA</option>
                            <option value="Fast_food">LUXURY COTTAGE , LUXURY VILLA</option>
                            <option value="Meat">COTAGES</option>
                        </select>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Add Amenties</label>
                        <div class="demo-inline-spacing">
                            <span class="badge rounded-pill bg-primary bg-glow">Primary</span>
                            <span class="badge rounded-pill bg-secondary bg-glow">Secondary</span>
                            <span class="badge rounded-pill bg-success bg-glow">Success</span>
                            <span class="badge rounded-pill bg-danger bg-glow">Danger</span>
                            <span class="badge rounded-pill bg-warning bg-glow">Warning</span>
                            <span class="badge rounded-pill bg-info bg-glow">Info</span>
                            <span class="badge rounded-pill bg-dark bg-glow">Dark</span>
                        </div>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>





                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Add Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                        <span class="text-danger">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <p id="image"></p>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="image">FEATURED IMAGES</label>
                        <input type="file" name="image" required class=" form-control" onchange="preview()">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="confirm-password">TEXT</label>
                        <textarea class="form-control" name="description" id="textarea" cols="30" rows="5">
                        </textarea>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>


    {{-- edit product data --}}

    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="editEventSidebar"
        aria-labelledby="addEventSidebarLabel" aria-modal="true" role="dialog">
        <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title" id="addEventSidebarLabel">Edit Hotels</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


        <div class="offcanvas-body pt-0">
            {{-- <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data" id="editForm">
            --}}
            <form action="#" method="post" enctype="multipart/form-data" id="editForm">
                <input type="hidden" value="" name="product_id" id="product_id" />
                @csrf

                <div class="container">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Hotel Name</label>
                        <input type="text" class="form-control" name="name" id=" "
                            placeholder="enter product name" value="">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Hotel Type</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="Fruits">2 star</option>
                            <option value="Vegitable">3star</option>
                            <option value="Fast_food">4star</option>
                        </select>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Room Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="Fruits">LUXURY COTTAGE</option>
                            <option value="Vegitable">LUXURY VILLA</option>
                            <option value="Fast_food">LUXURY COTTAGE , LUXURY VILLA</option>
                            <option value="Meat">COTAGES</option>
                        </select>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">No of Rooms</label>
                        <input type="number" class="form-control" name="price" id=" "
                            placeholder="No of Rooms" value="{{ old('Price') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="fname">Add Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                        <span class="text-danger">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <p id="image"></p>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="image">FEATURED IMAGES</label>
                        <input type="file" name="image" required class=" form-control" onchange="preview()">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="confirm-password">TEXT</label>
                        <textarea class="form-control" name="description" id="textarea" cols="30" rows="5">
                        </textarea>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script>
        var table = $('#user_list_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url + "/showdata",
                data: {
                    "_token": csfr_token
                },
                dataType: "json",
                type: "GET"
            },



        });
    </script>

@endsection
