@extends('layouts.view')
@section('content')
<div class="main" style="min-height:600px;display:flex;align-items:center;padding:20px;">

    <form class="form-horizontal form-label-left" style="width:100%;" novalidate action="{{route('storeissue.book')}}"
        method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" value="{{$id}}" name="book_id">

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top:0px;" for="student_id">Student Id <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="chosen-select" tabindex="2" data-placeholder="Select Registered Student" name="student_id" value="{{ old('student_id') }}">
            <option value=""></option>

            @if (isset($student))

                @foreach ($student as $item)
                    <option value="{{$item->id}}">
                        {{$item->dept_id}} ( {{$item->name}} )
                    </option>
                @endforeach

            @endif

        </select>
    </div>
</div>


<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-3">Issue Date<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" value="{{ old('issue_date') }}" name="issue_date" class="form-control" required="required">
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-3">Return Date<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" value="{{ old('return_date') }}" name="return_date" class="form-control" required="required">
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <button id="send" type="submit" class="btn btn-success">Issue Book</button>
    </div>
</div>
</form>
</div>

<style>
    .chosen-single{
        height: 30px !important;
    }
    .chosen-single span{
        height: 100% !important;
    }
</style>

@endsection
