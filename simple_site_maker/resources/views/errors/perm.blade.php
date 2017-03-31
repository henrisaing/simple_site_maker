@extends('layouts.app')
@section('content')
        <div class="flex-center position-ref full-height" style="
            align-items: center;
            display: flex;
            justify-content: center;
            position: relative;
        ">

            <div class="content" style ="
                text-align: center;
            ">
                <div class="title m-b-md" style="
                    font-size: 84px;
                    margin-bottom: 30px;
                ">
                    Error
                </div>

                <div class="links" style="
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                ">
                    Insufficient permissions to view page.
                </div>
            </div>
        </div>
@endsection