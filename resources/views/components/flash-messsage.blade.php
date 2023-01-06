@if(session()->has('message'))
    <div class="fixed top-0 transform left-1/2 bg-black -translate-x-1/2 text-white px-48 py-3">
        <p> {{ session('message')}}</p>
    </div>

@endif
