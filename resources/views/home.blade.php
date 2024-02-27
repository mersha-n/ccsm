@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ዳሽቦርድ') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('Welcome To Court Case Management System.') }} -->
                    <div class="flex justify-center">
                     <!-- <img src="{{url('../image/df.png')}}" alt="Image" width="400" height="600"/> -->
                     <center>
                     <img src="{{url('../image/law.png')}}" alt="Logo" width="500" height="400" class="brand-image bg-white img-circle " />
                     </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
