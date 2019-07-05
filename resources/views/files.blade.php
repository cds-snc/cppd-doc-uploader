@extends('layouts.app')

@section('content')
    <manage-files :files="'{{ json_encode($files) }}'"></manage-files>
@endsection