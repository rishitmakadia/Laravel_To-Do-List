@php use Carbon\Carbon; @endphp

<div id="addTaskContainer" style="display: none;"> @include('todo.addTask') </div>
<div id="updateListContainer" style="display: none;"> @include('todo.editList') </div>
<div id="updateTaskContainer" style="display: none;"> @include('todo.editTask') </div>

<div class="d-flex gap-4 overflow-x-auto flex-nowrap px-3">

    @foreach($allListName as $value)
        <div class="list-column flex-shrink-0 p-3 rounded-4 task-dropzone"
             data-list-id="{{ $value->id }}"
{{--             Drop Zone--}}
             style="background-color: #f3f6fb; width: 320px; max-height: 100%; overflow-y: auto;">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">{{ $value->name }}</h5>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm p-0 border-0 bg-transparent addTaskBtn" data-list-id="{{ $value->id }}">
                        <i class="fas fa-plus text-secondary"></i>
                    </button>
                    <div class="dropdown">
                        <button class="btn bg-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v text-muted"></i>
                        </button>
                        <ul class="dropdown-menu shadow-sm">
                            <li>
                                <button type="button" class="dropdown-item bg-transparent border-0 openEditBtn"
                                        data-list-id="{{ $value->id }}" data-list-name="{{ $value->name }}">
                                    Edit
                                </button>
                            </li>
                            <li>
                                <form id="deleteForm-{{ $value->id }}" action="{{ route('list.destroy', ['listItem' => $value->id]) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="dropdown-item bg-transparent border-0" type="submit">Delete</button>
                                </form>
                            </li>
                            <li>
                                <form id="clearAll-{{$value->id}}" action="{{route('task.destroyAll', ['listItemId'=> $value->id])}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="dropdown-item bg-transparent border-0" type="submit">Clear All</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Task Cards --}}
            @foreach($allTaskName as $tasks)
                @if($tasks->listItem_id == $value->id)
                    <div class="card border-0 shadow-sm mb-3 draggable-task"
{{--                         Draggable Items--}}
                         style="border-radius: 20px;"
                         draggable="true"
                         data-task-id="{{ $tasks->id }}">

                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold mb-0"
                                    style="max-width: 80%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $tasks->taskName }}
                                </h6>
                                <div class="dropdown">
                                    <a href="#" class="text-muted" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button type="button"
                                                    class="dropdown-item bg-transparent border-0 updateTaskBtn"
                                                    data-task-id="{{ $tasks->id }}"
                                                    data-task-name="{{ $tasks->taskName }}"
                                                    data-task-desc="{{ $tasks->description }}"
                                                    data-task-img="{{ $tasks->imgLink }}"
                                                    data-task-prop="{{ $tasks->property }}"
                                                    data-task-date="{{ $tasks->deadline }}"
                                                    data-task-list="{{ $tasks->listItem_id }}">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('task.destroy', ['taskItem' => $tasks->id]) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item bg-transparent border-0" type="submit">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @if($tasks->imgLink)
                                <img src="{{ $tasks->imgLink }}" class="img-fluid rounded mb-2"
                                     style="max-height: 120px; object-fit: cover;">
                            @endif

                            @if($tasks->description)
                                <p class="text-muted small mb-2">{{ $tasks->description }}</p>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex align-items-center gap-2 text-muted">
                                    <i class="fas fa-calendar-alt"></i>
                                    <small>{{ Carbon::parse($tasks->deadline)->format('d M') }}</small>
                                </div>
                                @if($tasks->property)
                                    <span class="badge rounded-pill" style="background-color: #0dcaf0;">
                                        {{ $tasks->property }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach

</div>

{{-- JS --}}
<script>
    $(document).ready(function () {
        // Open Add Task Modal
        $('.addTaskBtn').on('click', function () {
            const listId = $(this).data('list-id');
            $('#listItemId').val(listId);
            $('#addTaskContainer').show();
            $('#addTask')[0].showModal();
        });

        // Open Edit List Modal
        $('.openEditBtn').on('click', function () {
            const listId = $(this).data('list-id');
            const listName = $(this).data('list-name');
            $('#updateItemId').val(listId);
            $('#editListName').val(listName);
            $('#updateListContainer').show();
            $('#editList')[0].showModal();
        });

        // Open Edit Task Modal
        $('.updateTaskBtn').on('click', function () {
            const taskId = $(this).data('task-id');
            const taskName = $(this).data('task-name');
            const taskDesc = $(this).data('task-desc');
            const taskImg = $(this).data('task-img');
            const taskProp = $(this).data('task-prop');
            const taskDate = $(this).data('task-date');
            const taskListId = $(this).data('task-list');

            $('#editTask #taskId').val(taskId);
            $('#editTask #taskTitle').val(taskName);
            $('#editTask #taskDesc').val(taskDesc);
            $('#editTask #taskImage').val(taskImg);
            $('#editTask #taskProperty').val(taskProp);
            $('#editTask #deadlineDate').val(taskDate);
            $('#editTask #listItemId').val(taskListId);

            if (taskImg) {
                $('#previewImage').attr('src', taskImg).show();
            } else {
                $('#previewImage').hide();
            }

            $('#updateTaskContainer').show();
            $('#editTask')[0].showModal();
        });

        // Drag & Drop Logic
        let draggedTask = null;

        $(document).on('dragstart', '.draggable-task', function (e) {
            draggedTask = this;
            setTimeout(() => $(this).hide(), 0);
        });

        $(document).on('dragend', '.draggable-task', function () {
            $(this).show();
            draggedTask = null;
        });

        $('.task-dropzone').on('dragover', function (e) {
            e.preventDefault();
            $(this).css('background-color', '#e9f5ff');
        });

        $('.task-dropzone').on('dragleave', function () {
            $(this).css('background-color', '#f3f6fb');
        });

        $('.task-dropzone').on('drop', function (e) {
            e.preventDefault();
            $(this).css('background-color', '#f3f6fb');
            if (draggedTask) {
                $(this).append(draggedTask);
            }
        });
    });
</script>
