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
                
                  <div id="tableProgress" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Progress Table</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Agent</th>
                                                    <th>Producct</th>
                                                    <th>peice</th>
                                                    <th>quantity</th>
                                                     <th>Total</th>
                                                     <th>Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            @if(Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                            <tbody>
                                            @foreach ($mysales as $mysaless)
                                                <tr>
                                                    <td>{{$mysaless->name}}</td>
                                                    <td>{{$mysaless->product}}</td>
                                                    <td>#{{$mysaless->price}}</td>
                                                    <td>{{$mysaless->quantity}}</td>
                                                    <td>#{{$mysaless->total}}</td>
                                                    <td>{{$mysaless->status}}</td>
                                                    {{--  {!! Form::model($mysaless, ['method' => 'PATCH', 'route' => ['mysales.changeStatus', $mysaless]]) !!}
                                                     <td><button type="submit" class="btn btn-primary mb-2">{{ ($mysaless->status == 'Pending' ? 'confirmed' : 'Pending' )}}</button></td>
                                                      {!! Form::close() !!}     --}}
                                                    <td class="text-center">
                                                        <div class="col-lg-12"> 
                                                    <div class="btn-group mb-4 mr-2" role="group">
                                                        <button id="btndefault" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                                        <div class="dropdown-menu" aria-labelledby="btndefault">
                                                         {!! Form::model($mysaless, ['method' => 'PATCH', 'route' => ['mysales.changeStatus', $mysaless]]) !!}
                                                            <a href="{{url('/mysales/'.$mysaless->id)}}" onclick="return confirm('are u sure u want to continue')" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>{{ $mysaless->status == 'Pending' ? 'Pending' : 'confirmed' }}</a>
                                                             {!! Form::close() !!}   
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Something else here</a>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-dots mr-1"></i>Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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