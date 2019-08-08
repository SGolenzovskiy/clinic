<div class="modal fade" id="visitModal" tabindex="-1" role="dialog" aria-labelledby="visitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visitModalLabel">Запись на прием</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ajax-visit') }}" method="post">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваше имя</label>
                            <input type="text" class="form-control" name="name" placeholder="имя">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваша Фамилия</label>
                            <input type="text" class="form-control" name="surname" placeholder="фамилия">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваша телефон</label>
                            <input type="text" class="form-control" name="phone" placeholder="мобильный">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Дополнительные комментарии</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button type="submit" class="btn btn-primary">Записаться</button>
                </div>
            </form>
        </div>
    </div>
</div>
