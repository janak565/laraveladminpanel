@extends('layouts.adminLayout.admin_design');

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a> <a href="#" class="current">Add Category</a> </div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.addcategory')}}" name="add_category" id="add_category" novalidate="novalidate">
            	{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">Categroy Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Parent Category</label>
                <div class="controls">
                    <select name="category_parent_id" id="category_parent_id" style="width:220px;">
                    <option value='0' selected>Parent</option>
                    @foreach($categories as $category)
                    <option value='{{ $category->id }}'> {{ $category->category_name }}</option>
                    
                    @if(count($category->childs))
                        @include('backend.managechild.managechildcategory',['childs' => $category->childs,'depth'=>1,'category_parent_id'=>''])
                    @endif

                    @endforeach
                  </select>

                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <input type="text" name="category_desc" id="category_desc">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL (Start with http://)</label>
                <div class="controls">
                  <input type="text" name="category_url" id="category_url">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection