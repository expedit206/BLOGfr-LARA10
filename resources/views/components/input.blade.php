@if ($type==="textarea")
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <textarea  name="{{$name}}" id= "{{$name}}" class="form-control @error($name) is-invalid @enderror"> {{$slot}} </textarea>
   
    </div>    
    @else
    
    <div class="form-group">
        <label for="{{$name}}">{{$label}}</label>
        <input name="{{$name}}" id= "{{$name}}" class="form-control @error($name)
    
    is-invalid       

       @endif" value="{{old($name) ?? $value }}" type="{{$type}}">
    </div> 
@endif


@error($name)
   <div class="alert alert-info w-full">

       {{$message}}
   </div>

   {{-- @dd($errors) --}}
       
   @enderror