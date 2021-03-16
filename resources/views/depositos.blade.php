@extends('home')

@section('main')

<div id='calendar'></div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '{{$initialDate}}',
            initialView: 'dayGridMonth',
            locale: 'br',
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            events: @php
            echo json_encode($depositos);
            @endphp
        });

        calendar.render();
    })
</script>
@endsection
