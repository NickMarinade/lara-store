@if(session()->has('message'))
<div class="fixed yop-0 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-48 py-3">
    <p>
        {{session('message')}}
    </p>
</div>
@endif