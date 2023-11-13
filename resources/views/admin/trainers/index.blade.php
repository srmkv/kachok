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
            {{__('messages.trainers')}}
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <a href="{{route('trainers.create')}}" class="btn btn-primary shadow-md mr-2">{{__('messages.create')}}</a>
            </div>

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{__('messages.name')}}</th>
                        <th class="whitespace-nowrap">{{__('messages.surname')}}</th>
                        <th class="whitespace-nowrap">{{__('messages.education')}}</th>
                        <th class="whitespace-nowrap">{{__('messages.achievements')}}</th>
                        <th class="whitespace-nowrap">{{__('messages.photo')}}</th>
                        <th class="text-center whitespace-nowrap">{{__('messages.sort')}}</th>
                        <th class="text-center whitespace-nowrap">{{__('messages.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($trainers as $trainer)
                        <tr>
                            <td>
                                {{ $trainer->name }}
                            </td>
                            <td>
                                {{ $trainer->surname }}
                            </td>
                            <td>
                                {!! $trainer->education !!}
                            </td>
                            <td>
                                {!! $trainer->achievements !!}
                            </td>
                            <td class="text-center w-32">
                                <img alt="{{ $trainer->photo }}"
                                     @if($trainer->photo == 0)
                                     src="{{asset('dist/images/profile-3.jpg')}}"
                                     @else
                                     src="{{asset('photo/'.$trainer->photo)}}"
                                     @endif
                                     >
                            </td>
                            <td class="text-center">
                                {{ $trainer->sort }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <form id="delete-form" action="{{ route('trainers.destroy',$trainer->id) }}" method="post" class="d-none flex">
                                        @csrf
                                        @method('DELETE')

                                        @if($trainer->sort > 1)
                                        <a class="flex items-center text-success mr-3" href="{{ route('trainers.up',$trainer->id) }}">
                                            <i data-lucide="corner-left-up" class="w-4 h-4 mr-1"></i>
                                        </a>
                                        @endif
                                        <a class="flex items-center text-danger mr-3" href="{{ route('trainers.down',$trainer->id) }}">
                                            <i data-lucide="corner-right-down" class="w-4 h-4 mr-1"></i>
                                        </a>

                                        <a class="flex items-center text-warning mr-3" href="{{ route('trainers.edit',$trainer->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{__('messages.edit')}} </a>
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
            {{ $trainers->links('admin.vendor.pagination.custom')}}
        </div>

    </div>
    <!-- END: Content -->

@endsection
