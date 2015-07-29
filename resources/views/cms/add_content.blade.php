@extends('cms.master')

@section('content')

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>   

  <div class="row">
    
    <div class="col-md-6">
      
      @if(count($menus) > 0)
            
        <h2>Add new content</h2>
        
        <form method="post" action="{{ url('cms/contents') }}" enctype="multipart/form-data">
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="menu_dafault" value="default" />
          
          <div class="form-group">
            <label for="exampleInputMenu1">Menu link</label>
            <select name="menu" class="form-control">
              <option value="default">Choose link...</option>
              
              @foreach($menus as $row)              
                <option value="{{ $row['id'] }}">{{ $row['link'] }}</option>             
              @endforeach
              
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleInputTitle1">Content title</label>
            <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title">
          </div>
            
          <div class="form-group">
            <label for="exampleInputArticle1">Content article</label>
            <textarea name="article" class="form-control" rows="10"></textarea>
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Save content</button>
          <a class="btn btn-default" href="{{ url('cms/contents') }}">Cancel</a>
          
        </form>
      
      @else     
        <i>No link in menu...</i><br /><br />
        <p>
          <a class="btn btn-primary btn-sm" href="{{ url('cms/menu/create') }}" role="button">+ Add new link</a>
          <a class="btn btn-default btn-sm" href="{{ url('cms/contents') }}">Back to contents</a>
        </p>    
      @endif
      
    </div>
    
  </div>

@stop
