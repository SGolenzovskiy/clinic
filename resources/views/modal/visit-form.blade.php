<div class="modal fade" id="visitModal" tabindex="-1" role="dialog" aria-labelledby="visitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visitModalLabel">@lang('app.modal.title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ajax-visit') }}" id="js-create-visit" method="post">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="phone">@lang('visitForm.create_visit.phone.label')</label>
                            <input type="text" class="form-control" name="phone"
                                   placeholder="@lang('visitForm.create_visit.phone.field')" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">@lang('visitForm.create_visit.surname.label')</label>
                            <input type="text" class="form-control" name="surname"
                                   placeholder="@lang('visitForm.create_visit.surname.field')" required>
                        </div>
                        <div class="form-group">
                            <label for="name">@lang('visitForm.create_visit.name.label')</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="@lang('visitForm.create_visit.name.field')">
                        </div>
                        <div class="form-group">
                            <label for="note">@lang('visitForm.create_visit.note.label')</label>
                            <textarea name="note" class="form-control" id="note" rows="3"
                                      placeholder="@lang('visitForm.create_visit.note.field')"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('app.modal.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('app.modal.submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>
