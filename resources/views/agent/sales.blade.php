@extends('agent.head')
@section('content')

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

 @include('agent.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
       @include('agent.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
         <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                   <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Sale product</h4>
                                        </div>
                                    </div>
                                </div>
                                
                                  @if(Session::has('error'))
                                    <div class="alert alert-danger text-center">
                                        {{Session::get('error')}}
                                    </div>
                                @endif

                                  @if(Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        {{Session::get('success')}}
                                    </div>
                                @endif  
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" action="/sales/{{$id}}" method="post">
                                    @csrf
                                      @method("put")
                                        <input type="hidden" name="customer_id" value="{{$id}}" />
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Product Name</label>
                                                <input type="text" name=product value="{{ old('product') }}" class="@error('product') is-invalid @enderror form-control">
                                                  @error('product')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                             <div class="col-md-12 mb-4">
                                                <label for="fullName">Quanity</label>
                                                <input type="text" name=quantity value="{{ old('quantity') }}" class="@error('quantity') is-invalid @enderror form-control">
                                                  @error('quantity')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                              <div class="col-md-12 mb-4">
                                                <label for="fullName">Amount</label>
                                                <input type="amount" name=amount value="{{ old('amount') }}" class="@error('amount') is-invalid @enderror form-control">
                                                  @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Submit form</button>
                                    </form>

                                    <div class="code-section-container show-code">

                                        <div class="code-section text-left">

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