@extends('cms.master')

@section('content')

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>  

  <div class="row">
    
    <div class="col-md-6">
      
      @if(count($menus) > 0)
      
        <h3>Edit content</h3>
        
        <form method="post" action="{{ url('cms/contents/' . $contents['id']) }}">
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PATCH" />
          
          <div class="form-group">
            <label for="exampleInputMenu1">Menu</label>
            <select name="menu" class="form-control">
              
              @foreach($menus as $row)              
                <option value="{{ $row->id }}">{{ $row->link }}</option>              
              @endforeach
              
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleInputTitle1">Content title</label>
            <input type="text" value="{{ $contents['title'] }}" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title">
          </div>
            
          <div class="form-group">
            <label for="exampleInputArticle1">Content article</label>
            <textarea name="article" class="form-control" rows="10">{{ $contents['body'] }}</textarea>
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Update content</button>
          <a class="btn btn-default" href="{{ url('cms/contents') }}">Cancel</a>
          
        </form>
        
      @else      
        <i>No categories...</i>      
      @endif
      
    </div>
    
  </div>

@stop
