@include('layouts/header')

<div class="container">
 
    <div class="row">
     {{Form::open(['url'=>'view-order','method'=>'post']) }}
        <div class="col-sm-4">
      <div class="form-group">
    <label for="email">Paid By:</label>
   {{ Form::select('selPaidBy', [],0,['class'=>'form-control']) }}
</div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
    <label for="email">Order Date:</label>
   {{ Form::select('selOrderDate', [],'',['class'=>'form-control']) }}
</div>
    </div>
     <div class="col-sm-4">
    <div class="form-group">
  
        <button type="submit" class="btn btn-default" style="margin-top: 22px">Search</button>
</div>
    </div>
        {{Form::close() }}
  </div>
  
</div>

@include('layouts/footer');
