let clinicApp = {
    $calendar: {},
    $doctorCard: {},

    doctorId: null,
    slot: null,
    
    modal: {
        $body: null,
        $footer: null
    },

    init: function () {
        this.datepicker();
        this.createVisit();
    },

    datepicker: function () {
        let self = this;
        $(".datepicker").datepicker({
            minDate: 0, maxDate: "+1M",
            dateFormat: 'yy-mm-dd',
            onSelect: function (date) {
                self.$calendar = $(this);
                self.$doctorCard = $(this).parent().next();
                self.setDoctorId(this);
                self.getSlots(date);
            }
        });

    },

    setDoctorId: function (context) {
        this.doctorId = $(context).data('doctorId');
    },

    setSlot: function (context) {
        this.slot = $(context).data('slot');
    },

    setModal: function (context) {
        this.modal.$body = $(context).find('.modal-body');
        this.modal.$footer = $(context).find('.modal-footer');
    },

    getSlots: function (date) {
        let self = this;
        axios.post('/ajax-slots', {
            date: date,
            doctorId: self.$calendar.data('doctorId')
        })
            .then(function (response) {
                self.drawSlots(response);
            })
            .catch(function (error) {
                console.log(error);
                alert('Ошибка. Повторите запрос позднее.');
                location.reload();
            });
    },

    drawSlots: function (response) {
        let freeSlots = response.data.freeSlots,
            doctorId = this.doctorId,
            data = [];
        if (freeSlots.length !== 0) {
            $.each(freeSlots, function(slot, time) {
                data += `<a data-slot="${slot}" data-doctor-id="${doctorId}" data-toggle="modal" data-target="#visitModal" 
            href="#" class="badge badge-info ml-4">${time[0]} - ${time[1]}</a> `;
            });
        } else {
            data = `<div class="alert alert-warning" role="alert">Нет номерков для записи.</div>`;
        }

        this.$doctorCard.html(data);
    },

    createVisit: function () {
        let self = this;
        $('#visitModal').on('show.bs.modal', function (e) {
            self.setModal(this);
            self.setDoctorId(e.relatedTarget);
            self.setSlot(e.relatedTarget);

            $("#js-create-visit").submit(function (e) {
                e.preventDefault();
                let postData = {
                    slot: self.slot,
                    doctorId: self.doctorId
                };

                let form = $(this).serializeArray();
                $(form).each(function (index, element) {
                    postData[element.name] = element.value
                });

                axios.post('/ajax-visit', postData)
                    .then(function (response) {
                        if (response.status === 'success') {
                            self.showResult(response.data.message);
                        } else {
                            self.showResult(response.data.message);
                            console.log(response.data.error);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                        alert('Ошибка. Повторите запрос позднее.');
                        location.reload();
                    });
            });
        });
    },

    showResult: function (response) {
        this.modal.$body.html(response);
        this.modal.$footer.html(`<button type="button" class="btn btn-primary" id="js-reload">Закрыть</button>`);

        $('#js-reload').click(function() {
            location.reload();
        });
    }
};

$(function () {
    clinicApp.init();
});
