@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
 @endif

 @if(session()->has('success'))

   <h2 class="alert alert-success">{{ session('success') }}</h2>
 
@endif

@if(session()->has('error'))
<h2 class="btn btn-danger">{{ session('error') }}</h2>
@endif