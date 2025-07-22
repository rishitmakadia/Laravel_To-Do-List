<dialog id="addTask" class="rounded-modal">
    <form action="{{route('task.post')}}" name="addTaskForm" method='POST' class="modal-form">
        @csrf
        <div class="modal-header">
            <h3>Add Task</h3>
            <button type="button" class="close-btn" onclick="document.getElementById('addTask').close()">×</button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="listItem_id" id="listItemId">
            <input type="text" placeholder="Task" name='taskName' id="taskTitle" class="modal-input" required />
            <input type="text" placeholder="Description" name='description' id="taskDesc" class="modal-input" />
            <input type="text" placeholder="Image URL" name='imgLink' id="taskImage" class="modal-input" />
            <img id="previewImage" src="" alt="Preview" style="display:none; margin-top:10px; max-width:100%;">
            <select id="taskProperty" class="modal-input" name="property">
                <option disabled selected>Select Task Property</option>
                <option value="Urgent">Design</option>
                <option value="Optional">Mobile</option>
                <option value="Optional">UX Stage</option>
                <option value="Optional">Research</option>
                <option value="Optional">Data Science</option>
                <option value="Optional">Branding</option>
            </select>
            <img id="previewImage" src="" alt="" style="display:none; margin-top:10px; max-width:100%;">
            <input type="date" name="deadline" id="deadlineDate" class="modal-input" />
        </div>
        <div class="modal-footer">
            <button type="button" class="cancel-btn" onclick="document.getElementById('addTask').close()">Cancel</button>
            <button type="submit" class="add-btn">Add Task</button>
        </div>
    </form>
</dialog>


<!-- Optional JS to update image on URL input -->
<script>
    $(document).ready(function () {
        $('#taskImage').on('input', function () {
            const url = $(this).val().trim();
            const preview = $('#previewImage');
            if (url) {
                preview.attr('src', url).show();
            } else {
                preview.attr('src', 'https://adminmart.github.io/template_api/images/website-template.jpg').show();
            }
        });
    });
</script>



<style>
    .rounded-modal {
        border: none;
        border-radius: 20px;
        padding: 20px;
        max-width: 90%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        margin: 0;
        font-weight: bold;
    }

    .close-btn {
        font-size: 24px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .modal-body {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .modal-input {
        width: 100%;
        padding: 10px 20px;
        border: 2px solid #1e90ff;
        border-radius: 30px;
        font-size: 16px;
        outline: none;
    }

    .modal-footer {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .cancel-btn {
        background-color: #ffe5eb;
        color: #d63384;
        border: none;
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .add-btn {
        background-color: #1e90ff;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: bold;
        cursor: pointer;
    }
    .task-list-container {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .task-card {
        border: 1px solid #ccc;
        padding: 1rem;
        border-radius: 8px;
        background-color: #f9f9f9;
    }
    .task-image {
        max-width: 100%;
        border-radius: 6px;
        margin-top: 0.5rem;
    }
    .task-property {
        display: inline-block;
        margin-top: 0.5rem;
        padding: 0.2rem 0.5rem;
        border-radius: 5px;
        background: #dbeafe;
        color: #1e3a8a;
        font-size: 0.8rem;
    }
</style>
