@extends('cms.master') 

@section('content')

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> 

  <div class="row">
    
    <div class="col-md-6">
    
      <h2>Add new categorie</h2>
      
      <form method="post" action="{{ url('cms/categories') }}" enctype="multipart/form-data">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group">
          <label for="exampleInputName1">Categorie name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name">
        </div>
            
        <div class="form-group">
          <label for="exampleInputArticle1">Categorie article</label>
          <textarea name="article" class="form-control" rows="10"></textarea>
        </div>
        
        <div class="form-group">
          <label for="exampleInputImage1">Categorie image</label>
          <input type="file" name="upload_file" />
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Save categorie</button>
        <a class="btn btn-default" href="{{ url('cms/categories') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop
