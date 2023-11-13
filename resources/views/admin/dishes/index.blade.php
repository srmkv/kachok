@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
    @include('admin.layouts.navbar')

    @if ($message = Session::get('success'))
        <!-- BEGIN: Notification Content -->
            <div class="toastify on  toastify-right toastify-top" style="transform: translate(0px, 0px); top: 15px;"><div id="success-notification-content" class="toastify-content flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" class="lucide lucide-check-circle text-success"
                         data-lucide="check-circle"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01">
                        </polyline>
                    </svg>
                    <div class="ml-4 mr-4">
                        <div class="font-medium">{{ $message }}</div>
                    </div>
                </div>
            </div>
            <!-- END: Notification Content -->
        @endif

        <h2 class="intro-y text-lg font-medium mt-10">
            {{__('messages.dishes')}}
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                <form action="{{ route('parse.dishes') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary mt-2">Обновить блюда</button>
                </form>

                <div class="card">
                @if($parse_history)
                    @if($parse_history->status === "IN_PROGRESS")
                        Парсинг блюд...
                    @else
                        <p>Последнее обновление: {{ $parse_history->updated_at->diffForHumans() }}</p>
                        <p>Статус: {{ $parse_history->status }}</p>
                    @endif
                @endif
                </div>

            </div>

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{__('messages.name')}}</th>
                        <th class="whitespace-nowrap">{{__('messages.photo')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>
                                {{ $dish->name }}
                            </td>
                            <td>
                                <img src="{{ asset($dish->photo) }}" width="100">
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            {{ $dishes->links('admin.vendor.pagination.custom')}}
        </div>

    </div>
    <!-- END: Content -->

@endsection
