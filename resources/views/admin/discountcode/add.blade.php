@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Discount Code</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
              <form action="{{ url('admin/discount_code/insert') }}" method="post">
                   {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label>Discount Code Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Discount Code Name">
                </div>

                <div class="form-group">
                    <label>Type <span style="color:red">*</span></label>
                    <select class="form-control" required name="type">
                        <option {{ (old('type') == 'Amount') ? 'selected' : '' }} value="Amount">Amount</option>
                        <option {{ (old('type') == 'Percent') ? 'selected' : '' }} value="Percent">Percent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Percent / Amount<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="percent_amount" required value="{{ old('percent_amount') }}" placeholder="Percent / Amount">
                </div>

                <div class="form-group">
                    <label>Expire Date<span style="color:red">*</span></label>
                    <input type="date" class="form-control" name="expire_date" required value="{{ old('expire_date') }}">
                </div>

                <div class="form-group">
                    <label>Status <span style="color:red">*</span></label>
                    <select class="form-control" required name="status">
                        <option {{ (old('status, $getRecord->status') == 0) ? 'selected' : '' }} value="0">Active</option>
                        <option {{ (old('status, $getRecord->status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
  @endsection
  @section('script')
@endsection