@extends('master')

@section('content')
    <?php
    $x = 0; //0 = not mail template -- 1 = yes mail template = yes navbar gone
    ?>
    <div class="fs-s"></div>
    <div class="container">
        <div class="email-border">
            <pre>
                {{ print_r($data) }}
            </pre>
        </div>
    <div class="fs-xs"></div>
        <div class="email-border">
            <code>
                <pre>
                    {{ $xml }}
                </pre>
            </code>
        </div>
    </div>

@endsection
