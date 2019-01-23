@extends('layouts.adminLayout.admin_design');

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Categroy</a> </div>
    <h1>Categories</h1>
     @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List Category</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered {{ !empty($categroy_data) ? 'data-table' : ''  }}">
              <thead>
                <tr>
                  <tr></tr>
                  <th>Sr. No</th>
                  <th>Category Name</th>
                  <th>Category URL</th>
                   <th>Category Status</th>
                   <th>Parent Category</th>
                   <th>Action</th>
                </tr>
              </thead>
              <tbody>

    
              	@if(!empty($categroy_data))
              	
              		@php
						$categorycount = 1
					@endphp
					@foreach($categroy_data as  $categroy_data_value)
              		
                <tr class="gradeX">
                  <td class="center">{{$categorycount}}</td>
                  <td class="center">{{$categroy_data_value->category_name}}</td>
                  <td class="center">{{$categroy_data_value->url}}</td>
                  <td class="center">{{$categroy_data_value->status}}</td>
                  <td class="center">
                    @if($categroy_data_value->category_parent_id >0)
                    {{{ $allCategories[$categroy_data_value->category_parent_id] }}}
                    @else
                      -
                    @endif
                    </td>
                   <td class="center"> <div class="fr"><a href="{{route('admin.editcategory',$categroy_data_value->id)}}" class="btn btn-primary btn-mini">Edit</a> <a href="{{route('admin.deletecategory',$categroy_data_value->id)}}" class="btn btn-danger btn-mini delcat">Delete</a></div></td>
                </tr>
                @php $categorycount++@endphp
                @endforeach
                @else
                	<tr class="gradeX">
                  <td style="text-align:center;" colspan="5">Category Record Empty</td>
                                  </tr>		
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection