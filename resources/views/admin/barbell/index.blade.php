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
            Штанга
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <a href="{{route('barbell.create')}}" class="btn btn-primary shadow-md mr-2">{{__('messages.create')}}</a>
            </div>

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">Вес (кг)</th>
                        <th class="text-center whitespace-nowrap">Сортировка</th>
                        <th class="whitespace-nowrap">Тип</th>
                        <th class="whitespace-nowrap">Статус</th>
                        <th class="text-center whitespace-nowrap">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($barbell as $bar)
                        <tr>
                            <td>
                                {{ $bar->kg }}
                            </td>
                            <td class="text-center">
                                {{ $bar->sort }}
                            </td>
                            <td>
                                {{ $bar->types }}
                            </td>
                            <td>
                                {{ $bar->status }}
                            </td>



                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <form id="delete-form" action="{{ route('barbell.destroy',$bar->id) }}" method="post" class="d-none flex">
                                        @csrf
                                        @method('DELETE')

                                        @if($bar->sort > 1)
                                        <a class="flex items-center text-success mr-3" href="{{ route('barbell.up',$bar->id) }}">
                                            <i data-lucide="corner-left-up" class="w-4 h-4 mr-1"></i>
                                        </a>
                                        @endif
                                        <a class="flex items-center text-danger mr-3" href="{{ route('barbell.down',$bar->id) }}">
                                            <i data-lucide="corner-right-down" class="w-4 h-4 mr-1"></i>
                                        </a>

                                        <a class="flex items-center text-warning mr-3" href="{{ route('barbell.edit',$bar->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{__('messages.edit')}} </a>
                                        <button type="submit" class="flex items-center text-danger"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> {{__('messages.delete')}} </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            {{ $barbell->links('admin.vendor.pagination.custom')}}
        </div>

    </div>
    <!-- END: Content -->

@endsection
