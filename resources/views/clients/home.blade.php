@extends('layouts.client')
@section('showsl')
@foreach ($dataSlider as $item)
        <div class="ltn__slide-item ">
    <div class="ltn__slide-item-inner">
        <div class="container">
            <div class="row">
                    <div class="slide-item-img">
                        <img class="d-block w-100" src="{{Storage::url($item->hinh_anh)}}" alt="#">
                    </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- ltn__slide-item -->

@endsection


@include('clients.contents.trangchu')