@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Pesan</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Fiture</a></li>
                        <li class="breadcrumb-item active">Pesan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg">
            <div class="chat-wrapper d-lg-flex gap-1  p-1">
                <div class="chat-leftsidebar">
                    <div class="px-4 pt-4 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="mb-4">Chats</h5>
                            </div>
                        </div>
                        <div class="search-box">
                            <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                            <i class="ri-search-2-line search-icon"></i>
                        </div>

                    </div> <!-- .p-4 -->

                    <div class="chat-room-list" data-simplebar>

                        <div class="chat-message-list">

                            <ul class="list-unstyled chat-list chat-user-list" id="userList">
                                @foreach ($users as $user)
                                    <li class="">
                                        <a href="javascript: void(0);" class="user-list" data-from="{{ $user->id }}">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                    <div class="avatar-xxs">
                                                        <img src="{{ asset('storage/user_images/' . $user->image) }}"
                                                            class="rounded-circle avatar-xxs userprofile" alt="">
                                                    </div>
                                                    <span class="user-status"></span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-truncate mb-0">{{ $user->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        {{-- <div class="d-flex align-items-center px-4 mt-4 pt-2 mb-2">
                            <div class="flex-grow-1">
                                <h4 class="mb-0 fs-11 text-muted text-uppercase">Channels</h4>
                            </div>
                        </div> --}}

                        <div class="chat-message-list">

                            <ul class="list-unstyled chat-list chat-user-list mb-0" id="channelList">
                                <li>
                                    {{-- @foreach ($user as $item)
                                    <a href="javascript: void(0);" class="unread-msg-user">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-xxs">
                                                    <div class="avatar-title bg-light rounded-circle text-body">
                                                        #
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-truncate mb-0">{{ $item->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach --}}
                                </li>
                            </ul>
                        </div>
                        <!-- End chat-message-list -->
                    </div>

                </div>
                <!-- end chat leftsidebar -->
                <!-- Start User chat -->
                <div class="user-chat w-100 overflow-hidden">

                    <div class="chat-content d-lg-flex">
                        <!-- start chat conversation section -->
                        <div class="w-100 overflow-hidden position-relative">
                            <!-- conversation user -->
                            <div class="position-relative">
                                <div class="p-3 user-chat-topbar">
                                    <div class="row align-items-center">
                                        <div class="col-sm-4 col-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                    <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i
                                                            class="ri-arrow-left-s-line align-bottom"></i></a>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex align-items-center">
                                                        <div
                                                            class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                            <img src="assets/images/users/avatar-2.jpg"
                                                                class="rounded-circle avatar-xs" alt=""
                                                                id="chat-img-user">
                                                            <span class="user-status"></span>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="text-truncate mb-0 fs-16"><a
                                                                    class="text-reset username" data-bs-toggle="offcanvas"
                                                                    href="#userProfileCanvasExample"
                                                                    aria-controls="userProfileCanvasExample">Not User</a>
                                                            </h5>
                                                            <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                                <small>Offline</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-4">
                                            <ul class="list-inline user-chat-nav text-end mb-0">
                                                <li class="list-inline-item m-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i data-feather="search" class="icon-sm"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                            <div class="p-2">
                                                                <div class="search-box">
                                                                    <input type="text"
                                                                        class="form-control bg-light border-light"
                                                                        placeholder="Search here..."
                                                                        onkeyup="searchMessages()" id="searchMessage">
                                                                    <i class="ri-search-2-line search-icon"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                    <button type="button" class="btn btn-ghost-secondary btn-icon"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#userProfileCanvasExample"
                                                        aria-controls="userProfileCanvasExample">
                                                        <i data-feather="info" class="icon-sm"></i>
                                                    </button>
                                                </li>

                                                <li class="list-inline-item m-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical" class="icon-sm"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-block d-lg-none user-profile-show"
                                                                href="#"><i
                                                                    class="ri-user-2-fill align-bottom text-muted me-2"></i>
                                                                View Profile</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="ri-inbox-archive-line align-bottom text-muted me-2"></i>
                                                                Archive</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="ri-mic-off-line align-bottom text-muted me-2"></i>
                                                                Muted</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="ri-delete-bin-5-line align-bottom text-muted me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- end chat user head -->

                                <div class="position-relative" id="users-chat">
                                    <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>

                                        <ul class="list-unstyled chat-conversation-list" id="users-conversation">

                                        </ul>
                                        <!-- end chat-conversation-list -->

                                    </div>
                                    <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                                        id="copyClipBoard" role="alert">
                                        Message copied
                                    </div>
                                </div>

                                <!-- end chat-conversation -->

                                <div class="chat-input-section p-3 p-lg-4">

                                    <form id="chatinput-form" enctype="multipart/form-data">
                                        <div class="row g-0 align-items-center">

                                            <div class="col">
                                                <div class="chat-input-feedback">
                                                    Please Enter a Message
                                                </div>
                                                <input type="hidden" name="to">
                                                <input type="text"
                                                    class="form-control chat-input bg-light border-light" name="message"
                                                    id="chat-input" placeholder="Type your message..."
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-auto">
                                                <div class="chat-input-links ms-2">
                                                    <div class="links-list-item">
                                                        <button type="submit"
                                                            class="btn btn-info chat-send waves-effect waves-light">
                                                            <i class="ri-send-plane-2-fill align-bottom"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="replyCard">
                                    <div class="card mb-0">
                                        <div class="card-body py-3">
                                            <div class="replymessage-block mb-0 d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <h5 class="conversation-name"></h5>
                                                    <p class="mb-0"></p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button type="button" id="close_toggle"
                                                        class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                        <i class="bx bx-x align-middle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin')
    <!-- glightbox js -->
    <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>

    <!-- chat init js -->
    <script src="{{ asset('assets/js/pages/chat.init.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#userList').on('click', '.user-list', function() {
                var id = $(this).attr('data-from');
                var image = $(this).find('img').attr('src');
                $('#chat-img-user').prop('src', image);
                $('#chatinput-form [name="to"]').val(id);
                // console.log(image);
                getMessages(id);
            });

            $('#chatinput-form').submit(function() {
                let csrf_token = $('meta[name="csrf-token"]').attr('content');
                var message = $('#chatinput-form [name="message"]').val();
                var to = $('#chatinput-form [name="to"]').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('chat.send') }}",
                    data: {
                        _token: csrf_token,
                        to: to,
                        message: message
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#chatinput-form [name="message"]').val('');
                        // console.log(response);
                    }
                });

                return false;
            })

            function getMessages(id) {
                // console.log(id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('chat/messages') }}/" + id,
                    dataType: "JSON",
                    success: function(data) {
                        var html = '';

                        $.each(data, function(i, v) {
                            if (v.id != id) {
                                html += '<li class="chat-list left">' +
                                    '           <div class="conversation-list">' +
                                    '               <div class="chat-avatar">' +
                                    '                   <img src="storage/user_images/' + v
                                    .image + '" alt="">' +
                                    '               </div>' +
                                    '               <div class="user-chat-content">' +
                                    '                   <div class="ctext-wrap">' +
                                    '                       <div class="ctext-wrap-content">' +
                                    '                           <p class="mb-0 ctext-content">' +
                                    v.message + '</p>' +
                                    '                       </div>' +
                                    '                       <div class="dropdown align-self-start message-box-drop">' +
                                    '                           <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '                               <i class="ri-more-2-fill"></i>' +
                                    '                           </a>' +
                                    '                           <div class="dropdown-menu">' +
                                    '                               <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>' +
                                    '                               <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>' +
                                    '                               <a class="dropdown-item copy-message" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>' +
                                    '                               <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>' +
                                    '                               <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>' +
                                    '                           </div>' +
                                    '                       </div>' +
                                    '                   </div>' +
                                    '                   <div class="conversation-name"><small class="text-muted time">' +
                                    v.time +
                                    '</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>' +
                                    '                   </div>' +
                                    '               </div>' +
                                    '           </div>' +
                                    '       </li>';
                            } else {
                                html += '<li class="chat-list right">' +
                                    '           <div class="conversation-list">' +
                                    '               <div class="chat-avatar">' +
                                    '                   <img src="storage/user_images/' + v
                                    .image + '" alt="">' +
                                    '               </div>' +
                                    '               <div class="user-chat-content">' +
                                    '                   <div class="ctext-wrap">' +
                                    '                       <div class="ctext-wrap-content">' +
                                    '                           <p class="mb-0 ctext-content">' +
                                    v.message + '</p>' +
                                    '                       </div>' +
                                    '                       <div class="dropdown align-self-start message-box-drop">' +
                                    '                           <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '                               <i class="ri-more-2-fill"></i>' +
                                    '                           </a>' +
                                    '                           <div class="dropdown-menu">' +
                                    '                               <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>' +
                                    '                               <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>' +
                                    '                               <a class="dropdown-item copy-message" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>' +
                                    '                               <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>' +
                                    '                               <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>' +
                                    '                           </div>' +
                                    '                       </div>' +
                                    '                   </div>' +
                                    '                   <div class="conversation-name"><small class="text-muted time">' +
                                    v.time +
                                    '</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>' +
                                    '                   </div>' +
                                    '               </div>' +
                                    '           </div>' +
                                    '       </li>';
                            }
                        });

                        $('#users-conversation').html(html);
                    }
                });

                return false;
            }
        });
    </script>
@endsection
