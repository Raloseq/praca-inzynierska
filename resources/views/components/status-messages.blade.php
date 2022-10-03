@if(session('status'))
    <div class="px-10 py-5 bg-green-300">
        {{session('status')}}
    </div>
@endif