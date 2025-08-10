@extends('layouts.layout')

@section('title', 'Christmas')

@section('content')
    <div class="christmas-page">
        <div class="christmas-gallery">
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/1.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/2.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/3.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/4.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/5.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/6.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/7.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/8.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/9.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/10.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/11.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/12.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/13.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/14.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/15.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/16.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/17.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/18.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/19.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
            <div class="christmas-image-container">
                <img src="{{ asset('storage/images/christmas/20.png') }}" alt="Christmas celebration" class="christmas-image">
            </div>
        </div>
    </div>

    <style>
        .christmas-page {
            width: 100%;
        }

        .christmas-gallery {
            width: 100%;
        }

        .christmas-image-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .christmas-image {
            width: 100%;
            height: auto;
            display: block;
        }

        @media screen and (min-width: 768px){
            .christmas-gallery {
                width: 70%;
                margin: 0 auto;
            }
        }
    </style>
@endsection