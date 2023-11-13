<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <a href="{{route('adminDashboard')}}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="admin" class="w-6" src="{{asset('dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> {{ Auth::user()->name }} </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('adminDashboard')}}" class="side-menu {{ request()->routeIs('adminDashboard') ? 'side-menu--active':' ' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.dashboard')}}
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>

        <li>
            <a href="{{route('users.index')}}" class="side-menu {{ request()->routeIs('users.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.users')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('trainers.index')}}" class="side-menu {{ request()->routeIs('trainers.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.trainers')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('comments.index')}}" class="side-menu {{ request()->routeIs('comments.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.comments')}}
                </div>
            </a>
        </li>

         <li>
            <a href="{{route('tarifs.index')}}" class="side-menu {{ request()->routeIs('tarifs.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="star"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.tarifs')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('contacts.index')}}" class="side-menu {{ request()->routeIs('contacts.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="contact"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.contacts')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('exercises.index')}}" class="side-menu {{ request()->routeIs('exercises.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="database"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.exercises')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('apparatus.index')}}" class="side-menu {{ request()->routeIs('apparatus.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="database"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.apparatus')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('dish.index')}}" class="side-menu {{ request()->routeIs('dish.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="coffee"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.dishes')}}
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('barbell.index')}}" class="side-menu {{ request()->routeIs('barbell.index') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"><i data-lucide="database"></i></div>
                <div class="side-menu__title">
                    Штанга
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('documents.documents')}}" class="side-menu {{ request()->routeIs('documents.documents') ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title">
                    {{__('messages.documents')}}
                </div>
            </a>
        </li>


    </ul>
</nav>
<!-- END: Side Menu -->
