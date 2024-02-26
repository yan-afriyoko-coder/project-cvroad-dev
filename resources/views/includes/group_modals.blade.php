<!-- Create Group Modal -->
<div class="modal fade" id="createGroupModal" tabindex="-1" aria-labelledby="createGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('admin.groups_create')}}" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGroupModalLabel">Create Group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
          @csrf
          <div class="row">          
            <input type="text" class="form-control" placeholder="Name" name="name" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
  </div>
</div>

<!-- Edit group Modal -->
<div class="modal fade" id="editGroupModal" tabindex="-1" aria-labelledby="editGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit_group_form" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGroupModalLabel">Edit Group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
          @csrf
          <div class="row">          
            <input type="text" class="form-control" placeholder="Name" name="name" id="group_name" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
  </div>
</div>