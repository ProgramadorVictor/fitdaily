@extends('template.login')
@section('titulo', 'Agenda')
@section('body')
    <div id="calendar"></div>
    {{-- <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
        </div>
    </section> --}}
@endsection

@section('script')
@endsection
<script>
    // $(document).ready(function() {
        // $('#calendar').evoCalendar();
    // });

    // document.addEventListener('DOMContentLoaded', function() {
    //     var calendar = new EvoCalendar('#calendar');
    //     calendar.init();
    // });
</script>

<script src="{{asset('js/script.js')}}"></script>