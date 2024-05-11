@extends('layouts.app')

@section('title', 'Test Page')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Testpage</h1>
    </div>
    <div class="section-body">
        Here content
    </div>
  </section>
@endsection

@section('sidebar')
  @parent
@endsection
