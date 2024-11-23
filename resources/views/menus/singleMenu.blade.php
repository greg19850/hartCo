@extends('layouts.layout')

@section('title', $menu->name)

@section('content')
    <div class="single-menu-content">
        <div class="single-menu p-3">
            <div class="menu-title mb-3">
                <h2>{{ $menu->name }}</h2>
                @if($menu->serving_time)
                    <p class="serving-time">{{$menu->serving_time}}</p>
                @endif
            </div>
            @if($menu->menu_image && $menu->show_menu_image)
                <div class="show-menu-image">
                    <img class="menu-image" src="{{$menu->menu_image}}" alt="Menu Image" onclick="openModal(this)">
                    @if($menu->menu_image_2)
                        <img class="menu-image" src="{{$menu->menu_image_2}}" alt="Menu Image" onclick="openModal(this)">
                    @endif
                </div>
            @else
                <div class="submenu mb-3">
                    @foreach($menu->subMenu as $subMenu)
                        <div class="row my-2">
                            <h3 class="col-8 md-col-9 align-self-center">{{ $subMenu->title }}</h3>
                            @if($subMenu->price)
                                <p class="menu-price col-4 md-col-3 mb-0 align-self-center"> Price:
                                    £{{$subMenu->price}}{!! $subMenu->per_person ? 'pp' : '' !!}</p>
                            @endif
                        </div>


                        @if($subMenu->description)
                            <div class="sub-menu-desc mb-3">{{$subMenu->description}}</div>
                        @endif

                        <div class="menu-items-list">
                            @foreach($subMenu->menuItem as $menuItem)
                                <div class="menu-item">
                                    <div class="row">
                                        <p class="item-name col-9 mb-0">{{ $menuItem->name }} {{ $menuItem->vegan ? '(V)' : '' }}</p>
                                        <p class="item-price col-3 mb-0">£{{ $menuItem->price }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="ingredients col-9">{{ $menuItem->ingredients }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    @endforeach
                </div>
                @if(count($menu->menuRule))
                    <div class="rules">
                        @foreach($menu->menuRule as $rule)
                            <p>{!! $rule->body !!}</p>
                        @endforeach
                    </div>
                @endif
                <p>(V): Vegan | pp: Per Person</p>
            @endif
        </div>
    </div>

    <div id="myModal" class="modal"><span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content" id="imgModalContent">
            <!-- Images will be dynamically added here -->
        </div>
    </div>
    <script>
        function openModal(element) {
            var modal = document.getElementById("myModal");
            var modalContent = document.getElementById("imgModalContent");
            var captionText = document.getElementById("caption");

            // Clear previous images
            modalContent.innerHTML = '';

            // Get all images in the show-menu-image container
            var images = document.querySelectorAll('.show-menu-image .menu-image');
            images.forEach(function(img) {
                // Clone the image element
                var imgClone = img.cloneNode(true);
                // Add cloned image to modal content
                modalContent.appendChild(imgClone);
            });

            modal.style.display = "block";
            captionText.innerHTML = element.alt;
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

    </script>
@endsection
