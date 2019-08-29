@extends('layouts.admin')

@section('content')
<div class="card card-transparent">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <div id='calendar' style="height:500px;"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
      height: 780,
      locale: 'es',
      // put your options and callbacks here
      events: [
        @foreach($tasks as $task) {
          title: '{{ $task->comments }}',
          start: '{{ $task->start }}',
          url: 'http://google.com'
        },
        @endforeach
      ]
    })
  });
</script>
@endsection