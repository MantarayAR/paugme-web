<div class="modal" data-modal="deleteModal">

    <div class="modal-content">
        <div class="modal-title">
            <button class="modal-close" type="button" data-dismiss="modal">
                ×
            </button>
            <h4>Confirm Delete</h4>
        </div>
        <div class="modal-body">
            <p><i class="fa fa-question-circle fa-2x"></i> Are you sure you want to delete this post?</p>
        </div>

        <div class="modal-footer">
            {!! Form::open(array('action' => ['Admin\PostController@destroy', $post['id']], 'method' => 'DELETE' )) !!}

            <button class="button" type="button" data-dismiss="modal">Cancel</button>
            {!! Form::submit('Delete', ['class' => 'button button-danger']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>