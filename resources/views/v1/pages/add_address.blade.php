@extends('v1.layouts.master')


@section('title')
   | Add Address
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
            @if($errors->count() > 0)
               <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                     <li>{{$error}}</li>
                  @endforeach
               </div>
            @endif

            <form class="" action="/user/address/add/request/" method="post">
               {{ csrf_field() }}
               <h2 class="form-signin-heading">Add New Address</h2>

               <div class="form-group">
                  <label for="inputCountry">Country</label>
                  <input type="text" id="inputCountry" name="country" class="form-control" placeholder="Country" value="{{old('country')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputCity">City</label>
                  <input type="text" id="inputCity" name="city" class="form-control" placeholder="City" value="{{old('city')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputRegion">Region</label>
                  <input type="text" id="inputRegion" name="region" class="form-control" placeholder="Region" value="{{old('region')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputZip">Zip Code</label>
                  <input type="text" id="inputZip" name="zip" class="form-control" placeholder="Zip Code">
               </div>

               <button class="btn btn-primary btn-block" type="submit">Save</button>
            </form>
         </div>
      </div>
    </div>
@endsection
