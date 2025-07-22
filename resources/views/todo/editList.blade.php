<dialog id="editList" class="rounded-modal">
    <form action="{{route('list.update')}}" name='updateList' method='POST' class="modal-form">
        @csrf
        @method('patch')
        <div class="modal-header">
            <h3>Add List</h3>
            <button type="button" class="close-btn" onclick="document.getElementById('editList').close()">×</button>
        </div>
        <input type="hidden" name="id" id="updateItemId">
        <div class="modal-body">
            <input type="text" placeholder="Enter list name" name="name" id="editListName" class="modal-input" required />
        </div>
        <div class="modal-footer">
            <button type="button" class="cancel-btn" onclick="document.getElementById('editList').close()">Cancel
            </button>
            <button type="submit" class="add-btn" id="submitList" onclick="document.getElementById('updateListContainer').close()">Update List</button>
        </div>
    </form>
</dialog>

<style>
    .rounded-modal {
        border: none;
        border-radius: 20px;
        padding: 20px;
        width: 400px;
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
        font-size: 20px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .modal-body {
        display: flex;
        justify-content: center;
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
</style>
