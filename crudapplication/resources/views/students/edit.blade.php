@extends('students.layout')

@section('content')
<br>
<div class="card">
    <!-- <div class="card-header">Contact Us Page</div> -->
    <div class="card-body">
        <form action="{{ url('phonebooks/' .$students->id) }}" method="post">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" id="id" value="{{ $students->id }}" />
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ $students->address }}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="{{ $students->mobile }}" class="form-control @error('mobile') is-invalid @enderror">
                @error('mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <input type="submit" value="Update" class="btn btn-success">
        </form>
    </div>
</div>
@stop