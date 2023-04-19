@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
     class="fixed yop-0 left-1/2 transform -translate-x-1/2 bg-gray-50 border border-gray-200 rounded p-6 text-red-500 font-bold px-48 py-3">
    <p>
        {{session('message')}}
    </p>
</div>
@endif