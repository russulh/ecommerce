@extends('v1.layouts.master')


@section('title')
   | {{$user[0]->first_name}}s' Addresses
@endsection

@section('account')
   active
@endsection

@section('addresses')
   active
@endsection

@section('css')
   <style media="screen">
      .btn-xs{
         padding: 5px 5px;
         font-size: 12px;
      }

      .add-btn{
         margin-bottom: 1.5rem;
         float: right;
      }
   </style>
@endsection

@section('contain')
   <div class="container">
      <div class="row">

         <div class="col-lg-3 my-4">
            @include('v1.layouts.sidebar_user')
         </div>

         <div class="col-lg-9 my-4">
            {{-- <div class="row" id="root">
               <useraddress v-for="address in addresses" :address="address"></useraddress>
            </div> --}}
            <a href="/user/address/add" class="btn btn-primary add-btn">Add New Address</a>
            @if (sizeof($user[0]->addresses) >0 )
               <table id="example" class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>Country</th>
                        <th>City</th>
                        <th>Region</th>
                        <th>Zip Code</th>
                        <th>Aciton</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>Country</th>
                        <th>City</th>
                        <th>Region</th>
                        <th>Zip Code</th>
                        <th>Aciton</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($user[0]->addresses as $address)
                        <tr>
                           <td>{{$address->country}}</td>
                           <td>{{$address->city}}</td>
                           <td>{{$address->region}}</td>
                           <td>{{$address->zip_code}}</td>
                           <td class="text-center">
                              {{-- <a href="/user/address/update/{{$address->id}}" class="btn btn-warning btn-xs">Update</a> --}}
                              <a href="/user/address/delete/{{$address->id}}" class="btn btn-danger btn-xs">Delete</a>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            @endif
         </div>
      </div>
   </div>
@endsection

@section('js')
   {{-- <script src="https://unpkg.com/vue@2.4.2"></script>
   <script src="/js/vue.js"></script> --}}
   <script>
      // var app = new Vue({
      //    el: "#root",
      //    data:{
      //       addresses:{!!$user[0]->addresses!!}
      //    }
      // });
   </script>
@endsection
