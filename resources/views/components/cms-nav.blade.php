<div class="cms-nav p-1">
    <div class="logo row my-3">
        <div class="img-container col-5">
            <x-hart-logo />
        </div>
        <div class="text col-7">Welcome {{\Illuminate\Support\Facades\Auth::guard('admin')->user()['name']}}</div>
    </div>

    <ul class="cms-options ps-2">
        <li><a class="cmsMenuItem" href="{{route('cms.showCmsHome')}}">Home / Meet The Fam</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.eventBanners')}}">Event Posters</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.showMenusPanel')}}">Menus</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.showEventsPanel')}}">Events</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.showFaqPanel')}}">FAQ</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.showSettingsPanel')}}">Settings</a></li>
        <li><a class="cmsMenuItem" href="{{route('cms.logout')}}">Logout / Exit CMS</a></li>
    </ul>
</div>
