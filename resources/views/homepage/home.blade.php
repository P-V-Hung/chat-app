@extends('layouts.web')
@section('content')
    <!-- preloader -->
    @include('components.loader')
    <!-- ./ preloader -->

    <!-- layout -->
    @include('components.layout')
    <!-- ./ layout -->

    <!-- Notifications -->
    @include('components.notification')
    <!-- ./ Notifications -->

    <!-- User profile -->
    @include('components.profile')
    <!-- ./ User profile -->

    <!-- Settings -->
    @include('components.setting')
    <!-- ./ Settings -->

    <!-- disconnected modals -->
    @include('components.disconnect')
    <!-- ./ disconnected modals -->

    <!-- voice call modals -->
    @include('modals.call')
    <!-- ./ Video call modals -->

    <!-- add friends modals -->
    @include('modals.friend')
    <!-- ./ add friends modals -->

    <!-- new group modals -->
    @include('modals.group')
    <!-- ./ new group modals -->

    <!-- setting modals -->
    @include('modals.setting')
    <!-- ./ setting modals -->

    <!-- edit profile modals -->
    @include('modals.profile')
    <!-- ./ edit profile modals -->
@endsection
@push('script')
    <script>
        $("#close-chat").click();
    </script>
    <script type="module">
        Echo.join('online')
            .here((users) => {
                axios.post('{{route('change.online')}}',{
                    id: {{auth()->id()}},
                    data: 1,
                })
            })
            .joining((user) => {
                $(".status-user-"+user.id).addClass('avatar-state-warning');
                axios.put('{{route('change.message')}}',{user})
                axios.post('{{route('change.online')}}',{
                    id: user.id,
                    data: 1,
                })
                    .then(function(response){
                        if(response.status == 200){
                            $(".status-user-"+user.id).addClass('avatar-state-warning');
                            $(".user-chat-"+user.id).addClass('avatar-state-success');
                            $(".user-chat-status-"+user.id).text('Online');
                            $(".user-chat-"+user.id).addClass('avatar-state-success');
                        }
                    })
            })
            .leaving((user) => {
                axios.post('{{route('change.online')}}',{
                    id: user.id,
                    data: 0,
                })
                    .then(function(response){
                        if(response.status == 200){
                            $(".user-chat-"+user.id).removeClass('avatar-state-success');
                            $(".status-user-"+user.id).removeClass('avatar-state-warning');
                            $(".user-chat-status-"+user.id).text('Offline');
                        }
                    })
            })
    </script>
@endpush
