@if(session()->has('message'))
    <div x-data="{ open: false }" x-init="setTimeOut( () => show = false, 5000)" x-show="open" class="fixed top-0 transform left-1/2 bg-black -translate-x-1/2 text-white px-48 py-3">
        <p> {{ session('message')}}</p>
    </div>

@endif
