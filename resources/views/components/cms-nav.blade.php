<div class="cms-nav p-1">
    <div class="logo row my-3">
        <div class="img-container col-5">
            <img src='{{url('/images/hart logo.png')}}' alt="logo" />
        </div>
        <div class=" text col-7">CMS Panel</div>
    </div>

    <ul class="cms-options ps-2">
        <li><a class="cmsMenuItem" href="{{route('cms.showCmsHome')}}">Home / Meet The Fam</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.showMenusPanel')}}">Menus</a></li>
        <li><a class="cmsMenuItem" href="#">Events</a></li>
        <li><a class="cmsMenuItem" href="#">FAQ</a></li>
        <li><a class="cmsMenuItem" href="#">Settings</a></li>
        <li><a class="cmsMenuItem" href="/">Exit CMS</a></li>
    </ul>
</div>
