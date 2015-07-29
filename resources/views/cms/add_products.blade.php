@extends('cms.master')

@section('content')

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>   

  <div class="row">
    
    <div class="col-md-6">
      
      @if(count($categories) > 0)
            
        <h2>Add new product to site shop</h2>
        
        <form method="post" action="{{ url('cms/products') }}" enctype="multipart/form-data">
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="categorie_dafault" value="default" />
          
          <div class="form-group">
            <label for="exampleInputCategorie1">Categorie</label>
            <select name="categorie" class="form-control">
              <option value="default">Choose categorie...</option>
              
              @foreach($categories as $row)              
                <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>             
              @endforeach
              
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleInputTitle1">Product title</label>
            <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPrice1">Product price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPrice1" placeholder="Enter price">
          </div>
            
          <div class="form-group">
            <label for="exampleInputArticle1">Product article</label>
            <textarea name="article" class="form-control" rows="10"></textarea>
          </div>
          
          <div class="form-group">
            <label for="exampleInputImage1">Product image</label>
            <input type="file" name="upload_file" />
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Save product</button>
          <a class="btn btn-default" href="{{ url('cms/products') }}">Cancel</a>
          
        </form>
      
      @else     
        <i>No categories...</i>      
      @endif
      
    </div>
    
  </div>

@stop
