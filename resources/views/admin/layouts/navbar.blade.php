<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">

    </nav>
    <!-- END: Breadcrumb -->

    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown">
            <button class="dropdown-toggle btn btn-light" aria-expanded="false" data-tw-toggle="dropdown">
                @if(app()->getLocale() == 'ru')
                    <img alt="RU" class="mr-3" src="{{asset('dist/images/ru.svg')}}"> RU
                @else
                    <img alt="RU" class="mr-3" src="{{asset('dist/images/en.svg')}}"> EN
                @endif
            </button>
            <div class="dropdown-menu w-20">
                <ul class="dropdown-content">
                    <li> <a href="{{ route('locale',  'ru') }}" class="dropdown-item"> <img alt="RU" class="mr-3" src="{{asset('dist/images/ru.svg')}}"> RU </a> </li>
                    <li> <a href="{{ route('locale',  'en') }}" class="dropdown-item"> <img alt="EN" class="mr-3" src="{{asset('dist/images/en.svg')}}"> EN</a> </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Notifications -->

    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="{{Auth::user()->name}}"
                 @if(Auth::user()->avatar == "avatar.jpg" or Auth::user()->avatar == 0)
                 src="{{asset('dist/images/profile-3.jpg')}}"
                     @else
                 src="https://omut.fra1.cdn.digitaloceanspaces.com/{{Auth::user()->avatar}}"
                     @endif
                 >
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>

                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>{{__('messages.logout')}}  </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
