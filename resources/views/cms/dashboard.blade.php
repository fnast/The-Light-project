@extends('cms.master')

@section('content')

  <div class="row">  
    <div class="col-md-3">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row sp-font">
            <div class="col-xs-3">
              <i class="glyphicon glyphicon-shopping-cart huge"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{ $new_orders }}</div>
              <div>New Orders!</div>
            </div>
          </div>
        </div>
         <a href="{{ url('cms/orders?status=1') }}">
           <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
             <div class="clearfix"></div>
          </div>
         </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row sp-font">
            <div class="col-xs-3">
              <i class="glyphicon glyphicon-check huge"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{ $delivered }}</div>
              <div>Delivered orders</div>
            </div>
          </div>
        </div>
         <a href="{{ url('cms/orders?status=3') }}">
           <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
             <div class="clearfix"></div>
          </div>
         </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row sp-font">
            <div class="col-xs-3">
              <i class="glyphicon glyphicon-plane huge"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{ $in_trans }}</div>
              <div>Orders in transit</div>
            </div>
          </div>
        </div>
         <a href="{{ url('cms/orders?status=2') }}">
           <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
             <div class="clearfix"></div>
          </div>
         </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row sp-font">
            <div class="col-xs-3">
              <i class="glyphicon glyphicon-user huge"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{ $users }}</div>
              <div>Registered Users</div>
            </div>
          </div>
        </div>
         <a href="{{ url('cms/users') }}">
           <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
             <div class="clearfix"></div>
          </div>
         </a>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <h2 class="sub-header">Orders</h2>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Customer</th>
              <th>Status</th>
              <th>Price</th>
            </tr>
          </thead>
          
          @foreach($orders as $row) 
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->date }}</td>
              <td>{{ $row->name }}</td>
              <td><span class="label label-{{ $row->class }}">{{ $row->status }}</span></td>
              <td>{{ $row->total }} $</td>              
            </tr>          
          @endforeach
            
        </table>
      </div>
    </div>
  </div>  

@stop
