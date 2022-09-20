@extends('layouts.head')
@section('content')

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

 @include('layouts.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
       @include('layouts.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

               
                    
                    <div class="row layout-top-spacing">
                    
                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Add product</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                          @if(Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                            <form action="/product" method="post">
                                                @csrf
                                                  @method("PUT")
                                                <div class="form-group">
                                                    <label for="t-text" class="sr-only">Text</label>
                                                    <input id="t-text" type="name" name="product" value="{{ old('product') }}" class="@error('product') is-invalid @enderror form-control"  placeholder="product name" class="form-control">
                                                     @error('product')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        </div>
                                                    <br>
                                                           <div class="form-group">
                                                    <label for="t-text" class="sr-only">Text</label>
                                                    <input id="t-text" type="text" name="quantity" value="{{ old('quantity') }}" class="@error('quantity') is-invalid @enderror form-control" placeholder="product quantity" class="form-control">
                                                     @error('quantity')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                                <br>
                                                            <div class="input-group mb-4">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                                <span class="input-group-text">0.00</span>
                                                            </div>
                                                            <input type="text" name='price' class="form-control" value="{{ old('price') }}" class="@error('price') is-invalid @enderror form-control" placeholder="price"  aria-label="Amount (to the nearest dollar)">
                                                             @error('price')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            </div>
                                                          
                                                       


                                                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                                                </div>


                                            </form>
                                        </div>                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                 


                      




                        
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
@endsection