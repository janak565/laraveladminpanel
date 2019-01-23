
@foreach($childs as $child)
	<option value="{{$child->id}}" {{ $child->id==$category_parent_id?'selected':''}}>
		<?php echo str_repeat('&nbsp;&nbsp;', $depth).'|'.str_repeat('-', $depth); ?>
 
	    {!! $child->category_name !!}
	
	</option>
	@if(count($child->childs))

		@php $depth1 = $depth+3 @endphp 

		@include('admin.managechild.managechildcategory',['childs' => $child->childs,'depth'=>$depth1])
        @endif
@endforeach
</ul>